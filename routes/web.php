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

// Route::get('/kalkulator', 'KalkulatorController@index')->name('kalkulator');
// Route::post('/proses', 'KalkulatorController@proses')->name('proses');
// <li><a href="{{ route('pengguna.create') }}" class="btn btn-success">Add</a></li> ( jangan lupa taruh link ini untuk menjalankan aplikasi kalkulator )

Route::get('/pengguna', 'PenggunaController@index')->name('pengguna.index');
Route::get('/pengguna/create', 'PenggunaController@create')->name('pengguna.create');
Route::post('/pengguna/create', 'PenggunaController@store')->name('pengguna.store');
Route::get('/pengguna/edit/{id}', 'PenggunaController@edit')->name('pengguna.edit'); // {id} adalah parameter variable $id yang berada di controller
Route::post('/pengguna/edit/{id}', 'PenggunaController@update')->name('pengguna.update'); // {id} adalah parameter variable $id yang berada di controller
Route::get('/pengguna/delete/{id}', 'PenggunaController@destroy')->name('pengguna.destroy');
