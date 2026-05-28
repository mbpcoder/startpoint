<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;

Auth::routes();

Route::get('posts/{id}', [PostsController::class, 'show'])->name('posts.show');
Route::post('posts/{id}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/{category?}', [HomeController::class, 'index'])->where('category', '^(?!admin).*$')->name('home');
