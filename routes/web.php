<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\ImageController@index')->name('image.index')->middleware('auth');;
// Route::get('/newlogin', 'App\Http\Controllers\ImageController@login')->name('image.login');
// Route::get('/newregister', 'App\Http\Controllers\ImageController@register')->name('image.register');
Route::get('/upload', 'App\Http\Controllers\ImageController@upload')->name('image.upload')->middleware('auth');;
Route::post('/store', 'App\Http\Controllers\ImageController@store')->name('image.store')->middleware('auth');;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::match(['get', 'post'],'/admin/login','App\Http\Controllers\LoginController@login')->name('admin.login')->middleware('guest');
