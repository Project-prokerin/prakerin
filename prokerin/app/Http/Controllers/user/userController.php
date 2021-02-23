<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\jurnal_harianRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\models\Siswa;
use App\Models\guru;
use App\Models\perusahaan;
use App\Models\orang_tua;
use App\Models\sekolah_asal;
use App\Models\data_prakerin;
use App\Models\jurnal_harian;
use App\Models\pembekalan_magang;
use App\Models\jurnal_prakerin;
use App\Models\kelompok_laporan;
use App\Models\laporan_prakerin;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class userController extends Controller
{
    // index / dashboard
    public function index(Request $request){
        $sidebar = 'dashboard';
        $siswa = Auth::user();
        return view('siswa.dashboard',compact('sidebar','siswa'));
    }
    // list perusahaan
    public function perusahaan()
    {
        $perusahaan = perusahaan::all();
        $sidebar = 'perusahaan';
        return view('siswa.list_perusahaan.index', compact('sidebar','perusahaan'));
    }
    // ajax perusahaan
    public function ajaxperusahaan(Request $request){
        $perusahaan = perusahaan::all();
        return response()->json(compact('perusahaan'));
    }
    // detail perusahaan
    public function perusahaan_detail(Request $request, $id){
        if ($request->ajax()) {
            $perusahaan = perusahaan::where('id', $id)->first();
            return response()->json(compact('perusahaan'));
        }
        $perusahaan = perusahaan::where('id', $id)->first();
        $sidebar = 'perusahaan';
        return view('siswa.list_perusahaan.detail', compact('perusahaan','sidebar'));
    }
    // pembekalan magang
    public function pembekalan(){
        $sidebar = 'pembekalan';
        return view('siswa.pembekalan.index', compact('sidebar'));
    }
    // status maganag disini
    public function status(){
        $sidebar = 'status';
        $magang = !empty(Auth::user()->siswa->data_prakerin) ? Auth::user()->siswa->data_prakerin : '';
        return view('siswa.status.index', compact('sidebar','magang'));
    }

    // profile disini
    public function profile(){
        $sidebar  = 'profile';
        $siswa = Auth::user();
        return view('siswa.profile.index', compact('sidebar','siswa'));
    }
    // ganti password
    public function ganti_password(){
        $sidebar  = '';
        return view('siswa.profile.ganti_pass', compact('sidebar'));
    }
    // jurnal harian
    public function jurnal(){
        $sidebar  = 'jurnal';
        $siswa = Auth::user()->siswa;
        return view('siswa.jurnal_prakerin.index', compact('sidebar','siswa'));
    }

    // jurnal prakerin
    public function jurnalH()
    {
        $sidebar  = 'jurnalH';
        $siswa = Auth::user()->siswa;
        return view('siswa.jurnal_harian.index', compact('sidebar','siswa'));
    }
    public function jurnalH_post(jurnal_harianRequest $request){
        $validated = $request->validated();
        $jurnal = jurnal_harian::where('created_at', Carbon::now()->format('Y-m-d'))->first();
        if ($request->datang > $request->pulang) {
            return back()->with('fail', 'masuk tanggal tanggal yang bener ye');
        }
            $perusahaan = Auth::user()->siswa->data_prakerin->perusahaan->id;
            $request->request->add(['id_perusahaan' => $perusahaan, 'id_siswa' => Auth::user()->siswa->id]);
            jurnal_harian::create($request->all());
            return back();

    }
    // kelompok + laporan prakerin
    public function kelompok_laporan()
    {
        $sidebar  = 'kelompok_laporan';
        $no_kelompok = !empty(Auth::user()->siswa->data_prakerin->kelompok_laporan->no) ? Auth::user()->siswa->data_prakerin->kelompok_laporan->no : '';
        $guru_nama = !empty(Auth::user()->siswa->data_prakerin->kelompok_laporan->guru->nama) ? Auth::user()->siswa->data_prakerin->kelompok_laporan->guru->nama : '';
            // dd(Auth::user()->siswa->data_prakerin);
            $kelompok = kelompok_laporan::where('no', $no_kelompok)->get();
            return view('siswa.kelompok_laporan.index', compact('sidebar','kelompok','no_kelompok','guru_nama'));
    }
}
