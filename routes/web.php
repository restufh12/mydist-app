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

Route::get('/', function () { return view('index'); });
Route::post('/cek_store', 'AuthController@cek_store');
Route::get('/login', 'AuthController@login');


// Route::get('/login_a', 'AuthController@test')->middleware('setdatabasestore');

