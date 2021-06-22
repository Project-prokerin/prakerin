<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Models\jurnal_prakerin;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\perusahaan;
use Illuminate\Support\Facades\Auth;
use App\Models\kelompok_laporan;
use App\Models\Tanda_tangan;
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

        $nama_Surat = 'Surat Tgas';
        $nama = 'Siti';
        $nik = '232423';
        $alamat = 'jl.gaslamar depok';
        $tempat = 'Nurnet';
        $hari = 'Senin s.d. Selasa';
        $tanggal = '23  januari s.d.. 24 januari 2020';
        $pukul = '08.00 WIB s.d. Selesai';

        $ttd = Tanda_tangan::where('id',1)->first();
        $tandatangan_kepsek = $ttd->path_gambar;
        // dd($tandatangan_kepsek);

        $pdf = PDF::loadView('export.PDF.contoh',compact('tandatangan_kepsek','nama_Surat','nama','nik','alamat','tempat','hari','tanggal','pukul'));

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

                    $identitas_siswa  =  Siswa::where('id',$id)->first();
                    $identitas_orangtua  =  orang_tua::where('id',$id)->first();
                    $jurnal_p = jurnal_prakerin::where('id_siswa',$id)->get()->toarray();
                // dd($id);

                $pdf = PDF::loadView('export.PDF.jurnal',compact('identitas_siswa','identitas_orangtua','jurnal_p'));

                return $pdf->stream('DATA Jurnal.PDF');

                //  $w->getClientOriginalName();

                // dd($pdf);


                }


}
