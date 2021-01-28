<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->default('default.png');
            $table->string('nama', 100);
            $table->longText('lokasi');
            $table->string('nama_petinggi');
            $table->longText('deskripsi_perusahaan');
            $table->date('tanggal_mou');
            $table->string('status_mou', 150);
            $table->timestamps();
        });
        Schema::table('data_prakerin', function (Blueprint $table) {
            $table->foreign('id_perusahaan')->references('id')->on('perusahaan')->onDelete('cascade')->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perusahaan');
    }
}
