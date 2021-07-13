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

        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 6 ; $i++) {
            DB::table('nilai_prakerin')->insert([
           'id_siswa' => $i,
           'id_kelompok_laporan' => null,
            'nilai' => '0',
            'keterangan' => $faker->randomElement($array = ['A','B','C','D','E']),
            'id_ketegori' => $i,
        ]);
        }

        for ($i = 1; $i <= 3; $i++) {
            DB::table('nilai_prakerin')->insert([
                'id_siswa' => null,
                'id_kelompok_laporan' => $i,
                'nilai' => '0',
                'keterangan' => $faker->randomElement($array = ['A', 'B', 'C', 'D', 'E']),
                'id_ketegori' => $i,
            ]);
        }

    }
}
