<?php

namespace App\Http\Controllers\admin\data_prakerin;

use App\Http\Controllers\Controller;
use App\Models\Kategori_nilai_prakerin;
use App\Models\kelas;
use App\Models\Nilai_prakerin;
use Illuminate\Http\Request;
use App\Models\Siswa;
class Nilai_PrakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan','Nilai Perusahaan');
        return view('admin.nilai_prakerin.index', compact('kategori'));
    }

    public function getNameColumn()
    {
        $kategori = Kategori_nilai_prakerin::select('aspek_yang_dinilai')->where('keterangan','Nilai Perusahaan')->distinct('aspek_yang_dinilai')->get();
        return response()->json(['data'=> $kategori]);
    }

    public function get_option(){
        $kelas = kelas::has('jurusan')->with('jurusan')->get();
        return response()->json(['kelas' => $kelas]);
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            if ($request->filter) {
                $siswa = Siswa::where('id_kelas', $request->filter)->get();
            }else{
                $siswa = Siswa::all();
            }
            $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan');
            $a = datatables()->of($siswa)
                ->addColumn('nama_siswa', function ( $nilai) {
                    if (empty($nilai->nama_siswa)) {
                        return "Siswa kosong";
                    }
                    return $nilai->nama_siswa;
                });
                foreach ($kategori as $key => $value) {
                $nilai = Nilai_prakerin::all();
                $a->addColumn($value->aspek_yang_dinilai, function ($siswa) use ($value)  {
                $nilai_prakerin = Nilai_prakerin::where('id_siswa', $siswa->id)->where('id_ketegori',$value->id)->first();
                    if (empty($nilai_prakerin->nilai)) {
                        return "0";
                    }
                    return $nilai_prakerin->nilai;
                });
                };
                // $a// ->addColumn('tgl_pelaksanaan', function($data){
                //     return $data->created_at->format('m-d-Y');
                // })
                $a->addColumn('action', function ($data) {
                    $button = '<a href="/admin/data_prakerin/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="../admin/data_prakerin/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                });
                $a->rawColumns(['action', 'nama_siswa']);
                return $a->addIndexColumn()->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        return view('admin.nilai_prakerin.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        nilai_prakerin::destroy($id);
        return response()->json($data = 'berhasil');
    }
}
