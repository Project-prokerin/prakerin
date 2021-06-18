<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPengajuanPrakerinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengajuan_prakerin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengajuan_prakerin')->constrained('pengajuan_prakerin')->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_surat');
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
        Schema::dropIfExists('detail_pengajuan_prakerin');
    }
}
