<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IdtransaksiPenjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penjualan', function($table) {
            $table->string('id_transaksi')->nullable();
        });
        Schema::table('kantong_belanja', function($table) {
            $table->string('id_transaksi')->nullable();
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
            $table->dropColumn('id_transaksi');
        });
        Schema::table('kantong_belanja', function($table) {
            $table->dropColumn('id_transaksi');
        });
    }
}
