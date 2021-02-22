<?php

namespace App\Http\Controllers\Excel;

use App\Exports\guru\multiExport;
use App\Exports\pembekalan\pembekalanExport as PembekalanPembekalanExport;
use App\Exports\prakerin\multiExport as PrakerinMultiExport;
use App\Exports\SiswaExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Models\Siswa;
use App\Models\perusahaan;
use App\Models\pembekalan_magang;
use App\Models\data_prakerin;
use App\Models\guru;

// use Maatwebsite\Excel\Facades\Excel;
class ExcelController extends Controller
{
private $excel;
public function __construct(Excel $excel)
{
    return $this->excel = $excel;
}
// pembekalan magang export
    public function pembekalan()
    {
        $pembekalan = pembekalan_magang::all();
        // $heading =
        return $this->excel->download(new PembekalanPembekalanExport($pembekalan), 'pembekalan.xlsx');
    }

    //export excel data_prakerin
     public function data_prakerin(){
        // $prakerin = data_prakerin::where('jurusan', 'RPL 1')->distinct()->get();
        $prakerin = data_prakerin::distinct()->get();
        $headings =
        [
            'NO',
            'NIPD',
            'NAMA',
            'NAMA PERUSAHAAN',
            'ALAMAT',
            'TGL MULAI',
            'TGL SELESAI',
        ];
        return $this->excel->download(new PrakerinMultiExport($prakerin, $headings), 'DATA PRAKERIN.xlsx');
    }

    public function guru()
    {
        $guru = guru::distinct()->get();
        $headings =
            [
                'NO',
                'NIK',
                'NAMA',
                'JABATAN',
                'JURUSAN',
                'NO_TELP',
            ];
        return $this->excel->download(new multiExport($guru, $headings), 'DATA GURU.xlsx');
    }
}
