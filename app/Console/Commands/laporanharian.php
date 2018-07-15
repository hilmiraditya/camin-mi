<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class laporanharian extends Command
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
    protected $description = 'Kirim email laporan harian';

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
        Mail::raw('Text', function ($message){
            $message->to('raditya113@gmail.com');
        });
        $this->info('Email Berhasil Dikirim');
    }
}
