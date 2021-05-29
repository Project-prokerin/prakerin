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
            'id_dari' => '12', // waka
            'id_untuk' => '8', // hubin
        ]);
    }
}
