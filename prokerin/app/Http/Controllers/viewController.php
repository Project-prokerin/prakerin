<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\guru;
use App\Models\jurnal_harian;
use App\Models\jurnal_prakerin;
use App\Models\User;
use App\Models\kelompok_laporan;
use App\Models\kelas;
use App\Models\pembekalan_magang;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\perusahaan;
use App\Models\data_prakerin;
use App\Models\Surat_keluar;
use App\Models\jurusan;
use App\Models\Surat_masuk;
use App\Models\Tanda_tangan;
use App\Models\laporan_prakerin;
use App\Models\pengajuan_prakerin;

use Auth;


use Carbon\Carbon;
class viewController extends Controller
{
    // admin view
    public function dashboard()
    {
        $tahun = Carbon::now()->format('Y');
        $tahunDepan = Carbon::now()->addYear(1)->format('Y');
    $perusahaan = perusahaan::all()->count();
        $jurnalP = jurnal_prakerin::all()->count();
        $jurnalH = jurnal_harian::all()->count();

        // $surat_pengajuan = surat_keluar::where('status','pengajuan');
        // $surat_pengajuan = surat_keluar::where('status','pengajuan');

        if (Auth::user()->role == "admin" or Auth::user()->role == "tu" ) {
            $surat_masuk = surat_masuk::all()->count();
            $surat_keluar = surat_keluar::all()->count();
            $disposisi = Disposisi::all()->count();
            $total_surat = $surat_masuk + $surat_keluar;
            $jurnalP = jurnal_prakerin::all()->count();
            $jurnalH = jurnal_harian::all()->count();
            $total_jurnal = $jurnalP + $jurnalH;
            $kelas = kelas::all()->count();
        $kelompok_prakerin = kelompok_laporan::all()->unique('no')->count();
        $data_prakerin =  data_prakerin::all()->count();
        $jurusan = jurusan::all()->count();
        $tanda_tangan = Tanda_tangan::all()->count();
        $pembekalan_magang = pembekalan_magang::all()->count();
        $laporan_prakerin = laporan_prakerin::all()->count();
        $pengajuan_prakerin = pengajuan_prakerin::all()->unique('no')->count();

            $total_suratP = $surat_keluar + $pengajuan_prakerin ;


            $guru = guru::all()->count();
            $siswa = Siswa::all()->count();


            $total_jurnal = $jurnalH + $jurnalP;

            return view('admin.dashboard',compact('total_suratP','pengajuan_prakerin','guru','siswa','surat_masuk','surat_keluar','disposisi','total_surat','jurnalP','jurnalH','total_jurnal','kelas','kelompok_prakerin','data_prakerin','jurusan','tanda_tangan','pembekalan_magang','laporan_prakerin'));
        }else if(Auth::user()->role == "kaprog" or Auth::user()->role == "hubin" or Auth::user()->role == "kesiswaan" or Auth::user()->role == "kurikulum" or Auth::user()->role == "sarpras"  or Auth::user()->role == "pembimbing" ){
            $surat_masuk = surat_masuk::all()->count();
            $surat_keluar = surat_keluar::all()->count();
            $disposisi = Disposisi::all()->count();
            $total_surat = $surat_masuk + $surat_keluar;
            $jurnalP = jurnal_prakerin::all()->count();
            $jurnalH = jurnal_harian::all()->count();
            $total_jurnal = $jurnalP + $jurnalH;
            $kelas = kelas::all()->count();
            $kelompok_prakerin = kelompok_laporan::all()->unique('no')->count();
            $data_prakerin =  data_prakerin::all()->count();
            $pembekalan_magang = pembekalan_magang::all()->count();
            $laporan_prakerin = laporan_prakerin::all()->count();
            $pengajuan_prakerin = pengajuan_prakerin::all()->unique('no')->count();
            $perusahaan = perusahaan::all()->count();
            $total_suratP = $surat_keluar + $pengajuan_prakerin ;




        $total_jurnal = $jurnalH + $jurnalP;



        return view('admin.dashboard',compact('perusahaan','total_suratP','pengajuan_prakerin','surat_masuk','surat_keluar','disposisi','total_surat','jurnalP','jurnalH','total_jurnal','kelas','kelompok_prakerin','data_prakerin','pembekalan_magang','laporan_prakerin'));

            // return view('admin.dashboard',compact('surat_masuk','surat_keluar','disposisi','total_surat'));

        }else if(Auth::user()->role == "bkk" or Auth::user()->role == "tu" or Auth::user()->role == "kepsek"  ){
            $surat_masuk = surat_masuk::all()->count();
            $surat_keluar = surat_keluar::all()->count();
            $total_surat = $surat_masuk + $surat_keluar;
            $disposisi = Disposisi::all()->count();

            //test wpt yang sudah di test
            $test_psikotes =    pembekalan_magang::where('psikotes','sudah')->count();
            // $test_PT = pembekalan_magang::where('personality_interview','sudah')->count();
            $test_SS = pembekalan_magang::where('soft_Skill','sudah')->count();
            $test_Portofolio = pembekalan_magang::all()->count();
            //endte
            $pengajuan_prakerin = pengajuan_prakerin::all()->unique('no')->count();
        $total_suratP = $surat_keluar + $pengajuan_prakerin ;
        $pembekalan_magang = pembekalan_magang::all()->count();


        return view('admin.dashboard',compact('pembekalan_magang','test_psikotes','test_SS','test_Portofolio','pengajuan_prakerin','surat_masuk','surat_keluar','total_surat','disposisi','total_suratP'));

        }

        // return redirect()->back();

        // $surat_k = '';
        // $surat_m = '';
        // $total_surat = '';
        // $data = '';
        // return view('admin.dashboard');



        // if (Auth::user()->role == 'admin') {
        //     $data = [];
        //     $data[] = Surat_masuk::all()->count();
        //     $data[] = Disposisi::all()->count();
        //     $data[] = Surat_keluar::all()->count();
        // }else if (Auth::user()->role == 'tu') {
        //     $data[] = Surat_masuk::all()->count();
        //     $data[] = Surat_keluar::all()->count();
        // } else if (Auth::user()->role == "hubin" or Auth::user()->role == "kesiswaan" or Auth::user()->role == "kurikulum" or Auth::user()->role == "sarpras") {
        //     $data[] =  '';
        //     $data[] = '';
        // }
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


// <!--
// namespace App\Http\Controllers;

// use App\Models\Disposisi;
// use App\Models\guru;
// use App\Models\jurnal_harian;
// use App\Models\User;
// use App\Models\kelompok_laporan;
// use App\Models\pembekalan_magang;
// use App\Models\Siswa;
// use Illuminate\Http\Request;
// use App\Models\perusahaan;
// use App\Models\Surat_keluar;
// use App\Models\Surat_masuk;
// use Carbon\Carbon;
// use Illuminate\Support\Facades\Auth;

// class viewController extends Controller
// {
    // admin view
    // public function dashboard()
    // {
    //     $tahun = Carbon::now()->format('Y');
    //     $tahunDepan = Carbon::now()->addYear(1)->format('Y');
    //     $perusahaan = perusahaan::all()->count();
    //     $pem = pembekalan_magang::all()->count();
    //     $jurnal = jurnal_harian::all()->count();
    //     $siswa = Siswa::all()->count();
    //     $guru = guru::all()->count();

        // if (Auth::user()->role == "admin" or Auth::user()->role == "tu" ) {
        //     $surat_k = Surat_keluar::all()->count();
        //     $surat_m = Surat_masuk::all()->count();
        //     $disposisi = Disposisi::all()->count();
        //     $total_surat = $surat_k + $surat_m;
        // }else if(Auth::user()->role == "hubin" or Auth::user()->role == "kesiswaan" or Auth::user()->role == "kurikulum" or Auth::user()->role == "sarpras" ){
        //     $surat_k = Disposisi::where('Pokjatujuan', Auth::user()->role)->count();
        //     $surat_m = Surat_keluar::where('id_dari', Auth::user()->guru->id)->count();
        //     $disposisi = '';
        //     $total_surat = $surat_k + $surat_m;
        // }

        // $surat_k = '';
        // $surat_m = '';
        // $total_surat = '';
        // $data = '';
        // $disposisi = '';

        // if (Auth::user()->role == 'admin') {
        //     $data = [];
        //     $data[] = Surat_masuk::all()->count();
        //     $data[] = Disposisi::all()->count();
        //     $data[] = Surat_keluar::all()->count();
        // }else if (Auth::user()->role == 'tu') {
        //     $data[] = Surat_masuk::all()->count();
        //     $data[] = Surat_keluar::all()->count();
        // } else if (Auth::user()->role == "hubin" or Auth::user()->role == "kesiswaan" or Auth::user()->role == "kurikulum" or Auth::user()->role == "sarpras") {
        //     $data[] =  '';
        //     $data[] = '';
        // }
//         return view('admin.dashboard',compact('tahun','tahunDepan','perusahaan','pem','jurnal','surat_k','data','siswa','guru','surat_m','disposisi','total_surat'));
//     }

//     public function ajax(Request $reuqest)
//     {
//         $data = [];
//         if (Auth::user()->role == 'admin') {
//             $data[] = Surat_masuk::all()->count();
//             $data[] = Disposisi::all()->count();
//             $data[] = Surat_keluar::all()->count();
//         }else if (Auth::user()->role == 'tu') {
//             $data[] = Surat_masuk::all()->count();
//             $data[] = Surat_keluar::all()->count();
//         } else if (Auth::user()->role == "hubin" or Auth::user()->role == "kesiswaan" or Auth::user()->role == "kurikulum" or Auth::user()->role == "sarpras") {
//             $data[] = '';
//             $data[] = '';
//         }
//         return response()->json(compact('data'));
//     }
// } -->






