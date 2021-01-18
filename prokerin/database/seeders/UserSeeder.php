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
        for ($i = 0; $i < 2; $i++) {
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->name . '@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'siswa'
        ]);
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->name . '@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'kaprok'
        ]);
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->name . '@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'hubin'
        ]);
    }
}
}
