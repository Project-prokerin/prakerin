<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Siswa;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'hubin'
        ]);
        DB::table('users')->insert([
            'username' => 'kaprog',
            'password' => Hash::make('admin'),
            'role' => 'kaprog'
        ]);
        DB::table('users')->insert([
            'username' => 'bkk',
            'password' => Hash::make('admin'),
            'role' => 'bkk'
        ]);
        // for ($i = 0; $i < 2; $i++) {
        // DB::table('users')->insert([
        //     'username' => Str::random(9),
        //     'password' => Hash::make('password'),
        //     'role' => 'siswa'
        // ]);
    // }
}
}
