<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\jurnal_harianRequest;
use App\Http\Requests\jurnal_prakerinRequest;
use App\Http\Requests\passwordRequest;
use App\Http\Requests\pembekalan_magangRequest;
use App\Http\Requests\profileRequest;
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
use Illuminate\Support\Facades\Hash;

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
    // detail perusahaan
    public function perusahaan_detail(Request $request, $id){
        $perusahaan = perusahaan::where('id', $id)->first();
        $sidebar = 'perusahaan';
        return view('siswa.list_perusahaan.detail', compact('perusahaan','sidebar'));
    }
    // pembekalan magang
    public function pembekalan(){
        $sidebar = 'pembekalan';
        return view('siswa.pembekalan.index', compact('sidebar'));
    }
    public function pembekalan_post(pembekalan_magangRequest $request){
        $validated = $request->validated();
        $file = $request->file('file')->getClientOriginalName();
        $upload = pembekalan_magang::where('id_siswa', Auth::user()->siswa->id)->update(['file_portofolio' => $file]);
        $upload = $request->file('file')->move('PDF/', $request->file('file')->getClientOriginalName());
        return redirect('/user/pembekalan');
    }
    public function pembekalan_delete(){
        $upload = pembekalan_magang::where('id_siswa', Auth::user()->siswa->id)->update(['file_portofolio' => '']);
        return redirect('/user/pembekalan');
    }
    public function pembekalan_download($id)
    {
        $file = public_path() . "/PDF/$id";

        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response()->download($file, $id , $headers);
    }
    // status maganag disini
    public function status(){
        if (siswa('data_prakerin') === '') {
            return back();
        }
        $sidebar = 'status';
        return view('siswa.status.index', compact('sidebar'));
    }

    // profile disini
    public function profile(){
        $sidebar  = 'profile';
        return view('siswa.profile.index', compact('sidebar'));
    }
    // edit profile
    public function profile_edit(){
        $sidebar = '';
        return view('siswa.profile.edit', compact('sidebar'));
    }
    public function profile_update(profileRequest $request, $id){
        $validated = $request->validated();
        $update = Siswa::where('id', siswa('main')->id)->update([
            'nama_siswa' => $request->nama_siswa,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'no_hp' => $request->no_hp
        ]);
        return redirect('/user/profile')->with('success','data_anda berhasil di ubah');
    }
    // ganti password
    public function ganti_password(){

        $sidebar  = '';
        return view('siswa.profile.ganti_pass', compact('sidebar'));
    }
    public function ganti_password_post(passwordRequest $request){
        $validated = $request->validated();
        $password = $request->old_pass; // string
        $check = siswa('user')->password; // hashed passowrd (ngambil dari user)
        if (Hash::check($password,$check)) {
            if ($request->new_pass == $request->new_pass2) {
                User::where('id', siswa('user')->id)->update([
                    'password' => Hash::make($request->new_pass)
                ]);
                return redirect('/user/profile')->with('success', 'password anda berhasil di ubah');
            }
            return back()->with('gagal', 'password anda gagal di ubah');
        }
        return back()->with('gagal', 'password anda gagal di ubah');
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
        $no_kelompok = !empty(siswa('data_prakerin')->kelompok_laporan->no) ? siswa('data_prakerin')->kelompok_laporan->no : '';
        $guru_nama =   !empty(siswa('data_prakerin')->kelompok_laporan->guru->nama) ? siswa('data_prakerin')->kelompok_laporan->guru->nama : '';
        $laporan =  !empty(siswa('data_prakerin')->kelompok_laporan->laporan_prakerin->nama) ? siswa('data_prakerin')->kelompok_laporan->laporan_prakerin->nama : 'belum mendapat judul laporan';
            // dd(Auth::user()->siswa->data_prakerin);
            $kelompok = kelompok_laporan::where('no', $no_kelompok)->get();
            return view('siswa.kelompok_laporan.index', compact('sidebar','kelompok','no_kelompok','guru_nama','laporan'));
    }
}
