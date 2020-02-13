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

Route::get('/', function () {
    return view('dashboard.index');
})->middleware('auth');     // default auth middleware

// Post Route
Route::get('/posts', function() {
    return view('post.index');
})->middleware('auth');
Route::get('/posts/add', function() {
    return view('post.create');
})->middleware('auth');
// ---

// Auth Route
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::post('/login', 'AuthController@postLogin');
// ---
