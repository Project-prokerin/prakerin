<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            'level' => 'X',
            'jurusan' => 'Rekayasa perangkat lunak',
        ]);
        DB::table('kelas')->insert([
            'level' => 'XI',
            'jurusan' => 'Rekayasa perangkat lunak',
        ]);
        DB::table('kelas')->insert([
            'level' => 'XII',
            'jurusan' => 'Rekayasa perangkat lunak',
        ]);
    }
}
