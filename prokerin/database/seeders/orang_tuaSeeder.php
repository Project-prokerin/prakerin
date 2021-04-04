<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class orang_tuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 8 ; $i++) {
            DB::table('orang_tua')->insert([
                'id_siswa' => $i,
                'nomor_kk' => '94292929',
                'nama_ayah' => 'Tono',
                'tl_ayah' => Carbon::now()->format('Y-m-d'),
                'pendidikan_ayah' => 'S2',
                'pekerjaan_ayah' => 'Doctor',
                'penghasilan_ayah' => 'Rp. 2.000.000',
                'nik_ayah' => 'NIK3509142012750001',
                'nama_ibu' => 'tana',
                'tl_ibu' => Carbon::now()->format('Y-m-d'),
                'pendidikan_ibu' => 'S1',
                'pekerjaan_ibu' => 'Guru',
                'penghasilan_ibu' =>  'Rp. 2.000.000',
                'nik_ibu' => 'NIK3509142012750001',
                'status' =>  $faker->randomElement($array = array('Kandung', 'Wali')),
                'created_at' => Carbon::now(),
            ]);
        }

    }
}
