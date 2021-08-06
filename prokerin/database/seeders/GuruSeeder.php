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
            'jabatan' => 'kejuruan',
            'id_jurusan'=> $faker->randomElement($array = array(1,2,3,4,5)),
            'no_telp' => $faker->randomNumber(9),
        ]);
        }
        DB::table('guru')->insert([
            'id_user' => '1',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'hubin',
            'id_jurusan'=> null,
            'no_telp' => $faker->randomNumber(9),
        ]);
        DB::table('guru')->insert([
            'id_user' => '2',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'kaprog',
            'id_jurusan'=> 1
,            'no_telp' => $faker->randomNumber(9),
        ]);
        DB::table('guru')->insert([
            'id_user' => '3',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'bkk',
            'id_jurusan'=> null
,            'no_telp' => $faker->randomNumber(9),
        ]);
        DB::table('guru')->insert([
            'id_user' => '12',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'tu',
            'id_jurusan'=> 1
,            'no_telp' => $faker->randomNumber(9),
        ]);
        DB::table('guru')->insert([
            'id_user' => '13',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'kurikulum',
            'id_jurusan' => null,
            'no_telp' => $faker->randomNumber(9),
        ]);
        DB::table('guru')->insert([
            'id_user' => '14',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'kesiswaan',
            'id_jurusan' => null,
            'no_telp' => $faker->randomNumber(9),
        ]);
        DB::table('guru')->insert([
            'id_user' => '15',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'litbang',
            'id_jurusan' => null,
            'no_telp' => $faker->randomNumber(9),
        ]);
        DB::table('guru')->insert([
            'id_user' => '16',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'kepsek',
            'id_jurusan' => null,
            'no_telp' => $faker->randomNumber(9),
        ]);
        DB::table('guru')->insert([
            'id_user' => '17',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'hubin',
            'id_jurusan' => null,
            'no_telp' => $faker->randomNumber(9),
        ]);
        DB::table('guru')->insert([
            'id_user' => '18',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'sarpras',
            'id_jurusan' => null,
            'no_telp' => $faker->randomNumber(9),
        ]);

        //  kelompok prakerin
        DB::table('guru')->insert([
            'id_user' => '19',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'pembimbing',
            'id_jurusan' => null,
            'no_telp' => $faker->randomNumber(9),
        ]);

        DB::table('guru')->insert([
            'id_user' => '20',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'pembimbing',
            'id_jurusan' => null,
            'no_telp' => $faker->randomNumber(9),
        ]);
        // data prakerin
         DB::table('guru')->insert([
            'id_user' => '21',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'pembimbing',
            'id_jurusan' => null,
            'no_telp' => $faker->randomNumber(9),
        ]);
        DB::table('guru')->insert([
            'id_user' => '22',
            'nik' => $faker->nik,
            'nama' => $faker->title . "" . $faker->name,
            'jabatan' => 'pembimbing',
            'id_jurusan' => null,
            'no_telp' => $faker->randomNumber(9),
        ]);
    }

}
