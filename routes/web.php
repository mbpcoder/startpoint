<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\PostsController;

Auth::routes();

// web
Route::get('posts/show/{id}', [PostsController::class, 'show']);

Route::get('/{category?}', [HomeController::class, 'index'])->where('category', '^(?!admin).*$');
