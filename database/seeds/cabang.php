<?php

use Illuminate\Database\Seeder;

class cabang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cabang')->insert([
            'nama' => 'bintaro',
            'alamat' => 'bintaro', 
            'no' => '081290035031'
        ]);

        DB::table('cabang')->insert([
            'nama' => 'pamulang',
            'alamat' => 'pamulang',
            'no' => '081290035031'
        ]);
    }
}
