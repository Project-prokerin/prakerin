<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Provider\en_US\Company;
use Faker\Provider\en_US\Address;
use Faker\Provider\Lorem;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class perusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 2; $i++) {
        DB::table('perusahaan')->insert([
                'foto' => 'default.png',
                'nama' => $faker->company,
                'lokasi' => $faker->address,
                'nama_petinggi' => $faker->name,
                'deskripsi_perusahaan' => $faker->text($maxNbChars = 200),
                'tanggal_mou' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'status_mou' => $faker->randomElement($array = array('7 Tahun', '8 Tahun', '9 Tahun', '10 Tahun')),
        ]);
    }
}
}
