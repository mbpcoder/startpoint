@extends('admin.layout')
@section('content')
    <link href="{{asset('/css/vendors/summernote.css')}}" rel="stylesheet">
    <script src="{{asset('/js/vendors/summernote.min.js')}}"></script>
    <div class="container">
        <form class="form form-horizontal" method="post" action="{{url('/admin/posts/'.$post->id)}}">
            <input type="hidden" value="put" name="_method">
            <input type="hidden" value="{!! csrf_token() !!}" name="_token">

            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="title" class="control-label col-lg-4 required-input">عنوان مطلب</label>

                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="title" name="title" autofocus value="{{old('title', $post->title)}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alias" class="control-label col-lg-4 required-input">نام مستعار</label>

                        <div class="col-lg-8">
                            <input type="text" value="{{old('alias', $post->alias)}}" class="form-control" id="alias" name="alias">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="published" class="control-label col-lg-4 required-input">منتشر شده</label>

                        <div class="col-lg-8">
                            @if($post->published)
                                <input checked type="checkbox" class="form-control" id="published">
                            @else
                                <input type="checkbox" class="form-control" id="published" name="published">
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categories" class="control-label col-lg-4 required-input">دسته بندی ها</label>

                        <div class="col-lg-8">
                            <select multiple class="form-control" id="categories" name="categories[]">
                                @foreach(\Blog\Category::all() as $category)
                                    @if(in_array($category->id, $categories_post))
                                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="Body">محتوی</label>
                <textarea type="text" class="form-control" id="Body" name="body" rows="20">{{old('body', $post->body)}}</textarea>
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
