<?php

namespace App\Exports\penelusuran_tamtan;

use App\Models\pen;
use App\Models\Penelusuran_tamatan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PenelusuranExport implements FromQuery, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithCustomStartCell, ShouldAutoSize, WithTitle
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    use Exportable;
    private $filename = 'Data penelusuran tamtan.xlsx';
    private $no = 0;
    private $pen;
    private $heading;
    // private $stat;

    public function __construct($heading, $stat, $getData)
    {
        $this->stat = $stat;
        $this->heading = $heading;
        $this->getData = $getData;
    }
    public function query()
    {
        // memanggil berdasarkan status
        return Penelusuran_tamatan::query()->with('alumni_siswa')->where('status', $this->stat);
    }
    // memakai query
    // public function query()
    // {
    //     return pen::query();
    // }
    public function headings(): array
    {
        return $this->heading;
    }
    public function map($pen): array
    {
        $map = [];

        if ($this->stat == 'kuliah') {
            return [
                '',
                $pen->alumni_siswa->nama,
                $pen->alumni_siswa->kelas,
                $pen->alumni_siswa->jurusan,
                $pen->alumni_siswa->tahun_lulus,
                !empty($pen->nama_kampus) ? $pen->nama_kampus : '',
                !empty($pen->alamat_kampus) ? $pen->alamat_kampus : '',
                !empty($pen->tahun_masuk_kuliah) ? $pen->tahun_masuk_kuliah : '',
            ];
        }else
        if ($this->stat == 'bekerja') {
            return [
                '',
                $pen->alumni_siswa->nama,
                $pen->alumni_siswa->kelas,
                $pen->alumni_siswa->jurusan,
                $pen->alumni_siswa->tahun_lulus,
                !empty($pen->nama_perusahaan) ? $pen->nama_perusahaan : '',
                !empty($pen->alamat_perusahaan) ? $pen->alamat_perusahaan : '',
                 !empty($pen->tahun_kuliah) ? $pen->tahun_kuliah : '',
            ];
        }else
        if ($this->stat == 'Wirausaha') {
            return [
                '',
                $pen->alumni_siswa->nama,
                $pen->alumni_siswa->kelas,
                $pen->alumni_siswa->jurusan,
                $pen->alumni_siswa->tahun_lulus,
                 !empty($pen->nama_usaha) ? $pen->nama_usaha : ''
            ];
        }else
        if ($this->stat == 'Bekerja dan Kuliah') {
            return [
                '',
                $pen->alumni_siswa->nama,
                $pen->alumni_siswa->kelas,
                $pen->alumni_siswa->jurusan,
                $pen->alumni_siswa->tahun_lulus,
                !empty($pen->nama_kampus) ? $pen->nama_kampus : '',
                !empty($pen->alamat_kampus) ? $pen->alamat_kampus : '',
                !empty($pen->tahun_masuk_kuliah) ? $pen->tahun_masuk_kuliah : '',
                !empty($pen->nama_perusahaan) ? $pen->nama_perusahaan : '',
                 !empty($pen->alamat_perusahaan) ? $pen->alamat_perusahaan : '',
                 !empty($pen->tahun_kuliah) ? $pen->tahun_kuliah : '',
            ];
        }
        if ($this->stat == 'Wirausaha dan Kuliah') {
            return [
                '',
                $pen->alumni_siswa->nama,
                $pen->alumni_siswa->kelas,
                $pen->alumni_siswa->jurusan,
                $pen->alumni_siswa->tahun_lulus,
                !empty($pen->nama_kampus) ? $pen->nama_kampus : '',
                !empty($pen->alamat_kampus) ? $pen->alamat_kampus : '',
                !empty($pen->tahun_masuk_kuliah) ? $pen->tahun_masuk_kuliah : '',
                 !empty($pen->nama_usaha) ? $pen->nama_usaha : ''
            ];
        }
    }
    public function startCell(): string
    {
        return 'A6';
    }
    public function styles(Worksheet $sheet)
    {
        // dd($this->getData);
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
        $sheet->mergeCells('A2:'. $highestCol . '2')->setCellValue('A2', 'Data Penelusuran Tamatan ' . $this->stat);
        $sheet->mergeCells('A3:' . $highestCol . '3')->setCellValue('A3', 'SMK TARUNA BHAKTI TP 2021/2022');
        // $sheet->mergeCells('A5:b5')->setCellValue('A5', 'JURUSAN :' . $this->jurusan);

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
        // dd($highestCol);
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
            // // 'B' => 20,
            // // 'C' => 20,
            // 'D' => 15,
            // 'E' => 15,
            // 'F' => 15,
        ];
    }

    public function title(): string
    {
        return $this->stat;
    }
}
