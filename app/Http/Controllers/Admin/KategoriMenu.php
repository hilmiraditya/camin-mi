<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

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
        $validator  = $Request->validate([
            'nama'     => 'unique:kategori,nama',
            'no_telepon' => 'numeric',
            'keterangan' => 'required',
            'alamat' => 'required'
        ]);
        $kategori = new Kategori;

        if($Request->hasFile('gambar'))
        {
            $gambar = $Request->file('gambar');
            $namafile = time().'.'.$gambar->getClientOriginalExtension();
            $folder = public_path('/fotorestoran');
            $gambar->move($folder,$namafile);
            $kategori->gambar = $namafile;
        }

        $kategori->nama = $Request->get('nama');
        $kategori->keterangan = $Request->get('keterangan');
        $kategori->no_telepon = $Request->get('no_telepon');
        $kategori->alamat = $Request->get('alamat');
        $kategori->save();
        return redirect('Admin/Dashboard')->with('message', 'Restoran Berhasil Ditambah');
    }

    public function delete($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('Admin/Dashboard');
    }
}
