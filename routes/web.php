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

Route::post('registerAkun', 'RegisterAkunController@index');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'Admin'], function () {
	//dashboard
	Route::get('Dashboard', 'Admin\Dashboard@index');

	//ubah akun admin
	Route::post('UbahAkunAdmin', 'Admin\CabangAdmin@index');

	//karyawan	
	Route::get('AkunKaryawan', 'Admin\AkunKaryawan@index');
	Route::post('TambahAkun', 'Admin\AkunKaryawan@create');
	Route::get('HapusAkun/{id}', 'Admin\AkunKaryawan@delete');
	Route::get('UpdateAkun/{id}', 'Admin\AkunKaryawan@update');

	//kategori
	Route::post('TambahKategori', 'Admin\KategoriMenu@create');
	Route::get('HapusMenu/{id}', 'Admin\KategoriMenu@delete');

	//kategori-menu
	Route::get('Menu/{id}', 'Admin\MenuRestoran@index');
	Route::post('TambahMenu', 'Admin\MenuRestoran@create');
	Route::get('HapusMenu/{id}/{katalog_id}', 'Admin\MenuRestoran@delete');
	Route::post('UbahMenu', 'Admin\MenuRestoran@update');

	//laporanpenjualan
	Route::get('Transaksi/Request/{id}', 'Admin\LaporanPenjualan@request');
	Route::get('Transaksi/SedangBerjalan', 'Admin\LaporanPenjualan@sedang_berjalan');
	Route::get('Transaksi/Dibatalkan', 'Admin\LaporanPenjualan@dibatalkan');
	Route::get('Transaksi/Selesai', 'Admin\LaporanPenjualan@selesai');

	//nyoba pdf
	Route::get('NyobaPDF', 'Admin\LaporanPenjualan@nyobapdf');

	//proses transaksi
	Route::get('Proses/{id}', 'Admin\LaporanPenjualan@proses');

	//batalkan transaksi
	Route::get('Batalkan/{id}', 'Admin\LaporanPenjualan@batal_admin');

	//download laporan pdf
	Route::get('LaporanHarian', 'Admin\LaporanPenjualan@laporan_harian');
	Route::get('LaporanBulanan', 'Admin\LaporanPenjualan@laporan_bulanan');

	//email
	Route::get('EmailHarian', 'Admin\LaporanPenjualan@email_harian');
	Route::get('EmailBulanan', 'Admin\LaporanPenjualan@email_bulanan');
});

Route::group(['prefix' => 'Pengguna'], function () {
	
	//ubah akun admin
	Route::post('UbahAkunPengguna', 'Karyawan\UbahAkunController@index');

	//dashboard
	Route::get('Dashboard', 'Karyawan\Dashboard@index');

	//kategori-menu
	Route::get('Menu/{id}', 'Karyawan\MenuRestoran@index');

	//lihat transaksi cabang
	Route::get('SedangBerjalan', 'Karyawan\LaporanPenjualan@sedang_berjalan');
	Route::get('Selesai', 'Karyawan\LaporanPenjualan@selesai');
	Route::get('Dibatalkan', 'Karyawan\LaporanPenjualan@batal');
	Route::get('Request', 'Karyawan\LaporanPenjualan@request');

	//kantong belanja
	Route::post('TambahItem', 'Karyawan\Kantong_Belanja@tambah');
	Route::post('TambahItemAjax', 'Karyawan\Kantong_Belanja@tambah_ajax');
	Route::get('KantongBelanja', 'Karyawan\Kantong_Belanja@index');
	Route::get('BatalkanBelanja', 'Karyawan\Kantong_Belanja@hapus_semua');
	Route::get('BatalkanTransaksi', 'Karyawan\Kantong_Belanja@batalkan_transaksi');
	Route::get('HapusItem/{id}', 'Karyawan\Kantong_Belanja@hapus');

	//transaksi sukses
	Route::get('ProsesTransaksi', 'Karyawan\Pembayaran@index');

	//batalkan transaksi
	Route::get('Batalkan/{id}', 'Karyawan\LaporanPenjualan@batal_pengguna');

});