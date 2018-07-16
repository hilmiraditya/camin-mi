<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\DefaultLayout;
use Illuminate\Support\Facades\Redirect;

use App\Penjualan;
use App\Katalog;
use App\Cabang;
use App\Kategori;

use PDF;

class LaporanPenjualan extends Controller
{
    use DefaultLayout;

    public function __construct()
    {
        date_default_timezone_set('Asia/Bangkok');
    }

    public function harian()
    {
    	$date= date("Y-m-d");
        $layout = $this->default();
        $penjualan =  Penjualan::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->whereDay('created_at', '=', date('d'))->get();
        return view('admin.penjualan')->with('layout', $layout)->with('penjualan', $penjualan)->with('date', $date);
    }

    public function bulanan()
    {
        $date = date("y-m");
        $layout = $this->default();
        $penjualan =  Penjualan::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->get();
        return view('admin.penjualan')->with('layout', $layout)->with('penjualan', $penjualan)->with('date', $date);
    }

    public function laporan_bulanan()
    {
        $date = date("y-m");
        $penjualan = Penjualan::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->get();
        $cabang = Cabang::all();
        $kategori = Kategori::all();

        $pdf = PDF::loadview('admin.email', ['penjualan' => $penjualan, 'cabang' => $cabang, 'kategori' => $kategori, 'date' => $date]);

        return $pdf->download('Laporan'.$date.'.pdf');
    }

    public function laporan_harian()
    {
        $date= date("Y-m-d");
        $penjualan = Penjualan::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->whereDay('created_at', '=', date('d'))->get();
        $cabang = Cabang::all();
        $kategori = Kategori::all();

        $pdf = PDF::loadview('admin.email', ['penjualan' => $penjualan, 'cabang' => $cabang, 'kategori' => $kategori, 'date' => $date]);

        return $pdf->download('Laporan'.$date.'.pdf');
    }

    public function delete($id)
    {
    	$penjualan = Penjualan::find($id);
    	$penjualan->delete();
    	return Redirect::back();
    }
}
