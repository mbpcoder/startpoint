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
                    <img class="img-circle" src="/img/logo.png" alt="logo">
                </div>

                <div class="section">
                    <h4>دسته بندی مطالب</h4>

                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="">
                                @foreach(\StartPoint\Category::wherePublished(true)->get() as $category)
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

                        <style>
                            .commentForm {
                                display: none;
                            }
                        </style>
                        <div class="comments">
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
                                <button class="btn showCommentFormButton">
                                    <h4>نظر بدهید</h4>
                                </button>
                                <form class="form-horizontal commentForm">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">نام</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">ایمیل</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">متن</label>
                                        <div class="col-sm-10">
                                            <textarea name="body" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <input type="checkbox" class="form-control">
                                        </div>
                                        <label style="text-align: right" class="col-sm-10 control-label">نظر بصورت خصوصی برای نویسنده وبلاگ ارسال شود</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-default">Sign in</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
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
                <script>
                    $('.showCommentFormButton').click(function () {
                     var $btn = $(this);
                        var $commentForm = $btn.closest('.comments').find('.commentForm');
                        $commentForm.slideToggle();
                    });
                </script>

            </div>
        </div>
    </div>
@endsection
