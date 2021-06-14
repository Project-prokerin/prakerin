<?php

namespace App\Http\Controllers\admin\surat_keluar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Surat_keluar;
use App\Models\Template_surat;
use App\Models\Detail_surat_k;
use App\Models\Disposisi;
use Carbon\Carbon;
use PDF;

class Surat_keluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.surat_keluar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {

        if ($request->ajax()) {

                            $surat = Surat_keluar::get();
                            return datatables()->of($surat)
                                ->addColumn('nama_surat', function ($surat) {
                                    return $surat->detail_surat->template_surat->nama_surat;
                                })
                                ->addColumn('status', function($surat){
                                    return $surat->status;
                                })
                                ->addColumn('jabatan', function ($surat) {
                                    return $surat->untuk_guru->jabatan;
                                })
                                ->addColumn('tgl_surat', function($surat){
                                    return $surat->detail_surat->tgl_surat;
                                })
                                ->addColumn('untuk', function ($surat) {
                                    return $surat->untuk_guru->jabatan;
                                })
                                ->addColumn('dari', function ($surat) {
                                    return $surat->dari_guru->jabatan;
                                })
                                ->addColumn('action', function ($surat) {
                                    $role = Auth::user()->role;
                                    $button = '';
                                    if ($role == "admin" or  $role == "hubin") {
                                        $button .= '<a href="/admin/surat_keluar/download/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-success btn-sm"><i class="fa fa-download"></i></a>';
                                        $button .= '&nbsp';
                                        $button .= '<a href="/admin/surat_keluar/detail/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                                        $button .= '&nbsp';
                                        $button .= '<a  href="/admin/surat_keluar/edit/' . $surat->id . '" id="edit" data-toggle="tooltip"  data-id="' . $surat->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                                        $button .= '&nbsp';
                                        $button .= '<button type="button" name="delete" id="hapus" data-id="' . $surat->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                                    }else if ($role == "kaprog" or $role == "kepsek"){
                                        $button .= '<a href="/admin/surat_keluar/download/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-success btn-sm"><i class="fa fa-download"></i></a>';
                                        $button .= '&nbsp';
                                        $button .= '<a href="/admin/surat_keluar/detail/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                                        $button .= '&nbsp';
                                    }
                                    return $button;
                                })
                                ->rawColumns(['action','nama_surat','tgl_surat','dari','untuk','nama','jabatan'])
                                ->addIndexColumn()->make(true);
                }
    }


    public function tambah(Request $request)
    {
        $suratt = $request->session()->get('suratt');
        return view('admin.surat_keluar.tambah', compact('suratt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //    dd($request);
        $validatedData = $request->validate([
            'nama' => 'required',
            'nik' => 'required|numeric',
            'alamat' => 'required',
            'hari' => 'required',
            'tanggal' => 'required',
            'pukul' => 'required',
        ]);

        $nama_Surat = $request->nama_surat;
        $nama = $request->nama;
        $nik = $request->nik;
        $alamat = $request->alamat;
        $tempat = $request->tempat;
        $hari = $request->hari;
        $tanggal = $request->tanggal;
        $pukul = $request->pukul;

        $pdf_name = time() . "SuratTugas.pdf";
        $path = public_path('surat/surat_keluar/' . $pdf_name);
        $SuratKeluar = PDF::loadView('export.PDF.contoh', compact('nama_Surat','nama','nik','alamat','tempat','hari','tanggal','pukul'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->save($path);


              $template_surat  =  Template_surat::create([
                    'nama_surat' => $request->nama_surat,
                    'path_surat' => "surat/surat_keluar/$pdf_name",
                    'created_at' => Carbon::now()
                ]);
                 $surat_keluar =   Surat_keluar::create([
                    'id_dari' => Auth::user()->id,
                    'id_untuk' => $request->id_untuk,
                    'status' => 'Pengajuan',
                    'id_template_surat' => $template_surat->id,
                    'created_at' => Carbon::now()

                    ]);
        $surat_number = Surat_keluar::orderBy('created_at','DESC')->first();
                 Detail_surat_k::create([
                        'id_template_surat' => $template_surat->id,
                        'no_surat' =>  str_pad($surat_number->id + 1, 3, "0", STR_PAD_LEFT),
                        'tgl_surat' => Carbon::today()->toDateString(),
                        'path_surat' => "surat/surat_keluar/$pdf_name",
                        'id_tanda_tangan' => 1,
                        'id_surat_keluar' =>  $surat_keluar->id
                        ]);

        // $pdf = PDF::loadView('mail');
            // dd($SuratKeluar);
        // Storage::put('public/csv/name.pdf',$content) ;

        // return   $SuratKeluar->download('SuratTugas.PDF');




        return redirect()->route('admin.surat_keluar.index')->with('pesan','Berhasil Membuat Surat!');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
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
        $role = Auth::user()->role;
        return view('admin.surat_keluar.edit');
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
        Surat_keluar::destroy($id);
         return response()->json($data = 'berhasil');
    }
}
