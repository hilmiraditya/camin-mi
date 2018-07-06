<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Cabang;
class AkunKaryawan extends Controller
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
        $karyawan = User::where('isAdmin', 0)->get();
        $cabang = Cabang::all();
        $cekJumlahCabang = Cabang::all()->count();

        return view('admin.karyawan')
                ->with('karyawan', $karyawan)
                ->with('cabang', $cabang)
                ->with('cekJumlahCabang', $cekJumlahCabang);
    }

    public function create(Request $request)
    {
        $karyawan = new User;
 
        if($request->hasfile('FotoProfil'))
        {
            $file = $request->file('FotoProfil');
            $namafile = time().$file->getClientOriginalName();
            $file->move(public_path().'/FotoProfil/', $namafile);
            $karyawan->foto = $namafile;
        }

        $karyawan->alamat = $request->get('alamat');

        $karyawan->tanggal_lahir = $request->get('tanggal_lahir');

        $karyawan->no = $request->get('no');

        $karyawan->name = $request->get('name');

        $karyawan->email = $request->get('email');

        $password = $request->get('password');
        $karyawan->password = bcrypt($password);

        $karyawan->no = $request->get('cabang_id');

        $karyawan->save();

        return redirect('Admin/AkunKaryawan');
    }

    public function update($id)
    {

    }


    public function delete($id)
    {
        $karyawan = User::find($id);
        $karyawan->delete();
        return redirect('Admin/AkunKaryawan');
    }
}
