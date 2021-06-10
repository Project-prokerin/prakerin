<?php

namespace App\Exports\siswa;

use App\Models\kelas;
use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class multiExport implements WithMultipleSheets
{
    private $siswa;
    private $headings;
    public function __construct($siswa)
    {
        $this->siswa = $siswa;
    }
    public function sheets(): array
    {
        $sheets = [];
        foreach ($this->siswa as $key => $value) {
            $getData = Siswa::where('id_kelas', $value->kelas->id)->get();
            $sheets[] = new SiswaExport($this->siswa, $value->kelas->level,$value->kelas->jurusan, $getData,$value->kelas->id);
        }

        return $sheets;
    }
}
