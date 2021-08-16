<?php

namespace App\Exports\nilai_prakerin\siswa;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Models\Siswa;

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
            $getData = Siswa::where([['kelas', $value->kelas],['jurusan',$value->jurusan]])->get();
            $sheets[] = new nilai_prakerinExport($this->siswa, $value->kelas,$value->jurusan, $getData);
        }
        // dd($sheets);
        return $sheets;
    }
}
