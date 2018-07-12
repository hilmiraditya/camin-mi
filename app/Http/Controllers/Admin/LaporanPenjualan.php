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
        $layout = $this->default();
        $penjualan = Penjualan::all();
        $cekPenjualan = Penjualan::all()->count();
        return view('admin.penjualan')
        	->with('layout', $layout)
        	->with('penjualan', $penjualan)
        	->with('cekPenjualan', $cekPenjualan);
    }
}
