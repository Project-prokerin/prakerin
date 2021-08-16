<?php

namespace App\Exports\siswa;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\Exportable;

use App\Models\Siswa;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;


class SiswaExport implements FromQuery, WithHeadings, WithMapping, WithCustomStartCell, WithStyles,WithColumnWidths, ShouldAutoSize, WithTitle


{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    private $filename = 'Data_siswa.xlsx';
    // public function collection()
    // {
    //     return Siswa::all();
    // }
    public function __construct($siswa, $getdata,$kelas,$jurusan)
    {
            $this->siswa = $siswa;
            // $this->kelas = $kelas;
            $this->jurusan = $jurusan;
            $this->getData = $getdata;
            $this->kelas = $kelas;
    }
    public function query()
    {
        return Siswa::query()->where('kelas', $this->kelas);
    }
    public function headings(): array
    {
        return
            [
                'no',
                'NIPD',
                'Nisn',
                'Nama',
                'kelas',
                'jurusan',
                'Tempat lahir',
                'Tanggal Lahir'
            ];
    }
    public function map($siswa): array
    {
        return [
            '',
            $siswa->nipd,
            $siswa->nisn,
            $siswa->nama_siswa,
            $siswa->kelas,
            $siswa->jurusan,
            $siswa->tempat_lahir,
            $siswa->tanggal_lahir->Isoformat('d MMMM Y'),
            // !empty($pembekalan->guru) ? $pembekalan->guru->nama : '',
        ];
    }
    public function startCell(): string
    {
        return 'B6';
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
        $highestRow = $sheet->getHighestRow();
        $highestCol = $sheet->getHighestColumn();
        $sheet->getStyle('B6:' . $highestCol . $highestRow)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('B6:' . $highestCol . $highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $sheet->mergeCells('B3:i3')->setCellValue('B3', 'SMK TARUNA BHAKTI DEPOK');
        $sheet->mergeCells('B4:i4')->setCellValue('B4', 'Data Siswa');


        foreach (array_values($columnindex) as $i => $value) {
            if ($value === $highestCol) {
                // $panjang_col = $i;
                $panjang_col = $i + 1;
            }
        }
        $sheet->getStyle('B6:' . $highestCol . $highestRow)->applyFromArray(array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000'],
                )
            )
        ));
        $sheet->getStyle('B6:' . $highestCol . '6')->applyFromArray(array(
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
            $sheet->setCellValue('B' . ($i + 7), $i + 1);
        };


    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 15,
            'C' => 15,
            'D' => 15,
            'E' => 25,
            'F' => 15,
            'H' => 20,
            'I' => 20,
        ];
    }


    public function title() : string
    {
        return $this->kelas.' '.$this->jurusan;
    }
}
