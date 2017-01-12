@extends('admin.layout')
@section('content')
    <link href="{{asset('/css/vendors/summernote.css')}}" rel="stylesheet">
    <script src="{{asset('/js/vendors/summernote.min.js')}}"></script>
    <div class="container">
        <form class="form form-horizontal" method="post" action="/admin/posts/{{$post->id}}">
            <input type="hidden" value="{!! csrf_token() !!}" name="_token">
            <input type="hidden" value="put" name="_method">
            <fieldset>
                <legend>
                    <h3>ویرایش مطلب {{$post->title}}</h3>
                </legend>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group required {{$errors->has('title') ? 'has-error' : ''}}">
                            <label for="title" class="control-label col-md-3">عنوان</label>

                            <div class="col-md-7">
                                <input type="text" value="{{old('title',$post->title)}}" class="form-control" id="title" name="title">
                                @if($errors->has('title'))
                                    <span class="help-block">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('alias') ? 'has-error' : ''}}">
                            <label for="alias" class="control-label col-md-3">نام مستعار</label>

                            <div class="col-md-7">
                                <input type="text" value="{{old('alias',$post->alias)}}" class="form-control" id="alias"
                                       name="alias">
                                @if($errors->has('alias'))
                                    <span class="help-block">{{$errors->first('alias')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="published" class="control-label col-md-3">منتشر شده</label>

                            <div class="col-md-7">
                                @if(old('published',$post->published))
                                    <input checked type="checkbox" class="checkbox-inline" id="published" name="published">
                                @else
                                    <input type="checkbox" class="checkbox-inline" id="published" name="published">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categories" class="control-label col-md-3 required-input">دسته بندی ها</label>

                            <div class="col-md-7">
                                <select multiple class="form-control" id="categories" name="categories[]">
                                    @foreach(\StartPoint\Category::all() as $category)
                                        @if(in_array($category->id, $categories_post))
                                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group required {{$errors->has('body') ? 'has-error' : ''}}">
                    <label class="control-label" for="Body">محتوی</label>
                    <textarea type="text" class="form-control" id="Body" name="body" rows="20">{{old('body', $post->body)}}</textarea>
                    @if($errors->has('body'))
                        <span class="help-block">{{$errors->first('body')}}</span>
                    @endif
                </div>


                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3 text-left">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> ذخیره
                                </button>
                                <a href="/admin/posts" class="btn btn-default">
                                    <i class="fa fa-times-circle-o"></i> انصراف
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <script type="text/javascript">
        $('#Body').summernote({
            height: 300
        });
    </script>
@endsection
