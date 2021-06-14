<?php

namespace App\Exports\perusahaan;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Models\perusahaan;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class perusahaanExport implements FromQuery, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithCustomStartCell, ShouldAutoSize, WithTitle
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    use Exportable;
    private $filename = 'LIST PERUSAHAAN PRAKERIN.xlsx';
    private $no = 0;
    private $perusahaan;
    private $heading;
    private $id_jurusan;
    private $getData;
    private $bidang_usaha;

    public function __construct($perusahaan, $heading , $id_jurusan,$bidang_usaha, $getData)
    {
        $this->perusahaan = $perusahaan;
        $this->heading = $heading;
        $this->id_jurusan = $id_jurusan;
        $this->getData = $getData;
        $this->bidang_usaha = $bidang_usaha;
    }
    // public function collection()
    // {
    //     return collect($this->perusahaan$perusahaan);
    // }
    // memakai query
    public function query()
    {
        return perusahaan::query()->where('id_jurusan', $this->id_jurusan);
        // dd($this->getdate);
    }
    public function headings(): array
    {
        return $this->heading;
    }
    public function map($perusahaan): array
    {
        return [
            '',
            !empty($perusahaan->nama) ? $perusahaan->nama : '',
            !empty($perusahaan->jurusan->singkatan_jurusan) ? $perusahaan->jurusan->singkatan_jurusan : '',
            !empty($perusahaan->email) ? $perusahaan->email : '',
            !empty($perusahaan->nama_pemimpin) ? $perusahaan->nama_pemimpin : '',
            !empty($perusahaan->alamat) ? $perusahaan->alamat : '',
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

        $sheet->mergeCells('A2:F2')->setCellValue('A2', 'SMK TARUNA BHAKTI DEPOK');
        $sheet->mergeCells('A3:F3')->setCellValue('A3', 'DATA PERUSAHAAN PRAKERIN');

        $sheet->getStyle('A7:' . $highestCol . $highestRow)->applyFromArray(array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000'],
                )
            )
        ));

        // header sheet
        $sheet->getStyle('A2:F3')->applyFromArray(array(
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

        // table style
        $sheet->getStyle('D7:' .$highestCol.$highestRow)->applyFromArray(array(
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                // 'indent' => 2,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true

            ),
            'font' => array(
                'bold' => false,
                'size' => 12
                // 'color' => ['argb' => 'FFFFFFF'],
            )
        ));
        $sheet->getStyle('B7:' . 'B'. $highestRow)->applyFromArray(array(
            'alignment' => array(
                // 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                // 'indent' => 2,
                'wrapText' => true,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ),
            'font' => array(
                'bold' => false,
                'size' => 12
                // 'color' => ['argb' => 'FFFFFFF'],
            )
        ));
        $sheet->getRowDimension(6)->setRowHeight(30);
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
            // 'B' => 30,
            // 'C' => 20,
            // 'D' => 34,
            // 'E' => 30,
            // 'F' => 70,
        ];
    }
    // set tittle
    public function title(): string
    {
        return $this->bidang_usaha;
    }
}
