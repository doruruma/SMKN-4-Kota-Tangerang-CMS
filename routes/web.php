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
