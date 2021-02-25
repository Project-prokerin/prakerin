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
        $faker = Faker::create('id_ID');
        $jurusan = ['RPL','MM','TKJ','BC'];
        $jk = ['L','P'];
    //      for ($i = 0; $i < 6; $i++) {
    //     DB::table('siswa')->insert([
    //         'nama_siswa' => $faker->name,
    //         'nipd' => $faker->randomNumber(8),
    //         'jk' => $faker->randomElement($jk),
    //         'tempat_lahir' => $faker->streetAddress,
    //         'tanggal_lahir' => $faker->date,
    //         'nik' => $faker->nik,
    //         'agama' => 'ISLAM',
    //         'alamat' => $faker->address."CodePOS".$faker->postcode,
    //         'jenis_tinggal' =>'SOLO/SENDIRI',
    //         'transportasi' => 'Jalan kaki',
    //         'no_hp' =>  $faker->randomNumber(8),
    //         'email' => $faker->email,
    //         'bb' =>  '49',
    //         'tb' => '170',
    //         'anak_ke' => '1',
    //         'jmlh_saudara' => '3',
    //         'kebutuhan_khusus' => 'Tidak ada',
    //         'no_akte' => $faker->randomNumber(7),
    //     ]);
    // }

    DB::table('siswa')->insert([
        'nama_siswa' => 'Nur Firdaus',
        'nipd' => '94292929',
        'jk' => 'L',
        'tempat_lahir' => 'Daratan',
        'tanggal_lahir' => '1998-01-023',
        'nik' => '083749748',
        'agama' => 'ISLAM',
        'alamat' => 'JL.Gas alam',
        'jenis_tinggal' =>'SOLO/SENDIRI',
        'transportasi' => 'Jalan kaki',
        'no_hp' =>  '0812131124',
        'email' => 'siswa@siswa.com',
        'bb' =>  '49',
        'tb' => '170',
        'anak_ke' => '1',
        'jmlh_saudara' => '3',
        'kebutuhan_khusus' => 'Tidak ada',
        'no_akte' => '849843394',
    ]);
    DB::table('siswa')->insert([
        'nama_siswa' => 'Rafie Aydin',
        'nipd' => '94292929',
        'jk' => 'L',
        'tempat_lahir' => 'Daratan',
        'tanggal_lahir' => '1998-01-023',
        'nik' => '083749748',
        'agama' => 'ISLAM',
        'alamat' => 'JL.Gas alam',
        'jenis_tinggal' =>'SOLO/SENDIRI',
        'transportasi' => 'Jalan kaki',
        'no_hp' =>  '0812131124',
        'email' => 'siswa@siswa.com',
        'bb' =>  '49',
        'tb' => '170',
        'anak_ke' => '1',
        'jmlh_saudara' => '3',
        'kebutuhan_khusus' => 'Tidak ada',
        'no_akte' => '849843394',
    ]);
    DB::table('siswa')->insert([
        'nama_siswa' => 'Dana',
        'nipd' => '94292929',
        'jk' => 'L',
        'tempat_lahir' => 'Daratan',
        'tanggal_lahir' => '1998-01-023',
        'nik' => '083749748',
        'agama' => 'ISLAM',
        'alamat' => 'JL.Gas alam',
        'jenis_tinggal' =>'SOLO/SENDIRI',
        'transportasi' => 'Jalan kaki',
        'no_hp' =>  '0812131124',
        'email' => 'siswa@siswa.com',
        'bb' =>  '49',
        'tb' => '170',
        'anak_ke' => '1',
        'jmlh_saudara' => '3',
        'kebutuhan_khusus' => 'Tidak ada',
        'no_akte' => '849843394',
    ]);
    DB::table('siswa')->insert([
        'nama_siswa' => 'Walada',
        'nipd' => '94292929',
        'jk' => 'L',
        'tempat_lahir' => 'Daratan',
        'tanggal_lahir' => '1998-01-023',
        'nik' => '083749748',
        'agama' => 'ISLAM',
        'alamat' => 'JL.Gas alam',
        'jenis_tinggal' =>'SOLO/SENDIRI',
        'transportasi' => 'Jalan kaki',
        'no_hp' =>  '0812131124',
        'email' => 'siswa@siswa.com',
        'bb' =>  '49',
        'tb' => '170',
        'anak_ke' => '1',
        'jmlh_saudara' => '3',
        'kebutuhan_khusus' => 'Tidak ada',
        'no_akte' => '849843394',
    ]);
    DB::table('siswa')->insert([
        'nama_siswa' => 'Radit',
        'nipd' => '94292929',
        'jk' => 'L',
        'tempat_lahir' => 'Daratan',
        'tanggal_lahir' => '1998-01-023',
        'nik' => '083749748',
        'agama' => 'ISLAM',
        'alamat' => 'JL.Gas alam',
        'jenis_tinggal' =>'SOLO/SENDIRI',
        'transportasi' => 'Jalan kaki',
        'no_hp' =>  '0812131124',
        'email' => 'siswa@siswa.com',
        'bb' =>  '49',
        'tb' => '170',
        'anak_ke' => '1',
        'jmlh_saudara' => '3',
        'kebutuhan_khusus' => 'Tidak ada',
        'no_akte' => '849843394',
    ]);
    DB::table('siswa')->insert([
        'nama_siswa' => 'Falih',
        'nipd' => '94292929',
        'jk' => 'L',
        'tempat_lahir' => 'Daratan',
        'tanggal_lahir' => '1998-01-023',
        'nik' => '083749748',
        'agama' => 'ISLAM',
        'alamat' => 'JL.Gas alam',
        'jenis_tinggal' =>'SOLO/SENDIRI',
        'transportasi' => 'Jalan kaki',
        'no_hp' =>  '0812131124',
        'email' => 'siswa@siswa.com',
        'bb' =>  '49',
        'tb' => '170',
        'anak_ke' => '1',
        'jmlh_saudara' => '3',
        'kebutuhan_khusus' => 'Tidak ada',
        'no_akte' => '849843394',
    ]);
}
}
