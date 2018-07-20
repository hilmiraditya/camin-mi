<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenjualanTambahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penjualan', function($table) {
            $table->unsignedInteger('kategori_id');
            $table->unsignedInteger('cabang_id')->nullable();
            $table->foreign('cabang_id')->references('id')->on('cabang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penjualan', function($table) {
            $table->dropColumn('kategori_id');
            $table->dropColumn('cabang_id')->nullable();
        });
    }
}
