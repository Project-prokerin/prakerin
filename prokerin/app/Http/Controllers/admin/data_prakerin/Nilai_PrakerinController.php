<?php

namespace App\Http\Controllers\admin\data_prakerin;

use App\Http\Controllers\Controller;
use App\Models\Kategori_nilai_prakerin;
use App\Models\kelas;
use App\Models\Nilai_prakerin;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Database\Seeders\kategori_nilai_prakerinSeeder;

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
                $arr_id_kategori = [];
                foreach ($kategori as $key => $value) {
                    $arr_id_kategori[] = $value->id; // mendapat id kategori
                }
                // mengambil uniuq id siswa
                $nilai = Nilai_prakerin::has('siswa')->select('id_siswa')->whereIn('id_ketegori', $arr_id_kategori)->get()->unique('id_siswa');
                $arr_id_siswa = [];
                // masukin ke aray
                foreach ($nilai as $key => $value) {
                    $arr_id_siswa[] = $value->id_siswa;
                }
                // ini nyari siswa yg idnya unique
                $siswa = Siswa::whereIn('id', $arr_id_siswa)->get();
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
                    $button .= '<a  href="../admin/nilai_prakerin/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
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
    public function option_tambah_1($id)
    {
        $kategori = Kategori_nilai_prakerin::where('jurusan', $id)->where('keterangan', 'Nilai Perusahaan')->get();
        return response()->json(['kategori' => $kategori ]);
    }
    public function option_tambah_2($id)
    {
        $kategori = Kategori_nilai_prakerin::where('id', $id)->where('keterangan', 'Nilai Perusahaan')->first();
        return response()->json(['kategori' => $kategori]);
    }
    public function tambah()
    {

        $siswa = Siswa::doesntHave('nilai_prakerin')->get();
        $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan');
        return view('admin.nilai_prakerin.tambah', compact('kategori','siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ambil siswa
        $siswa = Siswa::where('id',$request->id_siswa)->first();
        // cara ambil id_kategpru
        // ituing juamlah aspek nya
        for ($i=0; $i < count($request->aspek) ; $i++) {
            Nilai_prakerin::create([
                "id_siswa" => $siswa->id,
                "id_ketegori" => $request->aspek[$i], // id_kategori
                "nilai" => $request->nilai[$i], // nilai
                "keterangan" => $request->keterangan[$i],
                "id_kelompok_laporan" => $siswa->data_prakerin->kelompok_laporan->id
            ]);
        }
        return redirect()->route('nilai_prakerin.index')->with('success','Nilai berhasil di masukan');
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
        $siswa = Siswa::get();

        $siswa_main = Siswa::where('id',$id)->first();
        $nilai = Nilai_prakerin::where('id_siswa', $id)->get();
        $id = [];
        foreach ($nilai as $key => $value) {
            $id[] = $value->id_ketegori;
        }
        $get_collec_jurusan =  Kategori_nilai_prakerin::all()->whereIn('id', [3])->where('keterangan', 'Nilai Perusahaan')->unique('jurusan');
        $jurusan = [];
        foreach ($get_collec_jurusan as $key => $value) {
            $jurusan[] = $value->jurusan;
        }
        $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan')->where('jurusan', $jurusan[0]);
        return view('admin.nilai_prakerin.edit', compact('kategori', 'siswa','nilai','siswa_main','jurusan'));
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
        $siswa = Siswa::where('id', $id)->first();
        for ($i = 0; $i < count($request->aspek); $i++) {
            $nilai = Nilai_prakerin::where('id_ketegori', $request->aspek[$i])->where('id_siswa', $id)->first();
            if (empty($nilai)) { // jika nilai masih kosong tambah
                Nilai_prakerin::create([
                    "id_siswa" => $siswa->id,
                    "id_ketegori" => $request->aspek[$i], // id_kategori
                    "nilai" => $request->nilai[$i], // nilai
                    "keterangan" => $request->keterangan[$i],
                    "id_kelompok_laporan" => $siswa->data_prakerin->kelompok_laporan->id
                ]);
            }else{ // jika nilai sudah ada update
                Nilai_prakerin::where('id', $request->id_nilai[$i])->update([
                    "nilai" => $request->nilai[$i], // nilai
                    "keterangan" => $request->keterangan[$i],
                ]);
            }
        }
        return redirect()->route('nilai_prakerin.index')->with('success', 'Nilai berhasil di update');
        // dd($nilai);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        nilai_prakerin::where('id_siswa',$id)->delete();
        return response()->json($data = 'berhasil');
    }
}
