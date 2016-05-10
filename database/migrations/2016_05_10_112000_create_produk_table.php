<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('jenis_kelamin');
            $table->string('judul');
            $table->string('slug');
            $table->string('berat', 10);
            $table->string('deskripsi');
            $table->integer('telepon');
            $table->integer('stok_id')->unsigned();
            $table->foreign('stok_id')->references('id')->on('stok')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('gambar_id')->unsigned();
            $table->foreign('gambar_id')->references('id')->on('gambar')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produk');
    }
}
