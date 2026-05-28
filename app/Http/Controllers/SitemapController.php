<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = Post::whereNotNull('published_at')
            ->orderByDesc('updated_at')
            ->get(['id', 'updated_at']);

        $categories = Category::where('disabled', false)
            ->orderBy('order')
            ->get(['slug', 'updated_at']);

        $content = view('sitemap', compact('posts', 'categories'))->render();

        return response($content, 200, ['Content-Type' => 'application/xml']);
    }
}
