<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class kategori_nilai_prakerinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'intensif',
                'id_jurusan' => '1',
                'domain' => 'pelaksanaan',
                'keterangan' => 'Nilai Perusahaan',
            ]);
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'kedisiplinan',
                'id_jurusan' => '1',
                'domain' => 'pelaksanaan',
                'keterangan' => 'Nilai Perusahaan',
            ]);
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'tanggung jawab',
                'id_jurusan' => '1',
                'domain' => 'pelaksanaan',
                'keterangan' => 'Nilai Perusahaan',
            ]);
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'kerjinan',
                'id_jurusan' => '1',
                'domain' => 'pelaksanaan',
                'keterangan' => 'Nilai Perusahaan',
            ]);
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'kerjsama',
                'id_jurusan' => '1',
                'domain' => 'pelaksanaan',
                'keterangan' => 'Nilai Perusahaan',
            ]);
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'Motor_otomotif',
                'id_jurusan' => '1',
                'domain' => 'ketrampilan',
                'keterangan' => 'Nilai Perusahaan',
            ]);
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'Litstrik Otomotif',
                'id_jurusan' => '1',
                'domain' => 'ketrampilan',
                'keterangan' => 'Nilai Perusahaan',
            ]);
            // nilai sekolah
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'Nilai Laporan Tertulis',
                'id_jurusan' => '1',
                'domain' => 'ketrampilan',
                'keterangan' => 'Nilai Sekolah',
            ]);
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'Presentasi Sidang Laporan',
                'id_jurusan' => '1',
                'domain' => 'pelaksanaan',
                'keterangan' => 'Nilai Sekolah',
            ]);
    }
}
