<?php

namespace App\Http\Controllers\Excel;

use App\Exports\guru\multiExport;
use App\Exports\pembekalan\pembekalanExport as PembekalanPembekalanExport;
use App\Exports\perusahaan\multiExport as PerusahaanMultiExport;
use App\Exports\prakerin\multiExport as PrakerinMultiExport;
use App\Exports\siswa\SiswaExport as SiswaExportt;
use App\Exports\jurnalh\JurnalHExport as JurnalHExportt;
use App\Exports\jurnalp\JurnalPExport as JurnalPExportt;
use App\Exports\pembekalan\multiExport as PembekalanMultiExport;
use App\Exports\siswa\multiExport as SiswaMultiExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Models\Siswa;
use App\Models\perusahaan;
use App\Models\pembekalan_magang;
use App\Models\data_prakerin;
use App\Models\guru;
use App\Models\jurnal_harian;
use App\Models\jurnal_prakerin;

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
        $pembekalan = Siswa::select('kelas', 'jurusan')->distinct()->get();
        // $heading =
        return $this->excel->download(new PembekalanMultiExport($pembekalan), 'pembekalan.xlsx');
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
        $siswa = Siswa::select('kelas','jurusan')->distinct()->get();
        if (count($siswa) < 1) {
            return redirect('/siswa')->with('gagal', 'data anda masih kosong');
        }
        return $this->excel->download(new SiswaMultiExport($siswa), 'DATA SISWA SMK TARUNA BHAKTI DEPOK.xlsx');
    }
    public function jurnalh()
    {
        $jurnalh = jurnal_harian::all();
        return $this->excel->download(new JurnalHExportt($jurnalh), 'jurnal_harian.xlsx');

    }

    public function jurnalp()
    {
        $jurnalp = jurnal_prakerin::all();
        return $this->excel->download(new JurnalPExportt($jurnalp), 'jurnal_prakerin.xlsx');

    }

}
