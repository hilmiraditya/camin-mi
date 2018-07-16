<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Kategori;

trait KaryawanDefaultLayout
{
	public function __construct()
	{
    	$this->middleware('auth');
	}

	public function default()
	{
    	$layout = [
    		'karyawan' => Auth::user(),
    		'kategori' => Kategori::all()
    	];

    	return $layout;
	}
}