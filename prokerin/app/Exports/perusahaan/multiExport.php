<?php

namespace App\Exports\perusahaan;

use App\Models\perusahaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\perusahaan\perusahaanExport;

class multiExport implements WithMultipleSheets
{
    private $perusahaan;
    private $headings;
   public function __construct($perusahaan, $headings)
   {
        $this->perusahaan = $perusahaan;
        $this->headings = $headings;
   }
   public function sheets(): array
   {
      $sheets = [];
        foreach ($this->perusahaan as $key => $value) {
            $getData = perusahaan::where('bidang_usaha', $value->bidang_usaha)->get();
            $sheets[] = new perusahaanExport($this->perusahaan, $this->headings, $value->bidang_usaha, $getData);
        }
        return $sheets;
   }
}
