<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class surat_mSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surat_m')->insert([
            'nama_surat' => 'surat test',
            'path_surat' => '/surat/surat_masuk/default.jpg',
            'tgl_surat_masuk' => Carbon::today()->toDateString(),
            'id_surat_masuk' => 1,
            'created_at' => Carbon::now()
        ]);
    }
}
