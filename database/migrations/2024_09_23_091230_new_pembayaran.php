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
            $table->char('kode_resep', 10);
            $table->decimal('biaya_dokter', 15, 2);
            $table->decimal('biaya_obat', 15, 2); // Kolom untuk total biaya pembayaran
            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key constraints
            $table->foreign('kode_resep')->references('kode_resep')->on('resep')->onDelete('cascade');
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
