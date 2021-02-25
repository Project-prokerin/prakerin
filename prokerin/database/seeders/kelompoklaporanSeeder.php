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
            'id_data_prakerin' => 1 
        ])  ; 
        DB::table('kelompok_laporan')->insert([
            'no' => 1,
            'id_guru' => 1, 
            'id_data_prakerin' => 2
        ])  ; 
        DB::table('kelompok_laporan')->insert([
            'no' => 1,
            'id_guru' => 1, 
            'id_data_prakerin' => 3
        ])  ; 
        DB::table('kelompok_laporan')->insert([
            'no' => 2,
            'id_guru' => 2, 
            'id_data_prakerin' => 4
        ])  ; 
        DB::table('kelompok_laporan')->insert([
            'no' => 2,
            'id_guru' => 2, 
            'id_data_prakerin' => 5
        ])  ; 
        DB::table('kelompok_laporan')->insert([
            'no' => 2,
            'id_guru' => 2, 
            'id_data_prakerin' => 6
        ])  ; 
     
    }
}
