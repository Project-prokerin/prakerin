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
            $table->foreignId('id_user')->nullable()->constrained('users')->onDelete('set null')->onUpdate("cascade");
            $table->string('nama_siswa', 50);
            $table->string('nipd', 100);
            $table->string('nisn', 100);
           // $table->enum('jk', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->bigInteger('id_kelas')->nullable()->unsigned();
            $table->timestamps();
        });
        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade')->onUpdate("cascade");
        // });

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
