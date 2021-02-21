<?php

namespace App\Http\Controllers\Excel;

use App\Exports\pembekalanExport;
use App\Exports\SiswaExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Models\Siswa;
use App\Models\perusahaan;
use App\Models\pembekalan_magang;
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
        return $this->excel->download(new pembekalanExport($pembekalan), 'pembekalan.xlsx');
    }
}
