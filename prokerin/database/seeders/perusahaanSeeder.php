<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Provider\en_US\Company;
use Faker\Provider\en_US\Address;
use Faker\Provider\Lorem;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Faker\Provider\Internet;
use Carbon\Carbon;

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
        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));
        for ($i = 0; $i < 20 ; $i++) {
        DB::table('perusahaan')->insert([
                'nama' => $faker->company,
                'foto' => 'default.jpg',
                'bidang_usaha' => $faker->randomElement($array = array('RPL','BC','TKJ','MM')),
                'alamat' => $faker->address,
                'link' => $faker->url,
                'email' => $faker->email,
                'nama_pemimpin' => $faker->name,
                'deskripsi_perusahaan' => $faker->text(1000),
                'tanggal_mou' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'status_mou' => $faker->randomElement($array = array('7 Tahun', '8  Tahun', '9 Tahun', '10 Tahun')),
                'created_at' => Carbon::now()
        ]);



    }
}
}
