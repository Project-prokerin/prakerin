<?php

namespace App\Exports\penelusuran_tamtan;

use App\Models\Penelusuran_tamatan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class multiExport implements WithMultipleSheets
{
    protected $guru;
    protected $jurusan;
    protected $kelas;

    public function __construct($pen, $stat)
    {

        $this->stat = $stat;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        foreach ($this->stat as $key => $value) {
            $heading = [];
            $map = [];
            if ($value['status'] == 'kuliah') {
                $heading[] =  [
                    'No',
                    'Nama siswa',
                    'kelas',
                    'jurusan',
                    'tahun sekolah',
                    'Nama kampus',
                    'Alamat kampus',
                    'tahun masuk Kuliah',
                ];
            }
            if ($value['status'] == 'bekerja') {
                $heading[] =  [
                    'No',
                    'Nama siswa',
                    'kelas',
                    'jurusan',
                    'tahun sekolah',
                    'Nama Perusahaan',
                    'Alamat Perusahaan',
                    'Tahun Kuliah'
                ];

            }
            if ($value['status'] == 'Wirausaha') {
                $heading[] =  [
                    'No',
                    'Nama siswa',
                    'kelas',
                    'jurusan',
                    'tahun sekolah',
                    'Nama usaha'
                ];
            }
            if ($value['status'] == 'Bekerja dan Kuliah') {
                $heading[] =  [
                    'No',
                    'Nama siswa',
                    'kelas',
                    'jurusan',
                    'tahun sekolah',
                    'Nama kampus',
                    'Alamat kampus',
                    'tahun masuk Kuliah',
                    'Nama Perusahaan',
                    'Alamat Perusahaan',
                    'Tahun Kuliah'
                ];
            }
            if ($value['status'] == 'Wirausaha dan Kuliah') {
                $heading[] =  [
                    'No',
                    'Nama siswa',
                    'kelas',
                    'jurusan',
                    'tahun sekolah',
                    'Nama kampus',
                    'Alamat kampus',
                    'tahun masuk Kuliah',
                    'Nama usaha'
                ];
            }

            $getData = Penelusuran_tamatan::where('status', $value['status'])->get();
            // dd(count($getData));
            $sheets[] = new PenelusuranExport($heading, $value['status'], $getData);
        }
        return $sheets;
    }
}
