@extends('layout')

@section('content')
    <div id="main" role="main" class="container">
        <div class="row">
            <a href="/"><h1 class="title">مهدی باقری</h1></a>

            <div class="col-md-3 image menu">
                <a href="/">
                    <img class="logo" src="/img/logo.png">
                </a>

                <h2>دسته بندی ها</h2>
                <ul>
                    @foreach(\Blog\Category::all() as $category)
                        <li>
                            <a href="#">{{$category->name}}</a>
                        </li>
                    @endforeach
                </ul>

                <!--<h2>Tags</h2>-->
                <!--<ol>-->
                <!--<li><a href="/tags/self-improvement.html">self-improvement (11)</a></li>-->
                <!--<li><a href="/tags/education.html">education (3)</a></li>-->
                <!--</ol>-->

                <!--<h2>By Year</h2>-->
                <!--<ol>-->
                <!--<li><a href="#">1394 (9)</a></li>-->
                <!--<li><a href="#">1394 (10)</a></li>-->
                <!--</ol>-->


            </div>
            <div class="col-md-7 articles">
                @foreach($posts as $post)
                    <article>
                        <h2><a href="">{{$post->title}}</a></h2>

                        <p><span class="date">{{$post->created_at}}</span> {{$post->user->name}}</p>

                        <div>{!! $post->body !!}</div>

                        <hr class="space-maker">
                    </article>
                @endforeach
            </div>
        </div>
    </div>
@endsection