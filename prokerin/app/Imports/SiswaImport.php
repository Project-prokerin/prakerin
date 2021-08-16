<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;
use App\Models\siswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Throwable;

class SiswaImport implements ToCollection,WithHeadingRow,WithValidation,SkipsOnError
{
    use Importable, SkipsErrors;

    /**
    * @param Collection $collection
    */
    public function collection(Collection $row)
    {
        foreach($row as $rows)
        {
            $user =  User::create([
                'username' => $rows['nipd'],
                'role' => 'siswa',
                'password' => Hash::make('password'),
            ]);

            $user->siswa()->create([
                'id_user' => $user->id,
                'nama_siswa' => $rows['nama'],
                'nipd' => $rows['nipd'],
                'nisn' => $rows['nisn'],
                'kelas' => $rows['kelas'],
                'jurusan' => $rows['jurusan'],
                'tempat_lahir' => $rows['tempat_lahir'],
                'tanggal_lahir' =>   $rows['tanggal_lahir'],
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.nipd' => ['unique:siswa,nipd','unique:siswa.users,username'],
        ];
    }

    // public function onError(Throwable $error)
    // {
    // }

}
