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

	Route::get('/kalkulator', 'KalkulatorController@index')->name('kalkulator');
	Route::post('/proses', 'KalkulatorController@proses')->name('proses');

Route::get('/pengguna', 'PenggunaController@index')->name('pengguna.index');
Route::get('/pengguna/create', 'PenggunaController@create')->name('pengguna.create');
Route::get('/pengguna/edit', 'PenggunaController@edit')->name('pengguna.edit');
