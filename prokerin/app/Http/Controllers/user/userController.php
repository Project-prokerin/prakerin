<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\jurnal_harianRequest;
use App\Http\Requests\jurnal_prakerinRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\models\Siswa;
use App\Models\guru;
use App\Models\perusahaan;
use App\Models\orang_tua;
use App\Models\sekolah_asal;
use App\Models\data_prakerin;
use App\Models\fasilitas_prakerin;
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
        return view('siswa.dashboard',compact('sidebar'));
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
    public function status()
    {
        if (siswa('data_prakerin') === '' ) {
            return back();
        }
        $sidebar = 'status';
        return view('siswa.status.index', compact('sidebar'));
    }

    // profile disini
    public function profile(){
        $sidebar  = 'profile';
        // $siswa = Auth::user();
        return view('siswa.profile.index', compact('sidebar'));
    }
    // edit profile
    public function profile_edit(){
        $sidebar = '';
        return view('siswa.profile.edit', compact('sidebar'));
    }
    // ganti password
    public function ganti_password(){
        $sidebar  = '';
        return view('siswa.profile.ganti_pass', compact('sidebar'));
    }
    // jurnal prakerin
    public function jurnal(){
        if (siswa('data_prakerin') === '') {
            return back();
        }
        $sidebar  = 'jurnal';
        return view('siswa.jurnal_prakerin.index', compact('sidebar'));
    }
    public function jurnal_post(jurnal_prakerinRequest $request){
        if (siswa('data_prakerin') === '') {
            return back();
        }
        $validated = $request->validated(); // untuk validasi
        $jurnal = jurnal_prakerin::create(['kompetisi_dasar' => $request->kompetisi_dasar, 'topik_pekerjaan' => $request->topik_pekerjaan, 'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan, 'jam_masuk' => $request->jam_masuk, 'jam_istirahat' => $request->jam_istiharat, 'jam_pulang' => $request->jam_pulang, 'id_siswa' => Auth::user()->siswa->id,'id_perusahaan'=>Auth::user()->siswa->data_prakerin->perusahaan->id, 'created_at' => Carbon::now()->format('Y-m-d')]);
        // mendapat jurnal id
        $request->request->add(['id_jurnal_prakerin' => $jurnal->id]);
        // nambah fasilitas
        $fasilitas_prakerin = fasilitas_prakerin::create(['id_jurnal_prakerin' => $request->id_jurnal_prakerin, 'mess' => $request->mess, 'buss_antar_jemput' => $request->bus_antar_jemput, 'makan_siang' => $request->makan_siang, 'intensif' => $request->intensif]);
        return back();
    }

    // jurnal harian
    public function jurnalH()
    {
        if (siswa('data_prakerin') === '') {
            return back();
        }
        $sidebar  = 'jurnalH';
        return view('siswa.jurnal_harian.index', compact('sidebar'));
    }
    public function jurnalH_post(jurnal_harianRequest $request){
            if (siswa('data_prakerin') === '') {
                return back();
            }
            $validated = $request->validated();
            $jurnal = jurnal_harian::where('created_at', Carbon::now()->format('Y-m-d'))->first();
            $perusahaan = Auth::user()->siswa->data_prakerin->perusahaan->id;
            $request->request->add(['id_perusahaan' => $perusahaan, 'id_siswa' => Auth::user()->siswa->id]);
            jurnal_harian::create($request->all());
            return back();

    }
    // kelompok + laporan prakerin
    public function kelompok_laporan()
    {
        if (siswa('data_prakerin') === '') {
            return back();
        }
        $sidebar  = 'kelompok_laporan';
        $no_kelompok = !empty(siswa('kelompok_laporan')->no) ? siswa('kelompok_laporan')->no : '';
        $guru_nama =   !empty(siswa('kelompok_laporan')->guru->name) ? siswa('kelompok_laporan')->guru->nama : '';
            // dd(Auth::user()->siswa->data_prakerin);
            $kelompok = kelompok_laporan::where('no', $no_kelompok)->get();
            return view('siswa.kelompok_laporan.index', compact('sidebar','kelompok','no_kelompok','guru_nama'));
    }
}
