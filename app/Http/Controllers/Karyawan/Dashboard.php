<?php

namespace App\Http\Controllers\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Users;
use App\Kategori;


class Dashboard extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Auth::user();
        $kategori = Kategori::all();
        return view('karyawan.index')
            ->with('kategori', $kategori)
            ->with('karyawan', $karyawan);
    }
}
