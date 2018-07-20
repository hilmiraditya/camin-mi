<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Kategori;
use App\KantongBelanja;

trait KaryawanDefaultLayout
{
	public function __construct()
	{
        date_default_timezone_set('Asia/Bangkok');
    	$this->middleware('auth');
	}

	public function default()
	{
    	$layout = [
    		'kantongbelanja' => KantongBelanja::where('users_id', Auth::user()->id)->get(),
    		'user' => Auth::user(),
    		'listkategori' => Kategori::all()
    	];

    	return $layout;
	}
}