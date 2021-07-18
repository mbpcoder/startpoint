require('./bootstrap');

require('griew');

jQuery(document).ready(function ($) {
    let griew = new Griew();
    griew.setLocale('fa');
    griew.options().set('pagination', {
        'container': 'nav.paginate',
        'visibility': true,
        'onePageNavigation': true,
        'multiPagesNavigation': true,
        'manualNavigation': true,
        'jumpPagesCount': 10
    });
    griew.options().set('token', $('meta[name=csrf-token]').attr('content'));
    griew.dataProvider().setDefault('ajax');


    if (griew) {
        // on refresh and filters need to run before initialize
        griew.onRefresh = function () {

            let filters = griew.filter().toArray();
            for (let index in filters) {
                let filter = filters[index];

                if (filter.type == 'datetime') {
                    if (filter.operand1 && isNaN(filter.operand1)) {
                        filter.operand1 = new persianDate([filter.operand1.year, filter.operand1.month, filter.operand1.day, filter.operand1.hour, filter.operand1.minute]).unix();
                    }
                    if (filter.operand2 && isNaN(filter.operand2)) {
                        filter.operand2 = new persianDate([filter.operand2.year, filter.operand2.month, filter.operand2.day, filter.operand2.hour, filter.operand2.minute]).unix();
                    }
                }
            }

            $('.griew-progress').addClass('text-primary griew-progress-animate');
        };
        griew.onLoad = function () {
            $('.griew-progress').removeClass('text-primary griew-progress-animate');
            if ($('.griew-pagination-reports').length == 0) {
                $('.paginate .griew-pagination-wrapper').append('<div class="griew-pagination-reports"></div>');
            }
            $('.griew-pagination-reports').text(griew.response().getPagination().total);
        };

        griew.filter().onCreate = function (filter) {
            // if (filter.type == 'datetime') {
            //     if (filter.operand1 && isNaN(filter.operand1)) {
            //         filter.operand1 = new persianDate([filter.operand1.year, filter.operand1.month, filter.operand1.day, filter.operand1.hour, filter.operand1.minute]).unix();
            //     }
            //     if (filter.operand2 && isNaN(filter.operand2)) {
            //         filter.operand2 = new persianDate([filter.operand2.year, filter.operand2.month, filter.operand2.day, filter.operand2.hour, filter.operand2.minute]).unix();
            //     }
            // }
        };
        griew.filter().onUpdate = function (filter) {
            if (filter.type == 'datetime') {
                if (filter.operand1 && !isNaN(filter.operand1)) {
                    var day = new persianDate.unix(filter.operand1).toArray();
                    filter.operand1 = {
                        year: day[0],
                        month: day[1],
                        day: day[2],
                        hour: day[3],
                        minute: day[4]
                    };
                }
                if (filter.operand2 && !isNaN(filter.operand2)) {
                    var day = new persianDate.unix(filter.operand2).toArray();
                    filter.operand2 = {
                        year: day[0],
                        month: day[1],
                        day: day[2],
                        hour: day[3],
                        minute: day[4]
                    };
                }
            }
        };
        griew.filter().onRemove = function (filter) {
            //console.log('onRemove', filter)
        };

        $('#griewResetButton').click(function () {
            $('.griew-progress').removeClass('griew-progress');
            $('#griewResetButton i').addClass('griew-progress');

            griew.filter().clear();
            griew.order().clear();
            griew.pagination().gotoFirstPage();
            griew.refresh();
        });

        $('#griewRefreshButton').click(function () {
            $('.griew-progress').removeClass('griew-progress');
            $('#griewRefreshButton i').addClass('griew-progress');
            griew.refresh();
        });

        $('#griewExportButton .dropdown-item').click(function (e) {
            var type = $(this).data('export');
            var total = griew.response().getPagination().total;

            griew.pagination().setPerPage(total);
            //griew.refresh();
        });

        var columns = griew.view().columns().toArray();
        for (var col in columns) {
            var item = $('<a class="dropdown-item" href="" data-name="' + columns[col].name + '">');
            item.text(columns[col].caption);

            if (!griew.view().columns().isVisible(columns[col].name)) {
                item.addClass('text-muted');
            }

            $('#griewColumnsList .dropdown-menu').append(item);
        }

        $('#griewColumnsList .dropdown-menu').on('click', '.dropdown-item', function (event) {
            var name = $(this).data('name');
            if (griew.view().columns().isVisible(name)) {
                griew.view().columns().hide(name);
                $(this).addClass('text-muted');
            } else {
                griew.view().columns().show(name);
                $(this).removeClass('text-muted');
            }

            return false;
        });
    }
});
