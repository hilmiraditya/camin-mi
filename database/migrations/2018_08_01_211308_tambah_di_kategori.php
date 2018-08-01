<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TambahDiKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kategori', function($table) {
            $table->string('alamat');
            $table->string('keterangan');
            $table->string('no_telpon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kategori', function($table) {
            $table->dropColumn('no_telpon');
            $table->dropColumn('alamat');
            $table->dropColumn('keterangan');
        });
    }
}
