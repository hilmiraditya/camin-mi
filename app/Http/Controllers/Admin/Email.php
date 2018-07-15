<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;

use App\Cabang;
use App\User;
use App\Penjualan;

class Email extends Controller
{
	public function index()
	{
		$cabang = Cabang::all();
		$karyawan = User::where('isAdmin', 0)->get();
		$penjualan = Penjualan::all();
		$penjualan2 = Penjualan::all();
		return view('admin.email')
			->with('cabang', $cabang)
			->with('karyawan', $karyawan)
			->with('penjualan', $penjualan)
			->with('penjualan2', $penjualan2);
	}

	public function backup()
	{
		Mail::raw('Text', function ($message){
            $message->to('raditya113@gmail.com');
        });
        echo "email berhasil dikirim";
	}
}
