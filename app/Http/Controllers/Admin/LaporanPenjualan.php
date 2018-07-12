<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\DefaultLayout;

use App\Penjualan;
use App\Katalog;

class LaporanPenjualan extends Controller
{
    use DefaultLayout;

    public function harian()
    {
    	date_default_timezone_set('Asia/Bangkok');
    	$date = date("Y-m-d");
        $layout = $this->default();
        $penjualan =  Penjualan::where('created_at', $date)->get();
        $cekPenjualan = Penjualan::all()->count();
        return view('admin.penjualan')
        	->with('layout', $layout)
        	->with('penjualan', $penjualan)
        	->with('date', $date)
        	->with('cekPenjualan', $cekPenjualan);
    }

    public function bulanan()
    {
    	date_default_timezone_set('Asia/Bangkok');
    	$date = date("Y-m");
        $layout = $this->default();
        $penjualan =  Penjualan::where('created_at', $date)->get();
        $cekPenjualan = Penjualan::all()->count();
        return view('admin.penjualan')
        	->with('layout', $layout)
        	->with('penjualan', $penjualan)
        	->with('date', $date)
        	->with('cekPenjualan', $cekPenjualan);
    }

    public function delete($date, $id)
    {
    	$penjualan = Penjualan::find($id);
    	$penjualan->delete();

    	return redirect('Admin/LaporanPenjualan'.'/'.$date);
    }
}
