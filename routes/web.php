<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

// web
Route::get('posts/show/{id}', 'PostsController@show');
Route::get('/{category?}', 'HomeController@index')->where('category', '^(?!admin).*$');


// admin
Route::namespace('Admin')->prefix('admin')->group(function () {

    Auth::routes();

    // only Authenticate user
    Route::group(['middleware' => ['admin_auth:admin']], function () {

        Route::get('/', 'HomeController@index');
        // Posts
        Route::prefix('posts')->group(function () {
            Route::get('/', 'PostsController@index');
            Route::post('/', 'PostsController@store');
            Route::post('grid', 'PostsController@grid');
            Route::get('{id}/edit', 'PostsController@edit');
            Route::put('{id}', 'PostsController@update');
            Route::get('{id}/show', 'PostsController@show');
            Route::get('{id}/destroy', 'PostsController@destroy');
            Route::get('create', 'PostsController@create');
        });
        // Categories
        Route::prefix('categories')->group(function () {
            Route::get('/', 'CategoriesController@index');
            Route::post('grid', 'CategoriesController@grid');
            Route::get('create', 'CategoriesController@create');
            Route::post('/', 'CategoriesController@store');
            Route::get('{id}/edit', 'CategoriesController@edit');
            Route::put('{id}', 'CategoriesController@update');
            Route::get('{id}/destroy', 'CategoriesController@destroy');
        });
        // Comments
        Route::prefix('comments')->group(function () {
            Route::get('/', 'CommentsController@index');
            Route::post('grid', 'CommentsController@grid');
            Route::get('approved/{id}', 'CommentsController@toggleApproved');
        });
        // Users
        Route::prefix('users')->group(function () {
            Route::get('/', 'UsersController@index');
            Route::post('grid', 'UsersController@grid');
        });
        // Newsletters
        Route::prefix('newsletters')->group(function () {
            Route::get('/', 'NewslettersController@index');
            Route::post('/', 'NewslettersController@store');
            Route::any('grid', 'NewslettersController@grid');
            Route::post('sendTestEmail', 'NewslettersController@sendTestEmail');
            Route::get('create', 'NewslettersController@create');
        });
        // Newsletter Members
        Route::prefix('newsletter_members')->group(function () {
            Route::get('/', 'NewsletterMembersController@index');
            Route::post('/', 'NewsletterMembersController@store');
            Route::post('grid', 'NewsletterMembersController@grid');
            Route::get('create', 'NewsletterMembersController@create');

            Route::get('active/{code}', 'NewsletterMembersController@active');
            Route::get('deactivate/{code}', 'NewsletterMembersController@deactivate');
        });
        // Tickets
        Route::prefix('tickets')->group(function () {
            Route::get('/', 'TicketsController@index');
            Route::post('grid', 'TicketsController@grid');
            Route::get('create', 'TicketsController@create');
        });
        // Ticket Categories
        Route::prefix('ticket-categories')->group(function () {
            Route::get('/', 'TicketCategoriesController@index');
            Route::post('grid', 'TicketCategoriesController@grid');
            Route::get('create', 'TicketCategoriesController@create');
            Route::post('/', 'TicketCategoriesController@store');
            Route::get('{id}/edit', 'TicketCategoriesController@edit');
            Route::put('{id}', 'TicketCategoriesController@update');
            Route::get('{id}/destroy', 'TicketCategoriesController@destroy');
        });

        Route::get('logout', function () {
            auth()->logout();
            return redirect('/');
        });
    });
});