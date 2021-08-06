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
            $getData = Siswa::where('id_kelas', $value->kelas->id)->get();
            $sheets[] = new nilai_prakerinExport($this->siswa, $value->kelas->level,$value->kelas->jurusan->singkatan_jurusan, $getData,$value->kelas->id);
        }
        dd($sheets);
        return $sheets;
    }
}
