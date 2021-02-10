<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembekalanMagangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembekalan_magang', function (Blueprint $table) {
            $table->id();
            // $table->enum('text_wpt_iq', ['sudah', 'belum']);
            // $table->enum('personality_interview', ['sudah', 'belum']);
            // $table->enum('soft_skill', ['sudah', 'belum']);
            $table->string('text_wpt_iq');
            $table->string('personality_interview');
            $table->string('soft_skill');
            $table->string('file_portofolio');
            $table->unsignedBigInteger('id_guru');
            $table->foreign('id_guru')->references('id')->on('guru')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_siswa');
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
        Schema::dropIfExists('pembekalan_magang');
    }
}
