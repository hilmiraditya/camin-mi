<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        Commands\laporanharian::class,
        //Commands\laporanbulanan::class,
        //Commands\hapuslaporanbulanan::class
    ];
    
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('laporan:harian')->dailyAt('17:20');
        $schedule->call('App\Http\Controllers\Admin\LaporanPenjualan@email_harian')->dailyAt('17:20');
        //$schedule->command('laporan:bulanan')->endOfMonth();
        //$schedule->command('laporan:hapus')->endOfMonth();
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
