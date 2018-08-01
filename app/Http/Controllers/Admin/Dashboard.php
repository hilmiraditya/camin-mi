<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use App\Traits\DefaultLayout;
use App\User;
use App\Penjualan;
use App\Katalog;
use App\Kategori;

class Dashboard extends Controller
{
    use DefaultLayout;

    public function index()
    {
        $layout = $this->default();
        $data = [
            'restoran' => Kategori::all()->count(),
            'akun'   => User::where('isAdmin',0)->count(),
            'penjualan' => Penjualan::all()->sum('jumlah'),
            'menu' => Katalog::all()->count()
        ];
        return view('admin.index')->with('data', $data)->with('layout', $layout);
    }
}
