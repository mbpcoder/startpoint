@extends('admin.layout')
@section('scripts')
    @parent
    <script src="/js/vendors/gridview.min.js"></script>
    @endsection

@section('content')

    {{--<div class="container-fluid full-height">
        <div class="row full-height">
            <div class="col-lg-10 scroll full-height">
                <div class="gridviewContainer" id="UserGridview"></div>
            </div>
        </div>
    </div>--}}

    <div class="container">
        <div class="row">

            @if ( Session::get('message') != NULL )
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ Session::get('message') }}</strong>
                </div>
            @endif

            @if ( $errors->count() > 0 )
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>خطاهای زیر رخ داده است:</p>
                    <ul>
                        @foreach( $errors->all() as $message )
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div id="UserGridview"></div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <script type="text/javascript">
        var user_gridview = new Gridview($('div#UserGridview'), {
            dataSource: '{{URL::to("admin/users/grid")}}',
            emptyMessage: 'No Data',
            styleClass: 'table table-striped',
            paginatorPosition: 'bottom',
            paginatorVisibility: true,
            autoIncrement: true,
            autoIncrementCaption: '#',
            id: 'UserGridview',
            direction: 'rtl',
            captionShow: true,
            captionText: 'لیست کاربران',
            extendData: {
                "_token": "{{csrf_token()}}",
            }
        });
        user_gridview.addColumn({
            'name': 'users.id',
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
        user_gridview.addColumn({
            'name': 'users.name',
            'caption': 'نام و نام خانوادگی',
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
        user_gridview.addColumn({
            'name': 'users.email',
            'caption': 'پست الکترونیک',
            'type': ['link'],
            'typeData': 'mailto:{email}',
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
        user_gridview.addColumn({
            'name': 'users.mobile',
            'caption': 'تلفن همراه',
            'type': ['string'],
            'typeData': '',
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
        user_gridview.addColumn({
            'name': 'users.description',
            'caption': 'توضیحات',
            'type': ['string'],
            'typeData': [],
            'visible': true,
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
        user_gridview.addColumn({
            'name': 'users.created_at',
            'caption': 'تاریخ عضویت',
            'type': ['int'],
            'typeData': [],
            'visible': true,
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
        user_gridview.addColumn({
            'name': 'users.updated_at',
            'caption': 'تاریخ آخرین تغییر',
            'type': ['int'],
            'typeData': [],
            'visible': true,
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
        user_gridview.addColumn({
            'name': 'action',
            'caption': 'عملیات',
            'type': ['html'],
            'typeData': '<a href="admin/users/{users.id}/edit" class="btn btn-info btn-sm update-item">ویرایش</a> <a href="admin/users/{users.id}/destroy" class="delete btn btn-danger btn-sm remove-item">حذف</a>',
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
        user_gridview.setPerPage(10);
    </script>
@stop
