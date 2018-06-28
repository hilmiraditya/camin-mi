<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StokCabang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_cabang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jumlah');

            $table->unsignedInteger('cabang_id');
            $table->foreign('cabang_id')->references('id')->on('cabang')->onDelete('cascade');
            $table->unsignedInteger('katalog_id');
            $table->foreign('katalog_id')->references('id')->on('katalog')->onDelete('cascade');

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
        Schema::drop('stok_cabang');
    }
}
