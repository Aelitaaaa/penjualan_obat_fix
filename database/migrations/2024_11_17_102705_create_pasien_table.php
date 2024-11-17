<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->string('nama_pasien', 255);
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->date('tanggal_lahir');
            $table->string('nomor_telepon', 13);
            $table->text('alamat');
            $table->timestamps();
        });        
            
    }

    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}
