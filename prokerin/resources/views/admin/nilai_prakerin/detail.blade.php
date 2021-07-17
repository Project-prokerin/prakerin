@extends('template.master')
@push('link')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

@endpush
@section('title', 'Prakerin |  Data Nilai Prakerin Siswa')
@section('judul', ' Data Nilai Prakerin Siswa ')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-newspaper"></i> DATA NILAI PRAKERIN SISWA</div>
@endsection
@section('main')
<div class="card" style="">
    <div class="card-header">
        <h4 class="pt-2 card-title"><i class="fas fa-th"></i> Data Nilai Prakerin</h4>
    </div>
    <div class="card-body">
        <div class="row ml-4">
            <h6 class="mb-3 col-2">Nama Siswa</h6>
            <label for="">: Raditya Nugraha</label>
        </div>
        <div class="row ml-4">
            <h6 class="mb-3 col-2">Kelas</h6>
            <label for="">: XII RPL 1</label>
        </div>
        <div class="row ml-4">
            <h6 class="mb-3 col-2">Status Prakerin</h6>
            <label for="">: Magang</label>
        </div>
        <div class="container">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th style="width: 5%;">No.</th>
                        <th colspan="4">Data Nilai Prakerin</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>1.</td>
                        <td style="width: 200px;">Nilai Perusahaan</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Aspek</td>
                        <td>contoh tes aspek</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Domain</td>
                        <td>contoh domain panjang</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Keterangan</td>
                        <td>B</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-body">
        <div class="col-12 mb-4" style="margin-left: 0px;">
            <div class="">
                <h6 class="mb-3">Kategori Nilai Prakerin</h6>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="">
                        <label class="mb-3 ml-3"><b>A. Pelaksanaan</b></label>
                    </div>
                    <table class="ml-3 table-sm table-bordered">
                        <tbody class="text-center">
                            <tr>
                                <td rowspan="2" style="width: 50px;">No.</td>
                                <td rowspan="2" style="width: 300px;">Aspek yang dinilai</td>
                                <td colspan="2">Nilai</td>
                            </tr>
                            <tr>
                                <td>Angka</td>
                                <td>Huruf</td>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Kedisiplinan</td>
                                <td>10.00</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Tanggung Jawab</td>
                                <td>8.00</td>
                                <td>B</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Inisiatif</td>
                                <td>9.00</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Kerajinan</td>
                                <td>8.00</td>
                                <td>B</td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Kerja Sama</td>
                                <td>9.00</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td colspan="2">Jumlah Nilai</td>
                                <td>44.00</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">Nilai Rata-Rata</td>
                                <td>8.80</td>
                                <td>A</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    <div class="">
                        <label class="mb-3"><b>B. Keterampilan</b></label>
                    </div>
                    <table class="table-sm table-bordered">
                        <tbody class="text-center">
                            <tr>
                                <td rowspan="2" style="width: 50px;">No.</td>
                                <td rowspan="2" style="width: 300px;">Aspek yang dinilai</td>
                                <td colspan="2">Nilai</td>
                            </tr>
                            <tr>
                                <td>Angka</td>
                                <td>Huruf</td>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Motor Otomotif</td>
                                <td>10.00</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Listrik Otomotif</td>
                                <td>8.00</td>
                                <td>B</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Chasis & Pemindahan Tenaga</td>
                                <td>9.00</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Pompa Sentrifugal</td>
                                <td>8.00</td>
                                <td>B</td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Las Listrik</td>
                                <td>9.00</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td colspan="2">Jumlah Nilai</td>
                                <td>44.00</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">Nilai Rata-Rata</td>
                                <td>8.80</td>
                                <td>A</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="col-5 mb-4" style="margin-left: 70px;">
            <div class="row">
                <div class="col-12">
                    <div class="">
                        <div class="">
                            <h6 class="mb-3">Konversi Keterangan Nilai :</h6>
                        </div>
                        <table class="ml-5 table-sm table-bordered">
                            <thead class="text-center">
                            <tr>
                                <th scope="col" colspan="2" style="width: 300px;">Keterangan</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <th style="width: 10px;">Angka</th>
                                    <th style="width: 10px;">Huruf</th>
                                </tr>
                                <tr>
                                    <td>8.6 - 10.00</td>
                                    <td>A</td>
                                </tr>
                                <tr>
                                    <td>7.10 - 8.59</td>
                                    <td>B</td>
                                </tr>
                                <tr>
                                    <td>6.0 - 7.09</td>
                                    <td>C</td>
                                </tr>
                                <tr>
                                    <td>< 6.00</td>
                                    <td>D</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')

@endpush
