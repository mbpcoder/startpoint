<?php namespace Blog\Http\Controllers;

use Blog\Post;

class HomeController extends Controller
{
    public function index($category = null)
    {
        if (is_null($category)) {
            $posts = Post::wherePublished(true)->paginate(10);
            return view('index')->with('posts', $posts);
        }
        // get category posts

    }
}
