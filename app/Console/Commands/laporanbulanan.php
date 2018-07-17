<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class laporanbulanan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laporan:bulanan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kirim email laporan bulanan';

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
        //
        $this->info('Email Harian Berhasil Dikirim');
    }
}
