<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Kategori;
use App\Cabang;

trait DefaultLayout
{
	public function __construct()
	{
        date_default_timezone_set('Asia/Bangkok');
    	$this->middleware('auth');
        $this->middleware('admin');
	}

	public function default()
	{
    	$layout = [
    		'user' => Auth::user(),
    		'listkategori' => Kategori::all(),
            'cabang' => Cabang::all()
    	];
    	return $layout;
	}
}