<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_dari')->constrained('guru')->onDelete('cascade')->onUpdate("cascade");
            $table->foreignId('id_untuk')->constrained('guru')->onDelete('cascade')->onUpdate("cascade");
            $table->enum('status', ['pengajuan', 'acc', 'tolak'])->default('pengajuan');
            $table->bigInteger('id_template_surat')->unsigned()->nullable();
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
        Schema::dropIfExists('surat_keluar');
    }
}
