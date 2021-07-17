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
    public function index(Request $request)
    {

        if ($request->jurusan) {
            $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan')->where('jurusan', $request->jurusan);
            return response()->json(['data' => $kategori]);
        }else{
            $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan')->where('jurusan', "RPL");
        }
        return view('admin.nilai_prakerin.index', compact('kategori'));
    }

    public function getNameColumn($val)
    {
        if(!empty($val)){
            $kategori = Kategori_nilai_prakerin::select('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan')->distinct('aspek_yang_dinilai')->where('jurusan', $val)->get();
        }else{
            $kategori = Kategori_nilai_prakerin::select('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan')->distinct('aspek_yang_dinilai')->where('jurusan','RPL')->get();
        }
        $kategori = Kategori_nilai_prakerin::select('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan')->distinct('aspek_yang_dinilai')->where('jurusan', $val)->get();
        return response()->json(['data'=> $kategori]);
    }

    public function get_option(){
        $kelas = [
            [
                "id" =>"RPL",
                "kelas" => "RPL",
            ],
            [
                "id" => "MM",
                "kelas" => "MM",
            ],
            [
                "id" => "BC",
                "kelas" => "BC",
            ], [
                "id" => "TKJ",
                "kelas" => "TKJ",
            ],
            [
                "id" => "TEI",
                "kelas" => "TEI",
            ]
        ];
        return response()->json(['kelas' => $kelas]);
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            if ($request->filter) {
                $kategori = Kategori_nilai_prakerin::select('id')->where('keterangan', 'Nilai Perusahaan')->where('jurusan', $request->filter)->get();
                $arr = [];
                foreach ($kategori as $key => $value) {
                    $arr[] = $value->id;
                }
                $nilai = Nilai_prakerin::has('siswa')->select('id_siswa')->whereIn('id_ketegori', $arr)->distinct('id_siswa')->get();
                $arr_nilai = [];
                foreach ($nilai as $key => $value) {
                    $arr_nilai[] = $value->id_siswa;
                }
                $siswa = Siswa::whereIn('id', $arr_nilai)->get();
                $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan')->where('jurusan', $request->filter);
            }else{
                $siswa = Siswa::has('nilai_prakerin');
                $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan');
            }

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
    public function option_tambah($id)
    {
        $kategori = Kategori_nilai_prakerin::where('id',$id)->first();
        return response()->json(['kategori' => $kategori ]);
    }
    public function tambah()
    {
        $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan');
        return view('admin.nilai_prakerin.tambah', compact('kategori'));
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
