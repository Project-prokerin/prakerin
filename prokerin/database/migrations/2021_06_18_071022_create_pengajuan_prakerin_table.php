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
            $table->integer('no')->unsigned();
            $table->foreignId('id_guru')->nullable()->constrained('guru')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('id_data_prakerin')->nullable()->constrained('data_prakerin')->onDelete('set null')->onUpdate('cascade');
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
