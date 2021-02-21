<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\Exportable;

use App\Models\pembekalan_magang;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class pembekalanExport implements FromCollection, WithHeadings,WithMapping,WithStyles,WithCustomStartCell, WithColumnWidths, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    private $filename = 'pembekalan_magang.xlsx';

    public function __construct($pembekalan)
    {
        return $this->pembekalan = $pembekalan;
    }
    public function collection()
    {
        return collect($this->pembekalan);
    }
    public function headings(): array
    {
        return
        [
            'nama_siswa',
            'test_wpt_iq',
            'personality_interview',
            'soft_skill',
            'file_portofolio',
            'guru bk',
        ];
    }
    public function map($pembekalan): array
    {
        return [
            !empty($pembekalan->siswa) ? $pembekalan->siswa->nama_siswa : '',
            $pembekalan->text_wpt_iq,
            $pembekalan->personality_interview,
            $pembekalan->soft_skill,
            $pembekalan->file_portofolio,
            !empty($pembekalan->guru) ? $pembekalan->guru->nama : '',
        ];
    }
    public function startCell(): string
    {
        return 'A6';
    }
    public function styles(Worksheet $sheet)
    {
        $count = [
            count($this->pembekalan),
        ];
        $columnindex = array(
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ',
            'BA', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS', 'BT', 'BU', 'BV', 'BW', 'BX', 'BY', 'BZ'
        );
        $highestRow = $sheet->getHighestRow();
        $highestCol = $sheet->getHighestColumn();
        $sheet->getStyle('A6:' . $highestCol . $highestRow)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A6:' . $highestCol . $highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $sheet->mergeCells('B3:E3')->setCellValue('B3', 'SMK TARUNA BHAKTI DEPOK');
        $sheet->mergeCells('B4:E4')->setCellValue('B4', 'Pembekalan magang siswa');

        foreach (array_values($columnindex) as $i => $value) {
            if ($value == $highestCol) {
                $panjang_col = $i;
            }
        }
        for ($i = 1; $i <= $highestRow; $i++) {
            for ($j = 1; $j <= $panjang_col; $j++) {
                $cell =  $sheet->getCellByColumnAndRow($j, $i + 6);
                if ($cell->getValue() === 'belum') {
                    $sheet->getCellByColumnAndRow($j, $i + 6)->getStyle($columnindex[$i] . ($i + 6))->getFont()->getColor('#FFFFFF')->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
                    $sheet->getCellByColumnAndRow($j, $i + 6)->getStyle($columnindex[$i] . ($i + 6))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF0000');
                    // $data = $this->data;;
                } else if ($cell->getValue() === 'sudah') {
                    $sheet->getCellByColumnAndRow($j, $i + 6)->getStyle($columnindex[$i] . ($i + 6))->getFont()->getColor('#00000')->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
                    $sheet->getCellByColumnAndRow($j, $i + 6)->getStyle($columnindex[$i] . ($i + 6))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ADFF2F');
                }
            }
        }

        $sheet->getStyle('A6:' . $highestCol . $highestRow)->applyFromArray(array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000'],
                )
            )
        ));

        $sheet->getStyle('A6:' . $highestCol . '6')->applyFromArray(array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                    'width' => 10
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

        $sheet->getStyle('B3:E4')->applyFromArray(array(
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ),
            'font' => array(
                'bold' => true,
                // 'color' => ['argb' => 'FFFFFFF'],
            )
    ));
        for ($i = 0; $i < $count[0]; $i++) {
            $sheet->getRowDimension($i + 6)->setRowHeight(20);
        }
    }


    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 30,
            'D' => 20,
            'E' => 20,
            'F' => 20
        ];
    }

}
