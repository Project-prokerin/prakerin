<?php

namespace App\Exports\pembekalan;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\Exportable;

use App\Models\pembekalan_magang;
use App\Models\Siswa;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class pembekalanExport implements FromQuery, WithHeadings, WithMapping, WithStyles, WithCustomStartCell, WithColumnWidths, ShouldAutoSize, WithTitle
{
    use Exportable;
    private $filename = 'pembekalan_magang.xlsx';

    public function __construct($pembekalan, $kelas,$jurusan,  $getData)
    {
        $this->pembekalan = $pembekalan;
        $this->kelas = $kelas;
        $this->jurusan = $jurusan;
        $this->getData = $getData;
    }
    public function query()
    {
        return Siswa::query()->where([['kelas', $this->kelas],['jurusan',$this->jurusan]])->with('pembekalan_magang');
    }
    public function headings(): array
    {
        return
            [
                'no',
                'nama siswa',
                'psikotes',
                'soft skill',
                'file portofolio',
                // 'guru bk',
            ];
    }
    public function map($siswa): array
    {
            return [

                'no',
                !empty($siswa->nama_siswa) ? $siswa->nama_siswa : '',
                !empty($siswa->pembekalan_magang-> psikotes) ? 'sudah' : 'belum',
                !empty($siswa->pembekalan_magang->soft_skill) ? 'sudah' : 'belum',
                !empty($siswa->pembekalan_magang->file_portofolio) ? 'sudah' : 'belum',
                // !empty($pembekalan->guru) ? $pembekalan->guru->nama : '',
            ];
    }
    public function startCell(): string
    {
        return 'A6';
    }
    public function styles(Worksheet $sheet)
    {
        $query = [];
        foreach ($this->getData as $key => $value) {
                $query[] = $value->pembekalan_magang;
        }
        $count = [
            count($query),
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

        // loop array value
        foreach (array_values($columnindex) as $i => $value) {
            // jika value di array == higest col
            if ($value === $highestCol) {
                // $panjang_col = $i;
                // buat valriable panjangkol yang isinya panjang column ex 1,2,3,4,5 | A,B,C,D,E
                $panjang_col = $i + 1;
            }
        }
        // dd($panjang_col);
        for ($i = 1; $i <= $highestRow; $i++) {
            for ($j = 1; $j <= $panjang_col; $j++) {
                // dd($columnindex[$i] . ($i + 6));
                $cell =  $sheet->getCellByColumnAndRow($j, $i + 6);
                if ($cell->getValue() === 'belum') {
                    // mendapat column adn row ex. column 1 baris 7 | column a baris 7
                    // get style untuk mewarnai A7 -> warnanya text nya putih
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
        $sheet->getRowDimension(6)->setRowHeight(30);

        for ($i = 0; $i < $count[0]; $i++) {
            $sheet->getRowDimension($i + 7)->setRowHeight(30);
        }

        for ($i = 0; $i < $count[0]; $i++) {
            $sheet->setCellValue('A' . ($i + 7), $i + 1);
        };
    }


    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 30,
            'C' => 20,
            'D' => 20,
            'E' => 20,
            // 'F' => 20
        ];
    }
    public function title():string
    {
        return $this->kelas.' '.$this->jurusan;
    }
}
