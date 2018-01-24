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

Route::get('blog', 'PostController@index');
Route::get('blog/{post}', 'PostController@show');
Route::post('/blog/{post}/comment','CommentController@store')->name('addcomment');
Route::post('post/create','PostController@store');
Route::get('post/create','PostController@create')->middleware('auth');
Route::post('upload', 'ImageUploadController@upload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
