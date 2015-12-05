<?php namespace Blog\Http\Controllers;

use Blog\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('home')->with('posts', $posts);

    }
}
