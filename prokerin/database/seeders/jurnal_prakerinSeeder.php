<?php

namespace Database\Seeders;

// use Illuminate\Database\Seeder;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class jurnal_prakerinSeeder extends Seeder
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
        for ($i=1; $i < 7 ; $i++) {
            for ($j=1; $j < 10 ; $j++) {
                DB::table('jurnal_prakerin')->insert([
                    'kompetisi_dasar' =>  $faker->text($maxNbChars = 100),
                    'topik_pekerjaan' => $faker->randomElement($array = array('Membuat web perusahaan', 'Membuat desain perusahaan')),
                    'hari_pelaksanaan' =>  $faker->dateTimeBetween(Carbon::now()->format('Y-m-d'), Carbon::now()->addMonth(6)->format('Y-m-d')),
                    'jam_masuk' => $faker->dateTimeBetween($startDate = '7:00:00', $endDate = '8:00:00'),
                    'jam_istirahat' => $faker->dateTimeBetween($startDate = '9:00:00', $endDate = '10:00:00'),
                    'jam_pulang' =>  $faker->dateTimeBetween($startDate = '12:00:00', $endDate = '15:00:00'),
                    'id_perusahaan' => $i,
                    'id_siswa' => $i
                ]);
            }
        }
    }
}
