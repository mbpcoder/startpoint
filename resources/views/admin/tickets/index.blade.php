@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div id="TicketsGridview"></div>
        </div>
    </div>
    <script type="text/javascript">
        var pasoonDate = new PasoonDate();
        var ticketGridview = new Gridview($('div#TicketsGridview'), {
            dataSource: '{{URL::to("admin/tickets/grid")}}',
            emptyMessage: 'No Data',
            styleClass: 'table table-striped',
            paginatorPosition: 'bottom',
            paginatorVisibility: true,
            autoIncrement: true,
            autoIncrementCaption: '#',
            id: 'TicketsGridview',
            export: false,
            direction: 'rtl',
            captionShow: true,
            captionText: 'لیست تیکت ها',
            extendData: {
                "_token": "{{csrf_token()}}",
            }
        });
        ticketGridview.addColumn({
            'name': 'Tickets.id',
            'caption': '',
            'type': ['hidden'],
            'typeData': undefined,
            'visible': false,
            'sort': true,
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
        ticketGridview.addColumn({
            'name': 'Tickets.title',
            'caption': 'عنوان مطلب',
            'type': ['string'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
            'beforeRender': function () {
            },
            'afterRender': function () {
            },
            'beforeFilter': function () {
            },
            'afterFilter': function () {
            }
        });
        ticketGridview.addColumn({
            'name': 'users.name',
            'caption': 'کاربر',
            'type': ['string'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
        });
        ticketGridview.addColumn({
            'name': 'Tickets.published',
            'caption': 'منتشر شده',
            'type': ['enum'],
            'typeData': [{name: 'خیر', value: 0}, {name: 'بله', value: 1}],
            'visible': true,
            'sort': true,
            'filter': true,
            'beforeRender': function (data) {
                console.log(data)
                return (data == 0) ? 'خیر' : 'بله';
            },
        });
        ticketGridview.addColumn({
            'name': 'Tickets.created_at',
            'caption': 'تاریخ انتشار',
            'type': ['date'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
            'beforeRender': function (date) {
                pasoonDate.setTimestamp(Number(date));
                return pasoonDate.jalali().get().format("%Year%/%Month%/%Day%");
            },
            'afterRender': function () {
            },
            'beforeFilter': function () {
            },
            'afterFilter': function () {
            }
        });
        ticketGridview.addColumn({
            'name': 'Tickets.updated_at',
            'caption': 'تاریخ تغییر',
            'type': ['date'],
            'typeData': 'undefined',
            'visible': true,
            'sort': true,
            'filter': true,
            'beforeRender': function (date) {
                pasoonDate.setTimestamp(Number(date));
                return pasoonDate.jalali().get().format("%Year%/%Month%/%Day%");
            },
            'afterRender': function () {
            },
            'beforeFilter': function () {
            },
            'afterFilter': function () {
            }
        });
        ticketGridview.addColumn({
            'name': 'action',
            'caption': 'عملیات',
            'type': ['html'],
            'typeData': '<a title="نمایش" href="/admin/Tickets/{Tickets.id}/show" class="btn btn-default btn-sm view-item">مشاهده</a> <a href="/admin/Tickets/{Tickets.id}/edit" class="btn btn-info btn-sm update-item">ویرایش</a> <a href="/admin/Tickets/{Tickets.id}/destroy" class="btn btn-danger btn-sm remove-item">حذف</a>',
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
        ticketGridview.setPerPage(15);
    </script>
@stop
