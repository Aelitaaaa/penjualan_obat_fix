<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->integer('id_pasien'); // Foreign key ke tabel pasien
            $table->unsignedBigInteger('id_dokter'); // Foreign key ke tabel dokter
            $table->unsignedBigInteger('id_rekammedis'); // Foreign key ke tabel rekammedis
            $table->decimal('total_biaya', 15, 2); // Kolom untuk total biaya pembayaran
            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key constraints
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');
            $table->foreign('id_dokter')->references('id')->on('dokters')->onDelete('cascade');
            $table->foreign('id_rekammedis')->references('id')->on('rekam_medis')->onDelete('cascade');
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
