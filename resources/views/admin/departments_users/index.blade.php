@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div id="PostsGridview"></div>
        </div>
    </div>
    <script type="text/javascript">
        var departmentGridview = new Gridview($('div#PostsGridview'), {
            dataSource: '{{URL::to("admin/departments_users/grid")}}',
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
            captionText: 'چارت سازمانی',
            extendData: {
                "_token": "{{csrf_token()}}",
            }
        });
        departmentGridview.addColumn({
            'name': 'id',
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
        departmentGridview.addColumn({
            'name': 'user_name',
            'caption': 'کابر',
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
        departmentGridview.addColumn({
            'name': 'department_name',
            'caption': 'بخش',
            'type': ['string'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
        });
        departmentGridview.addColumn({
            'name': 'action',
            'caption': 'عملیات',
            'type': ['html'],
            'typeData': '<a href="/admin/departments_users/{id}/edit" class="btn btn-info btn-sm update-item">ویرایش</a> <a href="/admin/departments_users/{id}/destroy" class="btn btn-danger btn-sm remove-item">حذف</a>',
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
        departmentGridview.setPerPage(15);
    </script>
@stop
