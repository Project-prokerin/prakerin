<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            'id_jurusan' => '1',
            'created_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'level' => 'X',
            'id_jurusan' => '2',
            'created_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'level' => 'X',
            'id_jurusan' => '3',
            'created_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'level' => 'X',
            'id_jurusan' => '4',
            'created_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'level' => 'X',
            'id_jurusan' => '5',
            'created_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'level' => 'XI',
            'id_jurusan' => '1',
            'created_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'level' => 'XI',
            'id_jurusan' => '2',
            'created_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'level' => 'XI',
            'id_jurusan' => '3',
            'created_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'level' => 'XI',
            'id_jurusan' => '4',
            'created_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'level' => 'XI',
            'id_jurusan' => '5',
            'created_at' => Carbon::now()
        ]);
        DB::table('kelas')->insert([
            'level' => 'XII',
            'id_jurusan' => '1',
            'created_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'level' => 'XII',
            'id_jurusan' => '2',
            'created_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'level' => 'XII',
            'id_jurusan' => '3',
            'created_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'level' => 'XII',
            'id_jurusan' => '4',
            'created_at' => Carbon::now()
        ]);

        DB::table('kelas')->insert([
            'level' => 'Xii',
            'id_jurusan' => '5',
            'created_at' => Carbon::now()
        ]);


    }
}
