<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignKeyOnDetailPembelianTable extends Migration
{
    public function up()
    {
        Schema::table('detail_pembelian', function (Blueprint $table) {
            // Hapus foreign key lama
            $table->dropForeign(['kode_obat']);

            // Tambahkan foreign key baru dengan ON DELETE CASCADE
            $table->foreign('kode_obat')->references('kode_obat')->on('obat')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('detail_pembelian', function (Blueprint $table) {
            // Hapus foreign key yang ada
            $table->dropForeign(['kode_obat']);
            
            // Tambahkan kembali foreign key lama tanpa ON DELETE CASCADE
            $table->foreign('kode_obat')->references('kode_obat')->on('obat');
        });
    }
}
