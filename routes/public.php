<?php

use App\Enums\Language;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;

$localePattern = implode('|', array_map(fn($l) => $l->value, Language::enabledLanguages()));

Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('search', [SearchController::class, 'index'])->name('search');
Route::post('newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('posts/{id}', [PostsController::class, 'show'])->name('posts.show');
Route::post('posts/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/{category?}', [HomeController::class, 'index'])
    ->where('category', "^(?!admin|{$localePattern})([^/]*)$")
    ->name('home');
