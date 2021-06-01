<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class surat_masukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surat_masuk')->insert([
            'id_dari' => '14', // tu
            'id_untuk' => '15', // kepsek
        ]);
    }
}
