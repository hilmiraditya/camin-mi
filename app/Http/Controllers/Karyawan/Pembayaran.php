<?php

namespace App\Http\Controllers\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\KaryawanDefaultLayout;

use App\Penjualan;
use App\KantongBelanja;

class Pembayaran extends Controller
{
    use KaryawanDefaultLayout;

    public function index(Request $request)
    {
        $validator  = $request->validate([
            'nama'      => 'required',
            'bayar'     => 'numeric|required'
        ]);
    	$layout = $this->default();
    	$nama = $request->get('nama');
    	$id_transaksi = mt_rand(100,1000);
    	foreach($layout['kantongbelanja'] as $input_belanja)
    	{
    		$penjualan = new Penjualan;
    		$penjualan->jumlah = $input_belanja->jumlah;
    		$penjualan->keterangan =  $nama;
    		$penjualan->katalog_id = $input_belanja->katalog_id;
    		$penjualan->kategori_id = $input_belanja->katalog->kategori_id;
    		$penjualan->cabang_id = $layout['user']->cabang_id;
    		$penjualan->users_id = $layout['user']->id;
    		$penjualan->id_transaksi = $id_transaksi;
    		$penjualan->save();
    	}
    	KantongBelanja::where('users_id', $layout['user']->id)->truncate();
    	$kembali = $request->get('bayar') - $request->get('total');
    	return view('karyawan.sukses')->with('kembali', $kembali)->with('nama', $nama)->with('id_transaksi', $id_transaksi)->with('layout', $layout);
    }
}
