<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Siswa;
use Carbon\Carbon;
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
            'password' => Hash::make('password'),
            'role' => 'hubin',
            'created_at' => Carbon::now(),

            'last_logout_at' => NULL
        ]);
        DB::table('users')->insert([
            'username' => 'BidangKaprog',
            'password' => Hash::make('password'),
            'role' => 'kaprog',
            'created_at' => Carbon::now(),

            'last_logout_at' => NULL
        ]);
        DB::table('users')->insert([
            'username' => 'BidangBkk',
            'password' => Hash::make('password'),
            'role' => 'bkk',
            'created_at' => Carbon::now(),

            'last_logout_at' => NULL
        ]);

    DB::table('users')->insert([
        'username' => 'siswa1',
        'password' => Hash::make('password'),
        'role' => 'siswa',
        'created_at' => Carbon::now(),
        'last_logout_at' => NULL
    ]);
    DB::table('users')->insert([
        'username' => 'siswa2',
        'password' => Hash::make('password'),
        'role' => 'siswa',
        'created_at' => Carbon::now(),
        'last_logout_at' => NULL
    ]);
    DB::table('users')->insert([
        'username' => 'siswa3',
        'password' => Hash::make('password'),
        'role' => 'siswa',
        'created_at' => Carbon::now(),
        'last_logout_at' => NULL
    ]);
    DB::table('users')->insert([
        'username' => 'siswa4',
        'password' => Hash::make('password'),
        'role' => 'siswa',
        'created_at' => Carbon::now(),
        'last_logout_at' => NULL
    ]);
    DB::table('users')->insert([
        'username' => 'siswa5',
        'password' => Hash::make('password'),
        'role' => 'siswa',
        'created_at' => Carbon::now(),
        'last_logout_at' => NULL
    ]);
    DB::table('users')->insert([
        'username' => 'siswa6',
        'password' => Hash::make('password'),
        'role' => 'siswa',
        'created_at' => Carbon::now(),
        'last_logout_at' => NULL
    ]);
        DB::table('users')->insert([
            'username' => 'siswa7',
            'password' => Hash::make('password'),
            'role' => 'siswa',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);
        DB::table('users')->insert([
            'username' => 'siswa8',
            'password' => Hash::make('password'),
            'role' => 'siswa',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);
        DB::table('users')->insert([
            'username' => 'BidangTU',
            'password' => Hash::make('password'),
            'role' => 'tu',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);
        DB::table('users')->insert([
            'username' => 'WakaSekolah',
            'password' => Hash::make('password'),
            'role' => 'waka',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);
}
}
