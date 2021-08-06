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
            'role' => 'admin',
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

        for ($i=1; $i <= 8 ; $i++) {
            DB::table('users')->insert([
                'username' => "siswa$i",
                'password' => Hash::make('password'),
                'role' => 'siswa',
                'created_at' => Carbon::now(),
                'last_logout_at' => NULL
            ]);
        }
        DB::table('users')->insert([
            'username' => 'BidangTU',
            'password' => Hash::make('password'),
            'role' => 'tu',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);
        DB::table('users')->insert([
            'username' => 'Kurikulum',
            'password' => Hash::make('password'),
            'role' => 'kurikulum',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);
        DB::table('users')->insert([
            'username' => 'Kesiswaan',
            'password' => Hash::make('password'),
            'role' => 'kesiswaan',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);
        DB::table('users')->insert([
            'username' => 'litbang',
            'password' => Hash::make('password'),
            'role' => 'litbang',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);
        DB::table('users')->insert([
            'username' => 'KepalaSekolah',
            'password' => Hash::make('password'),
            'role' => 'kepsek',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);
        DB::table('users')->insert([
            'username' => 'hubin',
            'password' => Hash::make('password'),
            'role' => 'hubin',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);
        DB::table('users')->insert([
            'username' => 'Sarpras',
            'password' => Hash::make('password'),
            'role' => 'sarpras',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);

        // Kelompok prakeirn

        DB::table('users')->insert([
            'username' => 'Pembimbing',
            'password' => Hash::make('password'),
            'role' => 'pembimbing',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);

        DB::table('users')->insert([
            'username' => 'Pembimbing1',
            'password' => Hash::make('password'),
            'role' => 'pembimbing',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);

        // Data prakerin

        DB::table('users')->insert([
            'username' => 'Pembimbing2',
            'password' => Hash::make('password'),
            'role' => 'pembimbing',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);

          DB::table('users')->insert([
            'username' => 'Pembimbing3',
            'password' => Hash::make('password'),
            'role' => 'pembimbing',
            'created_at' => Carbon::now(),
            'last_logout_at' => NULL
        ]);

}
}
