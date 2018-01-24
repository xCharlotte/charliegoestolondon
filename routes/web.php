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
Route::get('/', 'BlogController@index');
Route::get('/post', 'PostController@index');
Route::get('{post}', 'PostController@show');
Route::post('{post}/comment','CommentController@store')->name('addcomment');
Route::post('post/create','PostController@store');
Route::get('post/create','PostController@create')->middleware('auth');

Route::delete('/post/{id}', 'PostController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
