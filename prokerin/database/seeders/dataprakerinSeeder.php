<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

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
            'id_kelas' => 2,
            'id_siswa' => 1,
            'id_perusahaan' => 1,
            'id_guru' => 20,
            'tgl_mulai' => '2020-10-10',
            'tgl_selesai' => '2021-11-11',
            'status' => "Pengajuan",
            'created_at' => Carbon::now()
        ]);
        DB::table('data_prakerin')->insert([
            'nama' => 'Rafie aydin',
            'id_kelas' => 3,
            'id_siswa' => 2,
            'id_perusahaan' => 1,
            'id_guru' => 20,
            'tgl_mulai' => '2020-10-10',
            'tgl_selesai' => '2021-11-11',
            'status' => "Pengajuan",
            'created_at' => Carbon::now()
        ]);
        DB::table('data_prakerin')->insert([
            'nama' => 'Dana',
            'id_kelas' => 2,
            'id_siswa' => 3,
            'id_perusahaan' => 1,
            'id_guru' => 20,
            'tgl_mulai' => '2020-10-10',
            'tgl_selesai' => '2021-11-11',
            'status' => "Pengajuan",
            'created_at' => Carbon::now()
        ]);

        DB::table('data_prakerin')->insert([
            'nama' => 'Walada',
            'id_kelas' => 2,
            'id_siswa' => 4,
            'id_perusahaan' => 1,
            'id_guru' => 19,
            'tgl_mulai' => '2020-10-10',
            'tgl_selesai' => '2021-11-11',
            'status' => "Pengajuan",
            'created_at' => Carbon::now()
        ]);
        // DB::table('data_prakerin')->insert([
        //     'nama' => 'Radit',
        //     'id_kelas' => 3,
        //     'id_siswa' => 5,
        //     'id_perusahaan' => 2,
        //     'id_guru' => 21,
        //     'tgl_mulai' => '2020-10-10',
        //     'tgl_selesai' => '2021-11-11',
        //     'status' => "Magang",
        //     'created_at' => Carbon::now()
        // ]);
        // DB::table('data_prakerin')->insert([
        //     'nama' => 'Falih',
        //     'id_kelas' => 3,
        //     'id_siswa' => 6,
        //     'id_perusahaan' => 2,
        //     'id_guru' => 21,
        //     'tgl_mulai' => '2020-10-10',
        //     'tgl_selesai' => '2021-11-11',
        //     'status' => "Magang",
        //     'created_at' => Carbon::now()
        // ]);
        // DB::table('data_prakerin')->insert([
        //     'nama' => 'VIk',
        //     'id_kelas' => 3,
        //     'id_siswa' => 7,
        //     'id_perusahaan' => 2,
        //     'id_guru' => 21,
        //     'tgl_mulai' => '2020-10-10',
        //     'tgl_selesai' => '2021-11-11',
        //     'status' => "Magang",
        //     'created_at' => Carbon::now()
        // ]);
        // DB::table('data_prakerin')->insert([
        //     'nama' => 'Jiarisa',
        //     'id_kelas' => 3,
        //     'id_siswa' => 8,
        //     'id_perusahaan' => 2,
        //     'id_guru' => 21,
        //     'tgl_mulai' => '2020-10-10',
        //     'tgl_selesai' => '2021-11-11',
        //     'status' => "Magang",
        //     'created_at' => Carbon::now()
        // ]);

    }
}

