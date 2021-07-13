<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class kategori_nilai_prakerinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i <= 16 ; $i++) {
            DB::table('kategori_nilai_prakerin')->insert([
                'aspek_yang_dinilai' => $faker->randomElement($array = ['intensif', 'kedisiplinan', 'tanggung jawab']),
                'jurusan' => $faker->randomElement($array =  ['RPL', 'BC', 'TKJ', 'TEI', 'MM']),
                'domain' => $faker->randomElement(['pelaksanaan', 'ketrampilan']),
                'keterangan' => $faker->randomElement(['Nilai Sekolah', 'Nilai Perusahaan']),
            ]);
        }
    }
}
