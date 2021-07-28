<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriNilaiPrakerinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_nilai_prakerin', function (Blueprint $table) {
            $table->id();
            $table->string('aspek_yang_dinilai');
            // $table->enum('jurusan', ['RPL', 'BC','TKJ','TEI','MM']);
            $table->foreignId('id_jurusan')->constrained('jurusan')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('domain', ['pelaksanaan','ketrampilan']);
            $table->enum('keterangan', ['Nilai Sekolah','Nilai Perusahaan']);
            $table->timestamps();
        });

        Schema::table('nilai_prakerin', function (Blueprint $table) {
            $table->foreign('id_ketegori')->references('id')->on('kategori_nilai_prakerin')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_nilai_prakerin');
    }
}
