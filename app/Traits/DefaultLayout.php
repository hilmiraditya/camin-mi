<?php

namespace App\Traits;

use App\User;
use App\Kategori;

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
    		'user' => User::where('isAdmin', 1)->first(),
    		'listkategori' => Kategori::all()
    	];

    	return $layout;
	}
}