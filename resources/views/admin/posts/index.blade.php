@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div id="PostsGridview"></div>
        </div>
    </div>
    <script type="text/javascript">
        var pasoonDate = new PasoonDate();
        var postGridview = new Gridview($('div#PostsGridview'), {
            dataSource: '{{URL::to("admin/posts/grid")}}',
            emptyMessage: 'No Data',
            styleClass: 'table table-striped',
            paginatorPosition: 'bottom',
            paginatorVisibility: true,
            autoIncrement: true,
            autoIncrementCaption: '#',
            id: 'PostsGridview',
            export: false,
            direction: 'rtl',
            captionShow: true,
            captionText: 'لیست مطالب',
            extendData: {
                "_token": "{{csrf_token()}}",
            }
        });
        postGridview.addColumn({
            'name': 'posts.id',
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
        postGridview.addColumn({
            'name': 'posts.title',
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
        postGridview.addColumn({
            'name': 'users.name',
            'caption': 'کاربر',
            'type': ['string'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
        });
        postGridview.addColumn({
            'name': 'posts.published',
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
        postGridview.addColumn({
            'name': 'posts.created_at',
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
        postGridview.addColumn({
            'name': 'posts.updated_at',
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
        postGridview.addColumn({
            'name': 'action',
            'caption': 'عملیات',
            'type': ['html'],
            'typeData': '<a title="نمایش" href="/admin/posts/{posts.id}/show" class="btn btn-default btn-sm view-item">مشاهده</a> <a href="/admin/posts/{posts.id}/edit" class="btn btn-info btn-sm update-item">ویرایش</a> <a href="/admin/posts/{posts.id}/destroy" class="btn btn-danger btn-sm remove-item">حذف</a>',
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
        postGridview.setPerPage(15);
    </script>
@stop
