<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template_suratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('template_surat')->insert([
            "nama_surat" => "Surat Penugasan guru",
            "path_surat" => "/surat_keluar/template/default.blade.php",
        ]);
    }
}
