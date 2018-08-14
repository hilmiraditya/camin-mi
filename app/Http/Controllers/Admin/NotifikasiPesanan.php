<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

use App\Penjualan;
use App\Traits\DefaultLayout;

class NotifikasiPesanan extends Controller
{
	use DefaultLayout;

    public function index($id)
    {
    	$layout = $this->default();
    	$penjualanunread = Penjualan::where('id_transaksi', $id)->get();
        $penjualan = Penjualan::where('keterangan', 0)->get();
    	Auth::user()->unreadNotifications->markAsRead();
    	return view('admin.penjualan')
    		->with('penjualanunread', $penjualanunread)
    		->with('penjualan', $penjualan)
    		->with('layout', $layout)
    		->with('keterangan', 'Request Dari Pengguna');
    }
}
