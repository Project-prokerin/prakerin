<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtofolioSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portofolio_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->integer('NIPD');
            $table->longText('deskripsi');
            $table->longText('sumber_link');
            $table->longText('vidio_link');
            $table->string('id_siswa')->foreign('id_siswa')->references('id')->on('siswa');
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
        Schema::dropIfExists('protofolio_siswa');
    }
}
