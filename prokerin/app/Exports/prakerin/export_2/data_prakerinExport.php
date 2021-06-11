<?php

namespace App\Exports\prakerin\export_2;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Models\data_prakerin;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class data_prakerinExport implements FromQuery, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithCustomStartCell, ShouldAutoSize, WithTitle
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
    private $id_kelas;

    public function __construct($prakerin, $heading, $kelas, $jurusan, $getData, $id_kelas)
    {
        $this->prakerin = $prakerin;
        $this->heading = $heading;
        $this->jurusan = $jurusan;
        $this->kelas = $kelas;
        $this->getData = $getData;
        $this->id_kelas = $id_kelas;
    }
    // public function collection()
    // {
    //     return collect($this->prakerin);
    // }
    // memakai query
    public function query()
    {
        return data_prakerin::query()->with('perusahaan')->where('id_kelas', $this->id_kelas);
    }
    public function headings(): array
    {
        return $this->heading;
    }
    public function map($prakerin): array
    {
        return [
            '',
            !empty($prakerin->siswa->nipd) ? $prakerin->siswa->nipd : '',
            !empty($prakerin->siswa->nama_siswa) ? $prakerin->siswa->nama_siswa : '',
            !empty($prakerin->perusahaan->nama) ? $prakerin->perusahaan->nama : '',
            !empty($prakerin->perusahaan->alamat) ? $prakerin->perusahaan->alamat : '',
            !empty($prakerin->status) ? $prakerin->status : '',
            !empty($prakerin->tgl_mulai) ? $prakerin->tgl_mulai->isoFormat('DD MMMM YYYY') : '',
            !empty($prakerin->tgl_selesai) ? $prakerin->tgl_selesai->isoFormat('DD MMMM YYYY') : '',
        ];
    }
    public function startCell(): string
    {
        return 'A7';
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
        $sheet->mergeCells('A1:G1')->setCellValue('A1', 'DATA SISWA PRAKERIN');
        $sheet->mergeCells('A2:G2')->setCellValue('A2', 'SMK TARUNA BHAKTI TP 2021/2022');
        $sheet->mergeCells('A6:b6')->setCellValue('A6', 'KELAS :' . $this->kelas . ' ' . $this->jurusan);

        $sheet->getStyle('A7:' . $highestCol . $highestRow)->applyFromArray(array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000'],
                )
            )
        ));

        // Nama kelas
        $sheet->getStyle('A6:B6')->applyFromArray(array(
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
        $sheet->getStyle('A7:' . $highestCol . '7')->applyFromArray(array(
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
        $sheet->getStyle('A1:G2')->applyFromArray(array(
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
        // heading size
        $sheet->getRowDimension(7)->setRowHeight(30);

        // height table
        for ($i = 0; $i < $count[0]; $i++) {
            $sheet->getRowDimension($i + 8)->setRowHeight(30);
        }

        // row table A
        for ($i = 0; $i < $count[0]; $i++) {
            $sheet->setCellValue('A' . ($i + 8), $i + 1);
        };
        // footer layout
        $count = $highestRow + 3;
        $row_1 = $columnindex[count($this->heading) - 2];
        $row_2 = $columnindex[count($this->heading) - 1];
        $sheet->setCellValue($row_1 . $count, 'Mengetahui,');
        $sheet->setCellValue($row_1 . ($count + 1), 'Kepala SMK Taruna Bhakti');
        $sheet->setCellValue($row_1 . ($count + 5), 'Ramadin Tarigan, S.T');
        $sheet->setCellValue($row_1 . ($count + 6), 'NIK. 19760329200411101');

        // dd($panjang_col);
        for ($i = 0; $i <= $highestRow; $i++) {
                $cell =  $sheet->getCellByColumnAndRow(6, $i + 8);
                if ($cell->getValue() === 'Pengajuan') {
                    $sheet->getCellByColumnAndRow(6, $i + 8)->getStyle($columnindex[$i] . ($i + 6))->getFont()->getColor('#00000')->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
                    $sheet->getCellByColumnAndRow(6, $i + 8)->getStyle($columnindex[$i] . ($i + 6))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('425df5');
                    } else if ($cell->getValue() === 'Magang') {
                    $sheet->getCellByColumnAndRow(6, $i + 8)->getStyle($columnindex[$i] . ($i + 6))->getFont()->getColor('#00000')->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
                    $sheet->getCellByColumnAndRow(6, $i + 8)->getStyle($columnindex[$i] . ($i + 6))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('fbc531');
                    } else if ($cell->getValue() === 'Selesai') {
                    $sheet->getCellByColumnAndRow(6, $i + 8)->getStyle($columnindex[$i] . ($i + 6))->getFont()->getColor('#00000')->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
                    $sheet->getCellByColumnAndRow(6, $i + 8)->getStyle($columnindex[$i] . ($i + 6))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('57b846');
                    } else if ($cell->getValue() === 'Batal') {
                    $sheet->getCellByColumnAndRow(6, $i  + 8)->getStyle($columnindex[$i] . ($i + 6))->getFont()->getColor('#00000')->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
                    $sheet->getCellByColumnAndRow(6, $i + 8)->getStyle($columnindex[$i] . ($i + 6))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e84118');
                    }
        }

        // footer
        $sheet->getStyle($row_1 . $count . ':' . $row_2 . ($count + 6))->applyFromArray(array(
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,  //HORIZONTAL_LEFT
            ),
            'font' => array(
                'bold' => false,
                'size' => 16
            )
        ));
        // underline footer
        $sheet->getStyle($row_1 . ($count + 5))->applyFromArray(array(
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,  //HORIZONTAL_LEFT
            ),
            'font' => array(
                'bold' => true,
                'underline' => true,
                'size' => 12
            )
        ));
    }

    // set witsh
    public function columnWidths(): array
    {
        return [
            'A' => 8,
            'B' => 15,
            'C' => 30,
            'D' => 34,
            'E' => 70,
            'F' => 35,
            'G' => 35,
            'H' => 35,
        ];
    }

    public function title(): string
    {
        return $this->kelas . ' ' . $this->jurusan;
    }
}
