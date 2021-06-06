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
    public function kelompokPrakerin(Request $request)
    {

        // dd($id,$no);
        $id = $request->id;
        $no = $request->nomor;
        // $no_kelompok = kelompok_laporan::where('no',$id)->get();
        $nomor = $no;


        // $options = new Options();
        // $options->setIsRemoteEnabled(true);
        // $dompdf = new Dompdf($options);
        // $dompdf->loadHtml($html);
        // $dompdf->output();
    //     $data = Employee::all();

    //   // share data to view
    //   view()->share('employee',$data);
    //   $pdf = PDF::loadView('pdf_view', $data);

    //   // download PDF file with download method
    //   return $pdf->download('pdf_file.pdf')
    $waktu = Carbon::now()->isoFormat('D MMMM Y');
    $kelompok = kelompok_laporan::where('no',$id)->whereNotNull('id_data_prakerin')->get();


    // $kelompok = kelompok_laporan::whereHas('data_prakerin'

            $KPrakerin = PDF::loadView('export.PDF.kelompok_prakerin', compact('kelompok','waktu','nomor'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            return $KPrakerin->download('KelompokPrakerin.PDF');
            // return $KPrakerin->stream();
        // return response()->json();

        // return view('export.PDF.kelompok_prakerin',compact('kelompok'));
    }

    public function contoh()
    {

        $pdf = PDF::loadView('export.PDF.contoh');
        return $pdf->stream('DATA contoh.PDF');
    }


}
