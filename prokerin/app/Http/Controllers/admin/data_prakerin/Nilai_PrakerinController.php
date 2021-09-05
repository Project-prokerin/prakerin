<?php

namespace App\Http\Controllers\admin\data_prakerin;

use App\Http\Controllers\Controller;
use App\Models\jurusan;
use App\Models\Kategori_nilai_prakerin;
use App\Models\kelas;
use App\Models\Nilai_prakerin;
use App\Models\kelompok_laporan;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Http\Requests\admin\nilaiRequest;

use Database\Seeders\kategori_nilai_prakerinSeeder;
use Illuminate\Support\Facades\Auth;

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
            $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Sekolah')->where('jurusan', $request->jurusan);
            return response()->json(['data' => $kategori]);
        }else{
            $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Sekolah')->where('jurusan', "RPL");
        }
        $jurusan = jurusan::all();
        return view('admin.nilai_prakerin.index', compact('kategori','jurusan'));
    }

    public function getNameColumn($val)
    {
        if (Auth::user()->role != 'kaprog') {
            if(!empty($val)){
                $kategori = Kategori_nilai_prakerin::select('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan')->distinct('aspek_yang_dinilai')->where('id_jurusan', $val)->get();
            }else{
                $kategori = Kategori_nilai_prakerin::select('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan')->distinct('aspek_yang_dinilai')->where('id_jurusan',1)->get();
            }
            $kategori = Kategori_nilai_prakerin::select('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan')->distinct('aspek_yang_dinilai')->where('id_jurusan', $val)->get();
        }else {
            if(!empty($val)){
                $kategori = Kategori_nilai_prakerin::select('aspek_yang_dinilai')->where('keterangan', 'Nilai Sekolah')->distinct('aspek_yang_dinilai')->where('id_jurusan', $val)->get();
            }else{
                $kategori = Kategori_nilai_prakerin::select('aspek_yang_dinilai')->where('keterangan', 'Nilai Sekolah')->distinct('aspek_yang_dinilai')->where('id_jurusan',1)->get();
            }
            $kategori = Kategori_nilai_prakerin::select('aspek_yang_dinilai')->where('keterangan', 'Nilai Sekolah')->distinct('aspek_yang_dinilai')->where('id_jurusan', $val)->get();
        }
        return response()->json(['data'=> $kategori]);
    }

    public function get_option(){
        // $kelas = [
        //     [
        //         "id" =>"RPL",
        //         "kelas" => "RPL",
        //     ],
        //     [
        //         "id" => "MM",
        //         "kelas" => "MM",
        //     ],
        //     [
        //         "id" => "BC",
        //         "kelas" => "BC",
        //     ], [
        //         "id" => "TKJ",
        //         "kelas" => "TKJ",
        //     ],
        //     [
        //         "id" => "TEI",
        //         "kelas" => "TEI",
        //     ]
        // ];
        $jurusan = jurusan::all();
        return response()->json(['jurusan' => $jurusan]);
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
           if (Auth::user()->role != 'kaprog') {
            if ($request->filter) {
            $kategori = Kategori_nilai_prakerin::select('id')->where('keterangan', 'Nilai Perusahaan')->where('id_jurusan', $request->filter)->get();
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
                $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan')->where('id_jurusan', $request->filter);
            }else{
                $siswa = Siswa::has('nilai_prakerin');
                $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan');
            }
           }else{
            if ($request->filter) {
                $kategori = Kategori_nilai_prakerin::select('id')->where('keterangan', 'Nilai Sekolah')->where('id_jurusan', $request->filter)->get();
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
                $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Sekolah')->where('id_jurusan', $request->filter);
            }else{
                $siswa = Siswa::has('nilai_prakerin');
                $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Sekolah');
            }
           }

            $a = datatables()->of($siswa)
                ->addColumn('nama_siswa', function ( $nilai) {
                    if (empty($nilai->nama_siswa)) {
                        return "Siswa kosong";
                    }
                    return $nilai->nama_siswa;
                });
                foreach ($kategori as $key => $value) {
                // $nilai = Nilai_prakerin::all();
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
                    if (  Auth::user()->role != 'pembimbing' && Auth::user()->role != 'kepsek' && Auth::user()->role != 'tu' ) {
                        $button .= '<a  href="../admin/nilai_prakerin/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                        $button .= '&nbsp';
                        $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';

                    }
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
        $kategori = Kategori_nilai_prakerin::where('id_jurusan', $id)->where('keterangan', 'Nilai Perusahaan')->get();
        return response()->json(['kategori' => $kategori ]);
    }
    public function option_tambah_2($id)
    {
        $kategori = Kategori_nilai_prakerin::where('id', $id)->where('keterangan', 'Nilai Perusahaan')->first();
        return response()->json(['kategori' => $kategori]);
    }
    public function option_kaprog_1($id)
    {
        $kategori = Kategori_nilai_prakerin::where('id_jurusan', $id)->where('keterangan', 'Nilai Sekolah')->get();
        return response()->json(['kategori' => $kategori ]);
    }
    public function option_kaprog_2($id)
    {
        $kategori = Kategori_nilai_prakerin::where('id', $id)->where('keterangan', 'Nilai Sekolah')->first();
        return response()->json(['kategori' => $kategori]);
    }
    public function tambah()
    {

        if (Auth::user()->role !== 'kaprog') {
                          // $siswa = Siswa::doesntHave('nilai_prakerin')->get();
                 $kategoriS = Kategori_nilai_prakerin::select('id')->where('keterangan', 'Nilai Perusahaan')->get();
                 $arr_id_kategori = [];
                 foreach ($kategoriS as $key => $value) {
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
                 $siswa = Siswa::whereNotIn('id', $arr_id_siswa)->get();
                 // dd($siswa->toArray());
                 $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan');
                     $kelompok = kelompok_laporan::all()->unique('no');
        }else{
               // $siswa = Siswa::doesntHave('nilai_prakerin')->get();
                 $kategoriS = Kategori_nilai_prakerin::select('id')->where('keterangan', 'Nilai Sekolah')->get();
                 $arr_id_kategori = [];
                 foreach ($kategoriS as $key => $value) {
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
                 $siswa = Siswa::whereNotIn('id', $arr_id_siswa)->get();
                 // dd($siswa->toArray());
                 $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan');
                 $kelompok = kelompok_laporan::all()->unique('no');
        }

        $jurusan = jurusan::all();

        return view('admin.nilai_prakerin.tambah', compact('kategori','siswa','jurusan','kelompok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

 public function store(nilaiRequest $request)
 {
    // dd($request);
    $request->validated();

     // ambil siswa
    $jumlah_aspek =  Kategori_nilai_prakerin::all();

    $aspek[] = $request->aspek0;
    $aspek[] = $request->aspek1;
    $aspek[] = $request->aspek2;
    $aspek[] = $request->aspek3;
    $aspek[] = $request->aspek4;
    $aspek[] = $request->aspek5;
    $aspek[] = $request->aspek6;
    $aspek[] = $request->aspek7;
    $aspek[] = $request->aspek8;
    $aspek[] = $request->aspek9;
    $aspek[] = $request->aspek10;
    $aspek[] = $request->aspek11;
    $aspek[] = $request->aspek12;
    $aspek[] = $request->aspek13;
    $aspek[] = $request->aspek14;
    $aspek[] = $request->aspek15;

    //  dd($aspek);
    //  $nilai

     //  cari value array selain null
     if ( $keyNilai = array_diff($request->nilai,[null])) {
         //proses mengurutkan index dari 0
         foreach ($keyNilai as $kuy) {
             $nilaii[] = $kuy;
            }

        }
        // dd($request->nilai,$aspek);
     if ( $keyKeterangan = array_diff($request->keterangan,[null])) {
         foreach ($keyKeterangan as $kuy) {
             $keterangann[] = $kuy;
         }

     }
     if ( $keyAspek = array_diff($aspek,["-- Pilih Aspek --",null])) {
         foreach ($keyAspek as $kuy) {
             $aspekk[] = $kuy;
         }

     }


    //  dd($aspekk,$keterangann,$nilaii);
     if(Auth::user()->role == 'admmin' or Auth::user()->role == 'hubin'){
            $siswa = Siswa::where('id', $request->id_siswa)->first();
     }else{
            $siswa = Siswa::where('id', $request->id_siswa)->first();
     }

    //  kelom
    //  dd($siswa->kelompok_laporan->id);

     // cara ambil id_kategpru
     // ituing juamlah aspek nya

     for ($i=0; $i < count($aspekk) ; $i++) {
         Nilai_prakerin::create([
             "id_siswa" => $siswa->id,
             "id_ketegori" => $aspekk[$i], // id_kategori
             "nilai" => $nilaii[$i], // nilai
             "keterangan" => $keterangann[$i],
             "id_kelompok_laporan" => $siswa->kelompok_laporan->id
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
        // dd($id)
        $siswa_main = Siswa::where('id',$id)->first();
        $nilai = Nilai_prakerin::where('id_siswa', $id)->get();
        // $id = [];
        // foreach ($nilai as $key => $value) {
            //     $id[] = $value->id_ketegori;
            // }
            $get_collec_jurusan =  Kategori_nilai_prakerin::all()->whereIn('id', $id)->where('keterangan', 'Nilai Perusahaan')->unique('jurusan');
        $jurusan = [];
        foreach ($get_collec_jurusan as $key => $value) {
            $jurusan[] = $value->id_jurusan;
        }
        $aspek = Nilai_prakerin::where('id_siswa',$id)->get();

        foreach ($aspek as $key ) {
            $a[$key->id] = $key->kategori_nilai->keterangan  ;

        }

        $NilaiPerusahaan = array_diff($a,['Nilai Sekolah']);
        $NilaiSekolah = array_diff($a,['Nilai Perusahaan']);

        foreach ($NilaiPerusahaan as $key => $value) {
            $NP[] =  $key;
        }
        foreach ($NilaiSekolah as $key => $value) {
            $NS[] =  $key;
        }
        // dd($NP);


               if (Auth::user()->role != 'kaprog') {
                        for ($i=0; $i < count($aspek); $i++) {
                            $kategoriEdit[] = Kategori_nilai_prakerin::where('id',$aspek[$i]->id_ketegori)->where('keterangan','Nilai Perusahaan')->first();
                        }
                        if ( $editNP = array_diff($kategoriEdit,[null])) {
                            foreach ($editNP as $kuy) {
                                $kategori_edit[] = $kuy;
                            }

                        }

                        for ($x=0; $x < count($NP); $x++) {
                            $aspek_edit[] = Nilai_prakerin::where('id',$NP[$x])->first();

                        }
                        // dd($aspek_edit);
                        $aspek_edit0 = Nilai_prakerin::where('id',$NP[0])->first();
                        $kategori_edit0 = Kategori_nilai_prakerin::where('id',$kategori_edit[0]->id)->first();
                        $kategori = Kategori_nilai_prakerin::where('keterangan','Nilai Perusahaan')->get();
                        // dd($NP);
                        // return view('admin.nilai_prakerin.edit', compact('siswa_main','siswa','jurusan','kategori_edit','kategori','kategori_edit0','aspek_edit0','aspek'));

                    }else{
                          //    dd($aspek_edit0);
                          for ($i=0; $i < count($aspek); $i++) {
                              $kategoriEdit[] = Kategori_nilai_prakerin::where('id',$aspek[$i]->id_ketegori)->where('keterangan','Nilai Sekolah')->first();
                          }
                          if ( $editNS = array_diff($kategoriEdit,[null])) {
                              foreach ($editNS as $kuy) {
                                  $kategori_edit[] = $kuy;
                              }

                          }
                          for ($x=0; $x < count($NS); $x++) {
                            $aspek_edit[] = Nilai_prakerin::where('id',$NS[$x])->first();

                        }
                          $aspek_edit0 = Nilai_prakerin::where('id',$NS[0])->first();
                          $kategori_edit0 = Kategori_nilai_prakerin::where('id',$kategori_edit[0]->id)->first();
                          $kategori = Kategori_nilai_prakerin::where('keterangan','Nilai Sekolah')->get();

               }
        // dd($siswa_main,$siswa,$jurusan,$kategori_edit,$kategori,$kategori_edit0,$aspek_edit0,$aspek);
        // $kategori = Kategori_nilai_prakerin::all()->unique('aspek_yang_dinilai')->where('keterangan', 'Nilai Perusahaan')->where('jurusan', $jurusan[0]);

               $jurusan_table = jurusan::all();
        return view('admin.nilai_prakerin.edit', compact('siswa_main','siswa','jurusan','kategori_edit','kategori','kategori_edit0','aspek_edit0','aspek_edit','jurusan_table'));
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

        // dd($id,$request->toArray());
        $count =  Nilai_prakerin::where('id_siswa',$id)->count();
        // dd($count);
      $aspek[] = $request->aspek0;
    $aspek[] = $request->aspek1;
    $aspek[] = $request->aspek2;
    $aspek[] = $request->aspek3;
    $aspek[] = $request->aspek4;
    $aspek[] = $request->aspek5;
    $aspek[] = $request->aspek6;
    $aspek[] = $request->aspek7;
    $aspek[] = $request->aspek8;
    $aspek[] = $request->aspek9;
    $aspek[] = $request->aspek10;
    $aspek[] = $request->aspek11;
    $aspek[] = $request->aspek12;
    $aspek[] = $request->aspek13;
    $aspek[] = $request->aspek14;
    $aspek[] = $request->aspek15;

        // $nilai

        //  cari value array selain null
        if ( $keyNilai = array_diff($request->nilai,[null])) {
            //proses mengurutkan index dari 0
            foreach ($keyNilai as $kuy) {
                $nilaii[] = $kuy;
               }

           }
        if ( $keyKeterangan = array_diff($request->keterangan,[null])) {
            foreach ($keyKeterangan as $kuy) {
                $keterangann[] = $kuy;
            }

        }
        if ( $keyAspek = array_diff($aspek,["-- Pilih Aspek --",null])) {
            foreach ($keyAspek as $kuy) {
                $aspekk[] = $kuy;
            }


        }

        // dd($nilaii,$aspekk,$keterangann);

        $kategoriSekolah = Nilai_prakerin::where('id_siswa',$id)->get();
        // $KS = $kategoriSekolah->kategori_nilai_prakerin->keterangan;
        // dd($kategoriSekolah->toArray());
        foreach ($kategoriSekolah as $key ) {
            $a[$key->id] = $key->kategori_nilai->keterangan  ;

        }

        $NilaiPerusahaan = array_diff($a,['Nilai Sekolah']);
        $NilaiSekolah = array_diff($a,['Nilai Perusahaan']);
        // dd($NilaiSekolah,$NilaiPerusahaan);

        foreach ($NilaiPerusahaan as $key => $value) {
            $NP[] =  $key;
        }
        foreach ($NilaiSekolah as $key => $value) {
            $NS[] =  $key;
        }

        if (Auth::user()->role != 'kaprog') {
            if (empty($aspekk)) {
                nilai_prakerin::where('id_siswa',$id)->delete();
                return redirect()->route('nilai_prakerin.index')->with('success', 'Nilai Siswa di hapus karena tidak ada aspek yang dinilai!');

            }else{
                if ($count > $aspekk || $count < $aspekk ) {
                    nilai_prakerin::where('id_siswa',$id)->whereIn('id',$NP)->delete();
                    $siswa = Siswa::where('id',$id)->first();

                  for ($i=0; $i < count($aspekk) ; $i++) {
                      Nilai_prakerin::create([
                          "id_siswa" => $siswa->id,
                          "id_ketegori" => $aspekk[$i], // id_kategori
                          "nilai" => $nilaii[$i], // nilai
                          "keterangan" => $keterangann[$i],
                          "id_kelompok_laporan" => $siswa->kelompok_laporan->id
                      ]);
                  }
              }else{
              for ($i=0; $i < count($aspekk) ; $i++) {
                  Nilai_prakerin::where('id_siswa',$id)->update([
                      "id_ketegori" => $aspekk[$i], // id_kategori
                      "nilai" => $nilaii[$i], // nilai
                      "keterangan" => $keterangann[$i],
                      "id_kelompok_laporan" => $siswa->kelompok_laporan->id
                  ]);
              }
              }

            }


            return redirect()->route('nilai_prakerin.index')->with('success', 'Nilai berhasil di update');

        }else{
            if (empty($aspekk)) {
                return back()->with('success', 'Nilai Sekolah Aspek siswa tidak boleh kosong');

            }else{

                if ($count > $aspekk || $count < $aspekk ) {
                    Nilai_prakerin::where('id_siswa',$id)->whereIn('id',$NS)->delete();
                    $siswa = Siswa::where('id',$id)->first();

                  for ($i=0; $i < count($aspekk) ; $i++) {
                      Nilai_prakerin::create([
                          "id_siswa" => $siswa->id,
                          "id_ketegori" => $aspekk[$i], // id_kategori
                          "nilai" => $nilaii[$i], // nilai
                          "keterangan" => $keterangann[$i],
                          "id_kelompok_laporan" => $siswa->data_prakerin->kelompok_laporan->id
                      ]);
                  }
              }else{
              for ($i=0; $i < count($aspekk) ; $i++) {
                  Nilai_prakerin::where('id_siswa',$id)->update([
                      "id_ketegori" => $aspekk[$i], // id_kategori
                      "nilai" => $nilaii[$i], // nilai
                      "keterangan" => $keterangann[$i],
                      "id_kelompok_laporan" => $siswa->data_prakerin->kelompok_laporan->id
                  ]);
              }
              }
            }



            return redirect()->route('nilai_prakerin.index')->with('success', 'Nilai berhasil di update');

        }
        // dd($aspekk,$keterangann,$nilaii);

        // cara ambil id_kategpru
        // ituing juamlah aspek nya


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


        $kategoriSekolah = nilai_prakerin::where('id_siswa',$id)->get();
        // $KS = $kategoriSekolah->kategori_nilai_prakerin->keterangan;
        // dd($kategoriSekolah->toArray());
        foreach ($kategoriSekolah as $key ) {
            $a[$key->id] = $key->kategori_nilai->keterangan  ;

        }

        $NilaiPerusahaan = array_diff($a,['Nilai Sekolah']);
        $NilaiSekolah = array_diff($a,['Nilai Perusahaan']);
        // dd($NilaiSekolah,$NilaiPerusahaan);

        foreach ($NilaiPerusahaan as $key => $value) {
            $NP[] =  $key;
        }
        foreach ($NilaiSekolah as $key => $value) {
            $NS[] =  $key;
        }




        if (Auth::user()->role != 'kaprog') {
                nilai_prakerin::where('id_siswa',$id)->whereIn('id',$NP)->delete();
            return response()->json($data = 'berhasil');
        }else{
                nilai_prakerin::where('id_siswa',$id)->whereIn('id',$NS)->delete();
              return response()->json($data = 'berhasil');
        }
    }
}
