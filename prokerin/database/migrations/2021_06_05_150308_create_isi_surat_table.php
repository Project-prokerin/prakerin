<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsiSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isi_surat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_surat');
            $table->string('hari');
            $table->string('tanggal');
            $table->string('pukul');
            $table->string('tempat');
            $table->longText('alamat');
            $table->foreignId('id_guru')->nullable()->constrained('guru')->onDelete('set null')->onUpdate("cascade");
            $table->foreignId('id_detail_surat_k')->constrained('detail_surat_k')->onDelete('cascade')->onUpdate("cascade");
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
        Schema::dropIfExists('isi_surat');
    }
}
