<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Cabang;
use App\User;
use App\Penjualan;

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
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$Cabang = Cabang::all()->count();
		$Akun = User::where('isAdmin',0)->count();
		$Penjualan = Penjualan::all();
		$PorsiLaku = $Penjualan->count();
		$Untung= $Penjualan->katalog_id();
		return $Untung;
        //return view('admin.index');
    }
}
