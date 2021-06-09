<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\guru;
use App\Models\jurnal_harian;
use App\Models\User;
use App\Models\kelompok_laporan;
use App\Models\pembekalan_magang;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\perusahaan;
use App\Models\Surat_keluar;
use App\Models\Surat_masuk;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class viewController extends Controller
{
    // admin view
    public function dashboard()
    {
        $tahun = Carbon::now()->format('Y');
        $tahunDepan = Carbon::now()->addYear(1)->format('Y');
        $perusahaan = perusahaan::all()->count();
        $pem = pembekalan_magang::all()->count();
        $jurnal = jurnal_harian::all()->count();
        $siswa = Siswa::all()->count();
        $guru = guru::all()->count();
        if (Auth::user()->role == "admin" or Auth::user()->role == "tu" ) {
            $surat_k = Surat_keluar::all()->count();
            $surat_m = Surat_masuk::all()->count();
            $disposisi = Disposisi::all()->count();
        }else if(Auth::user()->role == "hubin" or Auth::user()->role == "kesiswaan" or Auth::user()->role == "kurikulum" or Auth::user()->role == "sarpras" ){
            $surat_k = Disposisi::where('Pokjatujuan', Auth::user()->role)->count();
            $surat_m = Surat_keluar::where('id_dari', Auth::user()->guru->id)->count();
            $disposisi = '';
        }
        $total_surat = $surat_k + $surat_m;
        if (Auth::user()->role == 'admin') {
            $data = [];
            $data[] = Surat_masuk::all()->count();
            $data[] = Disposisi::all()->count();
            $data[] = Surat_keluar::all()->count();
        }else if (Auth::user()->role == 'tu') {
            $data[] = Surat_masuk::all()->count();
            $data[] = Surat_keluar::all()->count();
        } else if (Auth::user()->role == "hubin" or Auth::user()->role == "kesiswaan" or Auth::user()->role == "kurikulum" or Auth::user()->role == "sarpras") {
            $data[] =  '';
            $data[] = '';
        }
        return view('admin.dashboard',compact('tahun','tahunDepan','perusahaan','pem','jurnal','surat_k','data','siswa','guru','surat_m','disposisi','total_surat'));
    }

    public function ajax(Request $reuqest)
    {
        $data = [];
        if (Auth::user()->role == 'admin') {
            $data[] = Surat_masuk::all()->count();
            $data[] = Disposisi::all()->count();
            $data[] = Surat_keluar::all()->count();
        }else if (Auth::user()->role == 'tu') {
            $data[] = Surat_masuk::all()->count();
            $data[] = Surat_keluar::all()->count();
        } else if (Auth::user()->role == "hubin" or Auth::user()->role == "kesiswaan" or Auth::user()->role == "kurikulum" or Auth::user()->role == "sarpras") {
            $data[] = '';
            $data[] = '';
        }
        return response()->json(compact('data'));
    }
}
