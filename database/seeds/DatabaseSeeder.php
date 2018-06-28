<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

    	Eloquent::unguard();

    	$this->call('cabang_karyawan');
    	
    	$this->command->info('berhasil coi');
    }
}
