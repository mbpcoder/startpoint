<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->query('q', ''));

        $posts = Post::query()
            ->whereNotNull('published_at')
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('title', 'like', "%{$q}%")
                        ->orWhere('body', 'like', "%{$q}%");
                });
            })
            ->with('author', 'category')
            ->orderByDesc('published_at')
            ->paginate(10)
            ->appends(['q' => $q]);

        $categories = Category::where('disabled', false)->orderBy('order')->get();

        return view('search', compact('posts', 'categories', 'q'));
    }
}
