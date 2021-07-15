<?php

namespace App\Exports\prakerin\export_1;

use App\Exports\prakerin\export_1\data_prakerinExport;
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
            $getData = data_prakerin::where('id_kelas', $value->kelas->id)->get();
            $sheets[] = new data_prakerinExport($this->prakerin, $this->heading ,$value->kelas->level, $value->kelas->jurusan->singkatan_jurusan, $getData, $value->kelas->id);
        }
        dd($sheets);
        return $sheets;
    }
}
