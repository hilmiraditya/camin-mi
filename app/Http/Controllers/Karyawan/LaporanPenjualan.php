<?php

namespace App\Http\Controllers\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\KaryawanDefaultLayout;
use Illuminate\Support\Facades\Redirect;

use App\Penjualan;

class LaporanPenjualan extends Controller
{
    use KaryawanDefaultLayout;

    public function __construct()
    {
        date_default_timezone_set('Asia/Bangkok');
    }

    public function harian($id)
    {
    	$date= date("Y-m-d");
        $layout = $this->default();
        $penjualan =  Penjualan::where('cabang_id',$id)->whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->whereDay('created_at', '=', date('d'))->get();
        return view('karyawan.penjualan')->with('layout', $layout)->with('penjualan', $penjualan)->with('date', $date);
    }

    public function bulanan($id)
    {
        $date = date("Y-m");
        $layout = $this->default();
        $penjualan =  Penjualan::where('cabang_id',$id)->whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->get();
        return view('karyawan.penjualan')->with('layout', $layout)->with('penjualan', $penjualan)->with('date', $date);
    }
}
