<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;

// models
use App\Models\User;
use App\models\Siswa;
use App\Models\perusahaan;
use App\Models\fasilitas_prakerin;
use App\Models\jurnal_harian;
use App\Models\pembekalan_magang;
use App\Models\jurnal_prakerin;
use App\Models\kelompok_laporan;

// requuest
use Illuminate\Http\Request;
use App\Http\Requests\user\jurnal_harianRequest;
use App\Http\Requests\user\jurnal_prakerinRequest;
use App\Http\Requests\user\pembekalan_magangRequest;
use App\Http\Requests\user\profileRequest;
use App\Http\Requests\user\passwordRequest;
use App\Models\kelas;
// pakage or ...
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Response;
class userController extends Controller
{
    // index / dashboard
    public function index(Request $request)
    {
        return view('siswa.dashboard');
    }

    // list perusahaan
    public function perusahaan()
    {
        return view('siswa.list_perusahaan.index');
    }

    // ajax untuk perusahaan
    public function ajaxperusahaan(Request $request)
    {
        $perusahaan = perusahaan::all();
        return response()->json(compact('perusahaan'));
    }

    // detail perusahaan
    public function perusahaan_detail(Request $request, $id)
    {
        $perusahaan = perusahaan::where('id', $id)->first();
        return view('siswa.list_perusahaan.detail', compact('perusahaan'));
    }


    // pembekalan magang
    public function pembekalan()
    {

        // return Response::make(file_get_contents($path), 200, [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="' . $filename . '"'
        // ]);
        return view('siswa.pembekalan.index');
    }

    // tambah pembekalan
    public function pembekalan_post(Request $request){
        if ($request->file('file')->getMimeType() !== 'application/pdf') {
            return redirect('/user/pembekalan')->with('erorr', 'File anda harus application/pdf');
        }
        $file = time() . ' ' . $request->file('file')->getClientOriginalName();
        if (empty(Auth::user()->siswa->pembekalan_magang)) {
            pembekalan_magang::create([
                'id_siswa' =>  siswa('main')->id,
                'id_guru' => NULL,
                'test_wpt_iq' => 'belum',
                'personality_interview' => 'belum',
                'soft_skill' => 'belum',
                'file_portofolio' => "file/portofolio/$file"
            ]);
        }else {
            $upload = pembekalan_magang::where('id_siswa', siswa('main')->id)->update(['file_portofolio' => "file/portofolio/$file"]);
        }
        $upload = $request->file('file')->move('file/portofolio/', $file);
        // Alert::toast('Portofolio berhasil di tambahkan', 'Toast Type');
        return redirect('/user/pembekalan')->with('success', 'Portofolio anda sudah berhasil di kumpulkan');
    }

    // hapus pembekaaln
    public function pembekalan_delete(Request $request){
        $pem = siswa('main')->pembekalan_magang->file_portofolio;

        if (File::exists("$pem") && "$pem" !== "file/portofolio/default.pdf") {
            File::delete("$pem");
        }
        $upload = pembekalan_magang::where('id_siswa', Auth::user()->siswa->id)->update(['file_portofolio' => 'belum']);
        // Alert::toast('Portofolio berhasil di hapus', 'Toast Type');
        return redirect('/user/pembekalan')->with('erorr', 'Portofolio anda berhasil di hapus');
    }
    // bagian dari pembekalan

    public function pembekalan_download($name_file)
    {
        // file directory
        $file = public_path() . "/file/portofolio/$name_file";
        // file name
        $array = explode(' ', basename($name_file));
        unset($array[0]);
        $name = implode(' ', $array);
        //file headers
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response()->download($file, $name, $headers);
    }


    // status maganag disini
    public function status()
    {
        if (siswa('data_prakerin') === '') {
            return back();
        }
        return view('siswa.status.index');
    }


    // profile disini
    public function profile()
    {
        return view('siswa.profile.index');
    }

    // edit profile
    public function profile_edit()
    {
        return view('siswa.profile.edit', ['kelas' => kelas::all()]);
    }

    public function profile_update(profileRequest $request, $id){
        $validated = $request->validated();
        $update = Siswa::where('id', siswa('main')->id)->update([
            'nama_siswa' => $request->nama_siswa,
            'id_kelas' => $request->kelas,
            'email' => $request->email,
            'no_hp' => $request->no_hp
        ]);
        return redirect('/user/profile')->with('alert','Profile anda berhasil di ubah');
    }


    // ganti password
    public function ganti_password()
    {

        return view('siswa.profile.ganti_pass');
    }

    // update ganti password
    public function ganti_password_post(passwordRequest $request){
        $validated = $request->validated();
        $password = $request->old_pass; // string
        $check = siswa('user')->password; // hashed passowrd (ngambil dari user)
        if (Hash::check($password,$check)) {
            if ($request->new_pass == $request->new_pass2) { // jika password salah
                User::where('id', siswa('user')->id)->update([
                    'password' => Hash::make($request->new_pass)
                ]);
                return redirect('/user/profile')->with('alert', 'Password anda berhasil di ubah');
            }
            return back()->withInput()->withErrors(['new_pass2' => 'Ulangi password baru dengen benar']);
        }
        if ($request->new_pass != $request->new_pass2) { // jika password salah dan tidak sama
            return back()->withInput()->withErrors(['old_pass' => 'Password lama anda salah', 'new_pass2' => 'Ulangi password baru dengen benar']);
        }
        return back()->withInput()->withErrors(['old_pass' => 'Password lama anda salah']);
    }


    // jurnal prakerin
    public function jurnal(){
        if (siswa('data_prakerin') === '') {
            return back();
        }
        $jurnal_prakerin = jurnal_prakerin::where('id_siswa', siswa("main")->id)->orderBy('created_at', 'DESC')->get();
        return view('siswa.jurnal_prakerin.index', compact('jurnal_prakerin'));
    }

    public function jurnalApi(Request $request)
    {
        $data = jurnal_prakerin::where('id_siswa', siswa("main")->id)->orderBy('created_at', 'DESC')->get();
        // filter
        if ($request->filter) {
            switch ($request->filter) {
                case 'Hari':
                    $data = jurnal_prakerin::where('id_siswa', siswa("main")->id)->where('tanggal_pelaksanaan', Carbon::now()->format('Y-m-d'))->orderBy('created_at', 'DESC')->get();
                    break;
                case 'Minggu':
                    $data = jurnal_prakerin::where('id_siswa', siswa("main")->id)->whereBetween('tanggal_pelaksanaan', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->orderBy('created_at', 'DESC')->get();
                    break;
                case 'Bulan':
                    $data = jurnal_prakerin::where('id_siswa', siswa("main")->id)->whereMonth('tanggal_pelaksanaan', Carbon::now()->format('m'))->orderBy('created_at', 'DESC')->get();
                    break;
            }
        }
        return Datatables::of($data)
        ->addIndexColumn()
        ->editColumn('tanggal_pelaksanaan', function ($row) {
            $tanggal_pelaksanaan = !empty(tanggal($row->tanggal_pelaksanaan)) ? tanggal($row->tanggal_pelaksanaan) : ''; // relasi user->siswa
            return $tanggal_pelaksanaan;
        })
        ->rawColumns(['tanggal_pelaksanaan'])
        ->make(true);
        return response()->json(compact('data'));
    }

    public function jurnal_tambah()
    {
        if (siswa('data_prakerin') === '') {
            return back();
        }
        return view('siswa.jurnal_prakerin.tambah');
    }

    // tambah jurnal
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

        return redirect('/user/jurnal')->with('alert','data berhasil di tambahkan');
    }


    // jurnal harian
    public function jurnalH()
    {
        if (siswa('data_prakerin') === '') {
        return back();
        }
        $jurnal = jurnal_harian::where('id_siswa', siswa("main")->id)->orderBy('created_at','DESC')->get();
        return view('siswa.jurnal_harian.index', compact('jurnal'));
    }

    public function jurnalHApi(Request $request){
        if ($request->ajax()) {
            $data = jurnal_harian::where('id_siswa', siswa("main")->id)->orderBy('created_at', 'DESC')->get();
            // filter
            if ($request->absen) {
                switch ($request->absen) {
                    case 'Hari':
                        $data = jurnal_harian::where('id_siswa', siswa("main")->id)->where('tanggal', Carbon::now()->format('Y-m-d'))->orderBy('created_at', 'DESC')->get();
                        break;
                    case 'Minggu':
                        $data = jurnal_harian::where('id_siswa', siswa("main")->id)->whereBetween('tanggal', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->orderBy('created_at', 'DESC')->get();
                        break;
                    case 'Bulan':
                        $data = jurnal_harian::where('id_siswa', siswa("main")->id)->whereMonth('tanggal', Carbon::now()->format('m'))->orderBy('created_at', 'DESC')->get();
                        break;
                }
            }
            // data tab;e
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('tanggal', function ($row) {
                    $tanggal = !empty(tanggal($row->tanggal)) ? tanggal($row->tanggal) : ''; // relasi user->siswa
                    return $tanggal;
                })
                ->editColumn('datang', function ($row) {
                    $datang = !empty(jam($row->datang)) ? jam($row->datang) : ''; // relasi user->siswa
                    return $datang;
                })
                ->editColumn('pulang', function ($row) {
                    $pulang = !empty(jam($row->pulang)) ? jam($row->pulang) : ''; // relasi user->siswa
                    return $pulang;
                })
                ->rawColumns(['tanggal', 'datang', 'pulang'])
                ->make(true);
            return response()->json(compact('data'));
        }
    }

    public function jurnalH_post(jurnal_harianRequest $request){
            if (siswa('data_prakerin') === '') {
                return back();
            }
            $validated = $request->validated();
            $jurnal = jurnal_harian::where('created_at', Carbon::now()->format('Y-m-d'))->first();
            $perusahaan = Auth::user()->siswa->data_prakerin->perusahaan->id;
            $request->request->add(['id_perusahaan' => $perusahaan, 'id_siswa' => Auth::user()->siswa->id]);
            $jurnall = jurnal_harian::create($request->all());
            return back()->with('alert','Anda sudah absen hari ini');

    }
    // kelompok + laporan prakerin
    public function kelompok_laporan()
    {
        if (siswa('data_prakerin') === '') {
            return back();
        }
        $no_kelompok = !empty(siswa('data_prakerin')->kelompok_laporan->no) ? siswa('data_prakerin')->kelompok_laporan->no : '';
        $guru_nama =   !empty(siswa('data_prakerin')->kelompok_laporan->guru->nama) ? siswa('data_prakerin')->kelompok_laporan->guru->nama : '';
        $id_guru =   !empty(siswa('data_prakerin')->kelompok_laporan->guru->id) ? siswa('data_prakerin')->kelompok_laporan->guru->id : 'Nama pembimbing';
        $laporan =  !empty(siswa('data_prakerin')->kelompok_laporan->laporan_prakerin->nama) ? siswa('data_prakerin')->kelompok_laporan->laporan_prakerin->nama : 'Judul lapora belum di tentukan';
            // dd(Auth::user()->siswa->data_prakerin);
        $kelompok = kelompok_laporan::select('*')->where('id_guru', $id_guru)->where('no', $no_kelompok)->wherehas('data_prakerin')->get();
        return view('siswa.kelompok_laporan.index', compact('kelompok','no_kelompok','guru_nama','laporan'));
    }
}
