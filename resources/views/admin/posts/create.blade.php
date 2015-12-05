@extends('admin.layout')
@section('content')
    <link href="{{asset('/css/vendors/summernote.css')}}" rel="stylesheet">
    <script src="{{asset('/js/vendors/summernote.min.js')}}"></script>
    <div class="container">
        <form class="form" method="post" action="/admin/posts">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="Title">عنوان مطلب</label>
                <input type="text" class="form-control" id="Title" name="title" autofocus>
            </div>
            <div class="form-group">
                <label for="Body">محتوی</label>
                <textarea type="text" class="form-control" id="Body" name="body" rows="20"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">ذخیره مطلب</button>
            <a href="/admin/posts/" class="btn btn-default">لیست مطالب</a>
        </form>
    </div>
    <script type="text/javascript">
        $('#Body').summernote({
            height: 300
        });
    </script>
@endsection
