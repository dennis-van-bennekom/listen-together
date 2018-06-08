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

Route::view('/', 'authenticate')->name('home');
Route::get('/authenticate', 'LastfmController@authenticate')->name('authenticate');
Route::get('/listen', 'LastfmController@listen')->name('listen');
Route::get('/current', 'LastfmController@current')->name('current');
