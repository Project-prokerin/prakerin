<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class alumni_siswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 30 ; $i++) {
            DB::table('alumni_siswa')->insert([
                'nama' => $faker->name,
                'kelas' => $faker->randomElement(['X','XI','XII']),
                'jurusan' => $faker->randomElement(['RPL','MM','BC','TKJ']),
                'tahun_lulus' => $faker->randomElement(['2001', '2002', '2003', '2004'])
            ]);
        }

    }
}
