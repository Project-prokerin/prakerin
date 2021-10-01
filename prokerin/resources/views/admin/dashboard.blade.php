@extends('template.master')
@push('link')
    <style>

    </style>
@endpush
@section('title', 'Prakerin | DASHBOARD')
@section('judul', 'DASHBOARD')
@section('breadcrump')
    {{-- <div class="breadcrumb-item "><i class="fas fa-user"></i></div> --}}
    <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DASBOARD</div>
@endsection
@section('main')

{{-- Role admin---kaprog---hubin --}}
@if (Auth::user()->role == 'admin' or Auth::user()->role == 'kaprog' or Auth::user()->role == 'hubin')
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">
                        <h6 class="text-primary">Surat</h6>
                    </div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $surat_masuk }}</div>
                            <a href="surat_masuk" class="text-decoration-none">
                                <div class="card-stats-item-label">Masuk</div>
                            </a>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $surat_keluar }}</div>
                            <a href="surat_keluar" class="text-decoration-none">
                                <div class="card-stats-item-label">Keluar</div>
                            </a>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $disposisi }}</div>
                            <a href="disposisi" class="text-decoration-none">
                                <div class="card-stats-item-label">Disposisi</div>
                            </a>
                        </div>
                    </div>
                </div>
                <a href="surat_masuk" class="text-decoration-none">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Surat</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_surat }}
                        </div>
                    </div>
                </a>
            </div>
            <div class="">
                <a href="" class="text-decoration-none">
                    <div class="mb-5" style="margin: 0px auto;">
                        <div class="card" @if (Auth::user()->role == 'kaprog') style="width:326px; height:300px;" @endif>
                            <div class="card-header">
                                <h4>Surat</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart4" height="200px"></canvas>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @if (Auth::user()->role == 'admin')
            <a href="data_prakerin" class="text-decoration-none">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Data Prakerin</h4>
                        </div>
                        <div class="card-body">
                            {{$data_prakerin}}
                        </div>
                    </div>
                </div>
            </a>
            @endif
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">
                        <h6 class="text-primary">Surat Prakerin</h6>
                    </div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{$surat_keluar}}</div>
                            <a href="surat_keluar" class="text-decoration-none">
                                <div class=" mr-3" style="width: 120px;">Surat Penugasan</div>
                            </a>
                        </div>
                        <div class="card-stats-item ml-5">
                            <div class="card-stats-item-count">{{$pengajuan_prakerin}}</div>
                            <a href="pengajuan_prakerin" class="text-decoration-none">
                                <div class="" style="width: 130px;">Pengajuan Prakerin</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Surat Prakerin</h4>
                    </div>
                    <div class="card-body">
                        {{$total_suratP}}
                        </div>
                </div>
            </div>
            @if (Auth::user()->role == 'admin')
            <a href="siswa" class="text-decoration-none">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Siswa</h4>
                        </div>
                        <div class="card-body">
                            {{$siswa}}
                        </div>
                    </div>
                </div>
            </a>
            <a href="guru" class="text-decoration-none">
                <div class="card card-statistic-1" style="margin-top: 14px;">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Guru</h4>
                        </div>
                        <div class="card-body">
                            {{$guru}}
                        </div>
                    </div>
                </div>
            </a>
            <a href="kelas" class="text-decoration-none">
                <div class="card card-statistic-1" style="margin-top: 14px;">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kelas</h4>
                        </div>
                        <div class="card-body">
                            {{$kelas}}
                        </div>
                    </div>
                </div>
            </a>
            <a href="kelompok" class="text-decoration-none">
                <div class="card card-statistic-1" style="margin-top: 14px;">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kelompok Prakerin</h4>
                        </div>
                        <div class="card-body">
                            {{$kelompok_prakerin}}
                        </div>
                    </div>
                </div>
            </a>
            @endif

            @if (Auth::user()->role == 'kaprog')
            <a href="perusahaan" class="text-decoration-none">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Perusahaan</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </a>
            <a href="data_prakerin" class="text-decoration-none">
                <div class="card card-statistic-1" style="margin-top: 14px;">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Data Prakerin</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </a>
            @endif

            @if (Auth::user()->role == 'hubin')
            <a href="perusahaan" class="text-decoration-none">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Perusahaan</h4>
                        </div>
                        <div class="card-body">
                            {{$perusahaan}}
                        </div>
                    </div>
                </div>
            </a>
            <a href="pembekalan" class="text-decoration-none">
                <div class="card card-statistic-1" style="margin-top: 14px;">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pembekalan</h4>
                        </div>
                        <div class="card-body">
                            {{$pembekalan_magang}}
                        </div>
                    </div>
                </div>
            </a>
            <a href="data_prakerin" class="text-decoration-none">
                <div class="card card-statistic-1" style="margin-top: 14px;">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Data Prakerin</h4>
                        </div>
                        <div class="card-body">
                            {{$data_prakerin}}
                        </div>
                    </div>
                </div>
            </a>
            @endif

        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">
                        <h6 class="text-primary">Jurnal</h6>
                    </div>
                    <div class="card-stats-items">
                        <div class="card-stats-item" style="margin-right: 60px;">
                            <div class="card-stats-item-count">{{$jurnalP}}</div>
                            <a href="jurnal" class="text-decoration-none">
                                <div class="" style="width: 120px;">Jurnal Prakerin</div>
                            </a>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{$jurnalH}}</div>
                            <a href="jurnalH" class="text-decoration-none">
                                <div class="" style="width: 120px;">Jurnal Harian</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Jurnal</h4>
                    </div>
                    <div class="card-body">
                        {{$total_jurnal}}
                    </div>
                </div>
            </div>
            @if (Auth::user()->role == 'admin')
            <a href="jurusan" class="text-decoration-none">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jurusan</h4>
                        </div>
                        <div class="card-body">
                            {{$jurusan}}
                        </div>
                    </div>
                </div>
            </a>
            <a href="tanda-tangan" class="text-decoration-none">
                <div class="card card-statistic-1" style="margin-top: 14px;">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Tanda Tangan</h4>
                        </div>
                        <div class="card-body">
                            {{$tanda_tangan}}
                        </div>
                    </div>
                </div>
            </a>
            <a href="pembekalan" class="text-decoration-none">
                <div class="card card-statistic-1" style="margin-top: 14px;">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pembekalan Magang</h4>
                        </div>
                        <div class="card-body">
                            {{$pembekalan_magang}}

                        </div>
                    </div>
                </div>
            </a>
            <a href="laporan" class="text-decoration-none">
                <div class="card card-statistic-1" style="margin-top: 14px;">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Laporan Prakerin</h4>
                        </div>
                        <div class="card-body">
                            {{$laporan_prakerin}}
                        </div>
                    </div>
                </div>
            </a>
            @endif

            @if (Auth::user()->role == 'kaprog')
            <a href="kelompok" class="text-decoration-none">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kelompok</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </a>
            <a href="laporan" class="text-decoration-none">
                <div class="card card-statistic-1" style="margin-top: 14px;">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Laporan</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </a>
            @endif

            @if (Auth::user()->role == 'hubin')
            <a href="kelompok" class="text-decoration-none">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kelompok</h4>
                        </div>
                        <div class="card-body">
                            {{$kelompok_prakerin}}

                        </div>
                    </div>
                </div>
            </a>
            <a href="laporan" class="text-decoration-none">
                <div class="card card-statistic-1" style="margin-top: 14px;">
                    <div class="card-icon bg-info">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Laporan</h4>
                        </div>
                        <div class="card-body">
                            {{$laporan_prakerin}}
                        </div>
                    </div>
                </div>
            </a>
            @endif
        </div>
    </div>
@endif
{{-- End Role --}}


{{-- Role bkk---tu---kepsek --}}
@if (Auth::user()->role == 'bkk' or Auth::user()->role == 'tu' or Auth::user()->role == 'kepsek')
    <div class="row">
        @if (Auth::user()->role == 'tu' or Auth::user()->role == 'kepsek')
        <div class="col-lg-4 col-md-4 col-sm-12">
            <a href="surat_masuk" class="text-decoration-none">
                <div class="" style="">
                    <div class="card" style="width: 320px;">
                        <div class="card-header">
                            <h4>Surat</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart4" height="220px" width="400px"></canvas>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">
                        <h6 class="text-primary">Surat</h6>
                    </div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $surat_masuk }}</div>
                            <a href="surat_masuk" class="text-decoration-none">
                                <div class="card-stats-item-label">Masuk</div>
                            </a>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $surat_keluar }}</div>
                            <a href="surat_keluar" class="text-decoration-none">
                                <div class="card-stats-item-label">Keluar</div>
                            </a>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $disposisi }}</div>
                            <a href="disposisi" class="text-decoration-none">
                                <div class="card-stats-item-label">Disposisi</div>
                            </a>
                        </div>
                    </div>
                </div>
                <a href="surat_masuk" class="text-decoration-none">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Surat</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_surat }}
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endif

        @if (Auth::user()->role == 'kepsek')
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">
                        <h6 class="text-primary">Surat Prakerin</h6>
                    </div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{$surat_keluar}}</div>
                            <a href="surat_keluar" class="text-decoration-none">
                                <div class=" mr-3" style="width: 120px;">Surat Penugasan</div>
                            </a>
                        </div>
                        <div class="card-stats-item ml-5">
                            <div class="card-stats-item-count">{{$pengajuan_prakerin}}</div>
                            <a href="pengajuan_prakerin" class="text-decoration-none">
                                <div class="" style="width: 130px;">Pengajuan Prakerin</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Surat Prakerin</h4>
                    </div>
                    <div class="card-body">
                        {{$total_suratP}}
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    @if (Auth::user()->role == 'bkk')
    <div class="row">
        <div style="margin: 0px auto;">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2" style="width: 600px;">
                    <div class="card-stats">
                        <div class="card-stats-title">
                            <h6 class="text-primary">Pembekalan Magang</h6>
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{$test_psikotes}}</div>
                                <a href="pembekalan" class="text-decoration-none">
                                    <div class="card-stats-item-label">Test Psikotes</div>
                                </a>
                            </div>

                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{$test_SS}}</div>
                                <a href="pembekalan" class="text-decoration-none">
                                    <div class="card-stats-item-label">Test Soft Skill</div>
                                </a>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{$test_Portofolio}}</div>
                                <a href="pembekalan" class="text-decoration-none">
                                    <div class="card-stats-item-label">Portfolio</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="pembekalan" class="text-decoration-none">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pembekalan Magang</h4>
                            </div>
                            <div class="card-body">
                                {{$pembekalan_magang}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
@endif
{{-- End Role --}}


{{-- Role kurikulum---kesiswaan---sarpras --}}
@if (Auth::user()->role == 'kurikulum' or Auth::user()->role == 'kesiswaan' or Auth::user()->role == 'sarpras')
    <div class="row">
        <div style="margin: 0px auto;">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12" style="margin-right: 180px;margin-left: 60px">
                    <div class="card card-statistic-2" style="width: 500px;">
                        <div class="card-stats">
                            <div class="card-stats-title">
                                <h6 class="text-primary">Surat</h6>
                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item ml-1">
                                    <div class="card-stats-item-count">10</div>
                                    <a href="surat_masuk" class="text-decoration-none">
                                        <div class="card-stats-item-label">Surat Masuk</div>
                                    </a>
                                </div>
                                <div class="card-stats-item ml-4">
                                    <div class="card-stats-item-count">10</div>
                                    <a href="surat_masuk" class="text-decoration-none">
                                        <div class="card-stats-item-label">Surat Keluar</div>
                                    </a>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">10</div>
                                    <a href="disposisi" class="text-decoration-none">
                                        <div class="card-stats-item-label">Disposisi</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="surat_masuk" class="text-decoration-none">
                            <div class="card-icon shadow-primary bg-primary">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Surat</h4>
                                </div>
                                <div class="card-body">
                                    10
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <a href="" class="text-decoration-none">
                        <div class="" style="">
                            <div class="card" style="width: 400px;">
                                <div class="card-header">
                                    <h4>Surat</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart4" height="220px" width="400px"></canvas>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
{{-- End Role --}}

    {{-- itesmashboard end --}}


@endsection
@push('script')
<script>
    $(document).ready(function () {
        var ctx = document.getElementById("myChart4").getContext('2d');

    $.ajax({
        url: "{{ route('dashboard.ajax') }}",
        type: "POST",
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function (data) {
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: data.data,
                        backgroundColor: [

                            '#63ed7a',
                            '#ffa426',
                            '#fc544b',

                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [

                        'Surat Masuk',
                        'Disposisi',
                        'Surat Keluar',

                    ],
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    },
                }
            });

        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
})

</script>

@endpush
