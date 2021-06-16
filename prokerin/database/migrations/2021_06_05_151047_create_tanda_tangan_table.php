<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTandaTanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanda_tangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('path_gambar');
            $table->timestamps();
        });
        Schema::table('detail_surat_k', function (Blueprint $table) {
            $table->foreign('id_tanda_tangan')->references('id')->on('detail_surat_k')->onDelete('set null')->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanda_tangan');
    }
}
