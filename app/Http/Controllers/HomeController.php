<?php

namespace StartPoint\Http\Controllers;

use StartPoint\Category;
use StartPoint\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param null $category_alias
     * @return \Illuminate\Http\Response
     */
    public function index($category_alias = null)
    {
        if (is_null($category_alias) || empty($category_alias) || $category_alias == '/') {
            $posts = Post::wherePublished(true)->orderBy('created_at', 'desc')->paginate(10);
        } else {
            // get category posts
            $category = Category::whereAlias($category_alias)->get()->first();
            $posts = $category->posts()->wherePublished(true)->paginate(10);
        }
        return view('index')->with('posts', $posts);
    }
}
