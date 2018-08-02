<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterAkunController extends Controller
{
    //
    public function index(Request $request)
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
        return redirect('login')->with('message', 'Akun Berhasil ditambah, silahkan login');
    }
}
