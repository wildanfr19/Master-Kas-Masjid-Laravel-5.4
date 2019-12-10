<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasmasuks', function (Blueprint $table) {
           $table->increments('id');
           $table->date('tgl_kas_masuk');
           $table->string('nama');
           $table->string('keterangan');
           $table->string('jumlah');
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
        Schema::dropIfExists('kasmasuks');
    }
}
