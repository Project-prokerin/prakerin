<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa', 50);
            $table->string('nipd', 25);
            $table->enum('jk', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nik');
            $table->string('agama');
            $table->text('alamat');
            $table->string('jenis_tinggal', 25);
            $table->string('transportasi', 20);
            $table->string('no_hp', 13);
            $table->string('email', 40);
            $table->integer('bb')->length(3);
            $table->integer('tb')->length(3);
            $table->integer('anak_ke')->length(2);
            $table->integer('jmlh_saudara')->length(2);
            $table->string('kebutuhan_khusus', 20);
            $table->string('no_akte', 20);
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('siswa');
    }
}
