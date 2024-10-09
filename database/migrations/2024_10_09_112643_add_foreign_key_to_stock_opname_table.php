<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToStockOpnameTable extends Migration
{
    public function up()
    {
        Schema::table('stock_opname', function (Blueprint $table) {
            // Menambahkan foreign key pada kolom kode_obat
            $table->foreign('kode_obat')
                  ->references('kode_obat')  // Kolom yang dirujuk di tabel obat
                  ->on('obat')               // Tabel yang dirujuk
                  ->onDelete('cascade');     // Jika data obat dihapus, hapus data yang terkait di stock_opname
        });
    }

    public function down()
    {
        Schema::table('stock_opname', function (Blueprint $table) {
            // Menghapus foreign key jika rollback
            $table->dropForeign(['kode_obat']);
        });
    }
}

