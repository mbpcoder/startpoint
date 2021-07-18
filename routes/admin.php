<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\UsersController;

// admin
Route::namespace('Admin')->prefix('admin')->group(function () {

    // only Authenticate user
    Route::group(['middleware' => ['admin_auth:admin']], function () {

        Route::get('/', [HomeController::class, 'index']);
        // Posts
        Route::prefix('posts')->group(function () {
            Route::get('/', [PostsController::class, 'index']);
            Route::post('/', [PostsController::class, 'store']);
            Route::post('grid', [PostsController::class, 'grid']);
            Route::get('{id}/edit', [PostsController::class, 'edit']);
            Route::put('{id}', [PostsController::class, 'update']);
            Route::get('{id}/show', [PostsController::class, 'show']);
            Route::get('{id}/destroy', [PostsController::class, 'destroy']);
            Route::get('create', [PostsController::class, 'create']);
        });
        // Categories
        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoriesController::class, 'index']);
            Route::post('grid', [CategoriesController::class, 'grid']);
            Route::get('create', [CategoriesController::class, 'create']);
            Route::post('/', [CategoriesController::class, 'store']);
            Route::get('{id}/edit', [CategoriesController::class, 'edit']);
            Route::put('{id}', [CategoriesController::class, 'update']);
            Route::get('{id}/destroy', [CategoriesController::class, 'destroy']);
        });
        // Comments
        Route::prefix('comments')->group(function () {
            Route::get('/', [CommentsController::class, 'index']);
            Route::post('grid', [CommentsController::class, 'grid']);
            Route::get('approved/{id}', [CommentsController::class, 'toggleApproved']);
        });
        // Users
        Route::prefix('users')->group(function () {
            Route::get('/', [UsersController::class, 'index']);
            Route::post('grid', [UsersController::class, 'grid']);
        });

        Route::get('logout', function () {
            auth()->logout();
            return redirect('/');
        });
    });
});
