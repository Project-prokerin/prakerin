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
                <div class="col-lg-4 col-md-4 col-sm-12">
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
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">12</div>
                                    <div class="card-stats-item-label">Surat Keluar</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">23</div>
                                    <div class="card-stats-item-label">Disposisi</div>
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

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">
                                Data
                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">24</div>
                                    <div class="card-stats-item-label">Surat Masuk</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">12</div>
                                    <div class="card-stats-item-label">Surat Keluar</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">23</div>
                                    <div class="card-stats-item-label">Disposisi</div>
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
                                Data Perusahaan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">
                                Pembekalan
                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">24</div>
                                    <div class="card-stats-item-label">Surat Masuk</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">12</div>
                                    <div class="card-stats-item-label">Surat Keluar</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">23</div>
                                    <div class="card-stats-item-label">Disposisi</div>
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
                                <h4>Pembekalan</h4>
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
                                    <i class="far fa-building"></i>
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
                                    <i class="far fa-building"></i>
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
            </div>
        @endif
    @endif
    @if (Auth::user()->role == 'kepsek' or Auth::user()->role == 'tu')
        @if (Auth::user()->role == 'kepsek' or Auth::user()->role == 'tu')
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-12">
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
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">12</div>
                                    <div class="card-stats-item-label">Surat Keluar</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">23</div>
                                    <div class="card-stats-item-label">Disposisi</div>
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


                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pie Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart4"></canvas>
                        </div>
                    </div>
                </div>
        @endif
    @endif


    @if (Auth::user()->role == 'kesiswaan' or Auth::user()->role == 'kurikulum')
        @if (Auth::user()->role == 'kesiswaan' or Auth::user()->role == 'kurikulum')
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
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
                <div class="mb-5">
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
                                <h4>Total Surat</h4>
                            </div>
                            <div class="card-body">
                                3
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
                                        12
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
                                        123
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
    <script src="{{ asset('assets/js/pages-admin/chart.js') }}"></script>




@endpush
