<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class fasilitas_prakerinSeeder extends Seeder
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
        for ($i=1; $i <= 54 ; $i++) {
            DB::table('fasilitas_prakerin')->insert([
                'id_jurnal_prakerin' => $i,
                'mess' =>  $faker->randomElement($array = array('iya', 'tidak')),
                'buss_antar_jemput' =>  $faker->randomElement($array = array('iya', 'tidak')),
                'makan_siang' =>  $faker->randomElement($array = array('iya', 'tidak')),
                'intensif' =>  $faker->randomElement($array = array('iya', 'tidak')),
            ]);
        }
    }
}
