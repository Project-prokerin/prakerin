<?php

namespace Database\Seeders;

use App\Models\data_prakerin;
use App\Models\Disposisi;
use App\Models\fasilitas_prakerin;
use App\Models\guru;
use App\Models\jurnal_harian;
use App\Models\jurnal_prakerin;
use App\Models\laporan_prakerin;
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
        $this->call([jurusanSeeder::class]);
        $this->call([KelasSeeder::class]);
        $this->call([siswaSeeder::class]);
        $this->call([GuruSeeder::class]);
        $this->call([perusahaanSeeder::class]);
        $this->call([dataprakerinSeeder::class]);
        $this->call([kelompoklaporanSeeder::class]);
        $this->call([Pengajuan_prakerinSeeder::class]);
        $this->call([detail_pengajuanSeeder::class]);
        // $this->call([kelompoklaporanSeeder::class]);
        $this->call([pembekalanSeeder::class]);
        $this->call([LaporanPrakerinSeeder::class]);
        $this->call([jurnal_prakerinSeeder::class]);
        $this->call([jurnal_harianSeeder::class]);
        $this->call([fasilitas_prakerinSeeder::class]);
        $this->call([surat_masukSeeder::class]);
        $this->call([surat_mSeeder::class]);
        $this->call([detail_suratSeeder::class]);
        $this->call([disposisiSeeder::class]);
        $this->call([Tanda_tanganSeeder::class]);
        $this->call([Template_suratSeeder::class]);
        $this->call([Surat_keluarSeeder::class]);
        $this->call([detail_surat_kSeeder::class]);
        $this->call([Isi_suratSeeder::class]);
        $this->call([alumni_siswaSeeder::class]);
        $this->call([Penelusuran_tamatanSeeder::class]);
        $this->call([kategori_nilai_prakerinSeeder::class]);
        $this->call([nilai_prakerinSeeder::class]);
    }

}
