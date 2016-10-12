@extends('admin.layout')
@section('content')
    <div class="container">
        <form class="form form-horizontal" method="post" action="/admin/departments_users/store">
            <input type="hidden" value="{!! csrf_token() !!}" name="_token">

            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">

                        <div class="col-lg-8">
                            @if($errors->any())
                                <h4><span style="color:red">* </span> {{$errors->first()}}</h4>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_id" class="control-label col-lg-4 required-input">کابر:</label>

                        <div class="col-lg-8">
                            <select class="form-control" id="user" name="user_id">
                                <option value="0">انتخاب یک کاربر</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="department_id" class="control-label col-lg-4 required-input">بخش کاری:</label>

                        <div class="col-lg-8">
                            <select class="form-control" id="department" name="department_id">
                                <option value="0">انتخاب بخش</option>
                                <option value="-1">همه ی بخش ها</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ذخیره</button>
            <a href="/admin/departments_users/" class="btn btn-default">انصراف</a>
        </form>
    </div>
@endsection
