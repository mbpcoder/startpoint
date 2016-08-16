@extends('admin.layout')
@section('content')
    <link href="{{asset('/css/vendors/summernote.css')}}" rel="stylesheet">
    <script src="{{asset('/js/vendors/summernote.min.js')}}"></script>
    @if ( $errors->count() > 0 )
        <div class="alert alert-danger " role="alert">
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
    <div class="container">
        <form class="form form-horizontal" method="post" action="/admin/posts">
            <input type="hidden" value="{!! csrf_token() !!}" name="_token">

            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="title" class="control-label col-lg-4 required-input">عنوان مطلب</label>

                        <div class="col-lg-8">
                            <input type="text" value="{{old('title')}}" class="form-control" id="title" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alias" class="control-label col-lg-4 required-input">نام مستعار</label>

                        <div class="col-lg-8">
                            <input type="text" value="{{old('alias')}}" class="form-control" id="alias" name="alias">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="published" class="control-label col-lg-4 required-input">منتشر شده</label>

                        <div class="col-lg-8">
                            <input type="checkbox" class="form-control" id="published" name="published">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categories" class="control-label col-lg-4 required-input">دسته بندی ها</label>

                        <div class="col-lg-8">
                            <select multiple class="form-control" id="categories" name="categories[]">
                                @foreach(\StartPoint\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="Body">محتوی</label>
                <textarea type="text" class="form-control" id="Body" name="body" rows="20"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">ذخیره مطلب</button>
            <a href="/admin/posts/" class="btn btn-default">انصراف</a>
        </form>
    </div>
    <script type="text/javascript">
        $('#Body').summernote({
            height: 300
        });
    </script>
@endsection
