<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuplierTable extends Migration
{
    public function up()
    {
        Schema::create('suplier', function (Blueprint $table) {
            $table->id('id_suplier');
            $table->string('kode_suplier', 7);
            $table->string('nama_suplier', 255);
            $table->string('alamat', 255);
            $table->string('nomor_telepon', 13);
            $table->timestamps();
        });

        Schema::table('suplier', function (Blueprint $table) { 
            $table->unique('id_suplier'); 
        });


        Schema::table('suplier', function (Blueprint $table) {
            DB::statement('ALTER TABLE suplier 
                MODIFY updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
                MODIFY created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        });
    }

    public function down()
    {
        Schema::dropIfExists('suplier');

        Schema::table('suplier', function (Blueprint $table) { $table->dropUnique('id_suplier'); });
    }
}
