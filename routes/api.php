<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\AuthController@login');


// Rotas para usuários
// Route::post('/users', 'App\Http\Controllers\UserController@create');
Route::get('/users/{id}', 'App\Http\Controllers\UserController@get');
Route::put('/users/{id}', 'App\Http\Controllers\UserController@update');
Route::delete('/users/{id}', 'App\Http\Controllers\UserController@delete');

// // Rotas para tópicos
Route::post('/topics', 'App\Http\Controllers\TopicController@create');
Route::get('/topics/{id}', 'App\Http\Controllers\TopicController@get');
Route::put('/topics/{id}', 'App\Http\Controllers\TopicController@update');
Route::delete('/topics/{id}', 'App\Http\Controllers\TopicController@delete');

// // Rotas para comentários
Route::post('/comments', 'App\Http\Controllers\CommentController@create');
Route::get('/comments/{id}', 'App\Http\Controllers\CommentController@get');
Route::get('/comments/{id}', 'App\Http\Controllers\CommentController@list');
Route::put('/comments/{id}', 'App\Http\Controllers\CommentController@update');
Route::delete('/comments/{id}', 'App\Http\Controllers\CommentController@delete');

// // Rotas para respostas (replies)
Route::post('/replies', 'App\Http\Controllers\ReplyController@create');
Route::get('/replies/{id}', 'App\Http\Controllers\ReplyController@get');
Route::put('/replies/{id}', 'App\Http\Controllers\ReplyController@update');
Route::delete('/replies/{id}', 'App\Http\Controllers\ReplyController@delete');

// // Rotas para curtidas (likes)
Route::post('/likes', 'App\Http\Controllers\LikeController@create');
Route::get('/likes/{id}', 'App\Http\Controllers\LikeController@get');
Route::put('/likes/{id}', 'App\Http\Controllers\LikeController@update');
Route::delete('/likes/{id}', 'App\Http\Controllers\LikeController@delete');

// // Rotas para descurtidas (dislikes)
Route::post('/dislikes', 'App\Http\Controllers\DislikeController@create');
Route::get('/dislikes/{id}', 'App\Http\Controllers\DislikeController@get');
Route::put('/dislikes/{id}', 'App\Http\Controllers\DislikeController@update');
Route::delete('/dislikes/{id}', 'App\Http\Controllers\DislikeController@delete');

 Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
     return $request->user();
 });