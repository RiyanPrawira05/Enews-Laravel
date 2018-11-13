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

Auth::routes(); // ini fungsi biasa ya? klo di native mah mysqli_html_special_chars betul? 

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


// Route::get('/berita/{id}', 'BeritaController@show')->name('berita.show');


Route::get('/category', 'CategoryController@index')->name('category.index');
Route::get('/category/create', 'CategoryController@create')->name('category.create');
Route::post('/category/create', 'CategoryController@store')->name('category.store');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::post('/category/edit/{id}', 'CategoryController@update')->name('category.update');
Route::get('/categori/delete/{id}', 'CategoryController@destroy')->name('category.destroy');

Route::get('/berita', 'BeritaController@index')->name('berita.index');
Route::get('/berita/create', 'BeritaController@create')->name('berita.create');
Route::post('/berita/create', 'BeritaController@store')->name('berita.store');
Route::get('/berita/edit/{id}', 'BeritaController@edit')->name('berita.edit');
Route::post('/berita/edit/{id}', 'BeritaController@update')->name('berita.update');
Route::get('/berita/delete/{id}', 'BeritaController@destroy')->name('berita.destroy');


