@extends('admin.layout')
@section('content')

    <div class="container">
        <form class="form form-horizontal" method="post" action="/admin/categories/{{$category->id}}">
            <input type="hidden" value="{!! csrf_token() !!}" name="_token">
            <input type="hidden" value="put" name="_method">
            <fieldset>
                <legend>
                    <h3>ویرایش دشته {{$category->name}}</h3>
                </legend>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group required {{$errors->has('name') ? 'has-error' : ''}}">
                            <label for="name" class="control-label col-md-3">نام</label>

                            <div class="col-md-7">
                                <input type="text" value="{{old('name', $category->name)}}" class="form-control" id="name" name="name">
                                @if($errors->has('name'))
                                    <span class="help-block">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alias" class="control-label col-md-3">نام مستعار</label>

                            <div class="col-md-7">
                                <input type="text" value="{{old('alias', $category->alias)}}" class="form-control" id="alias" name="alias">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="published" class="control-label col-md-3">منتشر شده</label>

                            <div class="col-md-7">
                                @if(old('published', $category->published))
                                    <input checked type="checkbox" class="checkbox-inline" id="published" name="published">
                                @else
                                    <input type="checkbox" class="checkbox-inline" id="published" name="published">
                                @endif

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order" class="control-label col-md-3">ترتیب</label>

                            <div class="col-md-7">
                                <input type="number" value="{{old('order')}}" class="form-control" id="order" name="order">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3 text-left">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> ذخیره
                                </button>
                                <a href="/admin/categories" class="btn btn-default">
                                    <i class="fa fa-times-circle-o"></i> انصراف
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
