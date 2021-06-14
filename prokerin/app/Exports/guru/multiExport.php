<?php

namespace App\Exports\guru;

use App\Exports\guru\guruExport;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Models\data_prakerin;
use App\Exports\guru\data_guruExport;
use App\Models\guru;

class multiExport implements WithMultipleSheets
{
    use Exportable;

    protected $guru;
    protected $heading;
    protected $jurusan;
    protected $kelas;

    public function __construct($guru, $heading)
    {

        $this->guru = $guru;
        $this->heading = $heading;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        foreach ($this->guru as $key => $value) {
            $getData = guru::where('jurusan', $value->jurusan)->get();
            // dd(count($getData));
            $sheets[] = new data_guruExport($this->guru, $this->heading, $value->jurusan->jurusan, $getData);
        }
        return $sheets;
    }
}
