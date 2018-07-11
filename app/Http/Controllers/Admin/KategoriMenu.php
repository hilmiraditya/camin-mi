<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;

class KategoriMenu extends Controller
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
    public function create(Request $Request)
    {
        $kategori = new Kategori;
        $kategori->nama = $Request->get('nama');
        $kategori->save();
        return redirect('Admin/Dashboard');
    }

    public function delete($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('Admin/Dashboard');
    }
}
