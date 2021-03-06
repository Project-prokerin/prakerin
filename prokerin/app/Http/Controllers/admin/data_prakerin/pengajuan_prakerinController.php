<?php

namespace App\Http\Controllers\admin\data_prakerin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kelompok_laporan;
use App\Models\perusahaan;
use App\Models\data_prakerin;
use App\Models\guru;
use App\Models\Siswa;
use App\Http\Requests\admin\pengajuan_prakerinRequest;
use App\Models\pengajuan_prakerin;
use App\Models\detail_pengajuan_prakerin;
use Illuminate\Support\Facades\Auth;

class pengajuan_prakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

                $pengajuan_prakerin = pengajuan_prakerin::distinct('id','no','id_guru' ,'id_siswa', 'nama_perusahaan')->with('guru')->with('siswa')->get(['id','no', 'id_guru', 'id_siswa','nama_perusahaan']);
                // dd($kelompok_laporan);
                return datatables()->of($pengajuan_prakerin)->addColumn('guru', function (pengajuan_prakerin $pengajuan_prakerin) {
                    return $pengajuan_prakerin->guru->nama;
                })
                    // ->addColumn('nama_perusahaan', function (kelompok_laporan $kelompok_laporan) {
                    //     return $kelompok_laporan->perusahaan->nama;
                    // })
                    ->addColumn('persetujuan', function ($data) {
                        $role = Auth::user()->role;
                        $button = '';
                        if ($role == "kepsek" ) {
                    if ($data->id_siswa->siswa === 'Magang') {
                        $btn =  '<span class="badge bg-success text-white" style="font-size: 12px; " ><b>di ' . $data->id_siswa->siswa . '</b></span>';
                        return $btn;
                    } else {
                        // $button .= '<a href="/admin/data_keluar/tolak/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-danger btn-sm"><i class="fas fa-times"></i></a>';
                        $button .= '<button type="button" name="acc" id="acc" data-no="' . $data->no . '"  class="edit btn btn-success btn-sm"><i class="fas fa-check"></i></button>';
                        $button .= ' ';
                        $button .= '<button id="tolak" data-target="#tandatanganModal" data-attr="/admin/surat_keluar/tandatangan/' . $data->id . '" data-toggle="modal"  class="tolak btn btn-danger btn-sm ml-1"><i class="fas fa-times"></i></button>';
                    }
                    }

                        return $button;
                    })
                    ->addColumn('action', function ($data) {
                    if (Auth::user()->role != "hubin" or Auth::user()->role != "kaprog" or Auth::user()->role != "admin") {
                        $button = '<a href="../admin/pengajuan_prakerin/detail/' . $data->no . '"   id="' . $data->no . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                        $button .= '&nbsp';
                        $button .= '&nbsp&nbsp&nbsp&nbsp&nbsp';
                        $button .= '<button id="kelompoks" type="button" data-no="' . $data->no . '" class="btn btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i> PDF</button>';
                        return $button;
                    }
                        $button = '<a href="../admin/pengajuan_prakerin/detail/' . $data->no . '"   id="' . $data->no . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                        $button .= '&nbsp';
                        $button .= '<a  href="../admin/pengajuan_prakerin/edit/' . $data->no . '" id="edit" data-toggle="tooltip"  data-id="' . $data->no . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                        $button .= '&nbsp';
                        $button .= '<button type="button" name="delete" id="hapus" data-no="' . $data->no . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                        $button .= '&nbsp&nbsp&nbsp&nbsp&nbsp';
                        $button .= '<button id="kelompoks" type="button" data-no="' . $data->no . '" class="btn btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i> PDF</button>';
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
                        if ( $role == "admin") {

                        // $button .= '<a href="/admin/data_keluar/tolak/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-danger btn-sm"><i class="fas fa-times"></i></a>';
                        $button .= '<button type="button" name="acc" id="acc" data-no="' . $data->no . '"  class="acc btn btn-success btn-sm"><i class="fas fa-check"></i></a>';
                        $button .= ' ';
                        $button .= '<button id="tolak" data-target="#tandatanganModal" data-no="' . $data->no . '" data-attr="/admin/surat_keluar/tandatangan/' . $data->id . '" data-toggle="modal"  class="tolak btn btn-danger btn-sm ml-1"><i class="fas fa-times"></i></button>';

                    }

                        return $button;
                    })
                    ->addColumn('action', function ($data) {
                    if (Auth::user()->role != "admin") {
                        $button = '<a href="../admin/pengajuan_prakerin/detail/' . $data->no . '"   id="' . $data->no . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                        $button .= '&nbsp';;
                        $button .= '&nbsp&nbsp&nbsp&nbsp&nbsp';
                        $button .= '<button id="kelompoks" type="button" data-no="' . $data->no . '" class="btn btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i> PDF</button>';
                        return $button;
                    }else{
                        $button = '<a href="../admin/pengajuan_prakerin/detail/' . $data->no . '"   id="' . $data->no . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                        $button .= '&nbsp';
                        $button .= '<a  href="../admin/pengajuan_prakerin/edit/' . $data->no . '" id="edit" data-toggle="tooltip"  data-id="' . $data->no . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                        $button .= '&nbsp';
                        $button .= '<button type="button" name="delete" id="hapus" data-no="' . $data->no . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                        $button .= '&nbsp&nbsp&nbsp&nbsp&nbsp';
                        $button .= '<button id="kelompoks" type="button" data-no="' . $data->no . '" class="btn btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i> PDF</button>';
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
        $siswa = siswa::doesntHave('data_prakerin')->whereHas('pembekalan_magang', function ($query) { return $query->where('test_wpt_iq', '=', 'sudah')->where('personality_interview', '=', 'sudah')->where('soft_skill', '=', 'sudah')->whereNotNull('file_portofolio'); })->get();
            // $siswa = siswa::doesntHave('data_prakerin')->whereHas('pembekalan_magang', function ($query) { return $query->where('test_wpt_iq', '=', 'sudah')->where('personality_interview', '=', 'sudah')->where('soft_skill', '=', 'sudah')->whereNotNull('file_portofolio'); })->get();
            
            // $no =  siswa::all()->count();
            // $nomor = [];
            // for ($i=1; $i <= $no; $i++) { 
            //     $nomor[] = $i; 
            // }
            // $users = pengajuan_prakerin::all();
            // $usersUnique = $users->unique("no");
            // $nomorPengajuan = $users->diff($usersUnique);
            // dd($nomorPengajuan->toArray());
            // $sis = pengajuan_prakerin::whereIn('no',$nomor)->get();
            // dd($sis);

            $perusahaan = perusahaan::all();
            $guru = guru::all();
            return view('admin.pengajuan_prakerin.tambah', compact('siswa', 'perusahaan', 'guru'));



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
        //    array($data);
        // dd($data);
        $perusahaan = perusahaan::where('id', $data['id_perusahaan'])->first();

        $nama = [];

        foreach ($data['id_data_prakerin'] as $w => $val) {
           $nama[] = Siswa::where('id', $nama);
        }

        // dd($nama);

        foreach($data['id_data_prakerin'] as $key => $value){
            $siswa = Siswa::where('id',$value)->first();
            $dataa = array(
                'nama'   => $siswa->nama_siswa,
                'id_kelas'         => $siswa->kelas->id,
                'id_siswa'      => $siswa->id,
                'id_perusahaan' => $request->id_perusahaan,
                'id_guru' => $request->id_guru,
                'status' => 'Pengajuan',
                // 'tgl_mulai' => 'NUll',
                // 'tgl_selesai' => 'NULL'
        );
        data_prakerin::create($dataa);
        }


        // $input = Input::all();
        // $id_dataP = [];
        // $condition = $input['id_data_prakerin'];

        // if (count($data['id_data_prakerin']  > 0) ) {
        // $arr = [];
        foreach ($data['id_data_prakerin'] as $key => $value) {
            // $arr[] = $data['id_data_prakerin'][$key];
            $data2 = array(
                'no'   => $data['no'],
                'id_guru'   => $data['id_guru'],
                'id_siswa'   => $data['id_data_prakerin'][$key],
                'nama_perusahaan'   => $perusahaan->nama,
                // 'jurusan'       => $data['jurusan'],
            );

           $pengajuan_prakerin = pengajuan_prakerin::create($data2);
        }
        $surat_number = pengajuan_prakerin::all()->unique('no');
        
        // $surat_number = $surat_number->unique('no');
        // $grouped = $pengajuan_prakerin::->groupBy('no')->map(function ($row) {return $row->count();});
        // dd($surat_number->count());

        detail_pengajuan_prakerin::create([
            'id_pengajuan_prakerin' => $pengajuan_prakerin->id,
            'no_surat' =>  str_pad($surat_number->count() + 1, 3, "0", STR_PAD_LEFT),
        ]);




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


        // $pengajuan_prakerin = pengajuan_prakerin::where('no', $id)->with('data_prakerin')->get();
        $pengajuan_prakerin = pengajuan_prakerin::where('no',$id)->with('data_prakerin')->whereNotNull('id_data_prakerin')->get();

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
        // if (Auth::user()->role != "hubin" or Auth::user()->role != "kaprog" or Auth::user()->role != "admin") {
        //     return back();
        // }
        $data_prakerin = data_prakerin::doesntHave('pengajuan_prakerin')->doesntHave('kelompok_laporan')->where('status','pengajuan')->get();
        $perusahaan = perusahaan::all();
        $guru = guru::all();
        $siswa = Siswa::all();
        $pengajuan_prakerin = pengajuan_prakerin::where('no', $id)->with('data_prakerin')->get();
        $perusahaan_select = perusahaan::where('nama',$pengajuan_prakerin[0]->nama_perusahaan)->first();

        return view('admin.pengajuan_prakerin.edit', compact('perusahaan_select','pengajuan_prakerin', 'perusahaan', 'guru', 'data_prakerin', 'siswa'));

        // return view('admin.pengajuan_prakerin.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(pengajuan_prakerinRequest $request)
    {
        // $input = Input::all();
        // $id_dataP = $request->id_data_prakerin;
        // dd($request->no[0]);
        // $perusahaan = Perusahaan::find('id',$request->id_perusahaan)->first();
        // $data = $request->all();
        $request->validated();
            $no = Pengajuan_prakerin::where('no',$request->no[0])->get();
            // dd();

            if (count($no) > count($request->id_data_prakerin) || count($no) < count($request->id_data_prakerin ) ) {
                detail_pengajuan_prakerin::where('id_pengajuan_prakerin', last($request->id))->delete();
                pengajuan_prakerin::where('no', $request->no[0])->delete();


                $data = $request->all();

                // dd($data['no'][0]);
                $perusahaan = perusahaan::where('id', $data['id_perusahaan'])->first();
                foreach ($data['id_data_prakerin'] as $key => $value) {
                    // $arr[] = $data['id_data_prakerin'][$key];
                    $data2 = array(
                        'no'   => $data['no'][0],
                        'id_guru'   => $data['id_guru'],
                        'id_data_prakerin'   => $data['id_data_prakerin'][$key],
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
        return redirect()->route('pengajuan_prakerin.index')->with(['update' => 'Pengajuan ' . $request->no[0] . ' berhasil di Update  !']);


                // return response()->json($data = 'berhasil');
            }else{
                $perusahaan = perusahaan::where('id', $request->id_perusahaan)->first();

                foreach ($request->id_data_prakerin as $key => $val) {
                    $data = pengajuan_prakerin::where('id', $request->id[$key])->where('no', $request->no[$key])->update([
                        'no'   => $request->no[$key],
                        'id_guru'   => $request->id_guru,
                        'id_data_prakerin'   => $request->id_data_prakerin[$key],
                        'nama_perusahaan'   => $perusahaan->nama,
                        // 'no_telpon'         => $request->no_telpon,
                        // 'jurusan'       => $request->jurusan,

                    ]);
                }
                return redirect()->route('pengajuan_prakerin.index')->with(['update' => 'Pengajuan ' . $request->no[0] . ' berhasil di Update  !']);

            }



        return redirect()->route('pengajuan_prakerin.index')->with(['update' => 'Pengajuan ' . $request->no[0] . ' berhasil di Update  !']);
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


    public function acc(Request $request, $no)
    {


            # jangan whare no dah takutnya ada no yg duplicade jadi ada bug
           $pengajuan = pengajuan_prakerin::where('no', $no)->get();


            foreach ($pengajuan as $key => $value) {
                # ini gua coba update 2 data
            $data =    data_prakerin::whereIn('id_siswa', [$value->id_siswa])->update(['status' => 'Magang']);
            }
            # cek data yg abis di update tadi
        //    $data = data_prakerin::whereIn('id_siswa',[$pengajuan[0]->id_siswa,$pengajuan[1]->id_siswa])->get();

            # coba nge return data yg udh di update
            return response()->json($data);
        // return response()->json($pengajuan);
    }
    public function tolak(Request $request, $no)
    {


                # jangan whare no dah takutnya ada no yg duplicade jadi ada bug
           $pengajuan = pengajuan_prakerin::where('no', $no)->get();


            foreach ($pengajuan as $key => $value) {
                # ini gua coba update 2 data
                $data =  data_prakerin::whereIn('id_siswa', [$value->id_siswa])->update(['status' => 'Batal']);
            }
            # cek data yg abis di update tadi
        //    $data = data_prakerin::whereIn('id_siswa',[$pengajuan[0]->id_siswa,$pengajuan[1]->id_siswa])->get();

            # coba nge return data yg udh di update
            return response()->json($data = 'berhasil');
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
        return json_encode(siswa::doesntHave('data_prakrin'))->whereHas('pembekalan_magang', function ($query) { return $query->where('test_wpt_iq', '=', 'sudah')->where('personality_interview', '=', 'sudah')->where('soft_skill', '=', 'sudah')->whereNotNull('file_portofolio'); })->where('id_perusahaan', $id)->get();

        // return json_encode(siswa::doesntHave('data_prakrin')->where('status','Pengajuan')->where('id_perusahaan', $id)->get());
    }
    # yang udah status jadi mgang dmna? acc
    public function fetch_edit(Request $request,$id)
    {

        return json_encode(data_prakerin::where('status','Pengajuan')->where('id_perusahaan', $id)->get());

    }
}
