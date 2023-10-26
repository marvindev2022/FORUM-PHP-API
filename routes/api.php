<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;

Broadcast::routes();

Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\UserController@login');

Route::middleware(['jwt.auth'])->group(function () {

    Route::get('/users/{id}/find', 'App\Http\Controllers\UserController@get');
    Route::put('/users/{id}/edit', 'App\Http\Controllers\UserController@update');
    Route::delete('/users/{id}/delete', 'App\Http\Controllers\UserController@delete');

    Route::post('/topics', 'App\Http\Controllers\TopicController@create');
    Route::get('/topics/all', 'App\Http\Controllers\TopicController@list');
    Route::get('/topics/{id}/find', 'App\Http\Controllers\TopicController@get');
    Route::put('/topics/{id}/edit', 'App\Http\Controllers\TopicController@update');
    Route::delete('/topics/{id}/delete', 'App\Http\Controllers\TopicController@delete');

    Route::post('/messages', 'App\Http\Controllers\MessageController@create');
    Route::get('/messages/all', 'App\Http\Controllers\MessageController@list');
    Route::get('/messages/{id}/find', 'App\Http\Controllers\MessageController@get');
    Route::put('/messages/{id}/edit', 'App\Http\Controllers\MessageController@update');
    Route::delete('/messages/{id}/delete', 'App\Http\Controllers\MessageController@delete');


    Route::post('/comments', 'App\Http\Controllers\CommentController@create');
    Route::get('/comment/{id}/find', 'App\Http\Controllers\CommentController@get');
    Route::get('/comments/all', 'App\Http\Controllers\CommentController@list');
    Route::put('/comments/{id}/edit', 'App\Http\Controllers\CommentController@update');
    Route::delete('/comments/{id}/delete', 'App\Http\Controllers\CommentController@delete');

    Route::post('/replies', 'App\Http\Controllers\ReplyController@create');
    Route::get('/replies/{id}/find', 'App\Http\Controllers\ReplyController@get');
    Route::put('/replies/{id}/edit', 'App\Http\Controllers\ReplyController@update');
    Route::delete('/replies/{id}/delete', 'App\Http\Controllers\ReplyController@delete');

    Route::post('/likes', 'App\Http\Controllers\LikeController@create');
    Route::get('/likes/{id}/find', 'App\Http\Controllers\LikeController@get');
    Route::put('/likes/{id}/edit', 'App\Http\Controllers\LikeController@update');
    Route::delete('/likes/{id}/delete', 'App\Http\Controllers\LikeController@delete');

    Route::post('/dislikes', 'App\Http\Controllers\DislikeController@create');
    Route::get('/dislikes/{id}/find', 'App\Http\Controllers\DislikeController@get');
    Route::put('/dislikes/{id}/edit', 'App\Http\Controllers\DislikeController@update');
    Route::delete('/dislikes/{id}/delete', 'App\Http\Controllers\DislikeController@delete');
});


Route::middleware('auth:api')->group(function () {
    Route::get('/protected', 'ProtectedController@index');
});
