<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($id)
    {
        $post = Post::with(['author', 'category', 'comments' => function ($q) {
            $q->where('approved', true)->orderBy('created_at', 'asc');
        }])->findOrFail($id);

        $categories = Category::where('disabled', false)->orderBy('order')->get();

        return view('posts.show', compact('post', 'categories'));
    }
}
