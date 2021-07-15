<?php

namespace App\Imports;

use App\Models\alumni_siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Alumni_siswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new alumni_siswa([
            'nama' => $row['nama'],
            'kelas' => $row['kelas'],
            'jurusan' => $row['jurusan'],
            'tahun_lulus' => $row['tahun_lulus'],
        ]);
    }
}
