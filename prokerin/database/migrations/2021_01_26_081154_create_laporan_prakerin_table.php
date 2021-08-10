<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPrakerinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_prakerin', function (Blueprint $table) {
            $table->id();
            $table->string('judul_laporan');
            // $table->string('nama_perusahaan');
            // $table->longText('lokasi_perusahaan');
            $table->string('no');
            $table->bigInteger('id_kelompok_laporan')->unsigned();
            $table->foreign('id_kelompok_laporan')->references('id')->on('kelompok_laporan')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('laporan_prakerin');
    }
}
