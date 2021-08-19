<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanPrakerinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_prakerin', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->foreignId('id_guru')->nullable()->constrained('guru')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('id_siswa')->nullable()->constrained('siswa')->onDelete('set null')->onUpdate('cascade');
            $table->bigInteger('id_tanda_tangan')->unsigned()->nullable();
            $table->string('nama_perusahaan');
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
        Schema::dropIfExists('pengajuan_prakerin');
    }
}
