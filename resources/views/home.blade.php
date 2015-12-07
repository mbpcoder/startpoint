@extends('layout')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8">

                {{--<h1 class="page-header">--}}
                {{--Page Heading--}}
                {{--<small>Secondary Text</small>--}}
                {{--</h1>--}}

                @foreach($posts as $post)
                    <div class="post">
                        <h3>
                            <a href='{{url("posts/show/$post->id")}}'>{{$post->title}}</a>
                        </h3>

                        <p class="lead">
                            <a href="index.php">{{$post->user->name}}</a>
                        </p>

                        <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at}}</p>
                        <hr>
                        {{--<img class="img-responsive" src="http://placehold.it/900x300" alt="">--}}
                        {{--<hr>--}}
                        <div>
                            {!! $post->body !!}
                        </div>
                        <hr>
                        @foreach($post->comments as $comment)
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
                                    <textarea class="form-control custom-control" rows="2"></textarea>
                                    <span class="input-group-addon btn btn-primary">ارسال</span>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                            <!-- Pager -->
                    <ul class="pager">
                        <li class="next">
                            <a href="#">جدید تر &larr;</a>
                        </li>
                        <li class="previous">
                            <a href="#">&rarr; قدیمی تر</a>
                        </li>
                    </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>جستجو در وبلاگ</h4>

                    <form action="" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>


                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>دسته بندی مطالب</h4>

                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                @foreach(\Blog\Category::all() as $category)
                                    <li>
                                        <a href="#">{{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!--  Side Widget Well
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p></p>
                </div>
                -->

            </div>

        </div>

    </div>

@endsection
