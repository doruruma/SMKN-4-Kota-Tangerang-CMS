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

// Auth Route
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@postLogin');

Route::group(['middleware' => 'auth'], function () {

    Route::view('/admin', 'dashboard.index')->name('dashboard');
    Route::get('/logout', 'AuthController@logout')->name('logout');

    // Teacher Route
    Route::get('/admin/teacher','TeacherController@teacher')->name('teacher.index');
    Route::get('/admin/teacher/new','TeacherController@new')->name('teacher.create');
    Route::post('/admin/teacher/store','TeacherController@store')->name('teacher.store');
    Route::get('/admin/teacher/edit/{id}','TeacherController@put')->name('teacher.edit');
    Route::put('/admin/teacher/{id}','TeacherController@update')->name('teacher.update');
    Route::delete('/admin/teacher/{id}','TeacherController@delete')->name('teacher.delete');


    // Profile Route
    Route::get('/admin/profile', 'AdminController@index')->name('admin.index');
    Route::get('/admin/profile/password', 'AdminController@editPassword')->name('admin.password');
    Route::get('/admin/profile/edit', 'AdminController@edit')->name('admin.edit');
    Route::post('/admin/profile/postPassword', 'AdminController@postPassword')->name('admin.postPassword');
    Route::put('/admin/profile/update', 'AdminController@update')->name('admin.update');

    // Major Route
    Route::resource('major', 'MajorController');

    // Post view
    Route::get('/admin/posts', 'PostController@get')->name('post.index');
    Route::get('/admin/post/new', 'PostController@new')->name('post.create');
    Route::get('/admin/post/{id}', 'PostController@edit')->name('post.edit');

    // Post API
    Route::post('/admin/post', 'PostController@save')->name('post.store');
    Route::post('/admin/post/{id}', 'PostController@put')->name('post.update');
    Route::delete('/admin/post/{id}', 'PostController@delete')->name('post.delete');

    // Page view
    Route::get('/admin/pages', 'PageController@get')->name('page.index');
    Route::get('/admin/page/new', 'PageController@new')->name('page.create');
    Route::get('/admin/page/{id}', 'PageController@edit')->name('page.edit');

    // Page API
    Route::post('/admin/page', 'PageController@save')->name('page.store');
    Route::put('/admin/page/{id}', 'PageController@put')->name('page.update');
    Route::delete('/admin/page/{id}', 'PageController@delete')->name('page.delete');

    // Gallery
    Route::get('/admin/gallery', 'GalleryController@index')->name('gallery.index');
    Route::post('/admin/gallery', 'GalleryController@storeImage')->name('gallery.store');
    Route::delete('/admin/gallery', 'GalleryController@deleteFile')->name('gallery.delete');

    // Official Route
    Route::get('/admin/official','OfficialController@index')->name('official.index');
    Route::get('/admin/official/new','OfficialController@position_data')->name('official.create');
    Route::post('/admin/official/store','OfficialController@store')->name('official.store');
    Route::get('/admin/official/edit/{id}','OfficialController@put')->name('official.edit');
    Route::put('/admin/official/{id}','OfficialController@update')->name('official.update');
    Route::delete('/admin/official/{id}', 'OfficialController@delete')->name('official.delete');
});

// client side

//home
Route::get('/', 'LandingPage@index');
Route::get('/news','LandingPage@news');
Route::get('/articles', 'LandingPage@articles');
Route::get('/prestasi', 'LandingPage@prestasi');
Route::get('/events', 'LandingPage@event');

//Post Page by category
Route::get('/post_category/post_slug', 'LandingPage@post');
Route::get('/{slug_page}', 'LandingPage@page');



