<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedisTable extends Migration
{
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien'); // Sesuaikan tipe data
            $table->unsignedBigInteger('id_dokter');
            $table->unsignedBigInteger('id_jadwal');
            $table->text('diagnosis');
            $table->string('tindakan', 255);
            $table->timestamps();
        
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_dokter')->references('id')->on('dokters')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jadwal')->references('id')->on('jadwals')->onDelete('cascade')->onUpdate('cascade');
        });
        

        Schema::table('rekam_medis', function (Blueprint $table) { 
            $table->unique('id'); 
        });


        Schema::table('rekam_medis', function (Blueprint $table) {
            DB::statement('ALTER TABLE rekam_medis 
                MODIFY updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
                MODIFY created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rekam_medis');

        Schema::table('rekam_medis', function (Blueprint $table) { $table->dropUnique('id'); });
    }
}
