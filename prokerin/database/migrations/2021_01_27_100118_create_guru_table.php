<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->nullable()->constrained('users')->onDelete('set null')->onUpdate("cascade");
            $table->bigInteger('nik')->unsigned();
            $table->string('nama', 100);
            $table->enum('jabatan',['admin','litbang', 'tu','kaprog','kepsek','waka','bkk', 'hubin','kurikulum','kesiswaan','sarpras','kejuruan', 'pembimbing'])->nullable();
            $table->bigInteger('id_jurusan')->unsigned()->nullable();
            $table->string('no_telp');
            $table->timestamps();
        });
        Schema::table('data_prakerin', function (Blueprint $table) {
            $table->foreign('id_guru')->references('id')->on('guru')->onDelete('set null')->onUpdate("cascade");
        });
        Schema::table('kelompok_laporan', function (Blueprint $table) {
            $table->foreign('id_guru')->references('id')->on('guru')->onDelete('set null')->onUpdate("cascade");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru');
    }
}
