<?php

namespace App\Http\Controllers\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Traits\KaryawanDefaultLayout;

use App\Notifications\StatusPesanan;
use Illuminate\Notifications\Notifiable;

use Carbon\Carbon;

use App\Penjualan;
use App\User;
use App\KantongBelanja;

class Pembayaran extends Controller
{
    use KaryawanDefaultLayout, Notifiable;

    public function index(Request $request)
    {
        $layout = $this->default();
        //$validator  = $request->validate([
        //    'nama'      => 'required',
        //    'bayar'     => 'numeric|required'
        //]);
    	$id_transaksi = mt_rand(100,1000);
    	foreach($layout['kantongbelanja'] as $input_belanja)
    	{
    		$penjualan = new Penjualan;
    		$penjualan->jumlah = $input_belanja->jumlah;
    		$penjualan->katalog_id = $input_belanja->katalog_id;
    		$penjualan->kategori_id = $input_belanja->Katalog->kategori_id;
    		$penjualan->users_id = $layout['user']->id;
    		$penjualan->id_transaksi = $id_transaksi;
    		$penjualan->save();
    	}

    	KantongBelanja::where('users_id', $layout['user']->id)->delete();

        //masukin data ke notifikasi
        $NotifikasiTransaksi = array($id_transaksi,Auth::user()->name, Carbon::now()->toDateTimeString());

        //kirim notifikasi
        Auth::user()->notify(new StatusPesanan($NotifikasiTransaksi));
        $AdminUser = User::where('isAdmin', 1)->first();
        $AdminUser->notify(new StatusPesanan($NotifikasiTransaksi));

    	return view('karyawan.sukses')->with('id_transaksi', $id_transaksi)->with('layout', $layout);
    }
}
