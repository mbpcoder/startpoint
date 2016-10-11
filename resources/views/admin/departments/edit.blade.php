@extends('admin.layout')
@section('content')
    <form action="{{ $formAction }}" method="post">
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token"  value="{{ csrf_token() }}">
        <label for="name">نام: </label>
        <input type="text" name="name" value="{{ $department->name }}">
        <br>
        <label for="parent_id">والد: </label>
        <select name="parent_id">
            <option value="0">بدون والد</option>
            @foreach ($departments as $item )
                @if ($item->id == $department->parent_id)
                    <option value="{{ $item->id }}" selected>{{  $item  ->name }}</option>
                @else
                    <option value="{{ $item->id }}">{{  $item->name }}</option>
                @endif
            @endforeach
        </select>
        <br>
        <input type="submit" value="ثبت">
    </form>
@endsection
