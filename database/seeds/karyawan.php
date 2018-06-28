<?php

use Illuminate\Database\Seeder;

class karyawan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawan')->insert([
            'name' => 'hilmi',  
            'cabang_id' => 5,
            'email' => 'raditya113@gmail.com',
            'password' => bcrypt('password')
        ]);
        DB::table('karyawan')->insert([
            'name' => 'edo',  
            'cabang_id' => 5,
            'email' => 'edo@gmail.com',
            'password' => bcrypt('password')
        ]);
        DB::table('karyawan')->insert([
            'name' => 'husni',  
            'cabang_id' => 6,
            'email' => 'husni@gmail.com',
            'password' => bcrypt('password')
        ]);
        DB::table('karyawan')->insert([
            'name' => 'falah',  
            'cabang_id' => 6,
            'email' => 'falah@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
