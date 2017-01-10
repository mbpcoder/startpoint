@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div id="TicketCategoriesGridview"></div>
        </div>
    </div>
    <script type="text/javascript">
        var pasoonDate = new PasoonDate();
        var ticketCategoryGridview = new Gridview($('div#TicketCategoriesGridview'), {
            dataSource: '{{URL::to("admin/ticket-categories/grid")}}',
            emptyMessage: 'No Data',
            styleClass: 'table table-striped',
            paginatorPosition: 'bottom',
            paginatorVisibility: true,
            autoIncrement: true,
            autoIncrementCaption: '#',
            id: 'TicketCategoriesGridview',
            export: false,
            direction: 'rtl',
            captionShow: true,
            captionText: 'لیست دسته ها',
            extendData: {
                "_token": "{{csrf_token()}}",
            }
        });
        ticketCategoryGridview.addColumn({
            'name': 'id',
            'caption': '',
            'type': ['hidden'],
            'typeData': undefined,
            'visible': false,
            'sort': true,
            'filter': false,
        });
        ticketCategoryGridview.addColumn({
            'name': 'name',
            'caption': 'نام',
            'type': ['string'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
        });
        ticketCategoryGridview.addColumn({
            'name': 'order',
            'caption': 'ترتیب',
            'type': ['number'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
        });
        ticketCategoryGridview.addColumn({
            'name': 'published',
            'caption': 'منتشر شده',
            'type': ['enum'],
            'typeData': [{name: 'خیر', value: 0}, {name: 'بله', value: 1}],
            'visible': true,
            'sort': true,
            'filter': true,
            'beforeRender': function (data) {
                return (data == 0) ? 'خیر' : 'بله'
            },
        });
        ticketCategoryGridview.addColumn({
            'name': 'action',
            'caption': 'عملیات',
            'type': ['html'],
            'typeData': '<a href="/admin/ticket-categories/{id}/edit" class="btn btn-info btn-sm update-item">ویرایش</a> <a href="/admin/ticket-categories/{id}/destroy" class="btn btn-danger btn-sm remove-item">حذف</a>',
            'visible': true,
            'sort': false,
            'filter': false,
            'beforeRender': function () {
            },
            'afterRender': function () {
            },
            'beforeFilter': function () {
            },
            'afterFilter': function () {
            }
        });
        ticketCategoryGridview.setPerPage(15);
    </script>
@stop
