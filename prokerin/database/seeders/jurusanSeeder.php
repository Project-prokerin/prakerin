<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class jurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusan')->insert([
            'singkatan_jurusan' => 'RPL',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'created_at' => Carbon::now()
        ]);
        DB::table('jurusan')->insert([
            'singkatan_jurusan' => 'BC',
            'jurusan' => 'Broadcasting',
            'created_at' => Carbon::now()
        ]);

        DB::table('jurusan')->insert([
            'singkatan_jurusan' => 'MM',
            'jurusan' => 'Multimedia',
            'created_at' => Carbon::now()
        ]);

        DB::table('jurusan')->insert([
            'singkatan_jurusan' => 'TKJ',
            'jurusan' => 'Teknologi Kominikasi Jaringan',
            'created_at' => Carbon::now()
        ]);

        DB::table('jurusan')->insert([
            'singkatan_jurusan' => 'TEI',
            'jurusan' => 'Teknologi Elektromatika Industru',
            'created_at' => Carbon::now()
        ]);
    }
}
