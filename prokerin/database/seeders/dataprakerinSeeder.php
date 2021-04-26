<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
class dataprakerinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        // $jurusan = ['RPL','MM','TKJ'];

        DB::table('data_prakerin')->insert([
            'nama' => 'Nur Firdaus',
            'kelas' => 'XII',
            'jurusan' => 'RPL',
            'id_siswa' => 1,
            'id_perusahaan' => 1,
            'id_guru' => 1,
            'tgl_mulai' => '2020-10-10',
            'tgl_selesai' => '2021-11-11',
        ]);
        DB::table('data_prakerin')->insert([
            'nama' => 'Rafie aydin',
            'kelas' => 'XII',
            'jurusan' => 'RPL',
            'id_siswa' => 2,
            'id_perusahaan' => 1,
            'id_guru' => 1,
            'tgl_mulai' => '2020-10-10',
            'tgl_selesai' => '2021-11-11',
        ]);
        DB::table('data_prakerin')->insert([
            'nama' => 'Dana',
            'kelas' => 'XII',
            'jurusan' => 'RPL',
            'id_siswa' => 3,
            'id_perusahaan' => 1,
            'id_guru' => 1,
            'tgl_mulai' => '2020-10-10',
            'tgl_selesai' => '2021-11-11',
        ]);
      
        DB::table('data_prakerin')->insert([
            'nama' => 'Walada',
            'kelas' => 'XII',
            'jurusan' => 'RPL',
            'id_siswa' => 4,
            'id_perusahaan' => 2,
            'id_guru' => 2,
            'tgl_mulai' => '2020-10-10',
            'tgl_selesai' => '2021-11-11',
        ]);
        DB::table('data_prakerin')->insert([
            'nama' => 'Radit',
            'kelas' => 'XII',
            'jurusan' => 'RPL',
            'id_siswa' => 5,
            'id_perusahaan' => 2,
            'id_guru' => 2,
            'tgl_mulai' => '2020-10-10',
            'tgl_selesai' => '2021-11-11',
        ]);
        DB::table('data_prakerin')->insert([
            'nama' => 'Falih',
            'kelas' => 'XII',
            'jurusan' => 'RPL',
            'id_siswa' => 6,
            'id_perusahaan' => 2,
            'id_guru' => 2,
            'tgl_mulai' => '2020-10-10',
            'tgl_selesai' => '2021-11-11',
        ]);
        DB::table('data_prakerin')->insert([
            'nama' => 'VIk',
            'kelas' => 'XII',
            'jurusan' => 'BC',
            'id_siswa' => 7,
            'id_perusahaan' => 2,
            'id_guru' => 2,
            'tgl_mulai' => '2020-10-10',
            'tgl_selesai' => '2021-11-11',
        ]);
        DB::table('data_prakerin')->insert([
            'nama' => 'Jiarisa',
            'kelas' => 'XII',
            'jurusan' => 'BC',
            'id_siswa' => 8,
            'id_perusahaan' => 2,
            'id_guru' => 2,
            'tgl_mulai' => '2020-10-10',
            'tgl_selesai' => '2021-11-11',
        ]);
   
    }
}

