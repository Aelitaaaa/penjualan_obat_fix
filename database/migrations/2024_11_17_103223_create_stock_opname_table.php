<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockOpnameTable extends Migration
{
    public function up()
    {
        Schema::create('stock_opname', function (Blueprint $table) {
            $table->id('id_opname');
            $table->string('kode_obat', 7);
            $table->integer('jumlah_sistem');
            $table->integer('jumlah_fisik');
            $table->integer('minus');
            $table->decimal('harga_obat', 10, 2);
            $table->decimal('total_kerugian', 10, 2);
            $table->timestamps();
            $table->foreign('kode_obat')->references('kode_obat')->on('obat')->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('stock_opname', function (Blueprint $table)
         { $table->unique('id_opname'); 
        });


        Schema::table('stock_opname', function (Blueprint $table) {
            DB::statement('ALTER TABLE stock_opname 
                MODIFY updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
                MODIFY created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_opname');

        Schema::table('stock_opname', function (Blueprint $table) { $table->dropUnique('id_opname'); }); 
    }
}

