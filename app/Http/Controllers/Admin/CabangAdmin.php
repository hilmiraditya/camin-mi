<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Traits\DefaultLayout;
use App\Cabang;
use App\Users;

class CabangAdmin extends Controller
{
    use DefaultLayout;

    public function index(Request $request)
    {
    	$layout = $this->default();
        $validator  = $request->validate([
            'cabang_id'      => 'required'
        ]);
    	$admin = $layout['user'];
    	$admin->cabang_id = $request->get('cabang_id');
    	$admin->save();
    	return Redirect::back()->with('message', 'Posisi cabang pada Admin berhasil diubah');
    }
}
