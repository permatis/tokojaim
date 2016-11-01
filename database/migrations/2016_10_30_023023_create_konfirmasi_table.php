<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonfirmasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pengirim');
            $table->integer('jumlah');
            $table->string('rekening_pengirim');
            $table->string('rekening_toko');
            $table->string('metode_transfer');
            $table->datetime('tgl_transfer');
            $table->integer('transaksi_id')->unsigned();
            $table->integer('gambar_id')->unsigned();

            $table->foreign('transaksi_id')->references('id')->on('transakasi')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('gambar_id')->references('id')->on('gambar')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('konfirmasi');
    }
}
