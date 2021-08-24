<?php

namespace App\Http\Controllers\admin\surat_masuk;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\surat_masukRequest;
use App\Models\Disposisi;
use App\Models\Surat_masuk;
use App\Models\Surat_M;
use App\Models\Detail_surat;
use App\Models\feedback;
use App\Models\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use Response;
use File;
class Surat_masukController extends Controller
{
    // route admin
    public function index_admin()
    {

    $notifications = auth()->user()->unreadNotifications;
    $notifUnread = Auth::user()->notifications->where('read_at',null)->toArray();
    

  

    
        return view('admin.surat_masuk.index');
    }
    public function ajax_admin(Request $request)
    {
        if ($request->ajax()) {
            if (Auth::user()->role == 'admin' or Auth::user()->role == 'kepsek' or Auth::user()->role == 'tu' or  Auth::user()->role == 'kaprog') {
                     $surat = Surat_masuk::get();
                     return datatables()->of($surat)
                         ->addColumn('nama', function ($data) {
                             return $data->surat_m->nama_surat;
                         })
                         ->addColumn('untuk', function ($data) {
                             return $data->untuk_guru->nama;
                         })
                         ->addColumn('dari', function ($data) {
                             return $data->dari_guru->nama;
                         })
                         ->addColumn('jabatan', function ($data) {
                             return $data->untuk_guru->jabatan;
                         })
                         ->addColumn('disposisi', function ($data) {

                             $button = '';
                             if (Auth::user()->role == "tu") {
                                 switch ($data->status) {
                                     case 'tolak':
                                             $button .=  '<span class="badge bg-danger text-white" style="font-size: 12px; " ><b>Pengajuan Di tolak</b></span>';
                                             return $button;
                                         break;                                
                                     case 'acc':
                                             if (empty($data->surat_m->detail_surat->disposisi)) {
                                                     $button .=  '<span class="badge bg-danger text-white" style="font-size: 12px; " ><b>Disposisi Kosong</b></span>';
                                                 return $button;
                                             }
                                     // $disposisi = disposisi::get();
                                         
                                             $id = $data->id;
                                             // $button .= '<a href="/admin/surat_masuk/' . $id . '/disposisi/view"   id="' . $id . '" class="edit btn btn-success btn-sm">view</a>';
                                             $feedback = feedback::where('id_detail_surat',$data->id)->first(); 
                                             if (empty($feedback)) {
                                                 $button .= '&nbsp <a href="/admin/surat_masuk/' . $id . '/disposisi/view"   id="' . $id . '" class="edit btn btn-success btn-sm">view  <small> 
                                                 <div class="dropup-secondary">
                                                    <span class="dropupp-secondary badge badge-sm badge-secondary text-secondary">0 
                                                     <div class="dropup-secondary-content"> <span>Belum ada feedback</span> </div>
                                                 </span></small> 
                                                 </div>
                                               </a>';

                                             }else{
                                                 $button .= '&nbsp <a href="/admin/surat_masuk/' . $id . '/disposisi/view"   id="' . $id . '" class="edit btn btn-success btn-sm">view  <small> 
                                                 <div class="dropup-primary">
                                                     <span class="dropupp-primary badge badge-sm badge-primary text-primary">0  
                                                         <div class="dropup-primary-content"> 
                                                             <span>Sudah ada feedback</span>  
                                                         </div>
                                                 </span></small> 
                                                 </div>
                                                </a>';

                                             }
                                             // if (Auth::user()->role == 'admin' or Auth::user()->role == 'kepsek' or Auth::user()->role == 'kaprog') {
                                             //     $button .= ' <a href="/admin/surat_masuk/' . $id . '/disposisi/edit"   id="' . $id . '" class="edit btn btn-warning btn-sm">edit</a>';
                                             //     $button .= ' <button type="button" name="delete" id="hapus-disposisi" data-id="' . $id . '" class="delete_disposisi btn btn-danger btn-sm">hapus</button>';
                                             // }
                                             // return $button;
                                             break;
                                     case 'pengajuan':
                                             $button .=  '<span class="badge bg-warning text-white" style="font-size: 12px; " ><b>Pengajuan Surat</b></span>';
                                             return $button;
                                             break;

                                         }
                                     
                             }
                            else if(Auth::user()->role == 'admin' or Auth::user()->role == 'kaprog' or Auth::user()->role == 'kepsek') {
                                if ($data->status == "tolak") {
                                    $button .=  '<span class="badge bg-danger text-white" style="font-size: 12px; " ><b>Pengajuan Di tolak</b></span>';
                                }else if($data->status == "acc"){
                                         $id_suratMasuk = $data->id;
                                         $id = $data->id;
                                        $button .= '<a href="/admin/surat_masuk/' . $id . '/disposisi/view"   id="' . $id . '" class="edit btn btn-success btn-sm">view</a>';
                                            $button .= ' <a href="/admin/surat_masuk/' . $id . '/disposisi/edit"   id="' . $id . '" class="edit btn btn-warning btn-sm">edit</a>';
                                            $button .= ' <button type="button" name="delete" id="hapus-disposisi" data-id="' . $id_suratMasuk . '" class="delete_disposisi btn btn-danger btn-sm">hapus</button>';
                                }
                                else{
                                    $id = $data->id;
                                    $button .= '<a href="/admin/surat_masuk/' . $id . '/disposisi/tambah"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>';
                                    $button .= '  <button id="surat-batal" data-id="' . $id . '" class=" btn btn-danger btn-sm"><i class="fas fa-times"></i></button>';
                                }
                            
                                }
                            
                            return $button;
                            }
                        )
                        ->addColumn('action', function ($data) {
                            $button = '<a href="/admin/surat_masuk/download/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-success btn-sm"><i class="fa fa-download"></i></a>';
                            $button .= '&nbsp';
                            $button .= '<a href="/admin/surat_masuk/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                            $button .= '&nbsp';
                            if(Auth::user()->role == 'admin' or Auth::user()->role == 'tu'){
                            $button .= '<a  href="/admin/surat_masuk/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                            $button .= '&nbsp';
                            $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                            }
                            return $button;
                        })
                    
                        ->rawColumns(['action', 'untuk', 'nama', 'jabatan', 'disposisi','dari'])
                        ->addIndexColumn()->make(true);
                }else {
                    $surat = Disposisi::where('Pokjatujuan', Auth::user()->role)->get();
                    return datatables()->of($surat)
                        ->addColumn('nama', function ($data) {
                            return $data->detail_surat->surat_m->nama_surat;
                        })
                        ->addColumn('dari', function ($data) {
                            return $data->detail_surat->surat_m->surat_masuk->untuk_guru->nama;
                        })
                        ->addColumn('jabatan', function ($data) {
                            return $data->detail_surat->surat_m->surat_masuk->untuk_guru->jabatan;
                        })
                        ->addColumn('status', function ($data) {
                            return $data->detail_surat->surat_m->surat_masuk->status;
                        })
                        ->addColumn('disposisi', function ($data) {
                            $button = '';
                            if (empty($data)) {
                                $button .= '<a href="#" class="edit btn btn-danger btn-sm">Kosong</a>';
                            }else{
                                $feedback = feedback::where('id_detail_surat',$data->id_detail_surat)->first(); 
                                    if (empty($feedback)) {
                                        $button .= '&nbsp <a href="/admin/surat_masuk/' . $data->id_detail_surat . '/disposisi/view"   id="' . $data->id_detail_surat . '" class="edit btn btn-success btn-sm">view  <small> 
                                        <div class="dropup-secondary">
                                           <span class="dropupp-secondary badge badge-sm badge-secondary text-secondary">0 
                                            <div class="dropup-secondary-content"> <span>Belum ada feedback</span> </div>
                                        </span></small> 
                                        </div>
                                      </a>';
                                    
                                    }else{
                                        $button .= '&nbsp <a href="/admin/surat_masuk/' . $data->id_detail_surat . '/disposisi/view"   id="' . $data->id_detail_surat . '" class="edit btn btn-success btn-sm">view  <small> 
                                        <div class="dropup-primary">
                                            <span class="dropupp-primary badge badge-sm badge-primary text-primary">0  
                                                <div class="dropup-primary-content"> 
                                                    <span>Sudah ada feedback</span>  
                                                </div>
                                        </span></small> 
                                        </div>
                                       </a>';

                                    }
                            }

                            return $button;
                        })
                        ->addColumn('action', function ($data) {
                            $button = '<a href="/admin/surat_masuk/download/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-success btn-sm"><i class="fa fa-download"></i></a>';
                            $button .= '&nbsp';
                            $button .= ' <a href="/admin/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                            return $button;
                        })
                        ->rawColumns(['action', 'dari', 'nama', 'jabatan', 'status', 'disposisi'])
                        ->addIndexColumn()->make(true);
                     }
        }
    }


    public function detail_surat($id)
    {
        // $surat = Surat_masuk::find($id)->first();
    $surat =    Surat_masuk::findOrFail($id);

        return response()->file(
            public_path($surat->surat_m->path_surat)
        );
        return 'ini detail surat';


        // return response()->file(
        //     public_path()."/".$surat->surat_m->path_surat
        // );
        // return 'ini detail surat';
    }


    public function tambah_surat()
    {
        // if (Auth::user()->role != "tu") {
        //     return back();
        // }
        $guru = guru::whereIn('jabatan', ['kepsek','keprog'])->get();
        return view('admin.surat_masuk.tambah', compact('guru'));
    }


    // route buat semua admin & tu
    public function store_surat(surat_masukRequest $request)
    {
        $request->validated();
        $nm = $request->surat;
        $nama_surat = $request->nama_surat;
        $extensi = $nm->getClientOriginalExtension();
        $name = time() .' '. $nama_surat . '.' . $extensi;

        $surat_masuk  =  Surat_masuk::create([
        'id_dari' => Auth::user()->id,
        'id_untuk' => $request->id_untuk,
        'status' => 'pengajuan',
        'created_at' => Carbon::now()
        ]);

        $surat_m = Surat_M::create([
            'nama_surat' => $nama_surat,
            'path_surat' => "surat/surat_masuk/$name",
            'tgl_surat_masuk' => Carbon::today()->toDateString(),
            'id_surat_masuk' => $surat_masuk->id,
            'created_at' => Carbon::now()
        ]);

        $nm->move(public_path().'/surat/surat_masuk', $name);
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
        // if (Auth::user()->role != "tu") {
        //     return back();
        // }
        return view('admin.surat_masuk.edit', ['surat_masuk' => Surat_masuk::findOrFail($id), 'guru' => guru::whereIn('jabatan', ['kepsek','keprog'])->get()]);
    }

    public function update_surat(surat_masukRequest $request,$id)
    {
            $request->validated();
           if ($request->surat == 'default') {
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
                return redirect()->route('admin.surat_masuk.index')->with('pesan','Berhasil mengirim surat!');
            }else {
                    $file_path = Surat_M::where('id_surat_masuk',$id)->first();  // Value is not URL but directory file path
                    if(File::exists(public_path($file_path->path_surat))){
                        File::delete(public_path($file_path->path_surat));
                }
                $nm = $request->surat;
                $nama_surat = $request->nama_surat;
                $extensi = $nm->getClientOriginalExtension();
                $name = time() .' '. $nama_surat . '.' . $extensi;
                Surat_masuk::find($id)->update([
                    'id_dari' => Auth::user()->id,
                    'id_untuk' => $request->id_untuk,
                    'status' => 'pengajuan',
                    'created_at' => Carbon::now()->format('Y-m-d')
                ]);

                Surat_M::find($id)->update([
                    'nama_surat' => $request->nama_surat,
                    'path_surat' => "surat/surat_masuk/$name",
                    'tgl_surat_masuk' => Carbon::today()->toDateString(),
                    // 'id_surat_masuk' => $surat_masuk->id,
                    'created_at' => Carbon::now()->format('Y-m-d')
                ]);
                $nm->move(public_path() . '/surat/surat_masuk', $name);
                return redirect()->route('admin.surat_masuk.index')->with('pesan','Berhasil mengubah surat!');
           }
    }
    public function batal($id){
        Surat_masuk::find($id)->update(['status' => 'tolak']);
        return response()->json($data = 'berhasil');
    }
    public function destroy_surat($id)
    {
        $file_path = Surat_M::where('id_surat_masuk',$id)->first();  // Value is not URL but directory file path
        if(File::exists(public_path($file_path->path_surat))){
            File::delete(public_path($file_path->path_surat));
        }

        Surat_masuk::destroy($id);
        return response()->json($data = 'berhasil');
    }


    public function download($id)
    {
        $surat =    Surat_masuk::findOrFail($id);

    
        $file = public_path() . "/".$surat->surat_m->path_surat;
        $nama = explode(' ', basename($surat->surat_m->path_surat))[1];
        $headers = array('Content-Type: application/pdf',);
        return Response::download($file, $nama, $headers);
    }
        // ed route pokja







}