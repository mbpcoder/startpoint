<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\NewsletterController;

Auth::routes();

Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('search', [SearchController::class, 'index'])->name('search');
Route::post('newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::get('posts/{id}', [PostsController::class, 'show'])->name('posts.show');
Route::post('posts/{id}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/{category?}', [HomeController::class, 'index'])->where('category', '^(?!admin).*$')->name('home');
