<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kass', function (Blueprint $table) {
         $table->increments('id');
         $table->date('tgl');
         $table->string('nama');
         $table->string('keterangan');
         $table->string('jumlah');
         $table->string('jenis');
         $table->string('masuk');
         $table->string('keluar');
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
        Schema::dropIfExists('kass');
    }
}
