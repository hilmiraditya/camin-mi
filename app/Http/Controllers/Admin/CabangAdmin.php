<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Traits\DefaultLayout;
use Illuminate\Support\Facades\Hash;
use App\Cabang;
use App\Users;

class CabangAdmin extends Controller
{
    use DefaultLayout;

    public function index(Request $request)
    {
    	$layout = $this->default();
        $validator  = $request->validate([
            'nama'      => 'required',
            'email'     => 'required|email'
        ]);
    	$admin = $layout['user'];
    	$admin->name = $request->get('nama');
        $admin->email = $request->get('email');
        if ($request->get('password') != NULL)
        {
            $admin->password = Hash::make($request->get('password'));
        }
    	$admin->save();
    	return Redirect::back()->with('message', 'Akun Karyawan berhasil diubah');
    }
}
