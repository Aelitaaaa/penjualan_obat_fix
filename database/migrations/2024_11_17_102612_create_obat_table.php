<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatTable extends Migration
{
    public function up()
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->id('id_obat');
            $table->string('kode_suplier', 7);
            $table->string('kode_obat', 7)->unique();
            $table->string('nama_obat', 255);
            $table->decimal('harga_beli', 10, 2);
            $table->decimal('harga_jual', 10, 2);
            $table->integer('jumlah_obat');
            $table->string('unit', 15);
            $table->timestamps();
        });

        Schema::table('obat', function (Blueprint $table) {
            DB::statement('ALTER TABLE obat 
                MODIFY updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
                MODIFY created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        });
    }

    public function down()
    {
        Schema::dropIfExists('obat');
    }
}
