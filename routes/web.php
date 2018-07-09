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
    return redirect('/login');
    //return view('welcome');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'Admin'], function () {
	Route::get('Dashboard', 'Admin\Dashboard@index');	
	Route::get('AkunKaryawan', 'Admin\AkunKaryawan@index');
	Route::post('TambahAkun', 'Admin\AkunKaryawan@create');
	Route::get('HapusAkun/{id}', 'Admin\AkunKaryawan@delete');
	Route::get('UpdateAkun/{id}', 'Admin\AkunKaryawan@update');
	Route::get('Cabang', 'Admin\CabangRestoran@index');
	Route::post('TambahCabang', 'Admin\CabangRestoran@create');
	Route::get('HapusCabang/{id}', 'Admin\CabangRestoran@delete');
	Route::get('UpdateCabang/{id}', 'Admin\CabangRestoran@update');
	Route::get('Menu', 'Admin\Menu@index');
	Route::get('LaporanPenjualan', 'Admin\LaporanPenjualan@index');
});

Route::group(['prefix' => 'Karyawan'], function () {
	Route::get('Dashboard', 'Karyawan\Dashboard@index');	
});