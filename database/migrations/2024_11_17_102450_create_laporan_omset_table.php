<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanOmsetTable extends Migration
{
    public function up()
    {
        Schema::create('laporan_omset', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->string('kode_penjualan', 7)->unique();
            $table->string('kode_pembelian', 7)->unique();
            $table->date('tanggal_laporan');
            $table->decimal('total_penjualan', 10, 2);
            $table->decimal('total_pembelian', 10, 2);
            $table->decimal('total_keuntungan', 10, 3);
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_omset');
    }
}
