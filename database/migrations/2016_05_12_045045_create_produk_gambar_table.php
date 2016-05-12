<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukGambarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_gambar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produk_id')->unsigned();
            $table->foreign('produk_id')->references('id')->on('produk')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('gambar_id')->unsigned();
            $table->foreign('gambar_id')->references('id')->on('gambar')
                ->onUpdate('cascade')->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produk_gambar');
    }
}
