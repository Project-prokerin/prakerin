<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelompokLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok_laporan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_siswa')->foreign('id_siswa')->references('id')->on('siswa');
            $table->integer('id_perusahaan')->foreign('id_perusahaan')->references('id')->on('perusahaan');
            $table->longText('judul_laporan');
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
        Schema::dropIfExists('kelompok_laporan');
    }
}
