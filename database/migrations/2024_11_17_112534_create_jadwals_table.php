<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dokter');
            $table->unsignedBigInteger('id_pasien'); // Sesuaikan tipe data
            $table->date('tanggal');
            $table->time('waktu');
            $table->timestamps();
        
            $table->foreign('id_dokter')->references('id')->on('dokters')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade')->onUpdate('cascade');
        });


        Schema::table('jadwals', function (Blueprint $table) {
            DB::statement('ALTER TABLE jadwals 
                MODIFY updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
                MODIFY created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
