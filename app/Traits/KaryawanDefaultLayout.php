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
    		'user' => Auth::user(),
    		'listkategori' => Kategori::all()
    	];

    	return $layout;
	}
}