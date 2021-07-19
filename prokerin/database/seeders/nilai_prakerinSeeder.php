<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class nilai_prakerinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $faker = Faker::create('id_ID');
                DB::table('nilai_prakerin')->insert([
                    'id_siswa' => 1,
                    'id_kelompok_laporan' => null,
                    'nilai' => '90',
                    'keterangan' => 'A',
                    'id_ketegori' => 3,
                ]);
                DB::table('nilai_prakerin')->insert([
                    'id_siswa' => 1,
                    'id_kelompok_laporan' => null,
                    'nilai' => '75',
                    'keterangan' => 'B',
                    'id_ketegori' => 2,
                ]);
                DB::table('nilai_prakerin')->insert([
                    'id_siswa' => 1,
                    'id_kelompok_laporan' => null,
                    'nilai' => '40',
                    'keterangan' => 'D',
                    'id_ketegori' => 1,
                ]);

                
                DB::table('nilai_prakerin')->insert([
                    'id_siswa' => 2,
                    'id_kelompok_laporan' => null,
                    'nilai' => '80',
                    'keterangan' => 'B',
                    'id_ketegori' => 5,
                ]);
                DB::table('nilai_prakerin')->insert([
                    'id_siswa' => 2,
                    'id_kelompok_laporan' => null,
                    'nilai' => '20',
                    'keterangan' => 'D',
                    'id_ketegori' => 1,
                ]);
                DB::table('nilai_prakerin')->insert([
                    'id_siswa' => 2,
                    'id_kelompok_laporan' => null,
                    'nilai' => '90',
                    'keterangan' => 'A',
                    'id_ketegori' => 3,
                ]);
             
               
             
        // }


        // for ($i = 1; $i <= 3; $i++) {
        //     DB::table('nilai_prakerin')->insert([
        //         'id_siswa' => null,
        //         'id_kelompok_laporan' => $i,
        //         'nilai' => '0',
        //         'keterangan' => $faker->randomElement($array = ['A', 'B', 'C', 'D', 'E']),
        //         'id_ketegori' => $i,
        //     ]);
        // }

    }
}
