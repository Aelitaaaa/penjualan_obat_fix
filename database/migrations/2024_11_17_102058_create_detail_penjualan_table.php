<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenjualanTable extends Migration
{
    public function up()
    {
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->id('id_detail_penjualan');
            $table->string('kode_penjualan', 7);
            $table->string('kode_obat', 7);
            $table->integer('jumlah');
            $table->decimal('harga_satuan', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->decimal('total_penjualan', 10, 2);
            $table->timestamps();
            $table->unique(['kode_penjualan', 'kode_obat']);
        });


        Schema::table('detail_penjualan', function (Blueprint $table) {
            DB::statement('ALTER TABLE detail_penjualan 
                MODIFY updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
                MODIFY created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_penjualan');
    }
}
