<?php

namespace App\Http\Controllers\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Alumni_siswaImport;
use App\Imports\SiswaImport;
use App\Imports\PerusahaanImport;

class ImportExcelController extends Controller
{
    public function alumni_siswa(Request $request)
    {
        $file = $request->file('file');
        $nama_file = time() .' '. $file->getClientOriginalName();
        $file->move(public_path().'/file/Excel/Import File', $nama_file); // masukin file
        try {
            Excel::import(new Alumni_siswaImport, public_path('/file/Excel/Import File/' . $nama_file));
            return redirect()->route('alumni_siswa.index')->with('berhasil', 'Data alumni berhasil di import');
        } catch (\Throwable $th) {
            return redirect()->route('alumni_siswa.index')->with('gagal', 'Import Excel tidak sesuai dengan Template');
        }
    }

    public function siswa(Request $request)
    {
        $file = $request->file('file'); 
        $nama_file = time() . ' ' . $file->getClientOriginalName(); 
        $file->move(public_path() . '/file/Excel/Import File/', $nama_file); // masukin file 
        $import = new SiswaImport; 
            try { 
                $import->import(public_path('/file/Excel/Import File/' . $nama_file)); 
                return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil di import'); 
            } catch (\Throwable $th) { 
                //dd($import->failures()); 
                if ($import->failures()->isNotEmpty()) { 
                    return redirect()->route('siswa.index')->with('erorr', $import->failures()); 
                }else { 
                    return redirect()->route('siswa.index')->with('fail', 'Excel Tidak sesuai dengan template'); 
                } 
 
            }
    }

    public function perusahaan(Request $request)
    {
        $file = $request->file('file');
        $nama_file = time() .' '. $file->getClientOriginalName();
        $file->move(public_path().'/file/Excel/Import File', $nama_file); // masukin file
        try {
            Excel::import(new PerusahaanImport, public_path('/file/Excel/Import File/' . $nama_file));
            return redirect()->route('perusahaan.index')->with('berhasil', 'Data alumni berhasil di import');
        } catch (\Throwable $th) {
            return redirect()->route('perusahaan.index')->with('gagal', 'Import Excel tidak sesuai dengan Template');
        }
    }
}
