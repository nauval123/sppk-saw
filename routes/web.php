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
Route::group(['middleware' => ['auth','role:admin,superadmin,sukarelawan']], function(){
    Route::get('/dashboard',"pendudukController@index")->name('dashboard');
    Route::get('/update/{id}', 'pendudukController@updatepage')->name('update');
    Route::get('/hasilrekomendasi', 'sawController@hasilrekomendasi')->name('hasilrekomendasi');
    Route::get('/penerima','calonpenerimaController@index')->name("penerima");
    Route::get('/tambah-periode','calonpenerimaController@tambahperiode')->name("periode-tambah");
//    Route::post('/periode',"calonpenerimaController@periode")->name("periode");
    Route::get('/periode-id',"calonpenerimaController@periode")->name("periode-id");
    Route::get('/periode-id/{id}',"calonpenerimaController@periode2")->name("periode-ke");
    Route::get('/update-penerima/{periode}/{id}','calonpenerimaController@edit')->name('update-penerima');
    Route::post('/updating-penerima',"calonpenerimaController@update")->name("updating-penerima");
    Route::get('/tambahpenerima/{id}','calonpenerimaController@create')->name("tambah-penerima");
    Route::post('/tambah-data-penerima',"calonpenerimaController@add")->name("tambah-data-penerima");
    Route::group(['middleware' => ['auth','role:superadmin,admin']], function() {
        Route::get('/data', 'pendudukController@data')->name('data');
        Route::get('/create', 'pendudukController@createpage')->name('create');
        Route::post('/add', 'pendudukController@store')->name('add');
        Route::post('/edit', 'pendudukController@edit')->name('edit');
        Route::get('/delete/{id}', 'pendudukController@delete')->name('delete');
        Route::get('/setting', 'settingController@index')->name('setting');
        Route::post('/kriteria', 'settingController@kriteria')->name('kriteria');
        Route::get('/matrixnilai', 'sawController@index')->name('matrixnilai');
        Route::get('/matrixnormalisasi', 'sawController@normalisasi')->name('matrixnormalisasi');
        Route::get('/matrixpreferensi', 'sawController@preferensi')->name('matrixpreferensi');
        Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
            Route::get('/data-akun', 'akunController@index')->name('data-akun');
            Route::get('/create-akun', 'akunController@create')->name('create-akun');
            Route::post('/add-akun', 'akunController@store')->name('add-akun');
            Route::post('/edit-akun', 'akunController@edit')->name('edit-akun');
            Route::get('/delete-akun/{id}', 'akunController@delete')->name('delete-akun');
            Route::get('/update-akun/{id}', 'akunController@update')->name('update-akun');
        });
    });
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@dashboard');
Route::get('/welcome', 'HomeController@welcome')->name('welcome');


