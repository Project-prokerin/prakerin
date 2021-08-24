<?php



namespace App\Http\Controllers\admin\jurnal;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\jurnal_prakerin;

use App\Models\Siswa;

use App\Models\perusahaan;

use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\admin\jurnal_prakerinRequest;



use App\Models\data_prakerin;
use App\Models\fasilitas_prakerin;

class jurnal_prakerinController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $sidebar = 'jurnal';
        $data_prakerin =  data_prakerin::get();
        // dd(jurnal_prakerin::all());
        return view('admin.jurnal_prakerin.index', compact('sidebar', 'data_prakerin'));
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function ajax(Request $request)

    {
        if ($request->ajax()) {
            $jurnalPrakerin = jurnal_prakerin::with('siswa')->with('perusahaan')->orderby('created_at', 'DESC');
            return datatables()->of($jurnalPrakerin)
                ->editColumn('hari_pelaksanaan', function ($jurnal_prakerin) {
                    return [
                    'display' => e($jurnal_prakerin->hari_pelaksanaan->format('m-d-Y')),
                    'timestamp' => $jurnal_prakerin->hari_pelaksanaan->timestamp
                    ];
                })
                ->addColumn('nama_siswa', function (jurnal_prakerin $jurnal_prakerin) {

                    return $jurnal_prakerin->siswa->nama_siswa;
                })
                ->editColumn('hari_pelaksanaan', function ($row) {
                    $hari_pelaksanaan = !empty(tanggal($row->hari_pelaksanaan)) ? tanggal($row->hari_pelaksanaan) : ''; // relasi user->siswa

                    return $hari_pelaksanaan;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="../admin/jurnal/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    if (Auth::user()->role != 'kaprog' && Auth::user()->role != 'kepsek' && Auth::user()->role != 'tu'  && Auth::user()->role != 'bkk' ) {

                        $button .= '&nbsp';

                        $button .= '<a  href="../admin/jurnal/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';

                        $button .= '&nbsp';

                        $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    }
                    return $button;
                })
                ->rawColumns(['action', 'topik_pekerjaan', 'nama_siswa', 'hari_pelaksanaan'])
                ->addIndexColumn()->make(true);
        }
    }

    public function tambah(Request $request)

    {

        if (Auth::user()->role == "kaprog") {
            return back();
        }
        $sidebar = 'jurnal';
        $data_prakerin = data_prakerin::all();
        return view('admin.jurnal_prakerin.tambah', compact('sidebar', 'data_prakerin'));
    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(jurnal_prakerinRequest $request)

    {

        $request->validated();
        $prakerin = data_prakerin::where('id', $request->id_siswa)->first();
        $jurnal = jurnal_prakerin::create([
            'kompetisi_dasar' => $request->kompetisi_dasar,
            'topik_pekerjaan' => $request->topik_pekerjaan,
            'hari_pelaksanaan' => $request->hari_pelaksanaan,
            'jam_masuk' => $request->jam_masuk,
            'jam_istirahat' => $request->jam_istiharat,
            'jam_pulang' => $request->jam_pulang,
            'id_siswa' => $prakerin->id_siswa,
            'id_perusahaan' => $prakerin->id_perusahaan,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);

        $falisitas = fasilitas_prakerin::create([
            'id_jurnal_prakerin' => $jurnal->id,
            'mess' => $request->mess,
            'buss_antar_jemput' => $request->buss_antar_jemput,
            'makan_siang' => $request->makan_siang,
            'intensif' => $request->intensif
        ]);

        return redirect()->route('jurnal.index')->with(['success' => "Jurnal $prakerin->nama Berhasil di tambah"]);
    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function detail($id)

    {

        $sidebar = 'jurnal';
        $jurnal = jurnal_prakerin::with('fasilitas_prakerin')->find($id);
        return view(
            'admin.jurnal_prakerin.detail',
            compact('sidebar', 'jurnal')
        );
    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        if (Auth::user()->role == "kaprog") {

            return back();
        }

        // $sidebar = 'jurnal';

        $data_prakerin = data_prakerin::all(); //

        // $dataP = data_prakerin::findOrFail($id);

        // dd($dataP);

        $jurnalPrakerin = jurnal_prakerin::with('fasilitas_prakerin')->find($id);

        // dd($jurnalPrakerin);

        return view('admin.jurnal_prakerin.edit', compact('data_prakerin', 'jurnalPrakerin'));
    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(jurnal_prakerinRequest $request, $id)

    {

        $request->validated();

        $prakerin = data_prakerin::where('id', $request->id_siswa)->first();

        $jurnal = jurnal_prakerin::where('id', $id)->update([
            'kompetisi_dasar' => $request->kompetisi_dasar,
            'topik_pekerjaan' => $request->topik_pekerjaan,
            'hari_pelaksanaan' => $request->hari_pelaksanaan,
            'jam_masuk' => $request->jam_masuk,
            'jam_istirahat' => $request->jam_istiharat,
            'jam_pulang' => $request->jam_pulang,
            'id_siswa' => $prakerin->id_siswa,
            'id_perusahaan' => $prakerin->id_perusahaan,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);

        $falisitas = fasilitas_prakerin::where('id_jurnal_prakerin', $jurnal->id)->update([
            'mess' => $request->mess,
            'buss_antar_jemput' => $request->buss_antar_jemput,
            'makan_siang' => $request->makan_siang,
            'intensif' => $request->intensif
        ]);


        return redirect()->route('jurnal.index')->with(['success' => "Jurnal $prakerin->nama Berhasil di Update"]);

        //     $validator = Validator::make($request->all(), [

        //         'kompetisi_dasar' => 'required',

        //         'topik_pekerjaan' => 'required',

        //         'tanggal_pelaksanaan' => 'required',

        //         'jam_masuk' => 'required',

        //         // 'jam_istiharat' => 'required|after:jam_masuk|between:10,12',

        //         'jam_istiharat' => 'required|after:jam_masuk',

        //         'jam_pulang' => 'required|after:jam_istiharat|after:jam_masuk',

        //         'mess' => 'required',

        //         'makan_siang' => 'required',

        //         'bus_antar_jemput' => 'required',

        //         'intensif' => 'required',

        //         'id_siswa' => 'required'

        //     ],

        //     [

        //      'required' => ':attribute wajib diisi.',

        //      'after' => 'attribute jam pulang harus di atas dari  jam masuk'

        //      ]

        // );



        // $prakerin = data_prakerin::where('id',$request->id_siswa)->first();



        //      if ($validator->fails()) {

        //      return redirect()->route('jurnal.tambah')->withErrors($validator)->withInput();

        //      }else{







        //      }

        //  dd($jurnal);



    }





    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy(Request $request, $id)

    {
        jurnal_prakerin::where('id', $id)->delete();
        return response()->json($data = 'berhasil');
    }

    public function delete_all(Request $request)

    {
    }
}
