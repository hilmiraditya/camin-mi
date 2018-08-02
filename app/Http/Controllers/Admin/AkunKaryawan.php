<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DefaultLayout;

use App\User;

class AkunKaryawan extends Controller
{
    use DefaultLayout;

    public function index()
    {
        $layout = $this->default();
        $karyawan = User::where('isAdmin', 0)->get();
        $karyawanUpdate = User::where('isAdmin', 0)->get();
        $cekJumlahKaryawan = User::where('isAdmin', 0)->count();
        return view('admin.karyawan')
                ->with('karyawan', $karyawan)
                ->with('karyawanUpdate', $karyawanUpdate)
                ->with('cekJumlahKaryawan', $cekJumlahKaryawan)
                ->with('layout', $layout);
    }

    public function create(Request $request)
    {
        $validator  = $request->validate([
            'name'      => 'required',
            'email'     => 'unique:users,email|required',
            'password'  => 'required',
            'nohape' => 'numeric',
            'alamat' => 'required'
        ]);

        $karyawan = new User;

        $karyawan->alamat = $request->get('alamat');
        $karyawan->no_handphone = $request->get('nohape');
        $karyawan->name = $request->get('name');
        $karyawan->email = $request->get('email');
        $password = $request->get('password');
        $karyawan->password = bcrypt($password);
        $karyawan->save();
        return redirect('Admin/AkunKaryawan')->with('message', 'Akun Pengguna berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        $validator  = $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'nohape' => 'numeric'
        ]);
        $karyawan = User::find($id);
        $karyawan->alamat = $request->get('alamat');
        $karyawan->no_handphone = $request->get('nohape');
        $karyawan->name = $request->get('name');
        $karyawan->email = $request->get('email');
        if ($request->get('password') != NULL)
        {
            $password = $request->get('password');
            $karyawan->password = bcrypt($password);
        }
        $karyawan->save();
        return redirect('Admin/AkunKaryawan')->with('message', 'Akun Pengguna berhasil diubah');
    }


    public function delete($id)
    {
        $karyawan = User::find($id);
        $karyawan->delete();
        return redirect('Admin/AkunKaryawan')->with('message', 'Akun Pengguna berhasil dihapus');
    }
}
