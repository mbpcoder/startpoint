@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>
                        جزئیات مطلب :
                        {{$post->title}}
                    </h2>
                </div>
                <div>{!! $post->body !!}</div>
            </div>
        </div>
    </div>
@endsection

