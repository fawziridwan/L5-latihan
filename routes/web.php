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

// Route::get('/', function () {return view('welcome');});

// Route::get('/', function () {return view('show');});

Route::get('/', function () {return view('profile');});

Route::resource('/articles', 'ArticlesController');
 
Route::resource('/comments', 'CommentsController');

Route::resource('admin/posts', 'Admin\\PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
