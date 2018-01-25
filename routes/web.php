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

// Route::resource('post', 'PostController');
# Front-end
Route::get('/', 'BlogController@index');
Route::post('{post}/comment','CommentController@store')->name('addcomment');

# Back-end
Route::get('/posts', 'PostController@index')->middleware('auth');
Route::get('post/create','PostController@create')->middleware('auth');
Route::get('/post/{post}/edit', 'PostController@edit')->middleware('auth');
Route::get('/post/{post}', 'PostController@show');
Route::post('post/{post}/edit','PostController@update');
Route::post('post/create','PostController@store');
Route::delete('/post/{id}', 'PostController@destroy')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
