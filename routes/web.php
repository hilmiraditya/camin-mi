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
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'Admin'], function () {
	Route::get('Dashboard', 'Admin\Dashboard@index');

	//karyawan	
	Route::get('AkunKaryawan', 'Admin\AkunKaryawan@index');
	Route::post('TambahAkun', 'Admin\AkunKaryawan@create');
	Route::get('HapusAkun/{id}', 'Admin\AkunKaryawan@delete');
	Route::get('UpdateAkun/{id}', 'Admin\AkunKaryawan@update');

	//cabang
	Route::get('Cabang', 'Admin\CabangRestoran@index');
	Route::post('TambahCabang', 'Admin\CabangRestoran@create');
	Route::get('HapusCabang/{id}', 'Admin\CabangRestoran@delete');
	Route::get('UpdateCabang/{id}', 'Admin\CabangRestoran@update');

	//kategori
	Route::post('TambahKategori', 'Admin\KategoriMenu@create');
	Route::get('HapusMenu/{id}', 'Admin\KategoriMenu@delete');

	//kategori-menu
	Route::get('Menu/{id}', 'Admin\MenuRestoran@index');
	Route::post('TambahMenu', 'Admin\MenuRestoran@create');
	Route::get('HapusMenu/{id}/{katalog_id}', 'Admin\MenuRestoran@delete');

	//laporanpenjualan
});

Route::group(['prefix' => 'Karyawan'], function () {
	Route::get('Dashboard', 'Karyawan\Dashboard@index');	
});