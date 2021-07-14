<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class Penelusuran_tamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        // for ($i=1; $i <=6 ; $i++) {
        DB::table('penelusuran_tamatan')->insert([
            'id_alumni' => 1,
            'status' => 'bekerja',
            'nama_kampus' => null,
            'alamat_kampus' => $faker->address,
            'tahun_masuk_kuliah' => '2025',
            'nama_perusahaan' => $faker->company,
            'alamat_perusahaan' => $faker->address,
            'nama_usaha' => null,
        ]);
        DB::table('penelusuran_tamatan')->insert([
            'id_alumni' => 2,
            'status' => 'kuliah',
            'nama_kampus' => $faker->name,
            'alamat_kampus' => $faker->address,
            'tahun_masuk_kuliah' => '2025',
            'nama_perusahaan' => $faker->company,
            'nama_usaha' => null,
        ]);
        DB::table('penelusuran_tamatan')->insert([
            'id_alumni' => 3,
            'status' => 'Wirausaha',
            'nama_kampus' => null,
            'alamat_kampus' => null,
            'tahun_masuk_kuliah' => null,
            'nama_perusahaan' => null,
            'nama_usaha' => $faker->company,
        ]);
        DB::table('penelusuran_tamatan')->insert([
            'id_alumni' => 4,
            'status' => 'Bekerja dan Kuliah',
            'nama_kampus' => null,
            'alamat_kampus' => $faker->address,
            'tahun_masuk_kuliah' => '2025',
            'nama_perusahaan' => $faker->company,
            'alamat_perusahaan' => $faker->address,
            'nama_usaha' => null,
        ]);
        DB::table('penelusuran_tamatan')->insert([
            'id_alumni' => 5,
            'status' => 'Wirausaha dan Kuliah',
            'nama_kampus' => $faker->name,
            'alamat_kampus' => $faker->address,
            'tahun_masuk_kuliah' => '2025',
            'nama_perusahaan' => null,
            'nama_usaha' => $faker->company,
        ]);
    }
}
