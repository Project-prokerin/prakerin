<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tanda_tanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tanda_tangan')->insert([
            "nama" => "Ramadin Tarigan",
            "path_gambar" => "ttd/default-ttd.png"
        ]);
        DB::table('tanda_tangan')->insert([
            "nama" => "Nur Firdaus",
            "path_gambar" => "ttd/default2-ttd.png"
        ]);
        DB::table('tanda_tangan')->insert([
            "nama" => "Elon Musk",
            "path_gambar" => "ttd/default4-ttd.png"
        ]);
    }
}
