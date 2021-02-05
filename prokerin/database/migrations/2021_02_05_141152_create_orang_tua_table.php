<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrangTuaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orang_tua', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('id')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nomor_kk', 30);
            $table->string('nama_ayah', 30);
            $table->date('tl_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('penghasilan_ayah');
            $table->integer('nik_ayah')->length(25);
            $table->string('nama_ibu', 30);
            $table->date('tl_ibu');
            $table->string('pendidikan_ibu', 20);
            $table->string('pekerjaan_ibu', 25);
            $table->string('penghasilan_ibu', 25);
            $table->integer('nik_ibu')->length(25);
            $table->enum('status', ['Kandung', 'Wali']);
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
        Schema::dropIfExists('orang_tua');
    }
}
