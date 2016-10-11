@extends('admin.layout')
@section('content')
    <form action="{{ $formAction }}" method="post">
        <input type="hidden" name="_token"  value="{{ csrf_token() }}">
        <label for="name">نام: </label>
        <input type="text" name="name">
        <br>
        <label for="parent_id">والد: </label>
        <select name="parent_id">
            <option value="0">بدون والد</option>
            @foreach ($departments as $department )
                <option value="{{ $department->id }}">{{  $department->name }}</option>
            @endforeach
        </select>
        <br>
        <input type="submit" value="ثبت">
    </form>
@endsection