<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class kelompoklaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        DB::table('kelompok_laporan')->insert([
            'no' => 1,
            'id_guru' => 18,
            'id_siswa' => 1,
            'nama_perusahaan' => 'Thiel, Lowe and Blick',
            'no_telpon' => '08999991',
        ])  ;
        DB::table('kelompok_laporan')->insert([
            'no' => 1,
            'id_guru' => 18,
            'id_siswa' => 2,
            'nama_perusahaan' => 'Thiel, Lowe and Blick',
            'no_telpon' => '08999991',
        ])  ;
        DB::table('kelompok_laporan')->insert([
            'no' => 1,
            'id_guru' => 18,
            'id_siswa' => 3,
            'nama_perusahaan' => 'Thiel, Lowe and Blick',
            'no_telpon' => '08999991',
        ])  ;
        DB::table('kelompok_laporan')->insert([
            'no' => 1,
            'id_guru' => 18,
            'id_siswa' => 4,
            'nama_perusahaan' => 'Thiel, Lowe and Blick',
            'no_telpon' => '08999991',
        ])  ;
        DB::table('kelompok_laporan')->insert([
            'no' => 2,
            'id_guru' => 19,
            'id_siswa' => 5,
            'nama_perusahaan' => 'Feil, Oberbrunner and Gottlieb',
            'no_telpon' => '08999991',
        ])  ;
        DB::table('kelompok_laporan')->insert([
            'no' => 2,
            'id_guru' => 19,
            'id_siswa' => 6,
            'nama_perusahaan' => 'Feil, Oberbrunner and Gottlieb',
            'no_telpon' => '08999991',
        ])  ;
        DB::table('kelompok_laporan')->insert([
            'no' => 2,
            'id_guru' => 19,
            'id_siswa' => 7,
            'nama_perusahaan' => 'Feil, Oberbrunner and Gottlieb',
            'no_telpon' => '08999991',
        ])  ;
        DB::table('kelompok_laporan')->insert([
            'no' => 2,
            'id_guru' => 19,
            'id_siswa' => 8,
            'nama_perusahaan' => 'Feil, Oberbrunner and Gottlieb',
            'no_telpon' => '08999991',
        ])  ;
    }
}
