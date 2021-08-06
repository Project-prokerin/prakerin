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
            $table->string('no');
            $table->bigInteger('id_guru')->unsigned()->nullable();
            $table->bigInteger('id_siswa')->unsigned()->nullable();
            $table->string('nama_perusahaan');
            $table->string('no_telpon', 13);
            // $table->string('jurusan', 100);
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
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
