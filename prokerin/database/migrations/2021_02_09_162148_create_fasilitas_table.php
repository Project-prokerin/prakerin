<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_prakerin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jurnal_prakerin');
            $table->foreign('id_jurnal_prakerin')->references('id')->on('jurnal_prakerin')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('mess', ['iya', 'tidak']);
            $table->enum('buss_antar_jemput', ['iya', 'tidak']);
            $table->enum('makan_siang', ['iya', 'tidak']);
            $table->enum('intensif', ['iya', 'tidak']);
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
        Schema::dropIfExists('fasilitas');
    }
}
