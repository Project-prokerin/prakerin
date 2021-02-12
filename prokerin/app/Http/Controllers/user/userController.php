<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\User;
use app\models\Siswa;
use app\Models\guru;
use app\Models\perusahaan;
use app\Models\orang_tua;
use app\Models\sekolah_asal;
use app\Models\data_prakerin;
use app\Models\jurnal_harian;
use app\Models\pembekalan_magang;
use App\Models\jurnal_prakerin;
use App\Models\kelompok_laporan;
use app\Models\laporan_prakerin;
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
        $sidebar = 'perusahaan';
        return view('siswa.list_perusahaan.index', compact('sidebar'));
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

    // kelompok + laporan prakerin
    public function kelompok_laporan()
    {
            $sidebar  = 'kelompok_laporan';
            return view('siswa.kelompok_laporan.index', compact('sidebar'));
    }
}
