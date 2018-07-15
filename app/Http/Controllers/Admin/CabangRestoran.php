<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

use App\Traits\DefaultLayout;
use App\User;
use App\Cabang;

class CabangRestoran extends Controller
{
  use DefaultLayout;

  public function index()
  {
    $layout = $this->default();
    $cabang = Cabang::all();
    $hapuscabang = Cabang::all();
    $cekJumlahCabang = Cabang::all()->count();

   	return view('admin.cabang')
      ->with('layout', $layout)
      ->with('cabang', $cabang)
      ->with('hapuscabang', $hapuscabang)
      ->with('cekJumlahCabang', $cekJumlahCabang);
  }

  public function create(Request $request)
  {
    $validator  = $request->validate([
      'nama'      => 'required',
      'alamat'     => 'unique:cabang,alamat|required',
      'no'  => 'required'
    ]);
    $cabang = new Cabang;

    if($request->hasFile('gambar'))
    {
      $gambar = $request->file('gambar');
      $namafile = time().'.'.$gambar->getClientOriginalExtension();
      $folder = public_path('/fotocabang');
      $gambar->move($folder,$namafile);
      $cabang->gambar = $namafile;
    }

    $cabang->nama = $request->get('nama');
    $cabang->alamat = $request->get('alamat');
    $cabang->no = $request->get('no');
    $cabang->save();
    return redirect('Admin/Cabang');
  }

  public function update(Request $request)
  {
    $cabang = Cabang::find($request->get('id'));

    if($request->hasFile('gambar'))
    {
      $gambar = $request->file('gambar');
      $namafile = time().'.'.$gambar->getClientOriginalExtension();
      $folder = public_path('/fotocabang');
      $gambar->move($folder,$namafile);
      $cabang->gambar = $namafile;
    }

    $cabang->nama = $request->get('nama');
    $cabang->alamat = $request->get('alamat');
    $cabang->no = $request->get('no');
    $cabang->save();
    return redirect('Admin/Cabang');
  }

  public function delete($id)
  {
    $cabang = Cabang::find($id);
    $cabang->delete();


    return redirect('Admin/Cabang');
  }
}
