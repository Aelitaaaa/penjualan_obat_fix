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
            $table->char('kode_resep',10)->constrained('resep', 'kode_resep')->onDelete('cascade');
            $table->string('kode_obat', 7)->constrained('obat', 'kode_obat')->onDelete('cascade');
            $table->integer('jumlah_obat');
            $table->string('dosis');
            $table->text('keterangan')->nullable();
            $table->decimal('harga_satuan', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_resep');
    }
}
