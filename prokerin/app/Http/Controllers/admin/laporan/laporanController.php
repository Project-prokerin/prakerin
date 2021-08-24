<?php

namespace App\Http\Controllers\admin\laporan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\laporan_prakerin;
use App\Models\perusahaan;
use App\Models\kelompok_laporan;
use App\Http\Requests\admin\laporan_prakerinRequest;
use Illuminate\Support\Facades\Auth;

class laporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelompok = Kelompok_laporan::all()->unique(['no']);
        // $usersUnique = $kelompok;
        // dd($kelompok);
// $userDuplicates = $kelompok->diff($usersUnique);
// dd($kelompok->toArray());
        return view('admin.laporan_prakerin.index',compact('kelompok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $laporanPrakerin = laporan_prakerin::with('kelompok_laporan');
            return datatables()->of($laporanPrakerin)
                ->addColumn('nama_perusahaan', function (laporan_prakerin $laporan_prakerin) {
                    return $laporan_prakerin->kelompok_laporan->nama_perusahaan;
                })
                ->addColumn('alamat_perusahaan', function (laporan_prakerin $laporan_prakerin) {
                    $lokasi = perusahaan::where('nama',$laporan_prakerin->kelompok_laporan->nama_perusahaan)->first();
                    return $lokasi->alamat;
                })
                ->addColumn('action', function ($data) {
                    $button = '<button type="button"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></button>';
                    $button .= '&nbsp';
                    if ( Auth::user()->role != 'pembimbing' && Auth::user()->role != 'kepsek' && Auth::user()->role != 'tu'   && Auth::user()->role != 'bkk'  ) {
                        $button .= '<button type="button" id="editButton" data-target="#editModal" data-attr="/admin/laporan/edit/'.$data->id.'" data-toggle="modal"  class="edit btn btn-warning btn-sm edit-laporan"><i class="fas fa-pencil-alt"></i></button>';
                        $button .= '&nbsp';
                        $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
        }
    }

    public function tambah()
    {
        return view('admin.laporan_prakerin.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_laporan' => 'required',
            'id_kelompok_laporan' => 'required',
        ],[
            'required' => 'Tidak boleh kosong'
        ]);

        $id_kelompok_laporan = kelompok_laporan::where('no',$request->id_kelompok_laporan)->first();
        // dd($id_kelompok_laporan);
        laporan_prakerin::create([
            'judul_laporan' => $request->judul_laporan,
            'id_kelompok_laporan' => $id_kelompok_laporan->id,
            'no' => $request->id_kelompok_laporan
        ]);


        return back()->with(['success' => "Jurnal Prakerin  Berhasil di tambah"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laporan = laporan_prakerin::find($id);
        $kelompok = Kelompok_laporan::all()->unique(['no']);

        return view('admin.laporan_prakerin.edit',compact('laporan','kelompok'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_laporan' => 'required',
            'id_kelompok_laporan' => 'required',
        ],[
            'required' => 'Tidak boleh kosong'
        ]);

        $id_kelompok_laporan = kelompok_laporan::where('no',$request->id_kelompok_laporan)->first();
        // dd($id_kelompok_laporan);
        laporan_prakerin::find($id)->update([
            'judul_laporan' => $request->judul_laporan,
            'id_kelompok_laporan' => $id_kelompok_laporan->id,
        ]);
        return back()->with(['pesan' => "Laporan Berhasil di Update"]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        laporan_prakerin::destroy($id);
        return response()->json($data = 'berhasil');
    }
}
