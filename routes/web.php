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
	//dashboard
	Route::get('Dashboard', 'Admin\Dashboard@index');

	//karyawan	
	Route::get('AkunKaryawan', 'Admin\AkunKaryawan@index');
	Route::post('TambahAkun', 'Admin\AkunKaryawan@create');
	Route::get('HapusAkun/{id}', 'Admin\AkunKaryawan@delete');
	Route::get('UpdateAkun/{id}', 'Admin\AkunKaryawan@update');

	//cabang
	Route::get('Cabang', 'Admin\CabangRestoran@index');
	Route::post('TambahCabang', 'Admin\CabangRestoran@create');
	Route::get('TambahCabang', 'Admin\CabangRestoran@create');
	Route::get('HapusCabang/{id}', 'Admin\CabangRestoran@delete');
	Route::post('UpdateCabang', 'Admin\CabangRestoran@update');

	//kategori
	Route::post('TambahKategori', 'Admin\KategoriMenu@create');
	Route::get('HapusMenu/{id}', 'Admin\KategoriMenu@delete');

	//kategori-menu
	Route::get('Menu/{id}', 'Admin\MenuRestoran@index');
	Route::post('TambahMenu', 'Admin\MenuRestoran@create');
	Route::get('HapusMenu/{id}/{katalog_id}', 'Admin\MenuRestoran@delete');
	Route::post('UbahMenu', 'Admin\MenuRestoran@update');

	//laporanpenjualan
	Route::get('LaporanPenjualan/Harian', 'Admin\LaporanPenjualan@harian');
	Route::get('LaporanPenjualan/Bulanan', 'Admin\LaporanPenjualan@bulanan');
	Route::get('HapusLaporanPenjualan/{id}', 'Admin\LaporanPenjualan@delete');

	//nyoba pdf
	Route::get('NyobaPDF', 'Admin\LaporanPenjualan@nyobapdf');

	//download laporan pdf
	Route::get('LaporanHarian', 'Admin\LaporanPenjualan@laporan_harian');
	Route::get('LaporanBulanan', 'Admin\LaporanPenjualan@laporan_bulanan');

	//email
	Route::get('EmailHarian', 'Admin\LaporanPenjualan@email_harian');
	Route::get('EmailBulanan', 'Admin\LaporanPenjualan@email_bulanan');
});

Route::group(['prefix' => 'Karyawan'], function () {

	//dashboard
	Route::get('Dashboard', 'Karyawan\Dashboard@index');

	//kategori-menu
	Route::get('Menu/{id}', 'Karyawan\MenuRestoran@index');

	//lihat transaksi cabang
	Route::get('LaporanPenjualan/Harian/{id}', 'Karyawan\LaporanPenjualan@harian');
	Route::get('LaporanPenjualan/Bulanan/{id}', 'Karyawan\LaporanPenjualan@bulanan');

	//kantong belanja
	Route::post('TambahItem', 'Karyawan\Kantong_Belanja@tambah');
	Route::get('KantongBelanja', 'Karyawan\Kantong_Belanja@index');

	//transaksi sukses
	Route::post('Bayar', 'Karyawan\Pembayaran@index');
});