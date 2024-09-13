<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep', function (Blueprint $table) {
            $table->string('kode_resep', 10)->primary();
            $table->string('nama_resep');
            $table->text('daftar_obat');
            $table->unsignedBigInteger('id_rekam_medis'); // Kolom foreign key
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('id_rekam_medis')->references('id')->on('rekam_medis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resep', function (Blueprint $table) {
            $table->dropForeign(['id_rekam_medis']);
        });

        Schema::dropIfExists('resep');
    }
}
