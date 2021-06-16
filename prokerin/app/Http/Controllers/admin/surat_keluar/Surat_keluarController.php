<?php

namespace App\Http\Controllers\admin\surat_keluar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Surat_keluar;
use App\Models\Template_surat;
use App\Models\Detail_surat_k;
use App\Models\Isi_surat;
use App\Models\guru;
use App\Models\Disposisi;
use App\Models\Tanda_tangan;
use Carbon\Carbon;
use DateTime;

use Illuminate\Support\Facades\File; 
use Response;
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
                                ->addColumn('persetujuan', function ($surat) {
                                    $role = Auth::user()->role;
                                    $button = '';
                                    if ($role == "kepsek" or $role == "admin") {
                                        // $button .= '<a href="/admin/surat_keluar/tolak/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-danger btn-sm"><i class="fas fa-times"></i></a>';
                                        $button .= '<button type="button" name="tolak" id="tolak" data-id="' . $surat->id . '"  class="edit btn btn-danger btn-sm"><i class="fas fa-times"></i></a>';
                                        $button .= '&nbsp';
                                        $button .= '<button id="tandatanganButton" data-target="#tandatanganModal" data-attr="/admin/surat_keluar/tandatangan/'.$surat->id.'" data-toggle="modal"  class="edit btn btn-success btn-sm"><i class="fas fa-check"></i></a>';
                                    }
                                    return $button;
                                })
                                ->addColumn('action', function ($surat) {
                                    $role = Auth::user()->role;
                                    $button = '';
                                    if ($role == "admin" or  $role == "hubin") {
                                        $button .= '<a href="/admin/surat_keluar/download/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-danger btn-sm"><i class="fa fa-download"></i></a>';
                                        $button .= '&nbsp';
                                        $button .= '<a href="/admin/surat_keluar/stream/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                                        $button .= '&nbsp';
                                        $button .= '<a  href="/admin/surat_keluar/edit/' . $surat->id . '" id="edit" data-toggle="tooltip"  data-id="' . $surat->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                                        $button .= '&nbsp';
                                        $button .= '<button type="button" name="delete" id="hapus" data-id="' . $surat->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                                    }else if ($role == "kaprog" or $role == "kepsek"){
                                        $button .= '<a href="/admin/surat_keluar/download/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-success btn-sm"><i class="fa fa-download"></i></a>';
                                        $button .= '&nbsp';
                                        $button .= '<a href="/admin/surat_keluar/stream/' . $surat->id . '"  id="' . $surat->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                                        $button .= '&nbsp';
                                    }
                                    return $button;
                                })
                                ->rawColumns(['persetujuan','action','nama_surat','tgl_surat','dari','untuk','nama','jabatan'])
                                ->addIndexColumn()->make(true);
                }
    }


    public function tambah(Request $request)
    {
        // $suratt = $request->session()->get('suratt');
        $guru = guru::all();
        return view('admin.surat_keluar.tambah', compact('guru'));
    }




 public function suratKdownload($id)
 {
     // dd($id);
     $path = Detail_surat_k::where('id_surat_keluar',$id)->first();
     // dd($path);
     $file = public_path()."/$path->path_surat";
     $headers = array('Content-Type: application/pdf',);
     return Response::download($file, 'SuratTugas.pdf',$headers);

 }


 public function suratKstream($id)
 {
     // dd($id);
     $path = Detail_surat_k::where('id_surat_keluar',$id)->first();
     // dd($path);
     // $file = public_path()."/";
     // $headers = array('Content-Type: application/pdf',);
     // return $file->stream('SuratTugas.pdf');


 return response()->file(
     public_path("$path->path_surat")
 );
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  

    public function store(Request $request)
    {
        
        $id_guru = guru::where('id',$request->id_guru)->first();
        // dd($request->tanggal);
        
        $tanggal_range = explode('s.d.',$request->tanggal);
       $from =  new DateTime($tanggal_range[0]);
       $end =  new DateTime($tanggal_range[1]);


       
       
        $jumlah_hari = $from->diff($end)->days;
        // dd($jumlah_hari);
        $hari_from = Carbon::parse($from)->isoFormat('dddd');
        $hari_end = Carbon::parse($end)->isoFormat('dddd'); 

        $date_from = Carbon::parse($from)->isoFormat('D MMMM Y');
        $date_end = Carbon::parse($end)->isoFormat('D MMMM Y'); 

        

        

        // $interval = $tanggal_range[0]->toDateString()->diff($tanggal_range[1]->toDateString());
        // $days = $interval->format('%a');
// dd($diff_in_days,$hari_from,$hari_end);
        // Reservation::whereBetween('reservation_from', [$tanggal_range[0],$tanggal_range[1]])->get();

        $validatedData = $request->validate([
            'id_guru' => 'required',
            'alamat' => 'required',
            'tanggal' => 'required',
            'pukul' => 'required',
        ]);

        $nama_Surat = $request->nama_surat;
        $nama = $id_guru->nama;
        $nik = $id_guru->nik;
        $alamat = $request->alamat;
        $tempat = $request->tempat;
        $tanggal = $request->tanggal;
        $pukul = $request->pukul;

        $pdf_name = time() . "SuratTugas.pdf";
        $path = public_path('surat/surat_keluar/' . $pdf_name);
        $SuratKeluar = PDF::loadView('export.PDF.contoh', compact('nama_Surat','nama','nik','alamat','tempat','jumlah_hari','date_from','date_end','hari_from','hari_end','tanggal','pukul'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->save($path);



              $template_surat  =  Template_surat::create([
                    'nama_surat' => $request->nama_surat,
                    'path_surat' => "surat/surat_keluar/$pdf_name",
                    'created_at' => Carbon::now()
                ]);
                 $surat_keluar =   Surat_keluar::create([
                    'id_dari' => Auth::user()->id,
                    'id_untuk' => $id_guru->id,
                    'status' => 'Pengajuan',
                    'id_template_surat' => $template_surat->id,
                    'created_at' => Carbon::now()

                    ]);
        $surat_number = Surat_keluar::orderBy('created_at','DESC')->first();

            $detail =     Detail_surat_k::create([
                        'id_template_surat' => $template_surat->id,
                        'no_surat' =>  str_pad($surat_number->id + 1, 3, "0", STR_PAD_LEFT),
                        'tgl_surat' => Carbon::today()->toDateString(),
                        'path_surat' => "surat/surat_keluar/$pdf_name",
                        'id_tanda_tangan' => 1,
                        'id_surat_keluar' =>  $surat_keluar->id
                        ]);



        Isi_surat::create([
            'nama_surat' => $nama_Surat,
            'hari' => $hari_from. " s.d. " .$hari_end,
            'tanggal' =>  $date_from. " s.d. " .$date_end,
            'pukul' => $pukul,
            'tempat' => $tempat,
            'alamat' => $alamat,
            'id_guru'  => $id_guru->id,
            'id_detail_surat_k' => $detail->id
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
        $guru = guru::all();

        $surat_k = Surat_keluar::where('id',$id)->first();
        $isi_surat = Isi_surat::where('id',$id)->first();

        return view('admin.surat_keluar.edit',compact('guru','surat_k','isi_surat'));
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

        // dd($id);


        $file_path = Template_surat::where('id',$id)->first();  // Value is not URL but directory file path
        // $file_pathh = Detail_surat_k::where('id',$id)->first();  // Value is not URL but directory file path
        if(File::exists(public_path($file_path->path_surat))){
            File::delete(public_path($file_path->path_surat));
        }
       
       



        $id_guru = guru::where('id',$request->id_guru)->first();
        // dd($request->tanggal);
        
        $tanggal_range = explode('s.d.',$request->tanggal);
       $from =  new DateTime($tanggal_range[0]);
       $end =  new DateTime($tanggal_range[1]);


       
       
        $jumlah_hari = $from->diff($end)->days;
        // dd($jumlah_hari);
        $hari_from = Carbon::parse($from)->isoFormat('dddd');
        $hari_end = Carbon::parse($end)->isoFormat('dddd'); 

        $date_from = Carbon::parse($from)->isoFormat('D MMMM Y');
        $date_end = Carbon::parse($end)->isoFormat('D MMMM Y'); 

        

        

        // $interval = $tanggal_range[0]->toDateString()->diff($tanggal_range[1]->toDateString());
        // $days = $interval->format('%a');
// dd($diff_in_days,$hari_from,$hari_end);
        // Reservation::whereBetween('reservation_from', [$tanggal_range[0],$tanggal_range[1]])->get();

        $validatedData = $request->validate([
            'id_guru' => 'required',
            'alamat' => 'required',
            'tanggal' => 'required',
            'pukul' => 'required',
        ]);

        $nama_Surat = $request->nama_surat;
        $nama = $id_guru->nama;
        $nik = $id_guru->nik;
        $alamat = $request->alamat;
        $tempat = $request->tempat;
        $tanggal = $request->tanggal;
        $pukul = $request->pukul;

        $pdf_name = time() . "SuratTugas.pdf";
        $path = public_path('surat/surat_keluar/' . $pdf_name);
        $SuratKeluar = PDF::loadView('export.PDF.contoh', compact('nama_Surat','nama','nik','alamat','tempat','jumlah_hari','date_from','date_end','hari_from','hari_end','tanggal','pukul'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->save($path);



              $template_surat  =  Template_surat::find($id)->update([
                    'nama_surat' => $request->nama_surat,
                    'path_surat' => "surat/surat_keluar/$pdf_name",
                    'created_at' => Carbon::now()
                ]);
                 $surat_keluar =   Surat_keluar::find($id)->update([
                    'id_dari' => Auth::user()->id,
                    'id_untuk' => $id_guru->id,
                    'status' => 'Pengajuan',
                    // 'id_template_surat' => $template_surat->id,
                    'created_at' => Carbon::now()

                    ]);
        $surat_number = Surat_keluar::orderBy('created_at','DESC')->first();

            $detail =     Detail_surat_k::find($id)->update([
                        // 'id_template_surat' => $template_surat->id,
                        'no_surat' =>  str_pad($surat_number->id + 1, 3, "0", STR_PAD_LEFT),
                        'tgl_surat' => Carbon::today()->toDateString(),
                        'path_surat' => "surat/surat_keluar/$pdf_name",
                        'id_tanda_tangan' => 1,
                        // 'id_surat_keluar' =>  $surat_keluar->id
                        ]);



        Isi_surat::find($id)->update([
            'nama_surat' => $nama_Surat,
            'hari' => $hari_from. " s.d. " .$hari_end,
            'tanggal' =>  $date_from. " s.d. " .$date_end,
            'pukul' => $pukul,
            'tempat' => $tempat,
            'alamat' => $alamat,
            // 'id_guru'  => $id_guru->id,
            // 'id_detail_surat_k' => $detail->id
        ]);

        

        return redirect()->route('admin.surat_keluar.index')->with('pesan','Berhasil Update Surat!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $file_path = Template_surat::where('id',$id)->first();  // Value is not URL but directory file path
        // $file_pathh = Detail_surat_k::where('id',$id)->first();  // Value is not URL but directory file path
        if(File::exists(public_path($file_path->path_surat))){
            File::delete(public_path($file_path->path_surat));
        }
        Surat_keluar::destroy($id);
        Template_surat::destroy($id);
        Detail_surat_k::destroy($id);

         return response()->json($data = 'berhasil');
        
       
    }


    public function tandatangan($id)
    {
        // dd($id);
        

        $tandatangan = Tanda_tangan::all();
        $surat_keluar = Surat_keluar::find($id);
        $isi_surat = Isi_surat::find($id);

        return view('admin.surat_keluar.tandatangan',compact('tandatangan','surat_keluar','isi_surat'));
        
    }

    public function setujui(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'ttd' => 'required'
        ],[
            'required' => 'Pilih Tanda-tangan!'
        ]);

        $ttd = Tanda_tangan::find($request->ttd);

       $tandatangan_kepsek = $ttd->path_gambar;


       $file_path = Template_surat::where('id',$id)->first();  // Value is not URL but directory file path
       // $file_pathh = Detail_surat_k::where('id',$id)->first();  // Value is not URL but directory file path
       if(File::exists(public_path($file_path->path_surat))){
           File::delete(public_path($file_path->path_surat));
       }
      
      



       $id_guru = guru::where('id',$request->id_guru)->first();
       // dd($request->tanggal);
       
       $tanggal_range = explode('s.d.',$request->tanggal);
      $from =  new DateTime($tanggal_range[0]);
      $end =  new DateTime($tanggal_range[1]);


      
      
       $jumlah_hari = $from->diff($end)->days;
       // dd($jumlah_hari);
       $hari_from = Carbon::parse($from)->isoFormat('dddd');
       $hari_end = Carbon::parse($end)->isoFormat('dddd'); 

       $date_from = Carbon::parse($from)->isoFormat('D MMMM Y');
       $date_end = Carbon::parse($end)->isoFormat('D MMMM Y'); 

       

       

       // $interval = $tanggal_range[0]->toDateString()->diff($tanggal_range[1]->toDateString());
       // $days = $interval->format('%a');
// dd($diff_in_days,$hari_from,$hari_end);
       // Reservation::whereBetween('reservation_from', [$tanggal_range[0],$tanggal_range[1]])->get();

       $validatedData = $request->validate([
           'id_guru' => 'required',
           'alamat' => 'required',
           'tanggal' => 'required',
           'pukul' => 'required',
       ]);

       $nama_Surat = $request->nama_surat;
       $nama = $id_guru->nama;
       $nik = $id_guru->nik;
       $alamat = $request->alamat;
       $tempat = $request->tempat;
       $tanggal = $request->tanggal;
       $pukul = $request->pukul;

       $pdf_name = time() . "SuratTugas.pdf";
       $path = public_path('surat/surat_keluar/' . $pdf_name);
       $SuratKeluar = PDF::loadView('export.PDF.contoh', compact('tandatangan_kepsek','nama_Surat','nama','nik','alamat','tempat','jumlah_hari','date_from','date_end','hari_from','hari_end','tanggal','pukul'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->save($path);



             $template_surat  =  Template_surat::find($id)->update([
                   'nama_surat' => $request->nama_surat,
                   'path_surat' => "surat/surat_keluar/$pdf_name",
                   'created_at' => Carbon::now()
               ]);
                $surat_keluar =   Surat_keluar::find($id)->update([
                   'id_dari' => Auth::user()->id,
                   'id_untuk' => $id_guru->id,
                   'status' => 'acc',
                   // 'id_template_surat' => $template_surat->id,
                   'created_at' => Carbon::now()

                   ]);
       $surat_number = Surat_keluar::orderBy('created_at','DESC')->first();

           $detail =     Detail_surat_k::find($id)->update([
                       // 'id_template_surat' => $template_surat->id,
                       'no_surat' =>  str_pad($surat_number->id + 1, 3, "0", STR_PAD_LEFT),
                       'tgl_surat' => Carbon::today()->toDateString(),
                       'path_surat' => "surat/surat_keluar/$pdf_name",
                       'id_tanda_tangan' => 1,
                       // 'id_surat_keluar' =>  $surat_keluar->id
                       ]);



       Isi_surat::find($id)->update([
           'nama_surat' => $nama_Surat,
           'hari' => $hari_from. " s.d. " .$hari_end,
           'tanggal' =>  $date_from. " s.d. " .$date_end,
           'pukul' => $pukul,
           'tempat' => $tempat,
           'alamat' => $alamat,
           // 'id_guru'  => $id_guru->id,
           // 'id_detail_surat_k' => $detail->id
       ]);

       return back()->with(['pesan' => "Surat Berhasil di setujui"]);
       



       

        

        
        
        
        // $tandatangan = Tanda_tangan::all();

        // return view('admin.surat_keluar.tandatangan',compact('tandatangan'));
        
    }

    public function tolak($id)
    {
     
      
      



     
      
     
         
                $surat_keluar =   Surat_keluar::find($id)->update([
                   'status' => 'tolak',
                   'created_at' => Carbon::now()

                   ]);
    
                   return response()->json($data = 'Surat Berhasil di Tolak!');

    //    return back()->with(['pesan' => ""]);
       




    }
}