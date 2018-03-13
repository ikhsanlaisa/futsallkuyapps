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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'indexController@index');

//------data lapangan-----
Route::get('/data_lapangan', 'TbLapanganController@data_lapangan');

Route::get('/tambah_lapangan', 'TbLapanganController@tambah_lapangan');

Route::post('/post_lapangan', 'TbLapanganController@store');

Route::get('detaildatalapangan', 'TbLapanganController@show');

