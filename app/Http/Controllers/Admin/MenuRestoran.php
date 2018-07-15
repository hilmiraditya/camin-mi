<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
        $editKatalog = Katalog::where('kategori_id', $id)->get();

    	return view('admin.menu')
    		->with('katalog', $katalog)
    		->with('kategori', $kategori)
            ->with('editKatalog', $editKatalog)
            ->with('cekKatalog', $cekKatalog)
    		->with('layout', $layout);
    }

    public function create(Request $Request)
    {
        $validator  = $Request->validate([
            'nama'      => 'unique:katalog,nama|required',
            'harga'     => 'required',
            'keuntungan' => 'required'
        ]);

        $menu = new Katalog;

        if($Request->hasFile('gambar'))
        {
            $gambar = $Request->file('gambar');
            $namafile = time().'.'.$gambar->getClientOriginalExtension();
            $folder = public_path('/fotomenu');
            $gambar->move($folder,$namafile);
            $menu->gambar = $namafile;
        }

        $menu->nama = $Request->get('nama');
        $menu->keuntungan = $Request->get('keuntungan');
        $menu->harga = $Request->get('harga');
        $menu->keterangan = $Request->get('keterangan');
        $menu->kategori_id = $Request->get('kategori_id');

        $id = $Request->get('kategori_id');

        $menu->save();
        return redirect('Admin/Menu'.'/'.$id);
    }

    public function update(Request $Request)
    {
        $validator  = $Request->validate([
            'nama'      => 'required',
            'harga'     => 'required',
            'keuntungan' => 'required'
        ]);

        $id = $Request->get('id');
        
        $menu = Katalog::find($id);

        if($Request->hasFile('gambar'))
        {
            $gambar = $Request->file('gambar');
            $namafile = time().'.'.$gambar->getClientOriginalExtension();
            $folder = public_path('/fotomenu');
            $gambar->move($folder,$namafile);
            $menu->gambar = $namafile;
        }

        if($Request->get('diskon') >= 0)
        {
            $menu->diskon = $Request->get('diskon');
        }

        $menu->keuntungan = $Request->get('keuntungan');
        $menu->nama = $Request->get('nama');
        $menu->harga = $Request->get('harga');
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

        File::delete(public_path('fotomenu/'.$menu->gambar));
        return redirect('Admin/Menu'.'/'.$kategori_id);
    }
}
