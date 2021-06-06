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
            'id_template_surat' => 1,
            'no_surat' => '01',
            'tgl_surat' => Carbon::now(),
            'path_surat' => '/file/surat_keluar/surat/default.pdf',
            'id_tanda_tangan' => 1,
            'id_surat_keluar' => 1,
        ]);
    }
}
