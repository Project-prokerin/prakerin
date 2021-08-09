<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class detail_suratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_surat')->insert([
            'id_surat_m' => 1,
            'tgl_surat' => Carbon::now(),
            'no_surat' => '001',
            'created_at' => Carbon::now()
        ]);
        DB::table('detail_surat')->insert([
            'id_surat_m' => 2,
            'tgl_surat' => Carbon::now(),
            'no_surat' => '002',
            'created_at' => Carbon::now()
        ]);
        DB::table('detail_surat')->insert([
            'id_surat_m' => 3,
            'tgl_surat' => Carbon::now(),
            'no_surat' => '003',
            'created_at' => Carbon::now()
        ]);
        DB::table('detail_surat')->insert([
            'id_surat_m' => 4,
            'tgl_surat' => Carbon::now(),
            'no_surat' => '004',
            'created_at' => Carbon::now()
        ]);
    }
}
