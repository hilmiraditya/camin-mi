<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments('idKaryawan');
            $table->string('gambar_karyawan');
            $table->string('asal_karyawan');
            $table->string('foto_ktp_karyawan');
            $table->string('alamat_karyawan');
            $table->date('tanggal_lahir_karyawan');
            $table->string('no_handphone_karyawan');            
            $table->string('name_karyawan');
            $table->string('email_karyawan')->unique();
            $table->string('password_karyawan');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('karyawan');
    }
}
