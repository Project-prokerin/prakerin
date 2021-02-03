<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalHarianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_harian', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->date('datang');
            $table->date('pulang');
            $table->bigInteger('id_perusahaan')->unsigned();
            $table->foreign('id_perusahaan')->references('id')->on('perusahaan')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_siswa')->unsigned();
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
        Schema::dropIfExists('jurnal_harian');
    }
}
