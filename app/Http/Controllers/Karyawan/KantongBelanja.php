<?php

namespace App\Http\Controllers\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\KaryawanDefaultLayout;

class KantongBelanja extends Controller
{
    use KaryawanDefaultLayout;

    public function index()
    {
        $layout = $this->default();
    	return view('karyawan.invoice')->with('layout', $layout);
    }

    public function sukses()
    {
        $layout = $this->default();
    	return view('karyawan.sukses')->with('layout', $layout);    	
    }
}
