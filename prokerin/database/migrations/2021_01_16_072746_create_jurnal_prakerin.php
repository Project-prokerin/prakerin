<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalPrakerin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_prakerin', function (Blueprint $table) {
            $table->id();
            $table->integer('id_siswa')->foreign('id_siswa')->references('id')->on('siswa');
            $table->integer('id_perusahaan')->foreign('id_perusahaan')->references('id')->on('perusahaan');
            $table->longText('deskripsi_kegiatan');
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
        Schema::dropIfExists('jurnal_prakerin');
    }
}
