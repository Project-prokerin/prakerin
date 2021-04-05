<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
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
            'id_guru' => 1, 
            'id_data_prakerin' => 1,
            'nama_perusahaan' => 'Thiel, Lowe and Blick',
            'no_telpon' => '08999991',
            'jurusan' => 'RPL'   
        ])  ; 
        DB::table('kelompok_laporan')->insert([
            'no' => 1,
            'id_guru' => 1, 
            'id_data_prakerin' => 2,
            'nama_perusahaan' => 'Thiel, Lowe and Blick',
            'no_telpon' => '08999991',
            'jurusan' => 'RPL'
        ])  ; 
        DB::table('kelompok_laporan')->insert([
            'no' => 1,
            'id_guru' => 1, 
            'id_data_prakerin' => 3,
            'nama_perusahaan' => 'Thiel, Lowe and Blick',
            'no_telpon' => '08999991',
            'jurusan' => 'RPL'
        ])  ; 
        DB::table('kelompok_laporan')->insert([
            'no' => 1,
            'id_guru' => 1, 
            'id_data_prakerin' => 4,
            'nama_perusahaan' => 'Thiel, Lowe and Blick',
            'no_telpon' => '08999991',
            'jurusan' => 'RPL'
        ])  ; 
        DB::table('kelompok_laporan')->insert([
            'no' => 2,
            'id_guru' => 2, 
            'id_data_prakerin' => 5,
            'nama_perusahaan' => 'Feil, Oberbrunner and Gottlieb',
            'no_telpon' => '08999991',
            'jurusan' => 'RPL'
        ])  ; 
        DB::table('kelompok_laporan')->insert([
            'no' => 2,
            'id_guru' => 2, 
            'id_data_prakerin' => 6,
            'nama_perusahaan' => 'Feil, Oberbrunner and Gottlieb',
            'no_telpon' => '08999991',
            'jurusan' => 'RPL'
        ])  ; 
        DB::table('kelompok_laporan')->insert([
            'no' => 2,
            'id_guru' => 2, 
            'id_data_prakerin' => 7,
            'nama_perusahaan' => 'Feil, Oberbrunner and Gottlieb',
            'no_telpon' => '08999991',
            'jurusan' => 'RPL'
        ])  ; 
        DB::table('kelompok_laporan')->insert([
            'no' => 2,
            'id_guru' => 2, 
            'id_data_prakerin' => 8,
            'nama_perusahaan' => 'Feil, Oberbrunner and Gottlieb',
            'no_telpon' => '08999991',
            'jurusan' => 'RPL'
        ])  ; 
    }
}
