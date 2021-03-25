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
    public function index(Request $request)
    {
   
        $dataPrakerin = data_prakerin::with('perusahaan');
        if ($request->ajax()) {
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
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></button>';     
                $button .= '&nbsp';
                $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                $button .= '&nbsp';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';     
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()->make(true);
        }



        return view('admin.data_prakerin.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        return response()->json();
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
        
        // $request->validate([
        //     'nama' => 'required|',
        //     'kelas' => 'required',
        //     'jurusan' => 'required',
        //     'id_siswa' => 'required',
        //     'id_perusahaan' => 'required',
        //     'id_guru' => 'required',
        //     'tanggal_mulai' => 'required',
        //     'tanggal_selesai' => 'required',
        // ]);
        $user = request()->input('siswa');
        $user_data = explode('-', $user);
        dd($user_data); 

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
    public function destroy($id)
    {
        //
    }
}
