<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Surat_keluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surat_keluar')->insert([
            'id_dari' => '14', // hubin
            'id_untuk' => '15', // kepsek
            'id_template_surat' => '1',
            'created_at' => Carbon::now()
        ]);
    }
}
