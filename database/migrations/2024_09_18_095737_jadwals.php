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
            $table->unsignedBigInteger('id_dokter');  // FK ke tabel dokter
            $table->date('tanggal');                  // Tanggal jadwal (untuk filter berdasarkan minggu)
            $table->time('waktu');                    // Waktu, misalnya jam 08:00
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']); // Hari jadwal
            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('id_dokter')->references('id')->on('dokters')->onDelete('cascade');
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
