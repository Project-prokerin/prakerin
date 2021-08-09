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
            'nama_surat' => 'surat1',
            'path_surat' => '/surat/surat_masuk/default.pdf',
            'tgl_surat_masuk' => Carbon::today()->toDateString(),
            'id_surat_masuk' => 1,
            'created_at' => Carbon::now()
        ]);
        DB::table('surat_m')->insert([
            'nama_surat' => 'surat2',
            'path_surat' => '/surat/surat_masuk/default.pdf',
            'tgl_surat_masuk' => Carbon::today()->toDateString(),
            'id_surat_masuk' => 2,
            'created_at' => Carbon::now()
        ]);
        DB::table('surat_m')->insert([
            'nama_surat' => 'surat3',
            'path_surat' => '/surat/surat_masuk/default.pdf',
            'tgl_surat_masuk' => Carbon::today()->toDateString(),
            'id_surat_masuk' => 3,
            'created_at' => Carbon::now()
        ]);
        DB::table('surat_m')->insert([
            'nama_surat' => 'surat4',
            'path_surat' => '/surat/surat_masuk/default.pdf',
            'tgl_surat_masuk' => Carbon::today()->toDateString(),
            'id_surat_masuk' => 4,
            'created_at' => Carbon::now()
        ]);
    }
}
