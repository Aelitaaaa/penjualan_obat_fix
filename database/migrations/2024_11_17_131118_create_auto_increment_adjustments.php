<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoIncrementAdjustments extends Migration
{
    public function up()
    {
        Schema::table('detail_pembelian', function (Blueprint $table) {
            $table->id('id_detail_pembelian')->change();
        });

        Schema::table('detail_resep', function (Blueprint $table) {
            // Ubah nama kolom sesuai dengan yang ada
            $table->unsignedBigInteger( 'id')->change();
        });

        Schema::table('dokters', function (Blueprint $table) {
            $table->bigIncrements('id')->change();
        });

        Schema::table('jadwals', function (Blueprint $table) {
            $table->bigIncrements('id')->change();
        });

        Schema::table('obat', function (Blueprint $table) {
            $table->increments('id_obat')->change();
        });

        Schema::table('pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id')->change();
        });

        Schema::table('pembelian_obat', function (Blueprint $table) {
            $table->increments('id_pembelian')->change();
        });

        Schema::table('rekam_medis', function (Blueprint $table) {
            $table->bigIncrements('id')->change();
        });

        Schema::table('stock_opname', function (Blueprint $table) {
            $table->increments('id_opname')->change();
        });

        Schema::table('suplier', function (Blueprint $table) {
            $table->increments('id_suplier')->change();
        });
    }

    public function down()
    {
        Schema::table('detail_pembelian', function (Blueprint $table) {
            $table->integer('id_detail_pembelian')->change();
        });

        Schema::table('detail_resep', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->change();
        });

        Schema::table('dokters', function (Blueprint $table) {
            $table->bigInteger('id')->change();
        });

        Schema::table('jadwals', function (Blueprint $table) {
            $table->bigInteger('id')->change();
        });

        Schema::table('obat', function (Blueprint $table) {
            $table->integer('id_obat')->change();
        });

        Schema::table('pembayaran', function (Blueprint $table) {
            $table->bigInteger('id')->change();
        });

        Schema::table('pembelian_obat', function (Blueprint $table) {
            $table->integer('id_pembelian')->change();
        });

        Schema::table('rekam_medis', function (Blueprint $table) {
            $table->bigInteger('id')->change();
        });

        Schema::table('stock_opname', function (Blueprint $table) {
            $table->integer('id_opname')->change();
        });

        Schema::table('suplier', function (Blueprint $table) {
            $table->integer('id_suplier')->change();
        });
    }
}
