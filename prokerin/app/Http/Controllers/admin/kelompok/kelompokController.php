<?php

namespace App\Http\Controllers\admin\kelompok;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kelompok_laporan;
use App\Models\perusahaan;
use App\Models\data_prakerin;
use App\Models\guru;
use App\Models\Siswa;
class kelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {

        
        // $kelompokLaporan = kelompok_laporan::distinct('no','id_guru')->get(['no','id_guru']);
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
            // with('data_prakerin')->with('guru')->
            $kelompokLaporan = kelompok_laporan::with('data_prakerin')->distinct('no','id_guru','jurusan','nama_perusahaan')->get(['no','id_guru','jurusan','nama_perusahaan']);;
            // dd($kelompok_laporan);
            return datatables()->of($kelompokLaporan)->addColumn('guru', function (kelompok_laporan $kelompok_laporan) {
                    return $kelompok_laporan->guru->nama;
                })
                // ->addColumn('id_perusahaan', function (kelompok_laporan $kelompok_laporan) {
                //     return $kelompok_laporan->perusahaan->nama;
                // })
                    ->addColumn('action', function ($data) {
                    $button = '<button type="button"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></button>';
                    $button .= '&nbsp';
                    $button .= '<a  href="../admin/kelompok/edit/'.$data->no.'" id="edit" data-toggle="tooltip"  data-id="' . $data->no . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-no="' . $data->no . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
        }
        // return response()->json();
    }
    public function tambah(Request $request)
    {

        $data_prakerin = data_prakerin::all();
        $perusahaan = perusahaan::all();
        $guru = guru::all();
        return view('admin.kelompok_prakerin.tambah',compact('data_prakerin','perusahaan','guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validated();
        $perusahaan = perusahaan::where('id', $request->id_perusahaan)->first();
    // $input = Input::all();
    // $id_dataP = [];
        // $condition = $input['id_data_prakerin'];
foreach ($request->id_data_prakerin as $key => $val) {
    $data = kelompok_laporan::create([
        'no'   => $request->no,
        'id_guru'   => $request->id_guru,
        'id_data_prakerin'   => $request->id_data_prakerin[$key],
        'nama_perusahaan'   => $perusahaan->nama,
        'no_telpon'         => $request->no_telpon,
        'jurusan'       => $request->jurusan,
  
    ]);
}
// dd($data);
      
            return redirect()->route('kelompok.index')->with(['success' => 'Kelompok berhasil di buat!']);

   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        return view('admin.kelompok_prakerin.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_prakerin = data_prakerin::all();
        $perusahaan = perusahaan::all();
        $guru = guru::all();
        $siswa = Siswa::all();
        $kelompok_laporan = kelompok_laporan::where('no',$id)->with('data_prakerin')->get();
        // dd($kelompok_laporan[2]->id_data_prakerin);
        // dd($dataPrakerin->perusahaan->nama);
        return view('admin.kelompok_prakerin.edit',compact('kelompok_laporan','perusahaan','guru','data_prakerin','siswa'));

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
        // dd($request->id_data_prakerin);
        // $condition = $input['id_data_prakerin'];
foreach ($request->id_data_prakerin as $key => $val) {
    $update = kelompok_laporan::where('no',$request->no)->update([
        'no'   => $request->no,
        'id_guru'   => $request->id_guru,
        'id_data_prakerin'   => $request->id_data_prakerin[$key],
        'nama_perusahaan'   => $request->id_perusahaan,
        'no_telpon'         => $request->no_telpon,
        'jurusan'       => $request->jurusan,
  
    ]);
    
} 
// dd($update);
return redirect()->route('kelompok.index')->with(['update' => 'Kelompok berhasil di Update  !']);
    }
    public function updates(data_prakerinRequest $request,data_prakerin $data_prakerin)
    {
        // $this->validated($request[
        //     'nama'   => $siswa->nama_siswa,
        //     'kelas'         => $request->kelas,
        //     'jurusan'       => $request->jurusan,
        //     'id_siswa'      => $request->id_siswa,
        //     'id_perusahaan' => $request->id_perusahaan,
        //     'id_guru' => $request->id_guru,
        //     'tgl_mulai' => $request->tgl_mulai,
        //     'tgl_selesai' => $request->tgl_selesai
        // ]);
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
}
