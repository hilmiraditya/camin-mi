<?php

namespace App\Http\Controllers\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Traits\KaryawanDefaultLayout;

class LaporanPenjualan extends Controller
{
    //
    use KaryawanDefaultLayout;

    public function index($id)
    {
    	echo "berhasil";
    }
}
