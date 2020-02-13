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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');     // default auth middleware

// Auth Route
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::post('/login', 'AuthController@postLogin');
// ---

Route::get('/CreateMajor', 'MajorController@create');
Route::resource('major', 'MajorController');
