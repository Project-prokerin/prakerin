<?php

namespace App\Exports\pembekalan;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class multiExport implements WithMultipleSheets
{
    use Exportable;

    protected $pembakalan;
    protected $heading;
    protected $jurusan;
    protected $kelas;

    public function __construct($pembakalan)
    {

        $this->pembakalan = $pembakalan;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        foreach ($this->pembakalan as $key => $value) {
            $getData = Siswa::where('jurusan', $value->jurusan)->where('kelas', $value->kelas)->get();
            $sheets[] = new pembekalanExport($this->pembakalan, $value->jurusan, $value->kelas, $getData);
        }
        return $sheets;
    }
}
