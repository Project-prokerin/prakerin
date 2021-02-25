<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $jurusan = ['RPL','MM','TKJ','BC'];
         for ($i = 0; $i < 6; $i++) {
        DB::table('guru')->insert([
            'nik' => $faker->nik,
            'nama' => $faker->title."".$faker->name,
            'jabatan' => 'Guru',
            'jurusan' => $faker->randomElement($jurusan),
            'no_telp' => $faker->randomNumber(9),
        ]);
         }
    }
}
