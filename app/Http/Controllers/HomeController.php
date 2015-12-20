<?php namespace Blog\Http\Controllers;

use Blog\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::wherePublished(true)->get();
        return view('index')->with('posts', $posts);
    }
}
