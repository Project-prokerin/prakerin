<?php

namespace App\Exports\prakerin;

use App\Exports\prakerin\data_prakerinExport;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Models\data_prakerin;

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
            $getData = data_prakerin::where('jurusan', $value->jurusan)->where('kelas', $value->kelas)->get();
            $sheets[] = new data_prakerinExport($this->prakerin, $this->heading, $value->jurusan, $value->kelas, $getData);
        }
        return $sheets;
    }
}
