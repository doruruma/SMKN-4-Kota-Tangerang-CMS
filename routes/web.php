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

// Post view
Route::get('admin/posts', 'PostController@get');
Route::view('admin/post/new', 'posts/CreatePost');
Route::get('admin/post/{id}', 'PostController@update');
Route::get('admin/post/edit');

// Post API
Route::post('admin/post', 'PostController@save');
Route::put('admin/post/{id}', 'PostController@put');
Route::get('admin/post/delete/{id}', 'PostController@delete');
