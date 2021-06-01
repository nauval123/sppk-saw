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
    Route::get('/dashboard',"pendudukController@index")->name('dashboard');
    Route::get('/data', 'pendudukController@data')->name('data');
    Route::get('/create','pendudukController@createpage')->name('create');
    Route::post('/add', 'pendudukController@store')->name('add');
    Route::post('/edit', 'pendudukController@edit')->name('edit');
    Route::get('/delete/{id}', 'pendudukController@delete')->name('delete');
    Route::get('/update/{id}','pendudukController@updatepage')->name('update');
    Route::get('/setting','settingController@index')->name('setting');
    Route::post('/kriteria','settingController@kriteria')->name('kriteria');
    Route::get('/matrixnilai', 'sawController@index')->name('matrixnilai');
    Route::get('/matrixnormalisasi', 'sawController@normalisasi')->name('matrixnormalisasi');
    Route::get('/matrixpreferensi', 'sawController@preferensi')->name('matrixpreferensi');
    Route::get('/hasilrekomendasi', 'sawController@hasilrekomendasi')->name('hasilrekomendasi');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@dashboard');

