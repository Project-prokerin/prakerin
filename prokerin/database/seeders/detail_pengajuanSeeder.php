<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class detail_pengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_pengajuan_prakerin')->insert([
            'id_pengajuan_prakerin' => 4,
            'no_surat' => '001'
        ]);
      
      
    }
}
