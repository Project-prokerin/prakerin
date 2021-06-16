<?php

namespace App\Http\Controllers\admin\tandatangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tanda_tangan;
use Paginate;
use File;

class TandatanganController extends Controller
{
   
    public function index()
    {
        $ttd = Tanda_tangan::paginate(6);
        // dd($ttd);
        return view('admin.tanda-tangan.index',compact('ttd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $dataPrakerin = data_prakerin::with('perusahaan')->orderby('created_at','DESC');
            return datatables()->of($dataPrakerin)
            ->editColumn('kelas', function($data){
                return $data->kelas->level;
            })
            ->editColumn('jurusan', function ($data) {
                if (empty($data->kelas->jurusan)) {
                    return "Jurusan Belum Terdaftar";
                }
                return $data->kelas->jurusan;
            })
            ->editColumn('tgl_mulai', function ($dataPrakerin) {
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
                if (empty($data_prakerin->perusahaan->nama)) {
                    return "Perusahaan Belum terdaftar";
                }
                    return $data_prakerin->perusahaan->nama;
                })
                ->addColumn('tgl_pelaksanaan', function($data){
                    return $data->created_at->format('m-d-Y');
                })
                ->addColumn('action', function ($data) {
                    $button = '<button type="button"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></button>';
                    $button .= '&nbsp';
                    $button .= '<a  href="../admin/data_prakerin/edit/'.$data->id.'" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
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
        
        return view('admin.tanda-tangan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'ttd' => 'required|image|mimes:png',
            'nama' => 'required',
        ],[
            'required' =>'Tidak boleh kosong',
            'mimes' => 'Harus PNG'
        ]);
        // $image = new Image;

        // if ($request->file('file')) {
        //     $imagePath = $request->file('file');
        //     $imageName = $imagePath->getClientOriginalName();

        //     $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
        // }
        $nm = $request->ttd;
        // $nm =   $request->file('/surat');
           $namaFile =  $nm->getClientOriginalName();

            $nm->move(public_path().'/ttd',$namaFile);
        

        Tanda_tangan::create([
            'nama' => $request->nama,
            'path_gambar' => "ttd/$namaFile"
            
        ]);

        return redirect()->route('tanda-tangan.index')->with(['pesan' => "Tanda-tangan berhasil di tambah!"]);

    //    dd($request);
        // return redirect()->route('data_prakerin.index')->with(['success' => 'Data berhasil di tambah!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        dd($id);
        return view('admin.data_prakerin.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::doesntHave('data_prakerin')->get();
        $perusahaan = perusahaan::all();
        $guru = guru::all();
        $dataPrakerin = data_prakerin::findOrFail($id);
        $kelas = kelas::all();
        // dd($dataPrakerin->perusahaan->nama);
        return view('admin.data_prakerin.edit',compact('dataPrakerin','perusahaan','guru','siswa','id','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(data_prakerinRequest $request,data_prakerin $data_prakerin)
    {
        $request->validated();
        $siswa = Siswa::where('id', $request->id_siswa)->first();
        // dd($siswa->nama_siswa);
        $update = data_prakerin::where('id',$data_prakerin->id )->update([
            'nama'   => $siswa->nama_siswa,
            'id_kelas'         => $request->kelas,
            'id_siswa'      => $request->id_siswa,
            'id_perusahaan' => $request->id_perusahaan,
            'id_guru' => $request->id_guru,
            'status' => $request->status,
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
    
    public function destroy(request $request, $id)
    {
        // dd($id);
        $file_path = Tanda_tangan::where('id',$id)->first();  // Value is not URL but directory file path
        if(File::exists(public_path($file_path->path_gambar))){
            File::delete(public_path($file_path->path_gambar));
        }

        Tanda_tangan::destroy($id);
        return back()->with(['fail' => "Tanda-tangan berhasil di Hapus!"]);

    }
}
