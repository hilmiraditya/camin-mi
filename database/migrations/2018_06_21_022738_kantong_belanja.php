<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KantongBelanja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kantong_belanja', function (Blueprint $table) {
            $table->increments('idKantongBelanja');
            $table->integer('jumlah_kantong_belanja');
            $table->string('keterangan_kantong_belanja');
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
        Schema::drop('kantong_belanja');
    }
}
