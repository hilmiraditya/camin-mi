<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('gambar')->nullable();
                $table->string('asal')->nullable();
                $table->string('foto')->nullable();
                $table->string('alamat')->nullable();
                $table->date('tanggal_lahir')->nullable();
                $table->string('no')->nullable();            
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->boolean('isAdmin')->default(0);
    
                $table->unsignedInteger('cabang_id')->nullable();
                $table->foreign('cabang_id')->references('id')->on('cabang')->onDelete('cascade');
    
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
        Schema::dropIfExists('users');
    }
}
