<?php

namespace App\Exports\disposisi;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\Auth;

use App\Models\jurnal_harian;
use App\Models\Surat_masuk;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;
class DisposisiExport implements FromCollection, WithHeadings, WithMapping, WithCustomStartCell, WithStyles, WithColumnWidths, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;
    private $disposisi;
    public function __construct($disposisi)
    {
        return $this->disposisi = $disposisi;
    }
    public function collection()
    {
        return collect($this->disposisi);
    }
    public function headings(): array
    {
        return
            [
                'No',
                'Nama surat',
                'Pokja Tujuan',
                'Keterangan',
                'Tanggal disposisi'
            ];
    }
    public function map($disposisi): array
    {
        return [
            '',
            $disposisi->detail_surat->surat_m->nama_surat,
            $disposisi->Pokjatujuan,
            $disposisi->Keterangan_disposisi,
            $disposisi->created_at->format('m-d-Y')
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
            count($this->disposisi),
        ];

        $columnindex = array(
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ',
            'BA', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS', 'BT', 'BU', 'BV', 'BW', 'BX', 'BY', 'BZ'
        );
        $highestRow = $sheet->getHighestRow();
        $highestCol = $sheet->getHighestColumn();
        $sheet->getStyle('B7:' . $highestCol . $highestRow)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('B7:' . $highestCol . $highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $sheet->mergeCells('B3:'. $highestCol .'3')->setCellValue('B3', 'SMK TARUNA BHAKTI DEPOK');
        $sheet->mergeCells('B4:' . $highestCol . '4')->setCellValue('B4', 'Surat Masuk');

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
        $sheet->getRowDimension(7)->setRowHeight(30);
        for ($i = 0; $i < $count[0]; $i++) {
            $sheet->getRowDimension($i + 8)->setRowHeight(30);
        }
        for ($i = 0; $i < $count[0]; $i++) {
            $sheet->setCellValue('B' . ($i + 8), $i + 1);
        };
    }
    public function columnWidths(): array
    {
        return [
            'B' => 10,
        ];
    }
}
