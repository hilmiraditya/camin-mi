<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Cabang;
use App\User;
use App\Penjualan;
use App\Katalog;

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
        $data = [
            'cabang'  => Cabang::all()->count(),
            'akun'   => User::where('isAdmin',0)->count(),
            'penjualan' => Penjualan::all()->count(),
            'menu' => Katalog::all()->count()
        ];
        $admin = User::where('isAdmin', 1)->first();
        return view('admin.index')->with('data', $data)->with('admin', $admin);
    }
}
