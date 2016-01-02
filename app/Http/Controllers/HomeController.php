<?php namespace Blog\Http\Controllers;

use Blog\Category;
use Blog\Post;

class HomeController extends Controller
{
    public function index($category_alias = null)
    {
        if (is_null($category_alias)) {
            $posts = Post::wherePublished(true)->paginate(10);
            return view('index')->with('posts', $posts);
        }
        // get category posts
        $category = Category::whereAlias($category_alias)->get()->first();
        $posts = $category->posts()->wherePublished(true)->paginate(10);
        return view('index')->with('posts', $posts);
    }
}
