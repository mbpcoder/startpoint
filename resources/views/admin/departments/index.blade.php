@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div id="PostsGridview"></div>
        </div>
    </div>
    <script type="text/javascript">
        var departmentGridview = new Gridview($('div#PostsGridview'), {
            dataSource: '{{URL::to("admin/departments/grid")}}',
            emptyMessage: 'No Data',
            styleClass: 'table table-striped',
            paginatorPosition: 'bottom top',
            paginatorVisibility: true,
            autoIncrement: true,
            autoIncrementCaption: '#',
            id: 'PostsGridview',
            export: false,
            direction: 'rtl',
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
            'name': 'name',
            'caption': 'عنوان',
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
            'name': 'parent_id',
            'caption': 'والد',
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
            'typeData': '<a href="/admin/departments/{id}/edit" class="btn btn-info btn-xs">ویرایش</a> <a href="/admin/departments/{id}/destroy" class="btn btn-danger btn-xs">حذف</a>',
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
