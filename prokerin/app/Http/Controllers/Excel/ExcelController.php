<?php

namespace App\Http\Controllers\Excel;

use App\Exports\guru\multiExport;
use App\Exports\pembekalan\pembekalanExport as PembekalanPembekalanExport;
use App\Exports\perusahaan\multiExport as PerusahaanMultiExport;
use App\Exports\prakerin\multiExport as PrakerinMultiExport;
use App\Exports\siswa\SiswaExport as SiswaExportt;
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
        // ngambil data prakerin
        $prakerin = data_prakerin::select('jurusan','kelas')->distinct()->get();
        // validasi jika kosong
        if (count($prakerin)<1) {
            return redirect('/data_prakerin')->with('gagal', 'data anda masih kosong');
        }
        // jalankan
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
                 // dd($prakerin);
            return 'halo';
            return $this->excel->download(new PrakerinMultiExport($prakerin, $headings), 'DATA PRAKERIN.xlsx');
    }

    public function guru()
    {
        $guru = guru::select('jurusan')->distinct()->get();
        if (count($guru)<1) {
            return redirect('/guru')->with('gagal', 'data anda masih kosong');
        }
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
     public function perusahaan()
    {
        $perusahaan = perusahaan::select('bidang_usaha')->distinct()->get();
        if (count($perusahaan) < 1) {
            return redirect('/perusahaan')->with('gagal', 'data anda masih kosong');
        }
        $headings = [
            'NO',
            'NAMA',
            'BIDANG USAHA',
            'EMAIL',
            'NAMA_PEMIMPIN',
            'ALAMAT',];
        return $this->excel->download(new PerusahaanMultiExport($perusahaan, $headings), 'LIST PERUSAHAAN PRAKERIN.xlsx');
    }
    public function siswa()
    {
        $siswa = Siswa::all();

        // $heading =
        return $this->excel->download(new SiswaExportt($siswa), 'data_siswa.xlsx');
    }
}
