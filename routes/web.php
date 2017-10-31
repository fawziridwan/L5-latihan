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

// Route::get('/', function () {
// 	return view('profile');
// })->name('profile');
 
Route::get('/', function () {
	return view('profile');
});

Route::resource('admin/posts', 'Admin\\PostsController');

Route::resource('/articles', 'ArticlesController');
Route::resource('/comments', 'CommentsController');
Route::post('/postcomment', 'CommentsController@store');
Route::get('img/{id}','ArticlesController@showImage')->name('showImage');
Route::put('change/{id}','ArticlesController@updateImage')->name('updateImage');
Route::delete('delete/{id}','ArticlesController@deleteImage')->name('deleteImage');

Route::get('signup', 'UsersController@signup')->name('signup');
Route::post('signup', 'UsersController@signup_store')->name('signup.store');

Route::get('login', 'SessionsController@login')->name('login');
Route::post('login', 'SessionsController@login_store')->name('login.store');
Route::get('logout', 'SessionsController@logout')->name('logout');

Route::get('forgot-password', 'ReminderController@create')->name('reminders.create');
Route::post('forgot-password', 'ReminderController@store')->name('reminders.store');

//this routes for handle changes password
Route::get('reset-password/{id}/{token}', 'ReminderController@edit')->name('reminders.edit');
Route::post('reset-password/{id}/{token}','ReminderController@update')->name('reminders.update');

Route::get('/home', 'HomeController@index');

// excel report routes
Route::get('importExport', 'ReportController@importExport');
Route::get('downloadExcel/{type}','ReportController@downloadExcel');
Route::post('importExcel','ReportController@importExcel');