<?php

namespace App\Exports\siswa;

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
            $getData = Siswa::where('jurusan', $value->jurusan)->where('kelas', $value->kelas)->get();
            // dd($value->jurusan);
            $sheets[] = new SiswaExport($this->siswa, $value->kelas,$value->jurusan, $getData);
        }
        return $sheets;
    }
}
