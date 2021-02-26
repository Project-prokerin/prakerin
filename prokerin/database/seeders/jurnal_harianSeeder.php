<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class jurnal_harianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));
        for ($i = 1; $i < 7; $i++) {
            for ($j = 1; $j < 10; $j++) {
                DB::table('jurnal_harian')->insert([
                    'tanggal' =>  $faker->dateTimeBetween(Carbon::now()->format('Y-m-d'), Carbon::now()->addMonth(6)->format('Y-m-d')),
                    'datang' => $faker->dateTimeBetween($startDate = '7:00:00', $endDate = '8:00:00'),
                    'pulang' => $faker->dateTimeBetween($startDate = '12:00:00', $endDate = '15:00:00'),
                    'kegiatan_harian' => $faker->text($maxNbChars = 100),
                    'id_siswa' => $i,
                    'id_perusahaan' => $i,
                ]);
            }
        }
    }
}
