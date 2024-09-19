<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jadwals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dokter');  
            $table->Integer('id_pasien');
            $table->date('tanggal');                  
            $table->time('waktu');                    
            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('id_dokter')->references('id')->on('dokters')->onDelete('cascade');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
