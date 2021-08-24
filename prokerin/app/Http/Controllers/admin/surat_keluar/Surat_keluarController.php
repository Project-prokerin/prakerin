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
use Faker\Factory as Faker;

use DB;
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
//           dd(
            
//         Template_surat::all(),
// Surat_keluar::all(),
// Detail_surat_k::all(),
// Isi_surat::all(),
// );


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
            $role = Auth::user()->role;

                if ($role == "kepsek" ) {
                    $surat = Surat_keluar::get();
                    return datatables()->of($surat)
                        ->addColumn('nama_surat', function ($surat) {
                            return $surat->detail_surat->template_surat->nama_surat;
                        })
                        ->addColumn('status', function($surat){
                            if ($surat->status === 'tolak') {
                                $btn =  '<span class="badge bg-danger text-light" style="font-size: 12px; " ><b>di '.$surat->status.'</b></span>';
                                return $btn;
                            }else if( $surat->status === 'acc'){
                                $btn =  '<span class="badge bg-success text-light" style="font-size: 12px; " ><b>di '.$surat->status.'</b></span>';
                                return $btn;
                            }else{
                                $btn =  '<span class="badge bg-warning text-light" style="font-size: 12px; " ><b> '.$surat->status.'</b></span>';
                                return $btn;
                                // return $surat->status;
                            }

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
                        if ($surat->status === 'tolak') {
                            $btn =  '<span class="badge bg-danger text-white" style="font-size: 12px; " ><b>di ' . $surat->status . '</b></span>';
                            return $btn;
                        } else if ($surat->status === 'acc') {
                            $btn =  '<span class="badge bg-success text-white" style="font-size: 12px; " ><b>di ' . $surat->status . '</b></span>';
                            return $btn;
                        } else {
                            // $button .= '<a href="/admin/surat_keluar/tolak/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-danger btn-sm"><i class="fas fa-times"></i></a>';
                            $button .= '<button type="button" name="tolak" id="tolak" data-id="' . $surat->id . '"  class="edit btn btn-danger btn-sm"><i class="fas fa-times"></i></a>';
                            $button .= ' ';
                            $button .= '<button id="tandatanganButton" data-target="#tandatanganModal" data-attr="/admin/surat_keluar/tandatangan/' . $surat->id . '" data-toggle="modal"  class="edit btn btn-success btn-sm ml-1"><i class="fas fa-check"></i></a>';
                        }
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
                        ->rawColumns(['persetujuan','action','nama_surat','tgl_surat','status','dari','untuk','nama','jabatan'])
                        ->addIndexColumn()->make(true);
                }else{
                    $surat = Surat_keluar::get();
                    return datatables()->of($surat)
                        ->addColumn('nama_surat', function ($surat) {
                            return $surat->detail_surat->template_surat->nama_surat;
                        })
                        ->addColumn('status', function($surat){
                            if ($surat->status === 'tolak') {
                                $btn =  '<span class="badge bg-danger text-light" style="font-size: 12px; " ><b>di '.$surat->status.'</b></span>';
                                return $btn;
                            }else if( $surat->status === 'acc'){
                                $btn =  '<span class="badge bg-success text-light" style="font-size: 12px; " ><b>di '.$surat->status.'</b></span>';
                                return $btn;
                            }else{
                                $btn =  '<span class="badge bg-warning text-light" style="font-size: 12px; " ><b> '.$surat->status.'</b></span>';
                                return $btn;
                                // return $surat->status;
                            }

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
                            if ($role == "kepsek" or $role == "admin" or $role == "kaprog" ) {
                                // $button .= '<a href="/admin/surat_keluar/tolak/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-danger btn-sm"><i class="fas fa-times"></i></a>';
                                $button .= '<button type="button" name="tolak" id="tolak" data-id="' . $surat->id . '"  class="edit btn btn-danger btn-sm"><i class="fas fa-times"></i></a>';
                                $button .= '&nbsp';
                                $button .= '<button id="tandatanganButton" data-target="#tandatanganModal" data-attr="/admin/surat_keluar/tandatangan/' . $surat->id . '" data-toggle="modal"  class="edit btn btn-success btn-sm"><i class="fas fa-check"></i></a>';

                            }
                            return $button;
                        })
                        ->addColumn('action', function ($surat) {
                            $role = Auth::user()->role;
                            $button = '';
                            if ($role == "admin" or  $role == "hubin" or  $role == "tu") {
                                if ($role  != 'tu') {
                                    $button .= '<a href="/admin/surat_keluar/download/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-danger btn-sm"><i class="fa fa-download"></i></a>';
                                    $button .= '&nbsp';
                                    $button .= '<a  href="/admin/surat_keluar/edit/' . $surat->id . '" id="edit" data-toggle="tooltip"  data-id="' . $surat->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                                    $button .= '&nbsp';
                                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $surat->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';

                                }
                                $button .= '<a href="/admin/surat_keluar/stream/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                                $button .= '&nbsp';
                            }else if ($role == "kaprog" or $role == "bkk"){
                                $button .= '<a href="/admin/surat_keluar/download/' . $surat->id . '"   id="' . $surat->id . '" class="edit btn btn-danger btn-sm"><i class="fa fa-download"></i></a>';
                                $button .= '&nbsp';
                                $button .= '<a href="/admin/surat_keluar/stream/' . $surat->id . '"  id="' . $surat->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                                $button .= '&nbsp';
                            }
                            return $button;
                        })
                        ->rawColumns(['status','persetujuan','action','nama_surat','tgl_surat','dari','untuk','nama','jabatan'])
                        ->addIndexColumn()->make(true);
                }

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
     public_path("/$path->path_surat")
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

        
        // dd($request);

       $id_guru = guru::where('id',$request->id_guru)->first();

        $tanggal_range = explode('s.d.',$request->tanggal);
       $from_t =  $tanggal_range[0];
       $end_t =  $tanggal_range[1];
       $from =  new Carbon($tanggal_range[0]);
       $end =  new Carbon($tanggal_range[1]);



    //    dd($from,$end,$from_t,$end_t);

        $jumlah_hari = $from->diff($end)->days;
        $hari_from = Carbon::parse($from)->isoFormat('dddd');
        $hari_end = Carbon::parse($end)->isoFormat('dddd');

        $date_from = Carbon::parse($from)->isoFormat('D MMMM ');
        $date_end = Carbon::parse($end)->isoFormat('D MMMM ');
        $date_year = $from->year;




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

       if (empty(Surat_keluar::orderBy('created_at','DESC')->first())) {
        $nomorSurat = 1;
       }else {
            $surat_number = Surat_keluar::orderBy('created_at','DESC')->first();
        $nomorSurat =  str_pad($surat_number->id + 1, 3, "0", STR_PAD_LEFT);
       }
    //   dd($nomorSurat);
   
    $date = Carbon::now();
    $bulan = numberToRomanRepresentation($date->month); 
    $tahun   = $date->year;

        $pdf_name = time() . "SuratTugas.pdf";
        $path = public_path('surat/surat_keluar/' . $pdf_name);

        $SuratKeluar = PDF::loadView('export.PDF.contoh', compact('bulan','tahun','nomorSurat','nama_Surat','nama','nik','alamat','tempat','jumlah_hari','date_from','date_end','date_year','hari_from','hari_end','pukul'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->save($path);



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
                        'id_tanda_tangan' => null,
                        'id_surat_keluar' =>  $surat_keluar->id
                        ]);



        Isi_surat::create([
            'nama_surat' => $nama_Surat,
            'hari' => $hari_from. " s.d. " .$hari_end,
            'tanggal' =>  $from_t. " s.d. " .$end_t,
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




        return redirect()->route('admin.surat_keluar.index')->with(['pesan' => 'Berhasil Membuat Surat!']);

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

     
//         $template = Template_surat::all();
//         $surat_k = Surat_keluar::all();
//         $isi = Isi_surat::all();
//         $detail_s_k = Detail_surat_k::all();
//         $ttd = Tanda_tangan::all();
//         // $ttd = Tanda_tangan::find(1);

//         // Surat_keluar::destroy(23);
//         // template_surat::destroy(23);
//         // Detail_surat_k::destroy(23);
//         // Isi_surat::destroy();

//         dd(
//         $template,
//         $surat_k,
//         $detail_s_k,
//         $isi,
//     $ttd
// );
        // $surat_k = Surat_keluar::all();
        // $isi_surat = Isi_surat::all();
// 
        // Surat_keluar::destroy(17);


        // $template_surat = Template_surat::all();
        // $detail_surat = Detail_surat::all();
        // dd($surat_k,$isi_surat);


        $guru = guru::all();

        $surat_k = Surat_keluar::where('id',$id)->first();
        $isi_surat = Isi_surat::where('id',$id)->first();
        $detail = Detail_surat_k::where('id',$id)->first();
        // dd($isi_surat->id);

        return view('admin.surat_keluar.edit',compact('detail','guru','surat_k','isi_surat'));
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

        $tanggal_range = explode('s.d.',$request->tanggal);
       $from_t =  $tanggal_range[0];
       $end_t =  $tanggal_range[1];
       $from =  new Carbon($tanggal_range[0]);
       $end =  new Carbon($tanggal_range[1]);



    //    dd($from,$end,$from_t,$end_t);

        $jumlah_hari = $from->diff($end)->days;
        $hari_from = Carbon::parse($from)->isoFormat('dddd');
        $hari_end = Carbon::parse($end)->isoFormat('dddd');

        $date_from = Carbon::parse($from)->isoFormat('D MMMM ');
        $date_end = Carbon::parse($end)->isoFormat('D MMMM ');
        $date_year = $from->year;







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
        $nomorSurat = $request->no;
    
        // $surat_number = Surat_keluar::orderBy('created_at','DESC')->first();
        // $nomorSurat =  str_pad($surat_number->id + 1, 3, "0", STR_PAD_LEFT) - 1;


    $date = Carbon::now();
    $bulan = numberToRomanRepresentation($date->month); 
    $tahun   = $date->year;
        
        $pdf_name = time() . "SuratTugas.pdf";
        $path = public_path('surat/surat_keluar/' . $pdf_name);
        $SuratKeluar = PDF::loadView('export.PDF.contoh', compact('bulan','tahun','nomorSurat','nama_Surat','nama','nik','alamat','tempat','jumlah_hari','date_from','date_end','date_year','hari_from','hari_end','pukul'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->save($path);



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
                        'tgl_surat' => Carbon::today(),
                        'path_surat' => "surat/surat_keluar/$pdf_name",
                        'id_tanda_tangan' => null,
                        // 'id_surat_keluar' =>  $surat_keluar->id
                        ]);



        Isi_surat::find($id)->update([
            'nama_surat' => $nama_Surat,
            'hari' => $hari_from. " s.d. " .$hari_end,
            'tanggal' =>  $from_t."s.d.".$end_t,
            'pukul' => $pukul,
            'tempat' => $tempat,
            'alamat' => $alamat,
            // 'id_guru'  => $id_guru->id,
            // 'id_detail_surat_k' => $detail->id
        ]);



        return redirect()->route('admin.surat_keluar.index')->with(['pesan' => 'Berhasil Update Surat!']);

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

       $tanggal_range = explode('s.d.',$request->tanggal);
      $from_t =  $tanggal_range[0];
      $end_t =  $tanggal_range[1];
      $from =  new Carbon($tanggal_range[0]);
      $end =  new Carbon($tanggal_range[1]);



   //    dd($from,$end,$from_t,$end_t);

       $jumlah_hari = $from->diff($end)->days;
       $hari_from = Carbon::parse($from)->isoFormat('dddd');
       $hari_end = Carbon::parse($end)->isoFormat('dddd');

       $date_from = Carbon::parse($from)->isoFormat('D MMMM ');
       $date_end = Carbon::parse($end)->isoFormat('D MMMM ');
       $date_year = $from->year;



       // $interval = $tanggal_range[0]->toDateString()->diff($tanggal_range[1]->toDateString());
       // $days = $interval->format('%a');
// dd($diff_in_days,$hari_from,$hari_end);
       // Reservation::whereBetween('reservation_from', [$tanggal_range[0],$tanggal_range[1]])->get();

     

       $nama_Surat = $request->nama_surat;
       $nama = $id_guru->nama;
       $nik = $id_guru->nik;
       $alamat = $request->alamat;
       $tempat = $request->tempat;
       $tanggal = $request->tanggal;
       $pukul = $request->pukul;


       $surat_number = Surat_keluar::orderBy('created_at','DESC')->first();
       $nomorSurat =  str_pad($surat_number->id + 1, 3, "0", STR_PAD_LEFT) -1;

       $date = Carbon::now();
       $bulan = numberToRomanRepresentation($date->month); 
       $tahun   = $date->year;

       $pdf_name = time() . "SuratTugas.pdf";
       $path = public_path('surat/surat_keluar/' . $pdf_name);
       $SuratKeluar = PDF::loadView('export.PDF.contoh', compact('bulan','tahun','nomorSurat','tandatangan_kepsek','nama_Surat','nama','nik','alamat','tempat','jumlah_hari','date_from','date_end','date_year','hari_from','hari_end','pukul'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->save($path);



             $template_surat  =  Template_surat::find($id)->update([
                   'nama_surat' => $request->nama_surat,
                   'path_surat' => "surat/surat_keluar/$pdf_name",
                   'created_at' => Carbon::now()
               ]);
                $surat_keluar =   Surat_keluar::find($id)->update([
                   'id_dari' => Auth::user()->id,
                   'id_untuk' => $id_guru->id,
                   'status' => 'acc',
                   'created_at' => Carbon::now()

                   ]);
       $surat_number = Surat_keluar::orderBy('created_at','DESC')->first();

        //    $ttd = Tanda_tangan::find($request->ttd);

           $detail =     Detail_surat_k::find($id)->update([
                       // 'id_template_surat' => $template_surat->id,
                       'no_surat' =>  str_pad($surat_number->id + 1, 3, "0", STR_PAD_LEFT),
                       'tgl_surat' => Carbon::today()->toDateString(),
                       'path_surat' => "surat/surat_keluar/$pdf_name",
                       //sengaja di matikan karena jika di nyalain FK di migration belum  jelas
                    //    'id_tanda_tangan' => $ttd->id,
                       ]);



       Isi_surat::find($id)->update([
           'nama_surat' => $nama_Surat,
           'hari' => $hari_from. " s.d. " .$hari_end,
           'tanggal' =>  $from_t. " s.d. " .$end_t,
           'pukul' => $pukul,
           'tempat' => $tempat,
           'alamat' => $alamat,
           // 'id_guru'  => $id_guru->id,
           // 'id_detail_surat_k' => $detail->id
       ]);





    return response()->json($data = 'Surat Berhasil di Acc!');








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
