<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($categorySlug = null)
    {
        $query = Post::query()->whereNotNull('published_at')->orderBy('created_at', 'desc');
        if (!is_null($categorySlug) && !empty($categorySlug) && $categorySlug !== '/') {
            $category = Category::query()->where('slug', $categorySlug)->first();
            if (is_null($category)) {
                abort(404);
            }
            $query->where('category_id', $category->id);
        }
        $posts = $query->with('author')->paginate(10);

        $categories = Category::query()->where('disabled', false)->get();

        return view('index')->with([
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
}
