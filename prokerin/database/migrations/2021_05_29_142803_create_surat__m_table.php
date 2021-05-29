<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_m', function (Blueprint $table) {
            $table->id();
            $table->string('nama_surat');
            $table->string('path_surat');
            $table->date('tgl_surat_masuk');
            $table->foreignId('id_surat_masuk')->constrained('surat_masuk')->onDelete('cascade')->onUpdate("cascade");
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
        Schema::dropIfExists('surat__m');
    }
}
