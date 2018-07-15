<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;

use App\Cabang;
use App\User;
use App\Penjualan;
use App\Kategori;

class Email extends Controller
{
	public function index()
	{
		$penjualan = Penjualan::all();
		$cabang = Cabang::all();
		$kategori = Kategori::all();
		return view('admin.email')
			->with('penjualan', $penjualan)
			->with('kategori', $kategori)
			->with('cabang', $cabang);
	}

	public function backup()
	{
		Mail::raw('Text', function ($message){
            $message->to('raditya113@gmail.com');
        });
        echo "email berhasil dikirim";
	}
}
