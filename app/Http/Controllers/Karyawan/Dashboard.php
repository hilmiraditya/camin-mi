<?php

namespace App\Http\Controllers\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Traits\KaryawanDefaultLayout;

class Dashboard extends Controller
{
    use KaryawanDefaultLayout;

    public function index()
    {
    	//dd(Auth::user()->notifications);
        $layout = $this->default();
        return view('karyawan.index')->with('layout', $layout);
    }
}
