@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-header">
            <h2>{{$post->title}}</h2>
        </div>
        <div>{!! $post->body !!}</div>
    </div>
@endsection

