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
            // with('data_prakerin')->with('guru')->
            $pengajuan_prakerin = pengajuan_prakerin::with('data_prakerin')->distinct('no','id_guru', 'nama_perusahaan')->with('guru')->get(['no', 'id_guru', 'nama_perusahaan']);;
            // dd($kelompok_laporan);
            return datatables()->of($pengajuan_prakerin)->addColumn('guru', function (pengajuan_prakerin $pengajuan_prakerin) {
                return $pengajuan_prakerin->guru->nama;
            })
                // ->addColumn('id_perusahaan', function (kelompok_laporan $kelompok_laporan) {
                //     return $kelompok_laporan->perusahaan->nama;
                // })
                ->addColumn('action', function ($data) {
                    $button = '<a href="../admin/pengajuan_prakerin/detail/' . $data->no . '"   id="' . $data->no . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="../admin/pengajuan_prakerin/edit/' . $data->no . '" id="edit" data-toggle="tooltip"  data-id="' . $data->no . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-no="' . $data->no . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    $button .= '&nbsp&nbsp&nbsp&nbsp&nbsp';
                    $button .= '<button id="kelompoks" type="button" data-no="' . $data->no . '" class="btn btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i> PDF</button>';
                    return $button;
                })
                ->rawColumns(['action','guru'])
                ->addIndexColumn()->make(true);
        }
        // return response()->json();
    }
    public function tambah(Request $request)
    {

        $data_prakerin = data_prakerin::doesntHave('pengajuan_prakerin')->where('status','Pengajuan')->get();
        $perusahaan = perusahaan::all();
        $guru = guru::all();
        return view('admin.pengajuan_prakerin.tambah', compact('data_prakerin', 'perusahaan', 'guru'));
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
                'id_data_prakerin'   => $data['id_data_prakerin'][$key],
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
    public function destroy(Request $request, $no)
    {
        pengajuan_prakerin::where('no', $no)->delete();
        // detail_pengajuan_prakerin::where('id_data_prakerin',)
        return response()->json($data = 'berhasil');
    }
    public function delete_all(Request $request, $no)
    {

    }

    public function fetch(Request $request,$id)
    {

        return json_encode(data_prakerin::doesntHave('pengajuan_prakerin')->where('status','Pengajuan')->where('id_perusahaan', $id)->get());
        
    }
    public function fetch_edit(Request $request,$id)
    {

        return json_encode(data_prakerin::where('status','Pengajuan')->where('id_perusahaan', $id)->get());
        
    }
}
