<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class detail_surat_kSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_surat_k')->insert([
            'tgl_surat' => Carbon::now(),
            'no_surat' => '01',
            'id_tanda_tangan' => 1,
            'id_surat_keluar' => 1,
        ]);
    }
}
