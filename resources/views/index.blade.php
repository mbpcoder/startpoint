@extends('layouts.main')

@section('content')
    <style>
        .logo{
            text-align: center;
        }
        .sidebar .section{
            padding: 19px;
            margin-bottom: 20px;
        }
    </style>
    <div class="container">
        <div class="row">

            <div class="sidebar col-md-4">
                <div class="section logo">
                    <img class="img-circle" src="img/logo.png" alt="logo">
                </div>

                <div class="section">
                    <h4>دسته بندی مطالب</h4>

                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="">
                                @foreach(\Blog\Category::wherePublished(true)->get() as $category)
                                    <li>
                                        <a href="{{$category->alias}}">{{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>

            <div class="col-md-8">

                @foreach($posts as $post)
                    <div class="post">
                        <h3>
                            <a href='{{url("posts/show/$post->id")}}'>{{$post->title}}</a>
                        </h3>

                        <p class="">
                            <a href="index.php">{{$post->user->name}}</a> <span class="glyphicon glyphicon-time"></span> {{$post->created_at}}
                        </p>

                        <hr>
                        {{--<img class="img-responsive" src="http://placehold.it/900x300" alt="">--}}
                        {{--<hr>--}}
                        <div>
                            {!! $post->body !!}
                        </div>
                        @foreach($post->comments as $comment)
                            <hr>
                            <div class="comment media">
                                <div class="media-body">
                                    <h4 class="media-heading">{{$comment->name}}
                                        <small>{{$comment->created_at}}</small>
                                    </h4>
                                    {{$comment->body}}
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        <div>
                            <h4>نظر بدهید</h4>

                            <form role="form">
                                <div class="input-group">
                                    <textarea name="body" class="form-control custom-control" rows="2"></textarea>
                                    <span class="input-group-addon btn btn-primary">ارسال</span>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                <div class="text-center">
                    {!! $posts->render() !!}
                </div>
                    <style>
                        .pagination{
                            direction: ltr;;
                        }
                        .pagination li span,.pagination li a{
                            float: left;
                        }
                    </style>

            </div>

        </div>
    </div>
@endsection
