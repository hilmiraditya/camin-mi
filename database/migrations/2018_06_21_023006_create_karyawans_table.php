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
    
                $table->unsignedInteger('cabang_id');
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
            Schema::drop('karyawan');
        }
    }