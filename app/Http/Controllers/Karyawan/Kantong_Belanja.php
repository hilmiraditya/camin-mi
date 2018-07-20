<?php

namespace App\Http\Controllers\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Traits\KaryawanDefaultLayout;
use App\KantongBelanja;

class Kantong_Belanja extends Controller
{
    use KaryawanDefaultLayout;

    public function index()
    {
        $layout = $this->default();
    	return view('karyawan.invoice')->with('layout', $layout);
    }

    public function tambah(Request $request)
    {
        $layout = $this->default();
        $validator  = $request->validate([
            'jumlah'      => 'required|numeric',
        ]);
    	$cek = KantongBelanja::where('users_id', $layout['user']->id)->where('katalog_id', $request->get('katalog_id'))->first();
    	if ($cek == NULL)
    	{
    		$kantongbelanja = new KantongBelanja;
    		$kantongbelanja->jumlah = $request->get('jumlah');
    		$kantongbelanja->katalog_id = $request->get('katalog_id');
    		$kantongbelanja->users_id = $request->get('users_id');
    		$kantongbelanja->total_harga = $request->get('jumlah')*$request->get('harga');
    		$kantongbelanja->save();
    	}
    	else
    	{
    	   $kantongbelanja = KantongBelanja::where('users_id', $layout['user']->id)->where('katalog_id', $request->get('katalog_id'))->first();
           $kantongbelanja->jumlah = $kantongbelanja->jumlah + $request->get('jumlah');
           $kantongbelanja->total_harga = $kantongbelanja->jumlah*$request->get('harga');
           $kantongbelanja->save();
    	}
    	return Redirect::back()->with('message', 'Item Berhasil Ditambah');
    }

    public function hapus_semua()
    {
        $layout = $this->default();
        KantongBelanja::where('users_id', $layout['user']->id)->truncate();
        return Redirect::back()->with('message', 'Transaksi Berhasil Dibatalkan');        
    }

    public function hapus($id)
    {
        $kantongbelanja = KantongBelanja::find($id);
        $kantongbelanja->delete();
        return Redirect::back()->with('message', 'Item Berhasil Dihapus');
    }
}
