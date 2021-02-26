<?php

namespace Database\Seeders;

use Faker\Factory as Faker;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pembekalanSeeder extends Seeder
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
        for ($i=1; $i <= 6 ; $i++) {
            DB::table('pembekalan_magang')->insert([
                'test_wpt_iq' => $faker->randomElement($array = array('sudah','belum')),
                'personality_interview' => $faker->randomElement($array = array('sudah', 'belum')),
                'soft_skill' => $faker->randomElement($array = array('sudah', 'belum')),
                'file_portofolio' => 'default.jpg',
                'id_siswa' => $i ,
                'created_at' => Carbon::now()
            ]);
        }
    }
}
