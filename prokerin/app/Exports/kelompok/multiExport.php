<?php

namespace App\Exports\kelompok;

use App\Exports\prakerin\data_prakerinExport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Models\data_prakerin;
use App\Models\kelompok_laporan;
use Maatwebsite\Excel\Concerns\Exportable;

class multiExport implements WithMultipleSheets
{
    use Exportable;

    protected $prakerin;
    protected $heading;
    protected $jurusan;
    protected $kelas;

    public function __construct($prakerin, $heading)
    {

        $this->prakerin = $prakerin;
        $this->heading = $heading;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        foreach ($this->prakerin as $key => $value) {
            $getData = kelompok_laporan::where('jurusan', $value->jurusan)->where('kelas', $value->kelas)->get();

            $sheets[] = new kelompokExport($this->prakerin, $this->heading, $value->jurusan, $value->kelas, $getData);
        }
        return $sheets;
    }
}
