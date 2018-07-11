<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Traits\DefaultLayout;
use App\Kategori;
use App\Katalog;

class MenuRestoran extends Controller
{
    use DefaultLayout;

    public function index($id)
    {
        $layout = $this->default();
        $kategori = Kategori::where('id', $id)->first();
        $cekKatalog = Katalog::where('kategori_id', $id)->count();
    	$katalog = Katalog::where('kategori_id', $id)->get();
    	return view('admin.menu')
    		->with('katalog', $katalog)
    		->with('kategori', $kategori)
            ->with('cekKatalog', $cekKatalog)
    		->with('layout', $layout);
    }

    public function create(Request $Request)
    {
        $menu = new Katalog;

        if($Request->file('gambar') != NULL)
        {
            $gambar = $Request->file('gambar');
            $namafile = time().'.'.$berkas->getClientOriginalExtension();
            $folder = public_path('/fotomenu');
            $gambar->move($folder,$namafile);
            $menu->gambar = $namafile;
            dd($namafile);
        }

        $menu->nama = $Request->get('nama');
        $menu->harga = $Request->get('harga');
        $menu->diskon = $Request->get('diskon');
        $menu->keterangan = $Request->get('keterangan');
        $menu->kategori_id = $Request->get('kategori_id');

        $id = $Request->get('kategori_id');

        $menu->save();
        return redirect('Admin/Menu'.'/'.$id);
    }

    public function delete($id, $kategori_id)
    {
        $menu = Katalog::find($id);
        $menu->delete();
        return redirect('Admin/Menu'.'/'.$kategori_id);
    }
}
