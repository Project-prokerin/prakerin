<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\perusahaan;

// export pdf
use PDF;
class PDFController extends Controller
{
    public function perusahaan(){
        $perusahaan = perusahaan::all();
        $pdf = PDF::loadView('export.PDF.perusahaan', compact('perusahaan'));
        return $pdf->download('DATA PERUSAHAAN.PDF');
    }
}
