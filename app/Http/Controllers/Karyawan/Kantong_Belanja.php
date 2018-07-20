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
        $validator  = $request->validate([
            'jumlah'      => 'required|numeric',
        ]);
    	$cek = KantongBelanja::where('katalog_id', $request->get('katalog_id'))->first();
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
    	   //do here
    	}
    	return Redirect::back()->with('message', 'Item Berhasil Ditambah');
    }
}
