<?php

namespace App\Http\Controllers\admin\surat_masuk;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\disposisi2Request;
use App\Http\Requests\admin\disposisiRequest;
use App\Models\Disposisi;
use App\Models\Surat_masuk;
use App\Models\Detail_surat;


use App\Models\guru;
// use Notification;
use App\Models\feedback;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class DiposisiController extends Controller
{

    public function index()
    {
        return view('admin.disposisi.index');
    }
    public function ajax(Request $request)
    {
         if ($request->ajax()) {
            $surat = Disposisi::get();
            return datatables()->of($surat)
                ->addColumn('surat', function ($data) {
                    return $data->detail_surat->surat_m->nama_surat;
                })
                ->addColumn('untuk', function ($data) {
                    return $data->pokjatujuan;
                })
                ->addColumn('keterangan', function ($data) {
                    return $data->Keterangan_disposisi;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="admin/disposisi/detail/'.$data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    if(Auth::user()->role != 'tu')
                    {
                    $button .= '<a  href="/admin/disposisi/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    }
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','untuk'])
                ->addIndexColumn()->make(true);
        }
    }
    public function detail($id)
    {
        // $untuk = 
        // dd($id);
        // $untuk = Surat_masuk::where('id',$id)->first();
        if (empty(feedback::where('id',$id)->first())) {
            $feedback = "";
        }else {
            $feedback = feedback::where('id',$id)->first(); 
            
        }
        $untuk =  Surat_masuk::where('id',$id)->first();
        $disposisi =  Disposisi::where('id',$id)->first();
        // dd($id);
        return view('admin.disposisi.detail', compact('untuk','disposisi','feedback'));
    }
    // table surat
    public function tambah_disposisi($id)
    {
        $surat = $id;
        // $surat = Detail_surat::find($id)->first();
        // dd($surat);
        // dd($id);
        return view('admin.disposisi.tambah', compact('surat'));
    }
    // table disposisi
    public function tambah($id)
    {
        // if (Auth::user()->role != "admin" or Auth::user()->role != "kepsek" or Auth::user()->role != "kaprog" ) {
        //     return back();
        // }
        $surat = Surat_masuk::find($id)->first();
        return view('admin.disposisi.tambah', compact('surat'));
    }
    public function tambah2()
    {
        if (Auth::user()->role != "admin" or Auth::user()->role != "kepsek" or Auth::user()->role != "kaprog" ) {
            return back();
        }
        return view('admin.disposisi.tambah2', ['surat' => Detail_surat::doesntHave('disposisi')->get()]);
    }
    public function store(disposisiRequest $request,$id)
    {
        $request->validated();
        Disposisi::create([
            'Pokjatujuan' => $request->Pokjatujuan,
            'Keterangan_disposisi' =>  $request->Keterangan_disposisi,
            'id_detail_surat' => $id,
            'created_at' => Carbon::now()
        ]);
        $update = Surat_masuk::find($id)->update(['status'=>'acc']);
        switch (Route::currentRouteName()) {
            case "admin.disposisi.patch":
                return redirect()->route('admin.surat_masuk.index')->with('pesan', 'Berhasil tambah disposisi!');
                break;
            case "admin.disposisi.post":
                return redirect()->route('admin.disposisi.index')->with('pesan', 'Berhasil tambah disposisi!');
                break;
            }

    }

    public function store2(disposisi2Request $request)
    {
        $request->validated();
        $surat = Detail_surat::find($request->surat)->first();
        $surat->surat_m->surat_masuk()->update(['status' => 'acc']);
        Disposisi::create([
            'Pokjatujuan' => $request->Pokjatujuan,
            'Keterangan_disposisi' =>  $request->Keterangan_disposisi,
            'id_detail_surat' => $request->surat,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('admin.disposisi.index')->with('pesan', 'Berhasil tambah disposisi!');
    }
    public function edit($id = null)
    {
        // if (Auth::user()->role != "admin" or Auth::user()->role != "kepsek" or Auth::user()->role != "kepsek") {
        //     return back();
        // }
        $surat = Disposisi::find($id);
        // dd($surat->id);
        return view('admin.disposisi.edit', compact('surat'));
    }
    public function update(disposisiRequest $request, $id)
    {
        // dd($request);
        $request->validated();
        Disposisi::find($id)->update([
            'Pokjatujuan' => $request->Pokjatujuan,
            'Keterangan_disposisi' =>  $request->Keterangan_disposisi,
            'created_at' => Carbon::now()
        ]);
        return 'berhasil';
        switch (Route::currentRouteName()) {
            case "admin.disposisi.patch":
                return redirect()->route('admin.surat_masuk.index')->with('pesan', 'Berhasil Update disposisi!');
                break;
            case "admin.disposisi.post":
                return redirect()->route('admin.disposisi.index')->with('pesan', 'Berhasil Update disposisi!');
                break;
        }


    }
    public function destroy($id)
    {

        $d = Disposisi::find($id)->first();
        $d->detail_surat->surat_m->surat_masuk()->update(['status' => 'pengajuan']);
        $d->delete();
        return response()->json($data = 'berhasil');
    }



    public function feedback_store(Request $request)
    {
        
        $request->validate([
            'description_feedback' => 'required',

        ],[
            'required' => 'Feedback tidak boleh ksosong',
        ]);
        
          feedback::create([
                'id_disposisi' => $request->disposisi,
                'id_dari' =>  $request->id_dari,
                'id_untuk' => $request->id_untuk,
                'description_feedback' => $request->description_feedback,
                'created_at' => Carbon::now()
          ]);
    
        
        $untuk = guru::where('id_user',$request->id_untuk)->first();
        // dd($untuk);
        
        return redirect()->route('admin.surat_masuk.index')->with('pesan', 'Berhasil Mengirim Feedback ke '.$untuk->nama.' |  Jabatan:'.$untuk->jabatan);


    }

    public function feedback_update(Request $request,$id)
    { 
        $request->validate([
            'description_feedback' => 'required',

        ],[
            'required' => 'Feedback tidak boleh ksosong',
        ]);
        feedback::find($id)->update([
        'description_feedback' => $request->description_feedback,
  ]);


$dari = guru::where('id_user',$request->id_dari)->first();
$untuk = guru::where('id_user',$request->id_untuk)->first();

return redirect()->route('admin.surat_masuk.index')->with('pesan', $dari->nama.'  Berhasil  Mengubah Feedback ke '.$untuk->nama.' |  Jabatan:'.$untuk->jabatan);

    }
}
