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
        DB::table('users')->insert([
            'username' => 'siswa',
            'password' => Hash::make('123456'),
            'role' => 'siswa'
        ]);
        // for ($i = 0; $i < 2; $i++) {
        // DB::table('users')->insert([
        //     'username' => Str::random(9),
        //     'password' => Hash::make('password'),
        //     'role' => 'siswa'
        // ]);
    // }
    DB::table('users')->insert([
        'username' => 'siswa1',
        'password' => Hash::make('123456'),
        'id_siswa' => '1',
        'role' => 'siswa'
    ]);
    DB::table('users')->insert([
        'username' => 'siswa2',
        'password' => Hash::make('123456'),
        'id_siswa' => '2',
        'role' => 'siswa'
    ]);
    DB::table('users')->insert([
        'username' => 'siswa3',
        'password' => Hash::make('123456'),
        'id_siswa' => '3',
        'role' => 'siswa'
    ]);
    DB::table('users')->insert([
        'username' => 'siswa4',
        'password' => Hash::make('123456'),
        'id_siswa' => '4',
        'role' => 'siswa'
    ]);
    DB::table('users')->insert([
        'username' => 'siswa5',
        'password' => Hash::make('123456'),
        'id_siswa' => '5',
        'role' => 'siswa'
    ]);
    DB::table('users')->insert([
        'username' => 'siswa6',
        'password' => Hash::make('123456'),
        'id_siswa' =>  '6',
        'role' => 'siswa'
    ]);
}
}
