<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => '\App\Http\Controllers'], function () {

    ## Auth
    Route::post('login', 'API\AuthController@login');
    Route::post('register', 'API\AuthController@register');
    Route::get('/logout', 'API\AuthController@logout');

    ## User
    Route::get('/user', 'API\UserController@index')->name('api:user:index');

    ## Post
    Route::get('/posts', 'API\PostController@index')->name('api:post:index');
    Route::post('/posts/create', 'API\PostController@store')->name('api:post:store');
    Route::get('/posts/{post}', 'API\PostController@show')->name('api:post:show');
    
    ## Comment
    Route::get('/posts/{post}/comments', 'API\CommentController@index')->name('api:comment:index');
    Route::post('/posts/{post}/comments/create', 'API\CommentController@store')->name('api:comment:store');
    Route::post('/posts/{post}/comments/reply', 'API\CommentController@replyComment')->name('api:comment:reply');
});


