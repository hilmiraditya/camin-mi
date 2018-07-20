<?php

namespace App\Http\Controllers\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Traits\KaryawanDefaultLayout;
use App\Kategori;
use App\Katalog;

class MenuRestoran extends Controller
{
    //
    use KaryawanDefaultLayout;

    public function index($id)
    {
    	$layout = $this->default();
        $kategori = Kategori::where('id', $id)->first();
    	$katalog = Katalog::where('kategori_id', $id)->get();
    	return view('karyawan.menu')->with('layout', $layout)->with('kategori', $kategori)->with('katalog', $katalog);
    }
}
