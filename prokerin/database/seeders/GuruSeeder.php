<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

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
         for ($i = 0; $i <= 6; $i++) {
        DB::table('guru')->insert([
            'nik' => $faker->nik,
            'nama' => $faker->title."".$faker->name,
            'jabatan' => 'Kejuruan',
            'jurusan' => $faker->randomElement($jurusan),
            'no_telp' => $faker->randomNumber(9),
        ]);
        }
        // admin
        DB::table('guru')->insert([
            'id_user' => '1',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'hubin',
            'jurusan' => $faker->randomElement($jurusan),
            'no_telp' => $faker->randomNumber(9),
        ]);
        DB::table('guru')->insert([
            'id_user' => '2',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'kaprok',
            'jurusan' => $faker->randomElement($jurusan),
            'no_telp' => $faker->randomNumber(9),
        ]);
        DB::table('guru')->insert([
            'id_user' => '3',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'bkk',
            'jurusan' => $faker->randomElement($jurusan),
            'no_telp' => $faker->randomNumber(9),
        ]);
        DB::table('guru')->insert([
            'id_user' => '12',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'tu',
            'jurusan' => $faker->randomElement($jurusan),
            'no_telp' => $faker->randomNumber(9),
        ]);
        DB::table('guru')->insert([
            'id_user' => '13',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'waka',
            'jurusan' => $faker->randomElement($jurusan),
            'no_telp' => $faker->randomNumber(9),
        ]);

    }

}
