<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusan', function (Blueprint $table) {
            $table->id();
            $table->string('singkatan_jurusan');
            $table->string('jurusan');
            $table->timestamps();
        });
        Schema::table('kelas', function (Blueprint $table) {
            $table->foreign('id_jurusan')->references('id')->on('jurusan')->onDelete('set null')->onUpdate("cascade");
        });
        Schema::table('guru', function (Blueprint $table) {
            $table->foreign('id_jurusan')->references('id')->on('jurusan')->onDelete('set null')->onUpdate("cascade");
        });
        // Schema::table('perusahaan', function (Blueprint $table) {
        //     $table->foreign('id_jurusan')->references('id')->on('jurusan')->onDelete('set null')->onUpdate("cascade");
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurusan');
    }
}
