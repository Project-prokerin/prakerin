<?php

namespace App\Http\Controllers\admin\data_prakerin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\data_prakerin;
use App\Models\perusahaan;
use App\Models\guru;
class data_prakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.data_prakerin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $dataPrakerin = data_prakerin::with('perusahaan');
            return datatables()->of($dataPrakerin)->editColumn('tgl_mulai', function ($dataPrakerin) {
                return [
                    'display' => e($dataPrakerin->tgl_mulai->format('m-d-Y')),
                    'timestamp' => $dataPrakerin->tgl_mulai->timestamp
                ];
            })->editColumn('tgl_selesai', function ($dataPrakerin) {
                return [
                    'display' => e($dataPrakerin->tgl_selesai->format('m-d-Y')),
                    'timestamp' => $dataPrakerin->tgl_selesai->timestamp
                ];
            })
                ->addColumn('perusahaan', function (data_prakerin $data_prakerin) {
                    return $data_prakerin->perusahaan->nama;
                })
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></button>';
                    $button .= '&nbsp';
                    $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
        }
    }
    public function tambah()
    {
        $siswa = Siswa::all();
        $perusahaan = perusahaan::all();
        $guru = guru::all();
        return view('admin.data_prakerin.tambah', compact('siswa','perusahaan','guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = request()->input('id_siswa');
        list($nama,$id_siswa)= explode('-', $user);

        $data = data_prakerin::create([
            'nama' => $nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'id_siswa' => $id_siswa,
            'id_perusahaan' => $request->id_perusahaan,
            'id_guru' => $request->id_guru,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai
        ]);
        // dd($data); 
            //  Alert::success('Success','Berhasil Memposting');
            return redirect()->route('data_prakerin.index')->with(['success' => 'Data berhasil di tambah!']);


        // $validateData = $request->validate([
        //     'nim' => 'required|',
        //     'nama' => 'required|min:3|max:50',
        //     'jenis_kelamin' => 'required|in:P,L',
        //     'jurusan' => 'required',
        //      'alamat' => '',
        //      ]);
          
        //    Mahasiswa::create($validateData);
          
        //    return "Data berhasil diinput ke database";
    //    $nm=$request->upload;
    //    $namefile = $nm->getClientOriginalName();
    //    upload('upload')->storeAs('public/postingan',$filename);

            // $postingan = Postingan::create([
            //     'upload' => $namefile,
            //     'perusahaan' => $request['deskripsi'],
            //     'users_id' => Auth::id(),
                
            //     ]);
         
            // return redirect()->route('people.index')->with('success','Berhasil Memposting');


    //    $nm=$request->upload;
    //    $namefile = $nm->getClientOriginalName();
    //    upload('upload')->storeAs('public/postingan',$filename);

            // $postingan = Postingan::create([
            //     'upload' => $namefile,
            //     'perusahaan' => $request['deskripsi'],
            //     'users_id' => Auth::id(),
                
            //     ]);
         
            //     Alert::alert('Success','Berhasil Memposting','success');
            // return redirect()->route('people.index')->with('success','Berhasil Memposting');
            
            

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        return view('admin.data_prakerin.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.data_prakerin.edit');
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
    public function destroy(request $request, $id)
    {
        data_prakerin::where('id',$id)->delete();
        return response()->json($data = 'berhasil');
    }
}
