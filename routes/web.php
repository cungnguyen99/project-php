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

//FRONT END
Route::get('/','App\Http\Controllers\HomeController@index');

Route::get('/home', 'App\Http\Controllers\HomeController@index');

//BACKEND
Route::get('/admin','App\Http\Controllers\AdminController@index');

Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');

//logout
Route::get('/logout','App\Http\Controllers\AdminController@logout');

//login
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');
