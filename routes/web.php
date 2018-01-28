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

Auth::routes();

# Back-end
Route::group(['middleware' => 'auth'], function()
{
  Route::get('/posts', 'PostController@index');
  Route::get('/posts/create','PostController@create');
  Route::get('/posts/{post}/edit', 'PostController@edit');
  Route::get('/posts/{post}', 'PostController@show');
  Route::post('posts/{post}/edit','PostController@update');
  Route::post('posts/create','PostController@store');
  Route::delete('/posts/{id}', 'PostController@destroy');
});

# Front-end
Route::get('/', 'BlogController@index');
Route::get('/{post}', 'BlogController@show');
Route::post('{post}/comment','CommentController@store')->name('addcomment');

Route::get('/home', 'HomeController@index')->name('home');
