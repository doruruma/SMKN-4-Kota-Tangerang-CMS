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

use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teacher','TeacherController@teacher');
Route::get('/teacher/add','TeacherController@add');
Route::post('/teacher/store','TeacherController@store');
Route::get('/teacher/edit/{id}','TeacherController@put');
Route::post('/teacher/update/{id}','TeacherController@update');
Route::get('/teacher/delete/{id}','TeacherController@delete');

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

Route::get('/CreateMajor', 'MajorController@create');
Route::resource('major', 'MajorController');

// Post view
Route::get('admin/posts', 'PostController@get');
Route::view('admin/post/new', 'posts/CreatePost');
Route::get('admin/post/{id}', 'PostController@update');
Route::get('admin/post/edit');

// Post API
Route::post('admin/post', 'PostController@save');
Route::put('admin/post/{id}', 'PostController@put');
Route::get('admin/post/delete/{id}', 'PostController@delete');
