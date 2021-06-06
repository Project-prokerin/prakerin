<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSuratKTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_surat_k', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_template_surat')->constrained('template_surat')->onDelete('cascade')->onUpdate("cascade");
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->string('path_surat');
            $table->bigInteger('id_tanda_tangan')->unsigned()->nullable();
            $table->foreignId('id_surat_keluar')->constrained('surat_keluar')->onDelete('cascade')->onUpdate("cascade");
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
        Schema::dropIfExists('detail_surat_k');
    }
}
