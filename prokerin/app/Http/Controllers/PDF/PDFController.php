<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\perusahaan;
use Illuminate\Support\Facades\Auth;
use App\Models\kelompok_laporan;
// export pdf
use PDF;

class PDFController extends Controller
{
    // contoh export perusahaan
    public function perusahaan()
    {
        $perusahaan = perusahaan::all();
        $pdf = PDF::loadView('export.PDF.perusahaan', compact('perusahaan'));
        return $pdf->download('DATA PERUSAHAAN.PDF');
    }
    public function kelompokPrakerin()
    {   
     
    
        $no_kelompok = !empty(Auth::user()->siswa->data_prakerin->kelompok_laporan->no) ? Auth::user()->siswa->data_prakerin->kelompok_laporan->no : '';
        $guru_nama = !empty(Auth::user()->siswa->data_prakerin->kelompok_laporan->guru->nama) ? Auth::user()->siswa->data_prakerin->kelompok_laporan->guru->nama : '';
        
        $kelompok = kelompok_laporan::has('data_prakerin')->where('no', $no_kelompok)->get();
            $KPrakerin = PDF::loadView('export.PDF.kelompok_prakerin', compact('kelompok'))->setOptions(['defaultFont' => 'sans-serif']); ;
            return $KPrakerin->download('KelompokPrakerin.PDF');
        // return view('export.PDF.kelompok_prakerin',compact('kelompok'));
    }
    
    
}
