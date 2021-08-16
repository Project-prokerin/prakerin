<?php

namespace App\Http\Controllers\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Alumni_siswaImport;
use App\Imports\SiswaImport;

class ImportExcelController extends Controller
{
    public function alumni_siswa(Request $request)
    {
        $file = $request->file('file');
        $nama_file = time() .' '. $file->getClientOriginalName();
        $file->move(public_path().'\file\Excel\Import File', $nama_file); // masukin file
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
        $file->move(public_path() . '\file\Excel\Import File', $nama_file); // masukin file
        $import = new SiswaImport;
        $import->import(public_path('/file/Excel/Import File/' . $nama_file));
            try {
                Excel::import(new SiswaImport, public_path('/file/Excel/Import File/' . $nama_file));
                return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil di import');
            } catch (\Throwable $th) {
                return redirect()->route('siswa.index')->with('fail', 'Import Excel tidak sesuai dengan Template');
            }
    }
}
