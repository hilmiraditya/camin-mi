<?php

namespace App\Traits;

use App\User;
use App\Kategori;

trait DefaultLayout
{
	public function __construct()
	{
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