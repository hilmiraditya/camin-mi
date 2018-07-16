<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DefaultLayout;

use App\User;
use App\Cabang;

class AkunKaryawan extends Controller
{
    use DefaultLayout;

    public function index()
    {
        $layout = $this->default();
        $karyawan = User::where('isAdmin', 0)->get();
        $karyawanUpdate = User::where('isAdmin', 0)->get();
        
        $tambah_karyawan_cabang = Cabang::all();
        $edit_karyawan_cabang = Cabang::all();

        $cekJumlahCabang = Cabang::all()->count();
        $cekJumlahKaryawan = User::where('isAdmin', 0)->count();

        return view('admin.karyawan')
                ->with('karyawan', $karyawan)
                ->with('karyawanUpdate', $karyawanUpdate)
                ->with('tambah_karyawan_cabang', $tambah_karyawan_cabang)
                ->with('edit_karyawan_cabang', $edit_karyawan_cabang)
                ->with('cekJumlahCabang', $cekJumlahCabang)
                ->with('cekJumlahKaryawan', $cekJumlahKaryawan)
                ->with('layout', $layout);
    }

    public function create(Request $request)
    {
        $validator  = $request->validate([
            'name'      => 'required',
            'email'     => 'unique:users,email|required',
            'password'  => 'required'
        ]);

        $karyawan = new User;

        $karyawan->no_handphone = $request->get('nohape');
        $karyawan->name = $request->get('name');
        $karyawan->email = $request->get('email');
        $password = $request->get('password');
        $karyawan->password = bcrypt($password);
        $karyawan->cabang_id = $request->get('cabang_id');

        $karyawan->save();

        return redirect('Admin/AkunKaryawan');
    }

    public function update(Request $request, $id)
    {
        $validator  = $request->validate([
            'name'      => 'required',
            'email'     => 'required'
        ]);
        $karyawan = User::find($id);
 
        $karyawan->no_handphone = $request->get('nohape');
        $karyawan->name = $request->get('name');
        $karyawan->email = $request->get('email');
        if ($request->get('password') != NULL)
        {
            $password = $request->get('password');
            $karyawan->password = bcrypt($password);
        }
        $karyawan->cabang_id = $request->get('cabang_id');

        $karyawan->save();

        return redirect('Admin/AkunKaryawan');
    }


    public function delete($id)
    {
        $karyawan = User::find($id);
        $karyawan->delete();
        return redirect('Admin/AkunKaryawan');
    }
}
