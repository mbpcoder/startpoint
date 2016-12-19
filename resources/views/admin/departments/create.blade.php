@extends('admin.layout')
@section('content')
    <div class="container">
        <form class="form form-horizontal"  action="{{ $formAction }}" method="post">
            <fieldset>
                <legend>
                    <h3>افزودن دپارتمان</h3>
                </legend>
                <input type="hidden" name="_token"  value="{{ csrf_token() }}">

                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-4 required-input">نام</label>

                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="parent" class="control-label col-lg-4">والد</label>

                            <div class="col-lg-8">
                                <select name="parent_id" id="parent" class="form-control col-lg-4">
                                    <option value="0">بدون والد</option>
                                    @foreach ($departments as $department )
                                        <option value="{{ $department->id }}">{{  $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i>
                            ذخیره
                        </button>
                        <a href="/admin/departments" class="btn btn-danger">
                            <i class="fa fa-times-circle-o"></i>
                            انصراف
                        </a>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
@endsection
