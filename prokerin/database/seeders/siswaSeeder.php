<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Faker\Factory as Faker;
class siswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('siswa')->insert([
        'id_user' => '4',
        'nama_siswa' => 'Nur Firdaus',
        'nipd' => '942929291',
        'nisn' => '000000',
        //'jk' => 'L',
        'kelas' => 'X ',
        'jurusan' => 'RPL 3',
        'tempat_lahir' => 'Daratan',
        'tanggal_lahir' => '1998-01-023',
    ]);
    DB::table('siswa')->insert([
        'id_user' => '5',
        'nama_siswa' => 'Rafie Aydin',
        'nipd' => '942929292',
        'nisn' => '000000',
        //'jk' => 'L',
        'kelas' => 'X ',
        'jurusan' => 'RPL 3',
        'tempat_lahir' => 'Daratan',
        'tanggal_lahir' => '1998-01-023',
    ]);
    DB::table('siswa')->insert([
        'id_user' => '6',
        'nama_siswa' => 'Dana',
        'nipd' => '942929293',
        'nisn' => '000000',
        //'jk' => 'L',
        'kelas' => 'X ',
        'jurusan' => 'RPL 3',
        'tempat_lahir' => 'Daratan',
        'tanggal_lahir' => '1998-01-023',
    ]);
    DB::table('siswa')->insert([
        'id_user' => '7',
        'nama_siswa' => 'Walada',
        'nipd' => '942929294',
        'nisn' => '000000',
        //'jk' => 'L',
        'kelas' => 'X ',
        'jurusan' => 'RPL 3',
        'tempat_lahir' => 'Daratan',
        'tanggal_lahir' => '1998-01-023',
    ]);
    DB::table('siswa')->insert([
            'id_user' => '8',

        'nama_siswa' => 'Radit',
        'nipd' => '942929295',
        'nisn' => '000000',
        //'jk' => 'L',
        'kelas' => 'X',
        'jurusan' => 'RPL 3',
        'tempat_lahir' => 'Daratan',
        'tanggal_lahir' => '1998-01-023',
    ]);
    DB::table('siswa')->insert([
            'id_user' => '9',

        'nama_siswa' => 'Falih',
        'nipd' => '942929296',
        'nisn' => '000000',
        //'jk' => 'L',
        'kelas' => 'X',
        'jurusan'=> 'RPL 3',
        'tempat_lahir' => 'Daratan',
        'tanggal_lahir' => '1998-01-023',
    ]);
    DB::table('siswa')->insert([
         'id_user' => '10',
        'nama_siswa' => 'Vik',
        'nipd' => '942929297',
        'nisn' => '000000',
        //'jk' => 'P',
        'kelas' => 'X',
        'jurusan' => 'RPL 3',
        'tempat_lahir' => 'Daratan',
        'tanggal_lahir' => '1998-01-023',
    ]);
    DB::table('siswa')->insert([
        'id_user' => '11',
        'nama_siswa' => 'JiArisa',
        'nipd' => '942929298',
        'nisn' => '000000',
        //'jk' => 'P',
        'kelas' => 'X ',
        'jurusan' => 'RPL 3',
        'tempat_lahir' => 'Daratan',
        'tanggal_lahir' => '1998-01-023',
    ]);
}
}
