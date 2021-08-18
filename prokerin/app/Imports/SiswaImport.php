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
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Throwable;
// use Maatwebsite\Excel\Validators\Failure;
class SiswaImport implements ToCollection,WithHeadingRow,WithValidation,SkipsOnError,SkipsOnFailure
{
    //  import     skip jjika erorr(errors) jskips jika gagal (failurs)
    use Importable, SkipsErrors,SkipsFailures;

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
            // '*.nipd' => ['unique:siswa,nipd','unique:users.username'],
            '*.nipd' => ['unique:siswa,nipd'],

        ];
    }

    // public function onError(Throwable $error)
    // {
    // }



}
