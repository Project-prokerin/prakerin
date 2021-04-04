<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
class asal_sekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 8; $i++) {
            DB::table('sekolah_asal')->insert([
                'id_siswa' => $i,
                'no_ijazah' => 1233456,
                'shkun' => 'sudah',
                'asal_sekolah' =>  $faker->randomElement($array = array('SMK Taruna Bhakti', 'SMPIT AL-Haraki')),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
