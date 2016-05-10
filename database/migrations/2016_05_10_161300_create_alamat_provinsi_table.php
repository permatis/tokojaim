<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlamatProvinsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_provinsi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alamat_id')->unsigned();
            $table->foreign('alamat_id')->references('id')->on('alamat')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('provinsi_id')->unsigned();
            $table->foreign('provinsi_id')->references('id')->on('provinsi')
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
        Schema::drop('alamat_provinsi');
    }
}
