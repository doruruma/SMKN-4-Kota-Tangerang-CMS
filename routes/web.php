<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteaServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Dashboard
Route::get('/', function () {
    return view('dashboard.index');
})->middleware('auth');

// Profile Route
Route::get('/admin/profile', 'AdminController@index')->name('admin.index');
Route::get('/admin/profile/password', 'AdminController@editPassword')->name('admin.password');
Route::get('/admin/profile/edit', 'AdminController@edit')->name('admin.edit');
Route::post('/admin/profile/postPassword', 'AdminController@postPassword')->name('admin.postPassword');
Route::post('/admin/profile/update', 'AdminController@update')->name('admin.update');

// Auth Route
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::post('/login', 'AuthController@postLogin');

// Major Route
Route::resource('major', 'MajorController');

// Post view
Route::get('/admin/posts', 'PostController@get');
Route::get('/admin/post/new', 'PostController@new');
Route::get('/admin/post/{id}', 'PostController@edit');

// Post API
Route::post('/admin/post', 'PostController@save');
Route::put('/admin/post/{id}', 'PostController@put');
Route::get('/admin/post/delete/{id}', 'PostController@delete');
