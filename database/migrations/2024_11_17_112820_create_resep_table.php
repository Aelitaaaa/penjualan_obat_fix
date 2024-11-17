<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepTable extends Migration
{
    public function up()
    {
        Schema::create('resep', function (Blueprint $table) {
            $table->char('kode_resep', 10)->primary();
            $table->string('nama_resep', 255);
            $table->unsignedBigInteger('id_rekam_medis');
            $table->timestamps();

            $table->foreign('id_rekam_medis')->references('id')->on('rekam_medis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('resep');
    }
}
