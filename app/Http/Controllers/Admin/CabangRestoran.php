<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class CabangRestoran extends Controller
{
    public function __construct()
    {
    	$this->middleware('admin');
    	$this->middleware('auth');
    }

    public function index()
   	{
        $admin = User::where('isAdmin', 1)->first();
   		return view('admin.cabang')->with('admin', $admin);
   	}

}
