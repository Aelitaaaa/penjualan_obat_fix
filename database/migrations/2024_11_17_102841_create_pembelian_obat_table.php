<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianObatTable extends Migration
{
    public function up()
    {
        Schema::create('pembelian_obat', function (Blueprint $table) {
            $table->id('id_pembelian');
            $table->string('kode_pembelian', 8)->unique();
            $table->string('kode_suplier', 7);
            $table->decimal('total_pembelian', 10, 0)->nullable();
            $table->timestamps();
        });

        Schema::table('pembelian_obat', function (Blueprint $table) { $table->unique(['id_pembelian', 'kode_suplier']); });
    }

    public function down()
    {
        Schema::dropIfExists('pembelian_obat');

        Schema::table('pembelian_obat', function (Blueprint $table) { $table->dropUnique(['id_pembelian', 'kode_suplier']); });
    }
}
