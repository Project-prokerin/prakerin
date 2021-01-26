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
            $table->string('pembimbing_sekolah');
            $table->string('judul_laporan');
            $table->bigInteger('id_perusahaan')->unsigned();
            $table->foreign('id_perusahaan')->references('id')->on('perusahaan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_perusahaan');
            $table->longText('lokasi_perusahaan');
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
