<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Isi_suratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('isi_surat')->insert([
            'nama_surat' => "Surat tugas",
            'hari' => "Senin s.d. Sabtu",
            'tanggal' => "25 Januari s.d. 26 Februari 2021",
            'pukul' => "08.00 WIB s.d Selesai ",
            'tempat' => "APKOMINDO ",
            'alamat' => "Ruko Harco Mangga Dua Blok I/28, Jl. Mangga Dua Raya,  Mangga Dua Sel., Sawah Besar, Kota Jakarta Pusat",
            'id_guru' => 1,
            'id_detail_surat_k' => 1,
        ]);
    }
}
