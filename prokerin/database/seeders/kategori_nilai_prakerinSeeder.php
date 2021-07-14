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
                'jurusan' => 'RPL',
                'domain' => 'pelaksanaan',
                'keterangan' => 'Nilai Perusahaan',
            ]);
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'kedisiplinan',
                'jurusan' => 'RPL',
                'domain' => 'pelaksanaan',
                'keterangan' => 'Nilai Perusahaan',
            ]);
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'tanggung jawab',
                'jurusan' => 'RPL',
                'domain' => 'pelaksanaan',
                'keterangan' => 'Nilai Perusahaan',
            ]);
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'kerjinan',
                'jurusan' => 'RPL',
                'domain' => 'pelaksanaan',
                'keterangan' => 'Nilai Perusahaan',
            ]);
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'kerjsama',
                'jurusan' => 'RPL',
                'domain' => 'pelaksanaan',
                'keterangan' => 'Nilai Perusahaan',
            ]);
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'Motor_otomotif',
                'jurusan' => 'RPL',
                'domain' => 'ketrampilan',
                'keterangan' => 'Nilai Perusahaan',
            ]);
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'Litstrik Otomotif',
                'jurusan' => 'RPL',
                'domain' => 'ketrampilan',
                'keterangan' => 'Nilai Perusahaan',
            ]);
            // nilai sekolah
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'Nilai Laporan Tertulis',
                'jurusan' => 'RPL',
                'domain' => 'ketrampilan',
                'keterangan' => 'Nilai Sekolah',
            ]);
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => 'Presentasi Sidang Laporan',
                'jurusan' => 'RPL',
                'domain' => 'pelaksanaan',
                'keterangan' => 'Nilai Sekolah',
            ]);
    }
}
