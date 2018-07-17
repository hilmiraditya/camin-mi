<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use App\Traits\DefaultLayout;
use App\Cabang;
use App\User;
use App\Penjualan;
use App\Katalog;

class Dashboard extends Controller
{
    use DefaultLayout;

    public function index()
    {
        $layout = $this->default();
        $data = [
            'cabang'  => Cabang::all()->count(),
            'akun'   => User::where('isAdmin',0)->count(),
            'penjualan' => Penjualan::all()->sum('jumlah'),
            'menu' => Katalog::all()->count()
        ];
        return view('admin.index')->with('data', $data)->with('layout', $layout);
    }
}
