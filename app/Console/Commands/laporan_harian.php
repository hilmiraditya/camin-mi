<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\LaporanTransaksi;

use App\Penjualan;
use App\User;
use App\Cabang;
use App\Kategori;

class laporan_harian extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laporan:harian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kirim email laporan penjualan setiap harinya.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $emailAdress = User::where('isAdmin', 1)->first()->email;
        $data = [
            'date' => date("Y-m-d"),
            'penjualan' => Penjualan::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->whereDay('created_at', '=', date('d'))->get(),
            'cabang' => Cabang::all(),
            'kategori' => Kategori::all()
        ];
        Mail::to($emailAdress)->send(new LaporanTransaksi($data));
        $this->info('Laporan penjualan harian berhasil dikirim ke email admin');
    }
}
