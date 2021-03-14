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
        
        $this->call([siswaSeeder::class]);
        $this->call([GuruSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([perusahaanSeeder::class]);
        $this->call([dataprakerinSeeder::class]);
        $this->call([kelompoklaporanSeeder::class]);
        $this->call([kelompoklaporanSeeder::class]);
        $this->call([pembekalanSeeder::class]);
        $this->call([jurnal_prakerinSeeder::class]);
        $this->call([jurnal_harianSeeder::class]);
        $this->call([fasilitas_prakerinSeeder::class]);

    }

}
