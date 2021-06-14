<?php

namespace App\Http\Controllers\admin\surat_masuk;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use App\Models\Surat_masuk;
use App\Models\Surat_M;
use App\Models\Detail_surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use File;
class Surat_masukController extends Controller
{

    public function index()
    {

    }

    public function ajax()
    {

    }
    // route admin
    public function index_admin()
    {
        return view('admin.surat_masuk.admin.index');
    }
    public function ajax_admin(Request $request)
    {
        if ($request->ajax()) {
            $surat = Surat_masuk::get();
            return datatables()->of($surat)
                ->addColumn('nama', function ($data) {
                    return $data->surat_m->nama_surat;
                })
                ->addColumn('untuk', function ($data) {
                    return $data->untuk_guru->nama;
                })
                ->addColumn('jabatan', function ($data) {
                    return $data->untuk_guru->jabatan;
                })
                ->addColumn('disposisi', function ($data) {
                if (Auth::user()->role == 'kepsek') {
                    $url = '/admin/kepsek/surat_masuk/';
                } elseif (Auth::user()->role == 'admin') {
                    $url = '';
                };
                    if (!empty($data->surat_m->detail_surat->disposisi)) {
                        $id = $data->surat_m->detail_surat->disposisi->id;
                        $button = '<a href="/admin/surat_masuk/'. $id . '/disposisi/view"   id="' . $id . '" class="edit btn btn-success btn-sm">view</a>'
                        . '' . ' <a href="/admin/surat_masuk/'. $id . '/disposisi/edit"   id="' . $id . '" class="edit btn btn-warning btn-sm">edit</a>'
                        . '' . ' <button type="button" name="delete" id="hapus-disposisi" data-id="' . $id . '" class="delete_disposisi btn btn-danger btn-sm">hapus</button>';
                    } else {
                        $button = '<a href="/admin/surat_masuk/'.$url . $data->id . '/disposisi/tambah"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>';
                    }
                    return $button;
                })
                ->addColumn('action', function ($data) {

                    $button = '<a href="/admin/surat_masuk/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/surat_masuk/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })

                ->rawColumns(['action', 'untuk', 'nama', 'jabatan', 'disposisi'])
                ->addIndexColumn()->make(true);
        }
    }

    // end route admin
    //  route tu
    public function index_TU()
    {
        return view('admin.surat_masuk.tu.index');
    }

    public function ajax_TU(Request $request)
    {
         if ($request->ajax()) {
            $surat = Surat_masuk::get();
            return datatables()->of($surat)
                ->addColumn('nama', function ($data) {
                    return $data->surat_m->nama_surat;
                })
                ->addColumn('untuk', function($data){
                    return $data->untuk_guru->nama;
                })
                ->addColumn('jabatan', function ($data) {
                    return $data->untuk_guru->jabatan;
                })
                ->addColumn('disposisi', function ($data) {
                    $id = $data->id;
                    $button = '';
                    if (empty($data->surat_m->detail_surat->disposisi)) {
                        $button .= '<a href="#" class="edit btn btn-danger btn-sm">Kosong</a>';
                    }else{
                    $button .= '<a href="/admin/' . Auth::user()->role . '/surat_masuk/' . $id . '/disposisi/view"   id="' . $id . '" class="edit btn btn-success btn-sm">view</a>';
                    }

                    return $button;
                })
                ->addColumn('action', function ($data) {
                    $button = '';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/tu/surat_masuk/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','untuk','nama','jabatan','disposisi'])
                ->addIndexColumn()->make(true);
        }
    }

    public function detail_surat($id)
    {
        return 'ini detail surat';
    }

    public function tambah_surat()
    {
        switch (Auth::user()->role) {
            case 'admin':
                return view('admin.surat_masuk.tu.tambah');
                break;
            case 'kepsek':
                return view('admin.surat_masuk.admin.tambah');
                break;

            case 'tu':
                return view('admin.surat_masuk.admin.tambah');
                break;

        }
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'nosurat' => 'required',
            'perihal_surat' => 'required',
            'keterangan' => 'required',
        ],[
            'required' =>  'Tidak boleh kosong!',
        ]);
        $nm = $request->file;
        $fileName = $nm->getClientOriginalName();
             Transaksi::create([
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'nosurat' => $request->nosurat,
                'perihal_surat' => $fileName,
                'keterangan' => $request->keterangan,
             ]);
             $nm->move(public_path().'/img',$fileName);
        return redirect()->to('/home/data-transaksi')->with('pesan','Berhasil menambah kelas!');
    }

    // route buat semua admin & tu
    public function store_surat(Request $request)
    {
    //    dd($request->surat);
       $nm = $request->surat;
    // $nm =   $request->file('/surat');
       $namaFile =  $nm->getClientOriginalName();


     $surat_masuk  =  Surat_masuk::create([
        'id_dari' => Auth::user()->id,
        'id_untuk' => $request->id_untuk,
        'status' => 'pengajuan',
        'created_at' => Carbon::now()
    ]);


   $surat_m = Surat_M::create([
        'nama_surat' => $request->nama_surat,
        'path_surat' => "surat/surat_masuk/$namaFile",
        'tgl_surat_masuk' => Carbon::today()->toDateString(),
        'id_surat_masuk' => $surat_masuk->id,
        'created_at' => Carbon::now()
    ]);
        $nm->move(public_path().'/surat/surat_masuk',$namaFile);
        $surat_number = Surat_M::orderBy('created_at','DESC')->first();

        $surat_number = Surat_M::orderBy('created_at','DESC')->first();
        Detail_surat::create([
            'tgl_surat' => Carbon::today()->toDateString(),
            'no_surat' =>  str_pad($surat_number->id + 1, 3, "0", STR_PAD_LEFT),
            'id_surat_m' => $surat_m->id,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('admin.surat_masuk.index')->with('pesan','Berhasil mengirim surat!');


    }

    public function edit_surat($id)
    {
        // dd(Surat_masuk::findOrFail($id)->surat_m->path_surat);
        switch (Auth::user()->role) {
            case 'tu':
                return view('admin.surat_masuk.tu.edit', ['surat_masuk' => Surat_masuk::findOrFail($id)]);
                break;
            case 'admin':
                return view('admin.surat_masuk.admin.edit', ['surat_masuk' => Surat_masuk::findOrFail($id)]);
                break;
        }
    }

    public function update_surat(Request $request,$id)
    {

           if ($request->surat === null) {
            // $nm = $request->surat;
            // $nm =   $request->file('/surat');
            //    $namaFile =  $nm->getClientOriginalName();


               Surat_masuk::find($id)->update([
                'id_dari' => Auth::user()->id,
                'id_untuk' => $request->id_untuk,
                'status' => 'pengajuan',
                'created_at' => Carbon::now()->format('Y-m-d')
            ]);

            Surat_M::find($id)->update([
                'nama_surat' => $request->nama_surat,
                // 'path_surat' => "surat/surat_masuk/$namaFile",
                'tgl_surat_masuk' => Carbon::today()->toDateString(),
                // 'id_surat_masuk' => $surat_masuk->id,
                'created_at' => Carbon::now()->format('Y-m-d')
            ]);
                // $nm->move(public_path().'/surat/surat_masuk',$namaFile);

                return redirect()->route('admin.surat_masuk.index')->with('pesan','Berhasil mengirim surat!');
           }else {

            $file_path = Surat_M::where('id_surat_masuk',$id)->first();  // Value is not URL but directory file path
            if(File::exists(public_path($file_path->path_surat))){
                File::delete(public_path($file_path->path_surat));
            }

            $nm = $request->surat;
            // $nm =   $request->file('/surat');
               $namaFile =  $nm->getClientOriginalName();


               Surat_masuk::find($id)->update([
                'id_dari' => Auth::user()->id,
                'id_untuk' => $request->id_untuk,
                'status' => 'pengajuan',
                'created_at' => Carbon::now()->format('Y-m-d')
            ]);

            Surat_M::find($id)->update([
                'nama_surat' => $request->nama_surat,
                'path_surat' => "surat/surat_masuk/$namaFile",
                'tgl_surat_masuk' => Carbon::today()->toDateString(),
                // 'id_surat_masuk' => $surat_masuk->id,
                'created_at' => Carbon::now()->format('Y-m-d')
            ]);
                $nm->move(public_path().'/surat/surat_masuk',$namaFile);

                return redirect()->route('admin.surat_masuk.index')->with('pesan','Berhasil mengirim surat!');
           }

    }

    public function destroy_surat($id)
    {
        $file_path = Surat_M::where('id_surat_masuk',$id)->first();  // Value is not URL but directory file path
        if(File::exists(public_path($file_path->path_surat))){
            File::delete(public_path($file_path->path_surat));
        }

        Surat_masuk::destory($id);
        return response()->json($data = 'berhasil');
    }



    // end route tu

    // route kepsek
    public function index_kepsek()
    {
        return view('admin.surat_masuk.kepsek.index');
    }
    public function ajax_kepsek(Request $request)
    {
         if ($request->ajax()) {
            $surat = Surat_masuk::get();
            return datatables()->of($surat)
                ->addColumn('nama', function ($data) {
                    return $data->surat_m->nama_surat;
                })
                ->addColumn('untuk', function($data){
                    return $data->untuk_guru->nama;
                })
                ->addColumn('jabatan', function ($data) {
                    return $data->untuk_guru->jabatan;
                })
                ->addColumn('disposisi', function ($data) {
                    if(!empty($data->surat_m->detail_surat->disposisi))
                    {
                        $id = $data->surat_m->detail_surat->disposisi->id;
                        $button = '<a href="/admin/kepsek/surat_masuk/' . $id . '/disposisi/view"   id="' . $id . '" class="edit btn btn-success btn-sm">view</a>'
                        .''. ' <a href="/admin/kepsek/surat_masuk/' . $id . '/disposisi/edit"   id="' . $id . '" class="edit btn btn-warning btn-sm">edit</a>'
                        .''.' <button type="button" name="delete" id="hapus-disposisi" data-id="' . $id . '" class="delete_disposisi btn btn-danger btn-sm">hapus</button>';
                    }else{
                        $button = '<a href="/admin/kepsek/surat_masuk/' . $data->id . '/disposisi/tambah"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>';
                    }
                    return $button;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/kepsek/surat_masuk/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })

                ->rawColumns(['action','untuk','nama','jabatan','disposisi'])
                ->addIndexColumn()->make(true);
        }
    }
    // end route kepsek

    // route pokja
    public function index_pokja()
    {
        return view('admin.surat_masuk.pokja.index');
    }
    public function ajax_pokja(Request $request)
    {
        if ($request->ajax()) {
            $surat = Disposisi::where('Pokjatujuan', Auth::user()->role)->get();
            return datatables()->of($surat)
            ->addColumn('nama', function ($data) {
                return $data->detail_surat->surat_m->nama_surat;
            })
            ->addColumn('dari', function($data){
                return $data->detail_surat->surat_m->surat_masuk->untuk_guru->nama;
            })
            ->addColumn('jabatan', function($data){
                return $data->detail_surat->surat_m->surat_masuk->untuk_guru->jabatan;
            })
            ->addColumn('status', function($data){
                return $data->detail_surat->surat_m->surat_masuk->status;
            })
            ->addColumn('disposisi', function ($data) {
                $button = '';
                if (empty($data->surat_m->detail_surat->disposisi)) {
                $button .= '<a href="#" class="edit btn btn-danger btn-sm">Kosong</a>';
                }
                $button .= '<a href="/admin/'. Auth::user()->role .'/surat_masuk/' . $id . '/disposisi/view"   id="' . $id . '" class="edit btn btn-success btn-sm">view</a>';
                return $button;
        })
            ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/'.Auth::user()->role.'/surat_masuk/download/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-success btn-sm"><i class="fa fa-download"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a href="/admin/'.Auth::user()->role.'/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    return $button;
            })
            ->rawColumns(['action','dari','nama','jabatan','status','disposisi'])
            ->addIndexColumn()->make(true);
        }
    }
        public  function download()
        {
            dd("halo");
        }
        // ed route pokja







}
