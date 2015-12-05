<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// admin
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin_auth'), function () {
    Route::get('/', 'HomeController@index');
    Route::group(array('prefix' => 'newsletters'), function () {
        Route::get('weekly', 'NewslettersController@weekly');
        Route::post('weekly', 'NewslettersController@sendWeekly');
        Route::post('weeklyTestEmail', 'NewslettersController@weeklyTestEmail');

        Route::get('/', 'NewslettersController@index');
        Route::post('/', 'NewslettersController@store');
        Route::any('grid', 'NewslettersController@grid');
        Route::post('sendTestEmail', 'NewslettersController@sendTestEmail');
        Route::get('create', 'NewslettersController@create');
    });
    Route::group(array('prefix' => 'posts'), function () {
        Route::get('/', 'PostsController@index');
        Route::post('/', 'PostsController@store');
        Route::post('grid', 'PostsController@grid');
        Route::get('{id}/edit', 'PostsController@edit');
        Route::put('{id}', 'PostsController@update');
        Route::get('{id}/show', 'PostsController@show');
        Route::get('{id}/destroy', 'PostsController@destroy');
        Route::get('create', 'PostsController@create');
    });
    Route::group(array('prefix' => 'newsletter_members'), function () {
        Route::get('/', 'NewsletterMembersController@index');
        Route::post('/', 'NewsletterMembersController@store');
        Route::post('grid', 'NewsletterMembersController@grid');
        Route::get('create', 'NewsletterMembersController@create');

        Route::get('active/{code}', 'NewsletterMembersController@active');
        Route::get('deactivate/{code}', 'NewsletterMembersController@deactivate');
    });
    Route::group(array('prefix' => 'users'), function () {
        Route::get('/', 'UsersController@index');
        Route::post('grid', 'UsersController@grid');
    });
});

Route::get('/', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


Route::get('posts/show/{id}', 'PostsController@show');

Route::get('test', function () {
    dd(Blog\Post::all());
});




