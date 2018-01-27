<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

# Front-end
Route::get('/', 'BlogController@index');
Route::get('/{post}', 'BlogController@show');
Route::post('{post}/comment','CommentController@store')->name('addcomment');

# Back-end
Route::get('/posts', 'PostController@index')->middleware('auth');
Route::get('posts/create','PostController@create')->middleware('auth');
Route::get('/posts/{post}/edit', 'PostController@edit')->middleware('auth');
Route::get('/posts/{post}', 'PostController@show');
Route::post('posts/{post}/edit','PostController@update');
Route::post('posts/create','PostController@store');
Route::delete('/posts/{id}', 'PostController@destroy')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
