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
            'jurusan' => 'Rekayasa Perangkat Lunak',
        ]);

        DB::table('kelas')->insert([
            'level' => 'X',
            'jurusan' => 'Broadcasting',
        ]);

        DB::table('kelas')->insert([
            'level' => 'X',
            'jurusan' => 'Multimedia',
        ]);

        DB::table('kelas')->insert([
            'level' => 'X',
            'jurusan' => 'Teknologi Kominikasi Jaringan',
        ]);

        DB::table('kelas')->insert([
            'level' => 'X',
            'jurusan' => 'Teknik Elektonika Industri',
        ]);

        DB::table('kelas')->insert([
            'level' => 'XI',
            'jurusan' => 'Rekayasa Perangkat Lunak',
        ]);

        DB::table('kelas')->insert([
            'level' => 'XI',
            'jurusan' => 'Broadcasting',
        ]);

        DB::table('kelas')->insert([
            'level' => 'XI',
            'jurusan' => 'Multimedia',
        ]);

        DB::table('kelas')->insert([
            'level' => 'XI',
            'jurusan' => 'Teknologi Kominikasi Jaringan',
        ]);

        DB::table('kelas')->insert([
            'level' => 'XI',
            'jurusan' => 'Teknik Elektonika Industri',
        ]);
        DB::table('kelas')->insert([
            'level' => 'Xii',
            'jurusan' => 'Rekayasa Perangkat Lunak',
        ]);

        DB::table('kelas')->insert([
            'level' => 'Xii',
            'jurusan' => 'Broadcasting',
        ]);

        DB::table('kelas')->insert([
            'level' => 'Xii',
            'jurusan' => 'Multimedia',
        ]);

        DB::table('kelas')->insert([
            'level' => 'Xii',
            'jurusan' => 'Teknologi Kominikasi Jaringan',
        ]);

        DB::table('kelas')->insert([
            'level' => 'Xii',
            'jurusan' => 'Teknik Elektonika Industri',
        ]);

       
    }
}
