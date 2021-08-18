<?php

namespace App\Imports;

use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\perusahaan;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class PerusahaanImport implements ToModel,WithHeadingRow
{
   //  import     skip jjika erorr(errors) jskips jika gagal (failurs)
    // use Importable, SkipsErrors,SkipsFailures;

    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new perusahaan([
            'nama' => $row['nama'],
            'bidang_usaha' => $row['bidang_usaha'],
            'alamat' => $row['alamat'],
            'link' => $row['link'],
            'foto' => $row['foto'],
            'email' => $row['email'],
            'nama_pemimpin' => $row['nama_pemimpin'],
            'deskripsi_perusahaan' => $row['deskripsi_perusahaan'],
            'tanggal_mou' => $row['tanggal_mou'],
            'status_mou' => $row['status_mou'],
        ]);
    }
}
