<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailResepTable extends Migration
{
    public function up()
    {
        Schema::create('detail_resep', function (Blueprint $table) {
            $table->id();
            $table->char('kode_resep', 10);
            $table->char('kode_obat', 7);
            $table->integer('jumlah_obat');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('kode_resep')->references('kode_resep')->on('resep')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kode_obat')->references('kode_obat')->on('obat')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_resep');
    }
}
