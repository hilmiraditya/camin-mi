<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\DefaultLayout;


class LaporanPenjualan extends Controller
{
    use DefaultLayout;

    public function index()
    {
        $layout = $this->default();
        return view('admin.penjualan')->with('layout', $layout);;
    }
}
