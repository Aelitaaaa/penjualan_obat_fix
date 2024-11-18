<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomPembayaranTable extends Migration
{
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_dokter');
            $table->unsignedBigInteger('id_rekammedis');
            $table->decimal('total_biaya', 15, 2);
            $table->timestamps();
        
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_dokter')->references('id')->on('dokters')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_rekammedis')->references('id')->on('rekam_medis')->onDelete('cascade')->onUpdate('cascade');
        });


        Schema::table('pembayaran', function (Blueprint $table) {
            DB::statement('ALTER TABLE pembayaran 
                MODIFY updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
                MODIFY created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
