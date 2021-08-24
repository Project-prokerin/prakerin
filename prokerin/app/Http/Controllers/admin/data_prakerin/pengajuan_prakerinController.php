<?php

namespace App\Http\Controllers\admin\data_prakerin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kelompok_laporan;
use App\Models\perusahaan;
use App\Models\data_prakerin;
use App\Models\Tanda_tangan;
use App\Models\guru;
use App\Models\Siswa;
use App\Models\kelas;
use App\Http\Requests\admin\pengajuan_prakerinRequest;
use App\Models\pengajuan_prakerin;
use App\Models\detail_pengajuan_prakerin;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Datetime;

class pengajuan_prakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $w =  pengajuan_prakerin::distinct('no','id_guru','nama_perusahaan')->with('guru')->with('siswa')->get(['no', 'id_guru','nama_perusahaan']);
      $pengajuan_prakerin = pengajuan_prakerin::distinct('no','id_guru', 'nama_perusahaan')->with('guru')->get(['no','id_guru','nama_perusahaan']);
      //   $status = data_prakerin::unique('no');

    //   dd(data_prakerin::all()->toArray(),Siswa::all()->toArray(),$w,$pengajuan_prakerin);

        return view('admin.pengajuan_prakerin.index');
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
            if ($role == "kepsek" ) {
                $pengajuan_prakerin = pengajuan_prakerin::distinct('no','id_guru' , 'nama_perusahaan')->with('guru')->get(['no', 'id_guru', 'nama_perusahaan']);
                // dd($kelompok_laporan);
                return datatables()->of($pengajuan_prakerin)->addColumn('guru', function (pengajuan_prakerin $pengajuan_prakerin) {
                    return $pengajuan_prakerin->guru->nama;
                })
                    // ->addColumn('nama_perusahaan', function (kelompok_laporan $kelompok_laporan) {
                    //     return $kelompok_laporan->perusahaan->nama;
                    // })
                    ->addColumn('persetujuan', function ($data) {
                        $peng = pengajuan_prakerin::where('no',$data->no)->get();
                        # update cek status data prakein
                        $id_siswa = [];
                        foreach($peng as $val) {
                            $id_siswa[] = $val->id_siswa;
                        }
                        // return $id_siswa;
                        $datas = data_prakerin::whereIn('id_siswa',$id_siswa)->distinct('status')->first(['status']);
                        // return $data;
                        $stats = empty($datas->status) ? " " : $datas->status;


                        // $role = Auth::user()->role;
                        // $button = '';
                        // $status = data_prakerin::where('id_siswa',$data->id_siswa)->get();
                    if ($stats === 'Magang') {
                        $btn =  '<span class="badge bg-warning text-white" style="font-size: 12px; " ><b> ' . $stats . '</b></span>';
                        return $btn;
                    }else if($stats === 'Batal'){
                        $btn =  '<span class="badge bg-danger text-white" style="font-size: 12px; " ><b>' . $stats . '</b></span>';
                        return $btn;
                    }
                    else if($stats === 'Selesai'){
                        $btn =  '<span class="badge bg-success text-white" style="font-size: 12px; " ><b>' . $stats . '</b></span>';
                        return $btn;
                    }
                     else {
                        // $button .= '<a href="/admin/data_keluar/tolak/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-danger btn-sm"><i class="fas fa-times"></i></a>';
                        $button = '';
                        $button .= '<button type="button" name="acc" id="accButton" data-attr="/admin/pengajuan_prakerin/acc/'.$data->no.'" class="edit btn btn-success btn-sm"><i class="fas fa-check"></i></button>';
                        $button .= ' ';
                        $button .= '<button id="tolak"  data-no="'.$data->no.'"  data-toggle="modal"  class="tolak btn btn-danger btn-sm ml-1"><i class="fas fa-times"></i></button>';
                        return $button;

                    }

                        // return $button;
                    })
                    ->addColumn('action', function ($data) {
                        $button = '<a href="../admin/pengajuan_prakerin/detail/' . $data->no . '"   id="' . $data->no . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                        $button .= '&nbsp';
                        $button .= '&nbsp&nbsp&nbsp&nbsp&nbsp';
                        $button .= '<button type="button" name="kelompoks"  id="kelompoks"  data-attr="/admin/pengajuan_prakerin/Showexport/'.$data->no.'"   class="btn  btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i> PDsF</button>';
                        // $button .= '<button id="kelompoks" type="button" data-no="' . $data->no . '" class="btn btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i> PDF</button>';
                        return $button;
                    })
                    ->rawColumns(['persetujuan','action','guru'])
                    ->addIndexColumn()->make(true);
            }else{
                $pengajuan_prakerin = pengajuan_prakerin::distinct('no','id_guru', 'nama_perusahaan')->with('guru')->get(['no','id_guru','nama_perusahaan']);
                // dd($kelompok_laporan);
                return datatables()->of($pengajuan_prakerin)->addColumn('guru', function (pengajuan_prakerin $pengajuan_prakerin) {
                    return $pengajuan_prakerin->guru->nama;
                })
                ->addColumn('status', function (pengajuan_prakerin $pengajuan_prakerin) {
                    // $stats = data_prakerin::whereIn('id_siswa',$data->id_siswa)->get;
                    // $btn =  '<span class="badge bg-warning text-white" style="font-size: 12px; " ><b></b></span>';

                    // return $btn;
                    // $stats = data_prakerin::where('id_siswa',$pengajuan_prakerin->id_siswa)->first();
                    // var_dump($stats);

                    # ambil pengajuan
                    $peng = pengajuan_prakerin::where('no',$pengajuan_prakerin->no)->get();
                    # update cek status data prakein
                    $id_siswa = [];
                    foreach($peng as $val) {
                        $id_siswa[] = $val->id_siswa;
                    }
                    // return $id_siswa;
                    $data = data_prakerin::whereIn('id_siswa',$id_siswa)->distinct('status')->first(['status']);
                    // return $data;
                    $stats = empty($data->status) ? " " : $data->status;
                    if($stats == " ")
                    {
 $btn =  '<span class="badge bg-primary text-white" style="font-size: 12px; " ><b> Pengajuan </b></span>';
 return $btn;
                    }else if ($stats == "Magang") {
 $btn =  '<span class="badge bg-success text-white" style="font-size: 12px; " ><b>'.$stats.'</b></span>';
                                              return $btn;
                      }else if ($stats == "Batal") {
                        $btn = '<span class="badge bg-danger text-white"
                            style="font-size: 12px; "><b>'.$stats.'</b></span   >';
                        return $btn;
                        }else if ($stats == "Pengajuan") {
                        $btn = '<span class="badge bg-primary text-white"
                            style="font-size: 12px; "><b>'.$stats.'</b></span>';
                        return $btn;
                        }else if ($stats == "Selesai") {
                            $btn = '<span class="badge bg-success text-white"
                                style="font-size: 12px; "><b>'.$stats.'</b></span>';
                            return $btn;
                            }
                    // ->addColumn('id_perusahaan', function (kelompok_laporan $kelompok_laporan) {
                    // return $kelompok_laporan->perusahaan->nama;
                })
                    // ->addColumn('id_perusahaan', function (kelompok_laporan $kelompok_laporan) {
                    //     return $kelompok_laporan->perusahaan->nama;
                    // })
                    ->addColumn('persetujuan', function ($data) {
                        $role = Auth::user()->role;
                        $button = '';
                        if ( $role == "admin" || $role == "hubin" ||$role == "kaprog") {
                        // $button .= '<a href="/admin/data_keluar/tolak/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-danger btn-sm"><i class="fas fa-times"></i></a>';
                        $button .= '<button type="button" name="acc" id="accButton" data-attr="/admin/pengajuan_prakerin/acc/'.$data->no.'"  class="acc btn btn-success btn-sm"><i class="fas fa-check"></i></a>';
                        $button .= ' ';
                        $button .= '<button id="tolak"  data-no="' . $data->no . '"  data-toggle="modal"  class="tolak btn btn-danger btn-sm ml-1"><i class="fas fa-times"></i></button>';

                    }

                        return $button;
                    })
                    ->addColumn('action', function ($data) {
                    if (Auth::user()->role != "admin" && Auth::user()->role != "hubin" && Auth::user()->role != "kaprog" ) {
                        $button = '<a href="../admin/pengajuan_prakerin/detail/' . $data->no . '"   id="' . $data->no . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                        $button .= '&nbsp';
                        $button .= '&nbsp&nbsp&nbsp&nbsp&nbsp';
                        $button .= '<button type="button" name="kelompoks"  id="kelompoks"  data-attr="/admin/pengajuan_prakerin/Showexport/'.$data->no.'"   class="edit btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i> PDsF</button>';
                        // $button .= '<button id="kelompoks" type="button" data-no="' . $data->no . '" class="btn btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i> PDF</button>';
                        return $button;
                    }else{
                        $button = '<a href="../admin/pengajuan_prakerin/detail/' . $data->no . '"   id="' . $data->no . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                        $button .= '&nbsp';
                        $button .= '<a  href="../admin/pengajuan_prakerin/edit/' . $data->no . '" id="edit" data-toggle="tooltip"  data-id="' . $data->no . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                        $button .= '&nbsp';
                        $button .= '<button type="button" name="delete" id="hapus" data-no="' . $data->no . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                        $button .= '&nbsp&nbsp&nbsp&nbsp&nbsp';
                        $button .= '<button type="button" name="kelompoks"  id="kelompoks"  data-attr="/admin/pengajuan_prakerin/Showexport/'.$data->no.'"   class="edit btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i> PDsF</button>';
                        // $button .= '<button id="kelompoksButton" type="button" data-attr="/admin/pengajuan_prakerin/Showexport/'.$data->no.'"  class="btn btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i> PDF</button>';
                        return $button;
                    }
                    })
                    ->rawColumns(['status','persetujuan','action','guru'])
                    ->addIndexColumn()->make(true);
            }

            // with('data_prakerin')->with('guru')->
        }
        // return response()->json();
    }
    public function tambah(Request $request)
    {
        // if(Auth::user()->role != "hubin" or Auth::user()->role != "kaprog" ){
        //     return back();
        // }else{
        // }
        // dd(pengajuan_prakerin::all());
        $siswa = siswa::doesntHave('data_prakerin')->has('kelompok_laporan')->get();



            if (pengajuan_prakerin::all()->isEmpty()) {
                $no =  siswa::all()->count();
                    for ($i=1; $i <= $no; $i++) {
                        //mengambil jumlah siswa yang akan di loop
                        $nomor[] = $i;
                    }
                    $noKelompok = $nomor;
                }else{
                    $no =  siswa::all()->count();
                    for ($i=1; $i <= $no; $i++) {
                        //mengambil jumlah siswa yang akan di loop
                        $nomor[] = $i;
                    }



                    $users = pengajuan_prakerin::all();
                    // mencari pengajuan yang memiliki no duplicate dan di jadikan unique
                       $usersUnique = $users->unique("no");
                    //    dd($usersUnique);

                    // dd($w);

                    foreach ($usersUnique as $key ) {
                           $w = explode(' ',$key->no)[1];
                        //    dd($w);
                           // membuat array untuk index baru
                           $unique[] =   $w;
                        //    dd($unique);

                        }

                        $a1=$nomor;
                        $a2=$unique;
                        //membandingkan isi array dari jumlah siswa dengan no unique
                        $noKelompok=array_diff($a1,$a2);
                }

            $perusahaan = perusahaan::all();
            $guru = guru::where('jabatan', 'pembimbing')->doesntHave('kelompok_laporan')->doesntHave('data_prakerin')->get();
            return view('admin.pengajuan_prakerin.tambah', compact('noKelompok','siswa', 'perusahaan', 'guru'));



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(pengajuan_prakerinRequest $request)
    {
        // dd($request);




        $request->validated();
        $data = $request->all();

        $kelompok[] = $request->id_data_prakerin0;
    $kelompok[] = $request->id_data_prakerin1;
    $kelompok[] = $request->id_data_prakerin2;
    $kelompok[] = $request->id_data_prakerin3;
    $kelompok[] = $request->id_data_prakerin4;
    $kelompok[] = $request->id_data_prakerin5;
    $kelompok[] = $request->id_data_prakerin6;
    $kelompok[] = $request->id_data_prakerin7;
    $kelompok[] = $request->id_data_prakerin8;
    $kelompok[] = $request->id_data_prakerin9;
    $kelompok[] = $request->id_data_prakerin10;
    $kelompok[] = $request->id_data_prakerin11;
    $kelompok[] = $request->id_data_prakerin12;
    $kelompok[] = $request->id_data_prakerin13;
    $kelompok[] = $request->id_data_prakerin14;
    $kelompok[] = $request->id_data_prakerin15;

    // dd($kelompok);
        if ( $keyAspek = array_diff($kelompok,[null])) {
            foreach ($keyAspek as $kuy) {
                $kelompokk[] = $kuy;
            }
   
        }
        // dd($kelompokk);
        //    array($data);
        // dd($data);
        $perusahaan = perusahaan::where('id', $data['id_perusahaan'])->first();

        // $nama = [];

        // foreach ($data['id_data_prakerin'] as $w => $val) {
        // }
//
        // dd($nama[0]->nama_siswa);

        foreach($kelompokk as $key => $value){
            $siswa = Siswa::where('id',$value)->first();
            
            $kelas = kelas::where('level',$siswa->kelas)->first();
            // dd($kelas);
            $dataa = array(
                'nama'   => $siswa->nama_siswa,
                'id_kelas'         => $kelas->id,
                'id_siswa'      => $siswa->id,
                'id_perusahaan' => $request->id_perusahaan,
                'id_guru' => $request->id_guru,
                'status' => 'Pengajuan',
                // 'tgl_mulai' => 'NUll',
                // 'tgl_selesai' => 'NULL'
        );
        data_prakerin::create($dataa);
        }


        foreach ($kelompokk as $key => $value) {
            // $arr[] = $kelompokk[$key];
           $nama[] = Siswa::where('id', $value)->first();

        $new_name = str_replace(' ', '', $nama[0]->nama_siswa);

            $data2 = array(
                'no'   => 'Kelompok '.$data['no']." - ".$new_name,
                'id_guru'   => $data['id_guru'],
                'id_siswa'   => $value,
                'nama_perusahaan'   => $perusahaan->nama,
                // 'jurusan'       => $data['jurusan'],
            );

           $pengajuan_prakerin = pengajuan_prakerin::create($data2);
        }
        $surat_number = pengajuan_prakerin::all()->unique('no');

        detail_pengajuan_prakerin::create([
            'id_pengajuan_prakerin' => $pengajuan_prakerin->id,
            'no_surat' =>  str_pad($surat_number->count() + 1, 3, "0", STR_PAD_LEFT),
        ]);
        // $input = Input::all();
        // $id_dataP = [];
        // $condition = $input['id_data_prakerin'];

        // if (count($data['id_data_prakerin']  > 0) ) {
        // $arr = [];

        // $surat_number = $surat_number->unique('no');
        // $grouped = $pengajuan_prakerin::->groupBy('no')->map(function ($row) {return $row->count();});
        // dd($surat_number->count());




        // foreach ($request->id_data_prakerin as $key => $val) {
        //     $data = kelompok_laporan::create([
        //         'no'   => $request->no,
        //         'id_guru'   => $request->id_guru,
        //         'id_data_prakerin'   => $request->id_data_prakerin[$key],
        //         'nama_perusahaan'   => $perusahaan->nama,
        //         'no_telpon'         => $request->no_telpon,
        //         'jurusan'       => $request->jurusan,

        //     ]);
        // }
        // dd($data);

        return redirect()->route('pengajuan_prakerin.index')->with(['success' => 'Pengajuan berhasil di buat!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {



//         dd(Carbon::now()->format('Y'));
//         $month = Carbon::now()->format('m');
//         $bulan  = numberToRomanRepresentation($month);

// dd($month,$bulan);
//         $tanggal_range = explode('s.d.','2021-8-03  s.d.  2021-10-3');
//         $from_t =  $tanggal_range[0];
//         $end_t =  $tanggal_range[1];
//         $from =  new Carbon($tanggal_range[0]);
//         $end =  new Carbon($tanggal_range[1]);


//         $date1 = new Carbon($from_t);
//         $date2 = new Carbon($end_t);
        // $hari_from = Carbon::parse($from)->isoFormat('dddd');
// dd($hari_from);
        // $difference = $date1->diff($date2);
        //  $jumlah_bulan  = $difference->m.' Bulan'; //4
        //  if ($jumlah_bulan == 0) {
        //      $jumlah_bulan  = $difference->d.' Hari'; //4
        //  }
        // dd($jumlah_bulan);

        // $date1 = new Carbon($from_t);
        // $date2 = new Carbon($end_t);
        // $difference = $date1->diff($date2);

        // $jumlah_month  = $difference->m; //4

        // if ($jumlah_month == 0) {
        //     $jumlah_month  = $difference->d; //4

        // }
        // // dd($diffInMonths);

        //  $jumlah_hari = $from->diff($end)->days;
        //  $hari_from = Carbon::parse($from)->isoFormat('dddd');
        // //  $hari_end = Carbon::parse($end)->isoFormat('dddd');

        //  $date_from = Carbon::parse($from)->isoFormat('D MMMM ');
        //  $date_end = Carbon::parse($end)->isoFormat('D MMMM ');
        //  $date_year = $from->year;


        //  dd($hari_from,$date_from,$jumlah_hari.'jumlah hari',$jumlah_month.'jumlah bulan');
        // $month = Carbon::now()->month();
//    dd($month->format('m'));
// dd($tahun);
// $perusahaan = pengajuan_prakerin::where('no','2|NurFirdaus')->first()->nama_perusahaan;
// dd($perusahaan);
        // $pengajuan_prakerin = pengajuan_prakerin::where('no',$id)->with('siswa')->whereNotNull('id_siswa')->get();
        // $perusahaan = pengajuan_prakerin::where('no',$id)->first();

        // dd($perusahaan);

        // $pengajuan_prakerin = pengajuan_prakerin::where('no', $id)->with('data_prakerin')->get();
        $pengajuan_prakerin = pengajuan_prakerin::where('no',$id)->with('siswa')->whereNotNull('id_siswa')->get();

        // foreach ($pengajuan_prakerin as $key ) {
        //     $kelas[] = kelas::where('level',$key->siswa->kelas)->first()->toArray();
        // }
        // dd($kelas);
        return view('admin.pengajuan_prakerin.detail', compact('pengajuan_prakerin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (pengajuan_prakerin::all()->isEmpty()) {
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



            $users = pengajuan_prakerin::all();
            // mencari pengajuan yang memiliki no duplicate dan di jadikan unique
            $usersUnique = $users->unique("no");
            //    dd($usersUnique);

            // dd($w);

            foreach ($usersUnique as $key) {
                $w = explode('|', $key->no);
                //    dd($w);
                // membuat array untuk index baru
                $unique[] =   $w[0];
                //    dd($unique);

            }

            $a1 = $nomor;
            $a2 = $unique;
            //membandingkan isi array dari jumlah siswa dengan no unique
            $noKelompok = array_diff($a1, $a2);
        }
        // $no =  detail_pengajuan_prakerin::all();
        // dd($no);
        // $data_prakerin = Siswa::doesntHave('kelompok_laporan')->get();
        $perusahaan = perusahaan::all();
        $guru = guru::where('jabatan','pembimbing')->doesntHave('kelompok_laporan')->doesntHave('data_prakerin')->get();
        // $siswa = Siswa::all()->toArray();
        $siswa = Siswa::doesntHave('data_prakerin')->has('kelompok_laporan')->get();
        // dd($siswa->toArray());
        $pengajuan_prakerin = pengajuan_prakerin::where('no', $id)->with('siswa')->get();
        $perusahaan_select = perusahaan::where('nama',$pengajuan_prakerin[0]->nama_perusahaan)->first() ;
        return view('admin.pengajuan_prakerin.edit', compact('perusahaan_select','pengajuan_prakerin', 'perusahaan', 'guru', 'siswa', 'noKelompok'));

        // return view('admin.pengajuan_prakerin.edit');
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


// dd($request);
        $kelompok[] = $request->id_data_prakerin0;
    $kelompok[] = $request->id_data_prakerin1;
    $kelompok[] = $request->id_data_prakerin2;
    $kelompok[] = $request->id_data_prakerin3;
    $kelompok[] = $request->id_data_prakerin4;
    $kelompok[] = $request->id_data_prakerin5;
    $kelompok[] = $request->id_data_prakerin6;
    $kelompok[] = $request->id_data_prakerin7;
    $kelompok[] = $request->id_data_prakerin8;
    $kelompok[] = $request->id_data_prakerin9;
    $kelompok[] = $request->id_data_prakerin10;
    $kelompok[] = $request->id_data_prakerin11;
    $kelompok[] = $request->id_data_prakerin12;
    $kelompok[] = $request->id_data_prakerin13;
    $kelompok[] = $request->id_data_prakerin14;
    $kelompok[] = $request->id_data_prakerin15;

    // dd($kelompok);
        if ( $keyAspek = array_diff($kelompok,[null])) {
            foreach ($keyAspek as $kuy) {
                $kelompokk[] = $kuy;
            }
   
        }
        // dd($request);
            $no = Pengajuan_prakerin::where('no',$request->no[0])->get();
            // dd();

            if (count($no) > count($kelompokk) || count($no) < count($kelompokk ) ) {

                // dd($kelompokk);
                $peng = pengajuan_prakerin::where('no', $request->no[0])->get();
                // dd($peng);
                # hapus data prakerin
                foreach ($peng as $key => $value) {
                    # ini gua coba update 2 data
                  $w =  data_prakerin::whereIn('id_siswa', [$value->id_siswa])->delete();
                //   dd($w);
                }
                pengajuan_prakerin::where('no', $request->no[0])->delete();


                $data = $request->all();

                // dd($data);

                // $nama = [];

                //  foreach ($data['id_data_prakerin'] as $w => $val) {
                //     $nama[] = Siswa::where('id', $nama);
                //  }

                 // dd($nama);

                 foreach($kelompokk as $key => $value){
                     $siswa = Siswa::where('id',$value)->first();
                     // dd($siswa);
                     $kelas = kelas::where('level',$siswa->kelas)->first();
                     $dataa = array(
                         'nama'   => $siswa->nama_siswa,
                         'id_kelas'         => $kelas->id,
                         'id_siswa'      => $siswa->id,
                         'id_perusahaan' => $data['id_perusahaan'],
                         'id_guru' => $data['id_guru'],
                         'status' => 'Pengajuan',
                         // 'tgl_mulai' => 'NUll',
                         // 'tgl_selesai' => 'NULL'
                 );
                 data_prakerin::create($dataa);
                 }
                //  foreach ($data['id_data_prakerin'] as $w => $val) {
                //  }

                $no = preg_replace('/[^0-9.]+/', '',$data['no'][0]);
                // dd($no);
                // dd();kelas
                // dd($data['no'][0]);
                $perusahaan = perusahaan::where('id', $data['id_perusahaan'])->first();
                ;
                // dd($kelompokk);
                foreach ($kelompokk as $key => $value) {
                    
                    $nama[] = Siswa::where('id', $value)->first();
                   $new_name = str_replace(' ', '', $nama[0]->nama_siswa);
   
                    // dd($no.'|'.$new_name);
                    $data2 = array(
                        'no'   => 'Kelompok '.$no." - ".$new_name,
                        'id_guru'   => $data['id_guru'],
                        'id_siswa'   => $value,
                        'nama_perusahaan'   => $perusahaan->nama,
                        // 'jurusan'       => $data['jurusan'],
                    );

                   $pengajuan_prakerin = pengajuan_prakerin::create($data2);
                }
                $surat_number = pengajuan_prakerin::all()->unique('no');

                detail_pengajuan_prakerin::create([
                    'id_pengajuan_prakerin' => $pengajuan_prakerin->id,
                    'no_surat' =>  str_pad($surat_number->count() + 1, 3, "0", STR_PAD_LEFT),
                ]);
        return redirect()->route('pengajuan_prakerin.index')->with(['success' => 'Pengajuan ' .'Kelompok '.$no." - ".$new_name . ' berhasil di Update  !']);
                // return response()->json($data = 'berhasil');
            }else{
                // dd($request);
                $peng = pengajuan_prakerin::where('no', $request->no[0])->get();
                // dd($peng);
                # hapus data prakerin
                foreach ($peng as $key => $value) {
                    # ini gua coba update 2 data
                  $w =  data_prakerin::whereIn('id_siswa', [$value->id_siswa])->delete();
                //   dd($w);
                }
                // pengajuan_prakerin::where('no', $request->no[0])->delete();


                $data = $request->all();

                // dd($data);

                // $nama = [];

                //  foreach ($data['id_data_prakerin'] as $w => $val) {
                //     $nama[] = Siswa::where('id', $nama);
                //  }

                 // dd($nama);

                 foreach($kelompokk as $key => $value){
                     $siswa = Siswa::where('id',$value)->first();
                     $kelas = kelas::where('level',$siswa->kelas)->first();
                     // dd($siswa);
                     $dataa = array(
                         'nama'   => $siswa->nama_siswa,
                         'id_kelas'         => $kelas->id,
                         'id_siswa'      => $siswa->id,
                         'id_perusahaan' => $request->id_perusahaan,
                         'id_guru' => $request->id_guru,
                         'status' => 'Pengajuan',
                         // 'tgl_mulai' => 'NUll',
                         // 'tgl_selesai' => 'NULL'
                 );
                 data_prakerin::create($dataa);
                 }
                
                $no = preg_replace('/[^0-9.]+/', '',$request->no[0]);

                $perusahaan = perusahaan::where('id', $request->id_perusahaan)->first();
                foreach ($kelompokk as $key => $val) {
                    $nama[] = Siswa::where('id', $val)->first();
                   $new_name = str_replace(' ', '', $nama[0]->nama_siswa);
                    $data = pengajuan_prakerin::where('id', $request->id[$key])->where('no', $request->no[$key])->update([
                        'no'   => 'Kelompok '.$no." - ".$new_name,
                        'nama_perusahaan'   => $perusahaan->nama,
                        'id_guru'   => $request->id_guru,
                        'id_siswa'   => $val,

                    ]);
                    // dd($data);
                }
                return redirect()->route('pengajuan_prakerin.index')->with(['success' => 'Pengajuan '.'Kelompok '.$no." - ".$new_name.' berhasil di Update  !']);

            }



    }

    public function updates(pengajuan_prakerinRequest $request, data_prakerin $data_prakerin)
    {
        $request->validated();

        $siswa = Siswa::where('id', $request->id_siswa)->first();
        // dd($siswa->nama_siswa);
        $update = data_prakerin::where('id', $data_prakerin->id)->update([
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
        return redirect()->route('data_prakerin.index')->with(['pesan' => "Data Berhasil di Update"]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function acc($id)
    {

        $pengajuan = pengajuan_prakerin::where('no',$id)->first();

        $tandatangan = Tanda_tangan::all();
        // $surat_keluar = Surat_keluar::find($id);
        // $isi_surat = Isi_surat::find($id);
        return view('admin.pengajuan_prakerin.accPengajuan',compact('pengajuan','tandatangan'));
        // return view('admin.surat_keluar.tandatangan',compact('tandatangan','surat_keluar','isi_surat'));

    }

    public function accmagang(Request $request,$no)
    {

        // $tgl = $request->tgl_magang;

        $tgl = explode('s.d.',$request->tgl_magang);

        $tgl_mulai = $tgl[0];
        $tgl_selesai = $tgl[1];

            # jangan whare no dah takutnya ada no yg duplicade jadi ada bug
           $pengajuan = pengajuan_prakerin::where('no',$no)->get();

           foreach ($pengajuan as $key => $value) {
            $data =    pengajuan_prakerin::whereIn('no', [$no])->update(
                [
                    'id_tanda_tangan' => $request->tanda_tangan,
                ]);
        }

            foreach ($pengajuan as $key => $value) {
                # ini gua coba update 2 data
            $data =    data_prakerin::whereIn('id_siswa', [$value->id_siswa])->update(
                [
                    'status' => 'Magang',
                    'tgl_mulai' => $tgl_mulai,
                    'tgl_selesai' => $tgl_selesai,
                ]);
            }
            # cek data yg abis di update tadi
        //    $data = data_prakerin::whereIn('id_siswa',[$pengajuan[0]->id_siswa,$pengajuan[1]->id_siswa])->get();

            # coba nge return data yg udh di update
            return response()->json($data);
        // return response()->json($pengajuan);
    }


    public function pengajuanShowexport($id)
    {

       
        $pengajuan = pengajuan_prakerin::where('no',$id)->first();
        // $cekTtd = pengajuan_prakerin::where('no',$id)->first()->id_tanda_tangan;
        $cekTgl = data_prakerin::where('id_guru',$pengajuan->id_guru)->first();
     
        return view('admin.pengajuan_prakerin.Exportpdf',compact('cekTgl','pengajuan'));
        // return view('admin.surat_keluar.tandatangan',compact('tandatangan','surat_keluar','isi_surat'));

    }






    public function tolak(Request $request, $no)
    {


                # jangan whare no dah takutnya ada no yg duplicade jadi ada bug
           $pengajuan = pengajuan_prakerin::where('no', $no)->get();

           foreach ($pengajuan as $key => $value) {
            $data =    pengajuan_prakerin::whereIn('no', [$no])->update(
                [
                    'id_tanda_tangan' => null,
                ]);
        }


            foreach ($pengajuan as $key => $value) {
                # ini gua coba update 2 data
                // ini ngambil dari id siswa di data prakerin yang sama kaya id data prakerin di pengajuan nya
                $data =  data_prakerin::whereIn('id_siswa', [$value->id_siswa])->update(['status' => 'Batal']);
            }
            # cek data yg abis di update tadi
        //    $data = data_prakerin::whereIn('id_siswa',[$pengajuan[0]->id_siswa,$pengajuan[1]->id_siswa])->get();

            # coba nge return data yg udh di update
            return response()->json($data = $pengajuan);
        // return response()->json($pengajuan);
    }



    public function destroy(Request $request, $no)
    {

        $peng = pengajuan_prakerin::where('no', $no)->get();
        # hapus data prakerin
        foreach ($peng as $key => $value) {
            # ini gua coba update 2 data
            data_prakerin::whereIn('id_siswa', [$value->id_siswa])->delete();
        }
        pengajuan_prakerin::where('no', $no)->delete();

        // detail_pengajuan_prakerin::where('id_data_prakerin',)
        return response()->json($data = 'berhasil');
    }
    public function delete_all(Request $request, $no)
    {

    }









    public function fetch(Request $request,$id)
    {
        return json_encode(siswa::doesntHave('data_prakrin')->whereHas('pembekalan_magang', function ($query) { return $query->where('psikotes', '=', 'sudah')->where('soft_skill', '=', 'sudah')->whereNotNull('file_portofolio'); })->where('id_perusahaan', $id)->get());

        // return json_encode(siswa::doesntHave('data_prakrin')->where('status','Pengajuan')->where('id_perusahaan', $id)->get());
    }
    # yang udah status jadi mgang dmna? acc
    public function fetch_edit(Request $request,$id)
    {

        return json_encode(data_prakerin::where('status','Pengajuan')->where('id_perusahaan', $id)->get());

    }
}
