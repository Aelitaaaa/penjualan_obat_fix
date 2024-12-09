<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletedAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('obat', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('suplier', function (Blueprint $table) {
            $table->softDeletes();
        });
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('obat', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

       
    }
}