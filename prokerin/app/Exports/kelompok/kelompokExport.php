<?php

namespace App\Exports\kelompok;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\data_prakerin;
use App\Models\kelompok_laporan;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\Exportable;

class kelompokExport implements FromQuery, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithCustomStartCell, ShouldAutoSize, WithTitle
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    use Exportable;
    private $filename = 'DATA PRAKERIN.xlsx';
    private $no = 0;
    private $prakerin;
    private $heading;
    private $jurusan;
    private $getData;

    public function __construct($prakerin, $heading, $jurusan, $kelas, $getData)
    {
        $this->prakerin = $prakerin;
        $this->heading = $heading;
        $this->jurusan = $jurusan;
        $this->kelas = $kelas;
        $this->getData = $getData;
    }
    // public function collection()
    // {
    //     return collect($this->prakerin);
    // }
    // memakai query
    public function query()
    {
            return kelompok_laporan::query()->with('perusahaan')->where('jurusan', $this->jurusan)->where('kelas', $this->kelas);

    }
    public function headings(): array
    {
        return $this->heading;
    }
    public function map($prakerin): array
    {
            return [
                '#',
                'kelompok ' . $prakerin->kelompok_laporan->no,
                $prakerin->nama,
                $prakerin->kelompok_laporan->guru->nama
            ];
    }
    public function startCell(): string
    {
        return 'A6';
    }
    public function styles(Worksheet $sheet)
    {
        $count = [
            count($this->getData),
        ];
        $columnindex = array(
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ',
            'BA', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS', 'BT', 'BU', 'BV', 'BW', 'BX', 'BY', 'BZ'
        );
        // row & col
        $highestRow = $sheet->getHighestRow();
        $highestCol = $sheet->getHighestColumn();

        // header style
        $sheet->getStyle('A6:' . $highestCol . $highestRow)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A6:' . $highestCol . $highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // $sheet->getDefaultRowDimension()->setRowHeight(100);
        $sheet->mergeCells('A1:D1')->setCellValue('A1', 'DATA SISWA PRAKERIN');
        $sheet->mergeCells('A2:D2')->setCellValue('A2', 'SMK TARUNA BHAKTI TP 2021/2022');
        $sheet->mergeCells('A5:b5')->setCellValue('A5', 'KELAS :' . $this->kelas . ' ' . $this->jurusan);

        $sheet->getStyle('A7:' . $highestCol . $highestRow)->applyFromArray(array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000'],
                )
            )
        ));

        // Nama kelas
        $sheet->getStyle('A5:B5')->applyFromArray(array(
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ),
            'font' => array(
                'bold' => true,
                'color' => ['argb' => '000000'],
                // 'size' => 12
            )
        ));

        // header table
        $sheet->getStyle('A6:' . $highestCol . '6')->applyFromArray(array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000'],
                    // 'width' => 10
                    'height' => 20
                )
            ),
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ),
            'fill' => array(
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => array(
                    'rgb' => '87CEEB',
                )
            ),
            'font' => array(
                'bold' => true,
                // 'color' => ['argb' => 'FFFFFFF'],
            )
        ));

        // header sheet
        $sheet->getStyle('A1:D2')->applyFromArray(array(
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ),
            'font' => array(
                'bold' => true,
                'size' => 16
                // 'color' => ['argb' => 'FFFFFFF'],
            )
        ));
        // height table
        for ($i = 0; $i < $count[0]; $i++) {
            $sheet->getRowDimension($i + 7)->setRowHeight(30);
        }

        // row table A
        for ($i = 0; $i < $count[0]; $i++) {
            $sheet->setCellValue('A' . ($i + 7), $i + 1);
        };
    }

    // set witsh
    public function columnWidths(): array
    {
        return [
            'A' => 8,
            'B' => 15,
            'C' => 30,
            'D' => 34,
        ];
    }

    public function title(): string
    {
        return $this->kelas . ' ' . $this->jurusan;
    }
}
