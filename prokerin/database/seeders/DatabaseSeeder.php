<?php

namespace Database\Seeders;

use App\Models\data_prakerin;
use App\Models\fasilitas_prakerin;
use App\Models\guru;
use App\Models\jurnal_harian;
use App\Models\jurnal_prakerin;
use App\Models\orang_tua;
use App\Models\pembekalan_magang;
use \App\Models\perusahaan;
use App\Models\sekolah_asal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;
use App\Models\Siswa;
use Database\Factories\perusahaanFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class]);
        $this->call([perusahaanSeeder::class]);

        $perusahaan = perusahaan::factory()->create();
        $guru = guru::factory()->create();

        $siswa = Siswa::factory()
            // ->has(data_prakerin::factory(), 'data_prakerin')
            ->has(User::factory(), 'user')
            ->has(orang_tua::factory(), 'orang_tua')
            ->has(sekolah_asal::factory(), 'sekolah_asal')
            ->has(pembekalan_magang::factory(), 'pembekalan_magang')
            ->create();

        $data_prakerin = data_prakerin::factory()
                        ->for($perusahaan)
                        ->for($guru)
                        ->for($siswa)
                        ->count(5)
                        ->create();

        $jurnal_harian = jurnal_harian::factory()
                    ->for($perusahaan)
                    ->for($siswa)
                    ->count(5)
                    ->create();
        $jurnal_prakerin = jurnal_prakerin::factory()
                    ->for($perusahaan)
                    ->for($siswa)
                    ->count(5)
                    ->has(fasilitas_prakerin::factory(),'fasilitas_prakerin')
                    ->create();
    }
}
