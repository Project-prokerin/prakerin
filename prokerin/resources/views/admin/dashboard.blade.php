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
            @if (Auth::user()->role == 'hubin' or Auth::user()->role == 'kaprog' or Auth::user()->role == 'bkk'
            or Auth::user()->role == 'kepsek' or Auth::user()->role == 'tu')
            @if(Auth::user()->role == 'hubin')
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="card card-statistic-2">
                    <div class="card-stats">
                      <div class="card-stats-title">
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
                      </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                      <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">

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
                        </div>
                        <div class="card-stats-items">
                          <div class="card-stats-item">
                            <div class="card-stats-item-count"></div>

                          </div>
                          <div class="card-stats-item">
                            <div class="card-stats-item-count"></div>

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
                        </div>
                        <div class="card-stats-items">
                          <div class="card-stats-item">
                            <div class="card-stats-item-count"></div>

                          </div>
                          <div class="card-stats-item">
                            <div class="card-stats-item-count"></div>

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
                          Pembekalan
                        </div>
                      </div>
                    </div>
                  </div>
              </div>


          </div>

              <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-building"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4></h4>
                      </div>
                      <div class="card-body">
                        Data Prakerin
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-primary">
                          <i class="far fa-building"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4></h4>
                        </div>
                        <div class="card-body">
                          Jurnal Prakerin
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-primary">
                          <i class="far fa-building"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4></h4>
                        </div>
                        <div class="card-body">
                          Jurnal Harian
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-building"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4></h4>
                      </div>
                      <div class="card-body">
                        Kelompok Prakerin
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-primary">
                          <i class="far fa-building"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4></h4>
                        </div>
                        <div class="card-body">
                          Laporan Prakerin
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
                        <h4>Surat</h4>
                      </div>
                      <div class="card-body">
                        <canvas id="myChart4"></canvas>
                      </div>
                    </div>
                  </div>

            @endif
            @endif

            @if (Auth::user()->role == 'admin')
            @if (Auth::user()->role == 'admin' or Auth::user()->role == 'kurikulum')
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Surat Masuk</h4>
                      </div>
                      <div class="card-body">
                        10
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Surat Keluar</h4>
                      </div>
                      <div class="card-body">
                        42
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                      <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Jumlah Disposisi</h4>
                      </div>
                      <div class="card-body">
                        1,201
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-success">
                        <i class="fas fa-user"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Jumlah Siswa</h4>
                        </div>
                        <div class="card-body">
                          42
                        </div>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h4>Jumlah Surat</h4>
                    </div>
                    <div class="card-body">
                      <canvas id="myChart3"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-success">
                        <i class="fas fa-user"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Jumlah Guru</h4>
                        </div>
                        <div class="card-body">
                          42
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
<script src="{{ asset('assets/js/pages-admin/chart.js') }}" ></script>




@endpush
