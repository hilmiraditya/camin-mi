<?php

use Illuminate\Database\Seeder;

class cabang_karyawan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawan')->delete();
     	DB::table('cabang')->delete();

     	//cabang
		$bintaro = cabang::create(array(
			'nama_cabang' => 'bintaro',
			'alamat'  => 'bintaro'));

		$pamulang = cabang::create(array(
			'nama_cabang' => 'pamulang',
			'alamat'  => 'pamulang'));

		$this->command->info('Data cabang berhasil dimasukkan');

		Wali::create(array(
			'name_karyawan'  => 'Karyawan Bintaro',
			'idCabang' => $bintaro->idCabang
		));

		Wali::create(array(
			'name_karyawan'  => 'Karyawan Pamulang',
			'idCabang' => $pamulang->idCabang
		));

		$this->command->info('Data Karyawan dengan ID cabang berhasil ditambah');
    }
}
