<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPrakerinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_prakerin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->nullable()->constrained('siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_kelompok_laporan')->unsigned()->nullable()->constrained('kelompok_laporan')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('id_kelompok_laporan')->nullable()->constrained('siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nilai');
            $table->enum('keterangan', ['A','B','C','D','E']);
            $table->bigInteger('id_ketegori')->unsigned()->nullable();
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
        Schema::dropIfExists('nilai_prakerin');
    }
}
