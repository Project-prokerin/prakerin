<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Models\jurnal_prakerin;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\perusahaan;
use Illuminate\Support\Facades\Auth;
use App\Models\pengajuan_prakerin;
use App\Models\Tanda_tangan;
use App\Models\data_prakerin;
use App\Models\kelas;
use App\Models\Siswa;
use App\Models\orang_tua;
// export pdf
use PDF;
use Carbon\Carbon;



class PDFController extends Controller
{
    // contoh export perusahaan
    public function perusahaan()
    {
        $perusahaan = perusahaan::all();
        $pdf = PDF::loadView('export.PDF.perusahaan', compact('perusahaan'));
        return $pdf->download('DATA PERUSAHAAN.PDF');
    }
    public function pengajuan_prakerin(Request $request,$id)
    {

        $no = $request->no_surat;

        if ($request->tgl_magang == null ) {
            $pengajuan = pengajuan_prakerin::where('no',$id)->first();
            $cekTgl = data_prakerin::where('id_guru',$pengajuan->id_guru)->first();
            // $tanggal_range = explode('s.d.',$request->tgl_magang);
            $from_t =  $cekTgl->tgl_mulai;
            $end_t =  $cekTgl->tgl_selesai;
            $from =  new Carbon($cekTgl->tgl_mulai);
        $end =  new Carbon($cekTgl->tgl_selesai);
            
        }else{
            $tanggal_range = explode('s.d.',$request->tgl_magang);
            $from_t =  $tanggal_range[0];
            $end_t =  $tanggal_range[1];
            $from =  new Carbon($tanggal_range[0]);
        $end =  new Carbon($tanggal_range[1]);
            
        }
        
        $cekTtd = pengajuan_prakerin::where('no',$id)->first()->id_tanda_tangan;
        if ($cekTtd == null) {
            $tandatangan_kepsek = '';
        }else {
            $tandatangan_kepsek = Tanda_tangan::where('id',$cekTtd)->first();

        }
        if ($request->nama_tandatangan == ''    ) {
            $namaT =   'Ramadin Tarigan, ST';
            
        }else{
            $namaT =   $request->nama_tandatangan;
        }

        if ( $request->nik_tandatangan == '') {
            $nikT =   '19760329200411101';
        }else{
            $nikT =   $request->nik_tandatangan;
        }

        if ($request->jabatan_tandatangan == '') {
            $jabatanT =   'Kepala SMK Taruna Bhakti';
        }else{
            $jabatanT =   $request->jabatan_tandatangan;
            
        }
    
    $date1 = new Carbon($from_t);
    $date2 = new Carbon($end_t);
    $difference = $date1->diff($date2);
     $jumlah_bulan  = $difference->m.' Bulan'; //4
     if ($jumlah_bulan == 0) {
         $jumlah_bulan  = $difference->d.' Hari'; //4
     }

     $hari_from = Carbon::parse($from)->isoFormat('dddd');
    //  $hari_end = Carbon::parse($end)->isoFormat('dddd');
     $date_from = Carbon::parse($from)->isoFormat('D MMMM ');
     $date_end = Carbon::parse($end)->isoFormat('D MMMM ');
     $date_year = $from->year;

     
     //ada
    $nomor = $no;
    $month = Carbon::now()->format('m');
    $bulan  = numberToRomanRepresentation($month);
    $tahun = Carbon::now()->format('Y');



    $perusahaan = pengajuan_prakerin::where('no',$id)->first()->nama_perusahaan;
    $alamat_perusahaan  = perusahaan::where('nama',$perusahaan)->first()->alamat;
    
    $waktu = Carbon::now()->isoFormat('D MMMM Y');



    $kelompok = pengajuan_prakerin::where('no', $id)->get();

    // foreach ($kelompok as $key ) {
    //     $kelas[] = kelas::where('level',$key->kelas)->first()->jurusan->jurusan;
    // }





    $KPrakerin = PDF::loadView('export.PDF.kelompok_prakerin', compact('tandatangan_kepsek','jabatanT','nikT','namaT','hari_from','date_from','date_end','jumlah_bulan','alamat_perusahaan','perusahaan','kelompok','nomor','waktu','bulan','tahun'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
    return $KPrakerin->download('KelompokPrakerin.PDF');
        // return $KPrakerin->stream();
        // return response()->json();

        // return view('export.PDF.kelompok_prakerin',compact('kelompok'));
    }

    public function contoh()
    {

        $nama_Surat = 'Surat Tgas';
        $nama = 'Siti';
        $nik = '232423';
        $alamat = 'jl.gaslamar depok';
        $tempat = 'Nurnet';
        $hari = 'Senin s.d. Selasa';
        $tanggal = '23  januari s.d.. 24 januari 2020';
        $pukul = '08.00 WIB s.d. Selesai';

        $ttd = Tanda_tangan::where('id', 1)->first();
        $tandatangan_kepsek = $ttd->path_gambar;
        // dd($tandatangan_kepsek);

        $pdf = PDF::loadView('export.PDF.contoh', compact('tandatangan_kepsek', 'nama_Surat', 'nama', 'nik', 'alamat', 'tempat', 'hari', 'tanggal', 'pukul'));

        return $pdf->download('DATA contoh.PDF');

        //  $w->getClientOriginalName();

        // dd($pdf);


    }

    public function contohh()
    {


        // dd($tandatangan_kepsek);

        $pdf = PDF::loadView('export.PDF.ss');

        return $pdf->stream('DATA contoh.PDF');

        //  $w->getClientOriginalName();

        // dd($pdf);


    }




    public function Jurnal($id)
    {

        $identitas_siswa  =  Siswa::where('id', $id)->first();
        $identitas_orangtua  =  orang_tua::where('id', $id)->first();
        $jurnal_p = jurnal_prakerin::where('id_siswa', $id)->get()->toarray();
        // dd($id);

        $pdf = PDF::loadView('export.PDF.jurnal', compact('identitas_siswa', 'identitas_orangtua', 'jurnal_p'));

        return $pdf->stream('DATA Jurnal.PDF');

        //  $w->getClientOriginalName();

        // dd($pdf);


    }
}
