<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPrakerinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_prakerin', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->bigInteger('id_kelas')->unsigned()->nullable();
            $table->bigInteger('id_siswa')->unsigned();
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_perusahaan')->unsigned()->nullable();
            $table->bigInteger('id_guru')->unsigned()->nullable();
            $table->enum('status',['Pengajuan','Magang','Selesai','Batal']);
            $table->date('tgl_mulai')->nullable()->default(null);
            $table->date('tgl_selesai')->nullable()->default(null);
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
        Schema::dropIfExists('data_prakerin');
    }
}
