@extends('template.master')
@push('link')
    <style>

    </style>
@endpush
@section('title', 'Prakerin | DASHBOARD')
@section('judul', 'DASHBOARD')
@section('breadcrump')
    <div class="breadcrumb-item "><i class="fas fa-user"></i> {{ strtoupper(Auth::user()->role) }}</div>
    <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DASBOARD</div>
@endsection
@section('main')
    @if (Auth::user()->role == 'hubin' or Auth::user()->role == 'kaprog' or Auth::user()->role == 'bkk' or Auth::user()->role == 'kepsek' or Auth::user()->role == 'tu')
        @if (Auth::user()->role == 'hubin')
        <div class="row">
        <div class="col-lg-6 col-md-4 col-sm-12">
                <div class="card" style="height:257px;">
                   <h2 class="text-center" style="margin-top:80px;">Prakerin & Takola</h2>
                   <h4 class="text-center">2020-2021</h4>
                </div>
            </div>
        
               
                 <div class="col-lg-3  col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-building"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Data Perusahaan</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $perusahaan }}
                                    </div>
                                </div>
                            </div>
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Pembekalan Magang</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $pem }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-building"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Jurnal Harian</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $jurnal }}
                                    </div>
                                </div>
                            </div>
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-building"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Surat Keluar</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $surat_k }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="fas fa-th"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Data Prakerin</h4>
                                    </div>
                                    <div class="card-body">
                                        12
                                    </div>
                                </div>
                            </div>
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-building"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Jurnal Prakerin</h4>
                                    </div>
                                    <div class="card-body">
                                        13
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="fas fa-th"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Kelompok Prakerin</h4>
                                    </div>
                                    <div class="card-body">
                                        12
                                    </div>
                                </div>
                            </div>
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-building"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Laporan Prakerin</h4>
                                    </div>
                                    <div class="card-body">
                                        13
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="fas fa-th"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Surat Masuk</h4>
                                    </div>
                                    <div class="card-body">
                                        12
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-building"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Jurnal Prakerin</h4>
                                    </div>
                                    <div class="card-body">
                                        13
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

    </div>

        @endif
    @endif
    @if (Auth::user()->role == 'kepsek' or Auth::user()->role == 'tu')
        @if (Auth::user()->role == 'kepsek' or Auth::user()->role == 'tu')
            <div class="row">
                <div class="col-lg-7 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">
                                Takola
                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">24</div>
                                    <div class="card-stats-item-label">Surat Masuk</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-archive"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4></h4>
                            </div>
                            <div class="card-body">
                                Takola
                            </div>
                        </div>
                    </div>
                </div>
        @endif
    @endif


    @if (Auth::user()->role == 'kesiswaan' or Auth::user()->role == 'kurikulum')
        @if (Auth::user()->role == 'kesiswaan' or Auth::user()->role == 'kurikulum')
            <div class="row">
                <div class="col-lg-7 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">
                                <h4 class="text-primary">Takola</h4>
                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">1</div>
                                    <div class="card-stats-item-label">Masuk</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">2</div>
                                    <div class="card-stats-item-label">Keluar</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">2</div>
                                    <div class="card-stats-item-label">Disposisi</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Takola</h4>
                            </div>
                            <div class="card-body">
                                3
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5" style="margin-left: 50px">
                    <div class="card">
                        <div class="card-header">
                            <h4>Surat</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart4" height="220px" width="400px"></canvas>
                        </div>
                    </div>
                </div>
        @endif
    @endif

    @if (Auth::user()->role == 'admin')
        @if (Auth::user()->role == 'admin' or Auth::user()->role == 'kurikulum')
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">
                                <h4 class="text-primary">Surat</h4>
                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $surat_m }}</div>
                                    <div class="card-stats-item-label">Masuk</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $surat_k }}</div>
                                    <div class="card-stats-item-label">Keluar</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{ $disposisi }}</div>
                                    <div class="card-stats-item-label">Disposisi</div>
                                </div>
                            </div>
                        </div>
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
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Siswa</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $siswa }}
                                    </div>
                                </div>
                            </div>
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Guru</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $guru }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Surat</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart4" height="200px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    </div>
    </div>
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
