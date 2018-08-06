<?php

namespace App\Http\Controllers\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use App\Traits\DefaultLayout;

use App\User;

class UbahAkunController extends Controller
{
    //
    public function index(Request $request)
    {
        $validator  = $request->validate([
            'name'      => 'required',
            'no_handphone' => 'numeric',
            'alamat' => 'required'
        ]);

        $pengguna = User::find($request->get('id'));
        $pengguna->name = $request->get('name');
        $pengguna->no_handphone = $request->get('no_handphone');
        $pengguna->alamat = $request->get('alamat');

        if($request->get('password') != NULL)
        {
        	$pengguna->password = bcrypt($request->get('password'));
        }

        $pengguna->save();
        return Redirect::back()->with('message', 'Akun berhasil diubah');
    }
}
