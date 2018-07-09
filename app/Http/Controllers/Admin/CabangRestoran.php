<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\User;
use App\Cabang;

class CabangRestoran extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
    $this->middleware('auth');
  }

  public function index()
  {
    $cabang = Cabang::all();
    $hapuscabang = Cabang::all();
    $cekJumlahCabang = Cabang::all()->count();
    $admin = User::where('isAdmin', 1)->first();
   	return view('admin.cabang')
      ->with('admin', $admin)
      ->with('cabang', $cabang)
      ->with('hapuscabang', $hapuscabang)
      ->with('cekJumlahCabang', $cekJumlahCabang);
  }

  public function create(Request $request)
  {
    $cabang = new Cabang;
    $cabang->nama = $request->get('nama');
    $cabang->alamat = $request->get('alamat');
    $cabang->no = $request->get('no');
    $cabang->save();
    return redirect('Admin/Cabang');
  }

  public function update(Request $request, $id)
  {
    $cabang = Cabang::find($id);
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
