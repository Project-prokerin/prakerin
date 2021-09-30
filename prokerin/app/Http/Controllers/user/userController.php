<?php



namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;



// models

use App\Models\User;

use App\Models\Siswa;

use App\Models\orang_tua;

use App\Models\data_prakerin;

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
use App\Models\laporan_prakerin;
// pakage or ...

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Validator;

use Yajra\DataTables\DataTables;

use PDF;



use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Session;

use Response;

class userController extends Controller

{

    // index / dashboard

    public function index(Request $request)

    {
    $siswa = siswa::where('id_user',Auth::user()->siswa->id)->first();
     $pembekalan_magang =   pembekalan_magang::where('id_siswa',$siswa->id)->first();
     $jurnalH_siswa = jurnal_harian::where('id_siswa',$siswa->id)->get();
     $jurnalP_siswa = jurnal_prakerin::where('id_siswa',$siswa->id)->get();
     $perusahaan = perusahaan::all();
     $siswa = siswa::where('id_user',Auth::user()->id)->first();

    //  dd($jurnalH_siswa->toArray(),$jurnalP_siswa->toArray());
    $statusMagang_siswa = data_prakerin::where('id_siswa',$siswa->id)->first();
    // dd($statusMagang_siswa);
    if ($statusMagang_siswa == null) {
        $statusMagang_siswa = '';
    }else{
        $statusMagang_siswa = data_prakerin::where('id_siswa',$siswa->id)->first();
    }
    // dd($statusMagang_siswa);
    $kelompokLaporan_siswa = kelompok_laporan::where('id_siswa',$siswa->id)->first();
    // dd($kelompokLaporan_siswa);
    return view('siswa.dashboard',compact('pembekalan_magang','jurnalH_siswa','jurnalP_siswa','perusahaan','statusMagang_siswa','kelompokLaporan_siswa'));

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

        // if (siswa('data_prakerin')->status === 'Pengajuan' || siswa('data_prakerin') == '') {

        //     return back();

        // }

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

            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir

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

        if (siswa('data_prakerin')->status === 'Pengajuan' or empty(siswa('data_prakerin') )) {

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

                    $data = jurnal_prakerin::where('id_siswa', siswa("main")->id)->where('hari_pelaksanaan', Carbon::now()->format('Y-m-d'))->orderBy('created_at', 'DESC')->get();

                    break;

                case 'Minggu':

                    $data = jurnal_prakerin::where('id_siswa', siswa("main")->id)->whereBetween('hari_pelaksanaan', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->orderBy('created_at', 'DESC')->get();

                    break;

                case 'Bulan':

                    $data = jurnal_prakerin::where('id_siswa', siswa("main")->id)->whereMonth('hari_pelaksanaan', Carbon::now()->format('m'))->orderBy('created_at', 'DESC')->get();

                    break;

            }

        }

        return Datatables::of($data)

        ->addIndexColumn()

        ->editColumn('hari_pelaksanaan', function ($row) {

            $hari_pelaksanaan = !empty(tanggal($row->hari_pelaksanaan)) ? tanggal($row->hari_pelaksanaan) : ''; // relasi user->siswa

            return $hari_pelaksanaan;

        })

        ->rawColumns(['hari_pelaksanaan'])

        ->make(true);

        return response()->json(compact('data'));

    }



    public function jurnal_tambah()

    {

        if (siswa('data_prakerin')->status === 'Pengajuan' || siswa('data_prakerin') == '') {

            return back();

        }

        return view('siswa.jurnal_prakerin.tambah');

    }



    // tambah jurnal

    public function jurnal_post(jurnal_prakerinRequest $request){

        if (siswa('data_prakerin')->status === 'Pengajuan' || siswa('data_prakerin') == '') {

            return back();

        }

        $validated = $request->validated(); // untuk validasi

        $jurnal = jurnal_prakerin::create(['kompetisi_dasar' => $request->kompetisi_dasar, 'topik_pekerjaan' => $request->topik_pekerjaan, 'hari_pelaksanaan' => $request->hari_pelaksanaan, 'jam_masuk' => $request->jam_masuk, 'jam_istirahat' => $request->jam_istiharat, 'jam_pulang' => $request->jam_pulang, 'id_siswa' => Auth::user()->siswa->id,'id_perusahaan'=>Auth::user()->siswa->data_prakerin->perusahaan->id, 'created_at' => Carbon::now()->format('Y-m-d')]);

        // mendapat jurnal id

        $request->request->add(['id_jurnal_prakerin' => $jurnal->id]);

        // nambah fasilitas

        $fasilitas_prakerin = fasilitas_prakerin::create(['id_jurnal_prakerin' => $request->id_jurnal_prakerin, 'mess' => $request->mess, 'buss_antar_jemput' => $request->bus_antar_jemput, 'makan_siang' => $request->makan_siang, 'intensif' => $request->intensif]);



        return redirect('/user/jurnal')->with('alert','data berhasil di tambahkan');

    }





    // jurnal harian

    public function jurnalH()

    {

        if (siswa('data_prakerin')->status === 'Pengajuan' || siswa('data_prakerin') == '') {

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

        if (siswa('data_prakerin')->status === 'Pengajuan' || siswa('data_prakerin') == '') {

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

        // if (siswa('data_prakerin')->status === 'Pengajuan' || siswa('data_prakerin') == '') {

        //     return back();

        // }

        $no_kelompok = !empty(siswa('main')->kelompok_laporan->no) ? siswa('main')->kelompok_laporan->no : '';

        $guru_nama =   !empty(siswa('main')->kelompok_laporan->guru->nama) ? siswa('main')->kelompok_laporan->guru->nama : '';

        $id_guru =   !empty(siswa('main')->kelompok_laporan->guru->id) ? siswa('main')->kelompok_laporan->guru->id : 'Nama pembimbing';

        $laporan =  !empty(siswa('main')->kelompok_laporan->laporan_prakerin->nama) ? siswa('main')->kelompok_laporan->laporan_prakerin->nama : 'Judul lapora belum di tentukan';


        // dd(Auth::user()->siswa->id);
        // $laporan = kelompok_laporan
        $kelompok = kelompok_laporan::select('*')->where('id_guru', $id_guru)->where('no', $no_kelompok)->wherehas('siswa')->get();
            // dd($kelompok);
        if (empty($laporan)) {
            $laporan = 'Belum ada judul Laporan';
        }else {
            $laporan = laporan_prakerin::where('no',$no_kelompok)->first();

        }
            // dd(Auth::user()->siswa->data_prakerin);

        // dd($laporan);

        return view('siswa.kelompok_laporan.index', compact('kelompok','no_kelompok','guru_nama','laporan'));

    }

    public function kelompok_laporanUpdate(Request $request,$id)
    {
        // dd($id);

        $id_siswa =  kelompok_laporan::where('id_siswa', $id)->first();
        $jml_kelompok = kelompok_laporan::where('no', $id_siswa->no)->get()->toArray();

        kelompok_laporan::where('id_siswa', $id)->delete();

        $kelompok = kelompok_laporan::where('no', $id_siswa->no)->get()->toArray();


            // dd(count($jml_kelompok));
            // $data = $request->all();
            // dd($data);
            // $no = preg_replace('/[^0-9.]+/', '', $data['no'][0]);
            // dd($no);/

            // $perusahaan = perusahaan::where('id', $data['id_perusahaan'])->first();
        //  for ($i=0; $i < ; $i++) {
                # code...
            //  }
            foreach ($kelompok as $key => $value) {
                    // dd($value);
                // $arr[] = $data['id_siswa'][$key];
                // dd($arr);
            $no = preg_replace('/[^0-9.]+/', '', $value['no']);

                $nama[] = Siswa::where('id',$value['id_siswa'])->first();
                // dd($nama);
                $new_name = str_replace(' ', '', $nama[0]->nama_siswa);
                // dd($new_name);
                $pengajuan_prakerin = kelompok_laporan::where('id_siswa',$value['id_siswa'])->update([
                    'no'   => 'Kelompok '.$no." - ".$new_name,
                    // 'id_guru'   => $data['id_guru'],
                    'id_siswa'   => $value['id_siswa'],
                    // 'nama_perusahaan'   => $perusahaan->nama,
                    // 'no_telpon'         => $request->no_telpon,
                    // 'jurusan'       => $data['jurusan'],


                ]);

            }

                    if (count($jml_kelompok) > 1) {
                        return redirect()->route('user.kelompok_laporan')->with(['success' => 'Anda keluar dari Kelompok  '.$no." - ".$new_name,' ']);
                    }else{
                        return redirect()->route('user.kelompok_laporan')->with(['success' => 'Anda Membubarkan Kelompok ']);

                    }


    }


    public function exportJurnal($id)

    {

// dd($id);



            $identitas_siswa  =  Siswa::where('id',$id)->first();

            // $identitas_orangtua  =  orang_tua::where('id',$id)->first();

            $dataP_siswa  =  data_prakerin::where('id',$id)->first();

            $jurnalP_siswa = jurnal_prakerin::where('id_siswa',$id)->get();

            $jurnalH_siswa = jurnal_harian::where('id_siswa',$id)->get();



            $from =  new Carbon($dataP_siswa->tgl_mulai);

            $end =  new Carbon($dataP_siswa->tgl_selesai);



            $jumlah_hari = $from->diffInDays($end);

            $jumlah_bulan = 4;

            //Spesifikasi bulan

            // dd($jurnalH_siswa);

                //     $jumlah_hari = $from->diff($end)->days;

                // // mendapat kan hari di setiap bulan yang berbeda

                // $hari =  Carbon::parse($from->format('Y-m-d'))->daysInMonth;

                // // hari mulai hingga akhir bulan

                //  dd($from->startOfDay()->format('Y-m-d H:i'),$from->endOfMonth()->format('Y-m-d H:i'));



        $pdf = PDF::loadView('export.PDF.jurnal',compact('jumlah_hari','jumlah_bulan','jurnalH_siswa','jurnalP_siswa','dataP_siswa','identitas_siswa'));



        return $pdf->stream('DATA Jurnal.PDF');



        //  $w->getClientOriginalName();



        // dd($pdf);





        }

}

