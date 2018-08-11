<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\DefaultLayout;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

use App\Penjualan;
use App\Katalog;
use App\Cabang;
use App\Kategori;
use App\User;

Use App\Mail\LaporanTransaksi;
use PDF;
use Nexmo;


class LaporanPenjualan extends Controller
{
    use DefaultLayout;

    public function harian()
    {
    	$date= date("Y-m-d");
        $layout = $this->default();
        $penjualan =  Penjualan::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->whereDay('created_at', '=', date('d'))->get();
        return view('admin.penjualan')->with('layout', $layout)->with('penjualan', $penjualan)->with('date', $date);
    }

    public function bulanan()
    {
        $date = date("Y-m");
        $layout = $this->default();
        $penjualan =  Penjualan::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->get();
        return view('admin.penjualan')->with('layout', $layout)->with('penjualan', $penjualan)->with('date', $date);
    }

    public function laporan_bulanan()
    {
        $data = [
            'date' => date("Y-m"),
            'penjualan' => Penjualan::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->get(),
            'cabang' => Cabang::all(),
            'kategori' => Kategori::all()
        ];
        $pdf = PDF::loadview('admin.email',compact('data'));
        return $pdf->download('Laporan'.date("Y-m").'.pdf');
    }

    public function laporan_harian()
    {
        $data = [
            'date' => date("Y-m-d"),
            'penjualan' => Penjualan::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->whereDay('created_at', '=', date('d'))->get(),
            'cabang' => Cabang::all(),
            'kategori' => Kategori::all()
        ];
        $pdf = PDF::loadview('admin.email',compact('data'));
        return $pdf->download('Laporan'.date("Y-m-d").'.pdf');
    }

    public function email_harian()
    {
        $emailAdress = User::where('isAdmin', 1)->first()->email;
        $data = [
            'date' => date("Y-m-d"),
            'penjualan' => Penjualan::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->whereDay('created_at', '=', date('d'))->get(),
            'cabang' => Cabang::all(),
            'kategori' => Kategori::all()
        ];
        Mail::to($emailAdress)->send(new LaporanTransaksi($data));
        return Redirect::back()->with('message', 'Laporan Penjualan periode '.$data['date'].' telah dikirim ke '.$emailAdress);
    }

    public function email_bulanan()
    {
        $emailAdress = User::where('isAdmin', 1)->first()->email;
        $data = [
            'date' => date("Y-m"),
            'penjualan' => Penjualan::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->get(),
            'cabang' => Cabang::all(),
            'kategori' => Kategori::all()
        ];
        Mail::to($emailAdress)->send(new LaporanTransaksi($data));
        return Redirect::back()->with('message', 'Laporan Penjualan periode '.$data['date'].' telah dikirim ke '.$emailAdress);
    }

    public function sedang_berjalan()
    {
        $layout = $this->default();
        $penjualan = Penjualan::where('keterangan', 1)->get();
        return view('admin.penjualan')->with('layout', $layout)->with('penjualan', $penjualan);
    }

    public function selesai()
    {
        $layout = $this->default();
        $penjualan = Penjualan::where('keterangan', 2)->get();
        return view('admin.penjualan')->with('layout', $layout)->with('penjualan', $penjualan);
    }

    public function dibatalkan()
    {
        $layout = $this->default();
        $penjualan = Penjualan::where('keterangan','!=', 1)->Where('keterangan','!=', 2)->Where('keterangan','!=', 0)->get();
        return view('admin.penjualan')->with('layout', $layout)->with('penjualan', $penjualan);
    }

    public function request()
    {
        $layout = $this->default();
        $penjualan = Penjualan::where('keterangan', 0)->get();
        return view('admin.penjualan')->with('layout', $layout)->with('penjualan', $penjualan);
    }

    public function proses($id)
    {
        $layout = $this->default();
        $request = Penjualan::find($id);
        $cache = $request->keterangan;
        $request->keterangan = $cache + 1;
        $request->save();

        if ($request->keterangan == -1 || $request->keterangan == -2)
            $Pesan = "Admin TC Fast Food | Pesanan ".$request->Katalog->nama." Anda telah dibatalkan";
        else if ($request->keterangan == 2)
            $Pesan = "Admin TC Fast Food | Pesanan ".$request->Katalog->nama." Telah Sampai, Selamat Menikmati !";
        else if
            ($request->keterangan == 1) $Pesan = "Admin TC Fast Food | Pesanan ".$request->Katalog->nama." Sedang di proses";
        else if
            ($request->keterangan == 0) $Pesan = "Admin TC Fast Food | Pesanan ".$request->Katalog->nama." Telah masuk ke dalam order";

        Nexmo::message()->send([
            'to'   => '6287855857881',
            'from' => 'TCFASTFOOD',
            'text' => $Pesan
        ]);

        return Redirect::back()->with('message', 'Transaksi '.$request->Katalog->nama.' Berhasil Di Proses');
    }

    public function batal_admin($id)
    {
        $layout = $this->default();
        $request = Penjualan::find($id);
        $request->keterangan = -1;
        $request->save();
        return Redirect::back()->with('message', 'Transaksi '.$request->Katalog->nama.' Berhasil Di Batalkan');
    }

    public function hapus_penjualan()
    {
        $penjualan = Penjualan::truncate();
    }

    public function delete($id)
    {
    	$penjualan = Penjualan::find($id);
        $id_transaksi = $penjualan->first();
    	$penjualan->delete();
    	return Redirect::back()->with('message', 'Transaksi Berhasil Dihapus');
    }
}
