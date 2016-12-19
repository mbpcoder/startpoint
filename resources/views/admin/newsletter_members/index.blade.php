@extends('admin.layout')

@section('styles')
    @parent
    <link rel="stylesheet" href="">

@endsection

@section('scripts')
    @parent
    <script src="/js/vendors/gridview.min.js"></script>
    <script src="/js/vendors/pasoon-date.min.js"></script>

@endsection

@section('content')

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
            <div id="NewsLetterMembersGridview"></div>
        </div>
    </div>
    <script type="text/javascript">
        var newsletter_gridview = new Gridview($('div#NewsLetterMembersGridview'), {
            dataSource: '{{URL::to("admin/newsletter_members/grid")}}',
            emptyMessage: 'No Data',
            styleClass: 'table table-striped',
            paginatorPosition: 'bottom',
            paginatorVisibility: true,
            autoIncrement: true,
            autoIncrementCaption: '#',
            id: 'NewsLetterMembersGridview',
            export: false,
            direction: 'rtl',
            captionShow: true,
            captionText: 'اعضاء خبرنامه',
            extendData: {
                "_token": "{{csrf_token()}}",
            }
        });
        newsletter_gridview.addColumn({
            'name': 'newsletter_members.id',
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
        newsletter_gridview.addColumn({
            'name': 'newsletter_members.email',
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
        newsletter_gridview.addColumn({
            'name': 'newsletter_members.code',
            'caption': 'کد',
            'type': ['hidden'],
            'typeData': 'undefined',
            'visible': false,
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
        newsletter_gridview.addColumn({
            'name': 'newsletter_members.active',
            'caption': 'وضعیت',
            'type': ['enum'],
            'typeData': ['فعال', 'غیر فعال'],
            'visible': true,
            'sort': true,
            'filter': true,
            'beforeRender': function (data) {
                return (data == 1) ? 'فعال' : 'غیر فعال';
            },
            'afterRender': function () {
            },
            'beforeFilter': function (data) {
                return (data == 'yes') ? 1 : 0;
            },
            'afterFilter': function () {
            }
        });
        newsletter_gridview.addColumn({
            'name': 'action',
            'caption': 'عملیات',
            'type': ['html'],
            'typeData': '<a title="فعال کردن خبرنامه" href="/admin/newsletter_members/active/{newsletter_members.code}" class="btn btn-success btn-sm active-item">فعال کردن</a> <a title="غیر فعال کردن خبرنامه" href="/admin/newsletter_members/deactivate/{newsletter_members.code}" class="btn btn-danger btn-sm inactive-item">غیر فعال کردن</a>',
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
        newsletter_gridview.setPerPage(10);
    </script>
@endsection
