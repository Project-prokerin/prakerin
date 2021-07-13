<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenelusuranTamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penelusuran_tamatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->constrained('siswa')->ondelete('cascade')->onupdate('cascade');
            $table->string('tahun_lulus',100);
            $table->enum('status', ['bekerja', 'kuliah', 'Wirausaha', 'Bekerja dan Kuliah', 'Wirausaha dan Kuliah']);
            $table->string('nama_kampus',100)->nullable();
            $table->longtext('alamat_kampus')->nullable();
            $table->string('tahun_masuk_kuliah',100)->nullable();
            $table->string('nama_perusahaan',100)->nullable();
            $table->longText('alamat_perusahaan')->nullable();
            $table->string('nama_usaha',100)->nullable();
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
        Schema::dropIfExists('penelusuran_tamatan');
    }
}
