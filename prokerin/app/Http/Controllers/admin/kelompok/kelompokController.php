<?php

namespace App\Http\Controllers\admin\kelompok;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kelompok_laporan;
use App\Models\perusahaan;
use App\Models\data_prakerin;
use App\Models\guru;
use App\Models\Siswa;
use DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\admin\kelompok_laporanRequest;

class kelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd($guruP);

        // $kelompokLaporan = kelompok_laporan::distinct('no','id_guru')->where('id_guru',$guruP->id)->get(['no','id_guru']);
        // dd($kelompokLaporan);
        return view('admin.kelompok_prakerin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $role = Auth::user()->role;
            if ($role != 'pembimbing') {
               // with('data_prakerin')->with('guru')->
            $kelompokLaporan = kelompok_laporan::distinct('no','id_guru','nama_perusahaan')->get(['no','id_guru','nama_perusahaan']);
            // dd($kelompok_laporan);
            return datatables()->of($kelompokLaporan)->addColumn('guru', function (kelompok_laporan $kelompok_laporan) {
                    return $kelompok_laporan->guru->nama;
                })
                // ->addColumn('id_perusahaan', function (kelompok_laporan $kelompok_laporan) {
                //     return $kelompok_laporan->perusahaan->nama;
                // })
                    ->addColumn('action', function ($data) {
                    $button = '<a href="../admin/kelompok/detail/'.$data->no . '"   id="' . $data->no . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    if (  Auth::user()->role != 'kepsek' && Auth::user()->role != 'tu'  && Auth::user()->role != 'bkk' ) {
                        $button .= '<a  href="../admin/kelompok/edit/'.$data->no.'" id="edit" data-toggle="tooltip"  data-id="' . $data->no . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                        $button .= '&nbsp';
                        $button .= '<button type="button" name="delete" id="hapus" data-no="' . $data->no . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
            }else{
             $guruP = guru::where('id_user',Auth::id())->first();

                 // with('data_prakerin')->with('guru')->
                 $kelompokLaporan = kelompok_laporan::distinct('no','id_guru','nama_perusahaan')->where('id_guru',$guruP->id)->get(['no','id_guru','nama_perusahaan']);
            // dd($kelompok_laporan);
            return datatables()->of($kelompokLaporan)->addColumn('guru', function (kelompok_laporan $kelompok_laporan) {
                    return $kelompok_laporan->guru->nama;
                })
                // ->addColumn('id_perusahaan', function (kelompok_laporan $kelompok_laporan) {
                //     return $kelompok_laporan->perusahaan->nama;
                // })
                    ->addColumn('action', function ($data) {
                    $button = '<a href="../admin/kelompok/detail/'.$data->no . '"   id="' . $data->no . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    if ( Auth::user()->role != 'pembimbing' ) {
                        
                            $button .= '<a  href="../admin/kelompok/edit/'.$data->no.'" id="edit" data-toggle="tooltip"  data-id="' . $data->no . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                            $button .= '&nbsp';
                            $button .= '<button type="button" name="delete" id="hapus" data-no="' . $data->no . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                        }
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
            }
           
        }
        // return response()->json();
    }
    public function tambah(Request $request)
    {

        if (kelompok_laporan::all()->isEmpty()) {
            $no =  siswa::all()->count();
            for ($i = 1; $i <= $no; $i++) {
                //mengambil jumlah siswa yang akan di loop
                $nomor[] = $i;
            }
            $noKelompok = $nomor;
        } else {
            $no =  siswa::all()->count();
            for ($i = 1; $i <= $no; $i++) {
                //mengambil jumlah siswa yang akan di loop
                $nomor[] = $i;
            }



            $users = kelompok_laporan::all();
            // mencari pengajuan yang memiliki no duplicate dan di jadikan unique
            $usersUnique = $users->unique("no");

            foreach ($usersUnique as $key) {

                // explode / pecah ambil index ke 1
                $w = explode(' ', $key->no)[1];

                // membuat array untuk index baru
                $unique[] =   $w;
                //    dd($unique);

            }

            $a1 = $nomor; // jumlah siswa
            $a2 = $unique; // nomor

            //membandingkan isi array dari jumlah siswa dengan no unique
            // mencari perbedaan antara a dan b
            $noKelompok = array_diff($a1, $a2);
        }

        // $siswa = Siswa::doesntHave('kelompok_laporan')->get();
        $siswa = Siswa::doesntHave('kelompok_laporan')->doesntHave('data_prakerin')->whereHas('pembekalan_magang', function ($query) { return $query->where('psikotes', '=', 'sudah')->where('soft_skill', '=', 'sudah')->whereNotNull('file_portofolio'); })->get();
        // dd($siswa->toArray());

        $perusahaan = perusahaan::all();
        $guru = guru::doesntHave('kelompok_laporan')->doesntHave('data_prakerin')->where('jabatan','pembimbing')->get();
        return view('admin.kelompok_prakerin.tambah',compact('noKelompok','siswa','perusahaan','guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(kelompok_laporanRequest $request)
    {
        // dd($request);
        $request->validated();
        $data = $request->all();

        $kelompok[] = $request->id_siswa0;
    $kelompok[] = $request->id_siswa1;
    $kelompok[] = $request->id_siswa2;
    $kelompok[] = $request->id_siswa3;
    $kelompok[] = $request->id_siswa4;
    $kelompok[] = $request->id_siswa5;
    $kelompok[] = $request->id_siswa6;
    $kelompok[] = $request->id_siswa7;
    $kelompok[] = $request->id_siswa8;
    $kelompok[] = $request->id_siswa9;
    $kelompok[] = $request->id_siswa10;
    $kelompok[] = $request->id_siswa11;
    $kelompok[] = $request->id_siswa12;
    $kelompok[] = $request->id_siswa13;
    $kelompok[] = $request->id_siswa14;
    $kelompok[] = $request->id_siswa15;

    // dd($kelompok);
        if ( $keyAspek = array_diff($kelompok,[null])) {
            foreach ($keyAspek as $kuy) {
                $kelompokk[] = $kuy;
            }
   
        }
    //    array($);
    // dd($kelompokk);
        // dd();
        $perusahaan = perusahaan::where('id', $data['id_perusahaan'])->first();

       
            foreach (array_unique($kelompokk) as $key => $value) {
                // $arr[] = $data['id_data_prakerin'][$key];
            $nama[] = Siswa::where('id', $value)->first();
            $new_name = str_replace(' ', '', $nama[0]->nama_siswa);
                // loop setenag itu nambah
                $data2 = array(
                    'no'   => 'Kelompok '.$data['no']." - ".$new_name,
                    'id_guru'   => $data['id_guru'],
                    'id_siswa'   => $value,
                    'nama_perusahaan'   => $perusahaan->nama,
                    'no_telpon'         => $data['no_telpon'],
                    // 'jurusan'       => $data['jurusan'],
                );
                // dd($data2);
                kelompok_laporan::create($data2);
            }

            if (Auth::user()->role == 'siswa') {
                return redirect()->route('user.kelompok_laporan')->with(['success' => 'Kelompok '.$data['no'].' - '.$new_name.' berhasil di buat!']);
            }else {
                return redirect()->route('kelompok.index')->with(['success' => 'Kelompok '.$data['no'].' - '.$new_name.' berhasil di buat!']);
            }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {


        $kelompok_laporan = kelompok_laporan::where('no',$id)->with('siswa')->get();
        // $kelompok = kelompok_laporan::where('no',$id)->whereNotNull('id_data_prakerin')->get();

        return view('admin.kelompok_prakerin.detail',compact('kelompok_laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (kelompok_laporan::all()->isEmpty()) {
            $no =  siswa::all()->count();
            for ($i = 1; $i <= $no; $i++) {
                //mengambil jumlah siswa yang akan di loop
                $nomor[] = $i;
            }
            $noKelompok = $nomor;
        } else {
            $no =  siswa::all()->count();
            for ($i = 1; $i <= $no; $i++) {
                //mengambil jumlah siswa yang akan di loop
                $nomor[] = $i;
            }



            $users = kelompok_laporan::where('no',$id)->get();
            // mencari pengajuan yang memiliki no duplicate dan di jadikan unique
            $usersUnique = $users->unique('no');
            // dd($usersUnique);
            // loop yang unique
            foreach ($usersUnique as $key) {

                // explode / pecah ambil index ke 1
                $w = explode(' ', $key->no)[1];
                // dd($w);
                // membuat array untuk index baru
                $unique[] =   $w;
                //    dd($unique);

            }

            $no_nomor = $nomor; // jumlah siswa
            $no_unique = $unique[0]; // nomor kelompoknya
        }

        // dd($data_prakerin);
        $kel = kelompok_laporan::where('no', $id)->first();

        $perusahaan = perusahaan::all();
        $guru = guru::where('jabatan', 'pembimbing')->get();
        $siswa = Siswa::doesntHave('data_prakerin')->whereHas('pembekalan_magang', function ($query) { return $query->where('psikotes', '=', 'sudah')->where('soft_skill', '=', 'sudah')->whereNotNull('file_portofolio'); })->get();

        // $siswa = Siswa::doesntHave('kelompok_laporan')->get();
        $kelompok_laporan = kelompok_laporan::where('no', $id)->with('siswa')->get();

        // no kelompok memakai pref replace
        // mencari hanya angka memakai regex
        // $no = preg_replace('/[^0-9.]+/', '', 'kelompok '.$kelompok_laporan->no);
        //
        $perusahaan_select = perusahaan::where('nama',$kelompok_laporan[0]->nama_perusahaan)->first();
        // $perusahaan_select = kelompok_laporan::where('no',$kelompok_laporan[0]->nama_perusahaan)->first();
        return view('admin.kelompok_prakerin.edit',compact('perusahaan_select','kelompok_laporan','perusahaan','guru','siswa', 'no_nomor','no_unique'));

        // return view('admin.kelompok_prakerin.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $input = Input::all();
        // $id_dataP = $request->id_data_prakerin;
        // dd($request);

    
    // dd($kelompok);
    $kelompok[] = $request->id_siswa0;
    $kelompok[] = $request->id_siswa1;
    $kelompok[] = $request->id_siswa2;
    $kelompok[] = $request->id_siswa3;
    $kelompok[] = $request->id_siswa4;
    $kelompok[] = $request->id_siswa5;
    $kelompok[] = $request->id_siswa6;
    $kelompok[] = $request->id_siswa7;
    $kelompok[] = $request->id_siswa8;
    $kelompok[] = $request->id_siswa9;
    $kelompok[] = $request->id_siswa10;
    $kelompok[] = $request->id_siswa11;
    $kelompok[] = $request->id_siswa12;
    $kelompok[] = $request->id_siswa13;
    $kelompok[] = $request->id_siswa14;
    $kelompok[] = $request->id_siswa15;

    // dd($kelompok);
        if ( $keyAspek = array_diff($kelompok,[null])) {
            foreach ($keyAspek as $kuy) {
                $kelompokk[] = $kuy;
            }
   
        }
        // $perusahaan = Perusahaan::find('id',$request->id_perusahaan)->first();
        // $data = $request->all();
        // $request->validated();
        // dd($kelompokk);
        $no = kelompok_laporan::where('no', $request->no[0])->get();

        if (count($no) > count($kelompokk) || count($no) < count($kelompokk)) {
            kelompok_laporan::where('no', $request->no[0])->delete();


            $data = $request->all();
            // dd($data);
            $no = preg_replace('/[^0-9.]+/', '', $data['no'][0]);
            // dd($no);/

            $perusahaan = perusahaan::where('id', $data['id_perusahaan'])->first();
            foreach ($kelompokk as $key => $value) {
                    // dd($value);
                // $arr[] = $kelompokk[$key];
                // dd($arr);
                $nama[] = Siswa::where('id',$value)->first();
                // dd($nama);
                $new_name = str_replace(' ', '', $nama[0]->nama_siswa);
                // dd($new_name); 
             $data2 = array(
                    'no'   => 'Kelompok '.$no." - ".$new_name,
                    'id_guru'   => $data['id_guru'],
                    'id_siswa'   => $value,
                    'nama_perusahaan'   => $perusahaan->nama,
                    'no_telpon'         => $request->no_telpon,
                    // 'jurusan'       => $data['jurusan'],
                );
                // dd($data2);

                $pengajuan_prakerin = kelompok_laporan::create($data2);
            }

            return redirect()->route('kelompok.index')->with(['success' => 'Pengajuan   Kelompok '.$no.' - '.$new_name . ' berhasil di Update  !']);


            // return response()->json($data = 'berhasil');
        } else {
            $perusahaan = perusahaan::where('id', $request->id_perusahaan)->first();
            $no = preg_replace('/[^0-9.]+/', '', $request->no[0]);
            foreach ($kelompokk as $key => $val) {
                $nama[] = Siswa::where('id',$val)->first();
                $new_name = str_replace(' ', '', $nama[0]->nama_siswa);
                $data = kelompok_laporan::where('id', $request->id[$key])->where('no', $request->no[$key])->update([
                    
                    'no'   => 'Kelompok '.$no." - ".$new_name,
                    'id_guru'   => $request->id_guru,
                    'id_siswa'   => $val,
                    'nama_perusahaan'   => $perusahaan->nama,
                    'no_telpon'         => $request->no_telpon,
                    // 'jurusan'       => $request->jurusan,

                ]);
            }
            return redirect()->route('kelompok.index')->with(['success' => 'Pengajuan   Kelompok '.$no.' - '.$new_name . ' berhasil di Update  !']);


        }
    }
// dd($update);
// return redirect()->route('kelompok.index')->with(['update' => 'Kelompok '.$request->no[0].' berhasil di Update  !']);
//     }
    public function updates(kelompok_laporanRequest $request,data_prakerin $data_prakerin)
    {

        $request->validated();

        $siswa = Siswa::where('id', $request->id_siswa)->first();
        // dd($siswa->nama_siswa);
        $update = data_prakerin::where('id',$data_prakerin->id )->update([
            'nama'   => $siswa->nama_siswa,
            'kelas'         => $request->kelas,
            'jurusan'       => $request->jurusan,
            'id_siswa'      => $request->id_siswa,
            'id_perusahaan' => $request->id_perusahaan,
            'id_guru' => $request->id_guru,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai
        ]);
            // dd($update);
             return redirect()->route('data_prakerin.index')->with(['pesan'=>"Data Berhasil di Update"]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

    }
    public function delete_all(Request $request, $no)
    {
        kelompok_laporan::where('no',$no)->delete();
        return response()->json($data = 'berhasil');

    }


    public function fetch(Request $request,$id)
    {
        return json_encode(data_prakerin::doesntHave('kelompok_laporan')->where('status','Magang')->where('id_perusahaan', $id)->get());



    }

    public function fetch_edit(Request $request,$id)
    {

        return json_encode(data_prakerin::where('status','Magang')->where('id_perusahaan', $id)->get());

    }
}

