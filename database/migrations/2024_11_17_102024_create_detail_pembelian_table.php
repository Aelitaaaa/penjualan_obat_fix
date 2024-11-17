<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPembelianTable extends Migration
{
    public function up()
    {
        Schema::create('detail_pembelian', function (Blueprint $table) {
            $table->id('id_detail_pembelian');
            $table->string('kode_pembelian', 8);
            $table->string('kode_obat', 7);
            $table->integer('jumlah');
            $table->decimal('harga_satuan', 10, 0);
            $table->decimal('subtotal', 10, 0);
            $table->decimal('total_pembelian', 10, 0)->nullable();
            $table->timestamps();
            $table->unique('kode_pembelian');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_pembelian');
    }
}
