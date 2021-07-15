<?php

namespace App\Http\Controllers\Excel;

use App\Exports\alumni_sekolah\AlumniExport;
use App\Exports\kelas\kelasExport;
use App\Exports\disposisi\DisposisiExport;
use App\Exports\guru\data_guruExport;
use App\Exports\guru\multiExport;
use App\Exports\pembekalan\pembekalanExport as PembekalanPembekalanExport;
use App\Exports\perusahaan\multiExport as PerusahaanMultiExport;
use App\Exports\prakerin\export_1\multiExport as PrakerinMultiExport;
use App\Exports\prakerin\export_2\multiExport as PrakerinAdminMultiExport;
use App\Exports\siswa\SiswaExport as SiswaExportt;
use App\Exports\jurnalh\JurnalHExport as JurnalHExportt;
use App\Exports\jurnalp\JurnalPExport as JurnalPExportt;
use App\Exports\jurusan\jurusanExport;
use App\Exports\pembekalan\multiExport as PembekalanMultiExport;
use App\Exports\penelusuran_tamtan\multiExport as Penelusuran_tamtanMultiExport;
use App\Exports\siswa\multiExport as SiswaMultiExport;
use App\Exports\surat_keluar\surat_keluarExport;
use App\Exports\surat_masuk\surat_masukExport;
use App\Http\Controllers\Controller;
use App\Models\alumni_siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Models\Siswa;
use App\Models\perusahaan;
use App\Models\pembekalan_magang;
use App\Models\data_prakerin;
use App\Models\Disposisi;
use App\Models\guru;
use App\Models\jurnal_harian;
use App\Models\jurnal_prakerin;
use App\Models\jurusan;
use App\Models\kelas;
use App\Models\Surat_keluar;
use App\Models\Surat_M;
use App\Models\Surat_masuk;
use App\Models\Penelusuran_tamatan;

// use Maatwebsite\Excel\Facades\Excel;
class ExportExcelController extends Controller
{
private $excel;
public function __construct(Excel $excel)
{
    return $this->excel = $excel;
}
// pembekalan magang export
    public function pembekalan()
    {
        $pembekalan = Siswa::select('id_kelas')->with('kelas')->has('pembekalan_magang')->distinct()->get();
        // $heading =
        return $this->excel->download(new PembekalanMultiExport($pembekalan), 'pembekalan.xlsx');
    }

    //export excel data_prakerin
     public function data_prakerin(){
        // ngambil data prakerin
        $prakerin = data_prakerin::select('id_kelas')->distinct()->with('kelas')->get();
        // validasi jika kosong
        if (count($prakerin)<1) {
            return redirect('/admin/data_prakerin')->with('gagal', 'data anda masih kosong');
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
    public function admin_data_prakerin()
    {
        // ngambil data prakerin
        $prakerin = data_prakerin::select('id_kelas')->distinct()->with('kelas')->get();
        // validasi jika kosong
        if (count($prakerin) < 1) {
            return redirect('/admin/data_prakerin')->with('gagal', 'data anda masih kosong');
        }
        // jalankan
        $headings =
            [
                'NO',
                'NIPD',
                'NAMA',
                'NAMA PERUSAHAAN',
                'ALAMAT',
                'STATUS',
                'TGL MULAI',
                'TGL SELESAI',
            ];
        // dd($prakerin);
        return $this->excel->download(new PrakerinAdminMultiExport($prakerin, $headings), 'Data Prakerin.xlsx');
    }

    public function guru()
    {
        $guru = guru::all();
        if (count($guru)<1) {
            return redirect('/admin/guru')->with('gagal', 'data anda masih kosong');
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
        return $this->excel->download(new data_guruExport($guru, $headings, $guru), 'DATA GURU.xlsx');
    }
     public function perusahaan()
    {
        $perusahaan = perusahaan::select('id_jurusan')->distinct()->get();
        if (count($perusahaan) < 1) {
            return redirect('/admin/perusahaan')->with('gagal', 'data anda masih kosong');
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
        $siswa = Siswa::select('id_kelas')->distinct()->with('kelas')->get();
        if (count($siswa) < 1) {
            return redirect('/admin/siswa')->with('gagal', 'data anda masih kosong');
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

    public function surat_m()
    {
        $surat_m = Surat_masuk::all();
        return $this->excel->download(new surat_masukExport($surat_m), 'surat_masuk.xlsx');
    }
    public function disposisi()
    {
        $disposi = Disposisi::all();
        return $this->excel->download(new DisposisiExport($disposi), 'disposisi.xlsx');
    }
    public function kelas()
    {
        $kelas = kelas::all();
        return $this->excel->download(new kelasExport($kelas), 'Data Kelas.xlsx');
    }
    public function jurusan()
    {
        $jurusan = jurusan::all();
        return $this->excel->download(new jurusanExport($jurusan), 'Data Jurusan.xlsx');
    }
    public function surat_keluar()
    {
        $surat_k = Surat_keluar::all();
        return $this->excel->download(new surat_keluarExport($surat_k), 'Surat penugasan.xlsx');
    }
    public function alumni_siswa()
    {
        $alumni = alumni_siswa::all();
        return $this->excel->download(new AlumniExport($alumni), 'Alumni Siswa.xlsx');
    }
    public function penelusuran_tamantan()
    {
        $pen = Penelusuran_tamatan::all();
        // status
        $stat = collect([
            [
            'status' => "bekerja",
            ],
            [
                'status' => "kuliah",
            ],
            [
                'status' => "Wirausaha",
            ],
            [
                'status' => "Bekerja dan Kuliah",
            ],
            [
                'status' => "Wirausaha dan Kuliah",
            ],
        ]);
        if (count($pen) < 1) {
            return redirect('/admin/penelusuran_tamatan')->with('gagal', 'data anda masih kosong');
        }
        return $this->excel->download(new Penelusuran_tamtanMultiExport($pen,$stat), 'Data Penelusuran Tamatan.xlsx');
    }
}
