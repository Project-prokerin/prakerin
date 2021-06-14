<?php

namespace App\Exports\jurnalp;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\Auth;

use App\Models\jurnal_prakerin;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class JurnalPExport implements FromCollection, WithHeadings, WithMapping, WithCustomStartCell, WithStyles,WithColumnWidths, ShouldAutoSize
{

    use Exportable;
    private $filename = 'Jurnal-Prakerin.xlsx';
    public function __construct($jurnalp)
    {
        return $this->jurnalp = $jurnalp;
    }
    public function collection()
    {
        return collect($this->jurnalp);
    }
    public function headings(): array
    {
        return
            [
                'No',
                'Nama_Siswa',
                'Nama_Perusahaan',
                'Tanggal_Mulai',
                'Jam_Mulai',
            ];
    }
    public function map($jurnalp): array
    {
        return [
            '',
            ($jurnalp->siswa->nama_siswa) ? $jurnalp->siswa->nama_siswa : 'Error',
            $jurnalp->perusahaan->nama,
            $jurnalp->tanggal_pelaksanaan->format('Y-m-d'),
            $jurnalp->jam_masuk->format('Y-m-d'),
            // !empty($pembekalan->guru) ? $pembekalan->guru->nama : '',
        ];
    }

    public function startCell(): string
    {
        return 'B7';
    }
    public function styles(Worksheet $sheet)
    {
        $count = [
            count($this->jurnalp),
        ];
        $jurnal = jurnal_prakerin::with('siswa')->get();

            // foreach ($jurnal as $jur ) {
            //     echo "{$jur->siswa->nama_siswa}";
            // }


        // dd($jurnal);



        $columnindex = array(
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ',
            'BA', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS', 'BT', 'BU', 'BV', 'BW', 'BX', 'BY', 'BZ'
        );
        $highestRow = $sheet->getHighestRow();
        $highestCol = $sheet->getHighestColumn();
        $sheet->getStyle('B7:' . $highestCol . $highestRow)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('B7:' . $highestCol . $highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $sheet->mergeCells('C3:E3')->setCellValue('C3', 'SMK TARUNA BHAKTI DEPOK');
        $sheet->mergeCells('C4:E4')->setCellValue('C4', 'Jurnal Prakerin');
        if (is_Array($jurnal)||is_object($jurnal)) {
            foreach ($jurnal as $jur ) {
                $sheet->mergeCells('C5:E5')->setCellValue('C5', $jur->siswa->nama_siswa);
            }
        }


        foreach (array_values($columnindex) as $i => $value) {
            if ($value === $highestCol) {
                // $panjang_col = $i;
                $panjang_col = $i + 1;
            }
        }

        $sheet->getStyle('B7:' . $highestCol . $highestRow)->applyFromArray(array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000'],
                )
            )
        ));

        $sheet->getStyle('B7:' . $highestCol . '7')->applyFromArray(array(
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

        $sheet->getStyle('B3:F5')->applyFromArray(array(
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
            $sheet->getRowDimension($i + 7)->setRowHeight(30);
        }
        for ($i = 0; $i < $count[0]; $i++) {
            $sheet->setCellValue('B' . ($i + 8), $i + 1);
        };


    }
    public function columnWidths(): array
    {
        return [
            'B' => 17,
            // 'B' => 17,
            // 'C' => 20,
            // 'D' => 20,
            // 'E' => 17,
        ];
    }

}
