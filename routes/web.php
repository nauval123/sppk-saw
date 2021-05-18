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




Auth::routes();

//Route::get('/', function ())->name('home');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard',"pegawaiController@index")->name('dashboard');
    Route::get('/data', 'pegawaiController@data')->name('data');
    Route::get('/create','pegawaiController@createpage')->name('create');
    Route::post('/add', 'pegawaiController@store')->name('add');
    Route::post('/edit', 'pegawaiController@edit')->name('edit');
    Route::post('/delete', 'pegawaiController@delete')->name('delete');
    Route::get('/update/{id}','pegawaiController@updatepage')->name('update');
    Route::get('/setting','settingController@index')->name('setting');
    Route::post('/kriteria','settingController@kriteria')->name('kriteria');
    Route::get('/matrixnilai', 'sawController@index')->name('matrixnilai');
    Route::get('/matrixnormalisasi', 'sawController@normalisasi')->name('matrixnormalisasi');
    Route::get('/matrixpreferensi', 'sawController@preferensi')->name('matrixpreferensi');

});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@dashboard');

