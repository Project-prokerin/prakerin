<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelompokProkerin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok_prakerin', function (Blueprint $table) {
            $table->id();
            $table->integer('id_siswa')->foreign('id_siswa')->references('id')->on('siswa');
            $table->string('nama');
            $table->string('kelas');
            $table->string('jurusan');
            $table->integer('id_perusahaan')->foreign('id_perusahaan')->references('id')->on('perusahaan');
            $table->date('tgl_pengajuan');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
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
        Schema::dropIfExists('kelompok_prokerin');
    }
}
