@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div id="CommentsGridview"></div>
        </div>
    </div>
    <script type="text/javascript">
        var pasoonDate = new PasoonDate();
        var commentGridview = new Gridview($('div#CommentsGridview'), {
            dataSource: '{{URL::to("admin/comments/grid")}}',
            emptyMessage: 'No Data',
            styleClass: 'table table-striped',
            paginatorPosition: 'bottom',
            paginatorVisibility: true,
            autoIncrement: true,
            autoIncrementCaption: '#',
            id: 'CommentsGridview',
            export: false,
            direction: 'rtl',
            captionShow: true,
            captionText: 'لیست نظرات',
            extendData: {
                "_token": "{{csrf_token()}}",
            }
        });
        commentGridview.addColumn({
            'name': 'comments.id',
            'caption': '',
            'type': ['hidden'],
            'typeData': undefined,
            'visible': false,
            'sort': true,
            'filter': false,
        });
        commentGridview.addColumn({
            'name': 'comments.name',
            'caption': 'نام نویسنده',
            'type': ['string'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
        });
        commentGridview.addColumn({
            'name': 'comments.email',
            'caption': 'ایمیل',
            'type': ['string'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
        });
        commentGridview.addColumn({
            'name': 'comments.website',
            'caption': 'سایت',
            'type': ['string'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
        });
        commentGridview.addColumn({
            'name': 'comments.body',
            'caption': 'متن',
            'type': ['string'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
        });
        commentGridview.addColumn({
            'name': 'comments.post_id',
            'caption': 'شناسه مطلب',
            'type': ['string'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
        });
        commentGridview.addColumn({
            'name': 'comments.approved',
            'caption': 'فعال',
            'type': ['enum'],
            'typeData': [0, 1],
            'visible': true,
            'sort': true,
            'filter': true,
            'beforeRender': function (approved) {
                return (approved) ? "فعال" : "غیر فعال";
            },
        });
        commentGridview.addColumn({
            'name': 'comments.created_at',
            'caption': 'تاریخ انتشار',
            'type': ['date'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
            'beforeRender': function (date) {
                pasoonDate.setTimestamp(date);
                return pasoonDate.jalali().get().format("%Year%/%Month%/%Day%");
            },
        });
        commentGridview.addColumn({
            'name': 'action',
            'caption': 'عملیات',
            'type': ['html'],
            'typeData': '<a href="/admin/comments/approved/{comments.id}" class="btn btn-info btn-sm status-item">عدم نمایش</a>',
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
        commentGridview.setPerPage(15);
    </script>
@stop
