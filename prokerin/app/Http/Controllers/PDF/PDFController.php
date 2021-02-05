<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\perusahaan;

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
}
