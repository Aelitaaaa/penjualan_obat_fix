<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanObatTable extends Migration
{
    public function up()
    {
        Schema::create('penjualan_obat', function (Blueprint $table) {
            $table->id('id_penjualan');
            $table->string('kode_penjualan', 7);
            $table->string('kode_obat', 7);
            $table->unsignedBigInteger('id_pasien'); // Sesuaikan tipe data
            $table->integer('jumlah');
            $table->decimal('total_harga_penjualan', 10, 2);
            $table->date('tanggal_penjualan');
            $table->timestamps();
        
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kode_obat')->references('kode_obat')->on('obat')->onDelete('restrict')->onUpdate('restrict');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('penjualan_obat');
    }
}
