<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
            'id_dari' => '12', // tu
            'id_untuk' => '15', // kepsek
            'created_at' => Carbon::now()
        ]);
        DB::table('surat_masuk')->insert([
            'id_dari' => '12', // tu
            'id_untuk' => '15', // kepsek
            'created_at' => Carbon::now()
        ]);
        DB::table('surat_masuk')->insert([
            'id_dari' => '12', // tu
            'id_untuk' => '15', // kepsek
            'created_at' => Carbon::now()
        ]);
        DB::table('surat_masuk')->insert([
            'id_dari' => '12', // tu
            'id_untuk' => '15', // kepsek
            'created_at' => Carbon::now()
        ]);
    }
}
