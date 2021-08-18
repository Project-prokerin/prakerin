@extends('template.master')
@push('link')
<style>
    *{
        text-decoration: none;
    }
    .card-body h6,p{
        margin: 0;
        padding: 0;
        text-align: left;
        position: inherit;

    }
    div.content {
        border-style: solid;
        background-color: #bec4c0;
        color: white;
        opacity: 0.5;
        background-color: #0098db;
        background-repeat: no-repeat;
        height: 140px;
        width: 870px;
        margin-top: 20px;
    }
    .card-body h6{
        font-weight: normal;
        text-decoration: underline;
        margin-bottom: 10px;
    }
    .button-course{
        margin-left: 15px;
        width: 100px;
        height: 30px;
    }
    .button-course h5{
        margin-top: px;
        font-size: 15px;
    }
    div .box{
        /* box-shadow: 0 0 5px grey; */
        transition: all .2s ease-in-out;
    }
    div .box:hover{
        transform: scale(1.1);
    }
}
</style>
@endpush
@section('title', 'Prakerin | DASHBOARD')
@section('judul', 'DASHBOARD')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DASBOARD</div>
@endsection
@section('main')
{{-- <div class="card" >
    <div class="container-fluid text-center H-100 mb-3  content" >
        <h3 class="ml-3" style="margin-top: 35px">PRAKERIN SMK TARUNA BHAKTI</h3>
        <h6 class="ml-3 mb-5">Praktek Kerja Industri 2021-2022</h6>
    </div>

    <div class="card-body">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Ringkasan Khusus</label>
            <div class="col-sm-10" style="margin-left: -25px">
            <div class="btn-group dropright">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle button-course" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <label>Detail</label>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('user.perusahaan') }}">List Perusahaan</a>
                        <a class="dropdown-item" href="{{ route('user.pembekalan') }}">Pembekalan Magang</a>
                        @if (siswa('data_prakerin') == '')

                        @else
                        <a class="dropdown-item" href="{{ route('user.status') }}">Status Magang</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('user.jurnal') }}">Jurnal Prakerin</a>
                        <a class="dropdown-item" href="{{ route('user.jurnalH') }}">Jurnal Harian</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('user.kelompok_laporan') }}">Kelompok Harian</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="card-body  container-fluid mt-2">
        <div class="row">
            <div class="col-sm-4">
                <a href="{{ route('user.perusahaan') }}" style="text-decoration: none">
                <div class="card box">
                        <img src="{{ asset('images/dashboard.png') }}" class="card-img-top" alt="" >
                    <div class="card-body">
                        <p class="text-dark">List Perusahaan</p>
                        <p class="text-dark"> <h6>List Perusahaan</h6></p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="{{ route('user.pembekalan') }}"   style="text-decoration: none">
                <div class="card  box" >
                        <img src="{{ asset('images/dashboard.png') }}" class="card-img-top"  alt="" >
                    <div class="card-body">
                        <p class="text-dark">Pembekalan Magang</p>
                        <p class="text-dark"> <h6>Pembekalan Magang</h6></p>
                    </div>
                </div>
                </a>
            </div>
            @if (siswa('data_prakerin') == '')

            @else
            <div class="col-sm-4">
            <a href="{{ route('user.status') }}"  style="text-decoration: none">
                <div class="card  box" >
                        <img src="{{ asset('images/dashboard.png') }}" class="card-img-top" alt="" >
                    <div class="card-body">
                        <p class="text-dark">Status Magang</p>
                        <p class="text-dark"><h6>Status Magang</h6></p>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-sm-4">
            <a href="{{ route('user.jurnal') }}"  style="text-decoration: none">
                <div class="card  box"  >
                        <img src="{{ asset('images/dashboard.png') }}"  class="card-img-top" alt="" >
                    <div class="card-body">
                        <p class="text-dark">Jurnal Prakerin</p>
                        <p class="text-dark"><h6>Jurnal Prakerin</h6></p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="{{ route('user.jurnalH') }}"   style="text-decoration: none">
                <div class="card  box">
                        <img src="{{ asset('images/dashboard.png') }}"  class="card-img-top" alt="" >
                    <div class="card-body">
                        <p class="text-dark">Jurnal Harian</p>
                        <p class="text-dark"><h6>Jurnal Harian</h6></p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="{{ route('user.kelompok_laporan') }}"  style="text-decoration: none">
                <div class="card  box" >
                        <img src="{{ asset('images/dashboard.png') }}"  class="card-img-top" alt="" >
                    <div class="card-body">
                        <p class="text-dark">Kelompok Harian</p>
                        <p class="text-dark"><h6>Kelompok Harian</h6></p>
                    </div>
                </div>
                </a>
            </div>
            @endif
        </div>
    </div>
</div> --}}











<div class="container-fluid text-center H-100 mb-3  content" >
    <h3 class="ml-3" style="margin-top: 35px">PRAKERIN SMK TARUNA BHAKTI</h3>
    <h6 class="ml-3 mb-5">Praktek Kerja Industri 2021-2022</h6>
</div>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12" style="margin-right: 320px;">
        <div class="card card-statistic-2" style="width: 635px;">
            <div class="card-stats">
                <div class="card-stats-title">
                    <h6 class="text-primary">Pembekalan Magang</h6>
                </div>
                <div class="card-stats-items">
                    <div class="card-stats-item" style="margin-right: 0px;">
                        <div class="card-stats-item-count">
                            {{-- {{dd($pembekalan_magang)}} --}}
                            @if ($pembekalan_magang == null )
                            <i class=" fa-times-circle " style="font-size: 30px;  color: red; "></i>
                            
                            @else 
                            <i class="{{$pembekalan_magang->psikotes == 'sudah' ? 'far fa-check-square' : 'fa-times-circle'}}" style="font-size: 30px;  {{ $pembekalan_magang->psikotes == 'sudah' ? 'color: greenyellow;' : 'color: red;'}} "></i>

                            @endif
                            {{-- <i class="{{$pembekalan_magang->psikotes == 'sudah' ? 'far fa-check-square' : 'fa-times-circle'}}" style="font-size: 30px;  {{ $pembekalan_magang->psikotes == 'sudah' ? 'color: greenyellow;' : 'color: red;'}} "></i> --}}
                            {{-- kalo bisa diubah --}}
                            {{-- 1.jika test udah dikumpulin maka yang ditampilin = ceklis --}}
                            {{-- 2.jika blum maka yang ditampilin = silang --}}

                            {{-- kalo gk bisa diubah --}}
                            {{-- bilang ke walada aja/mungkin dashboard yang sebelumnya --}}

                            {{-- kalo pesan ini udah dibaca jangan lupa diapus biar gk ganggu pemandangan wkwk --}}
                            {{-- terimakasih --}}

                            {{-- pesan telah tersampaikan dan di baca oleh NurFirdausR selaku backend Dev, akan melakukan perubahan seperti permintaan tersebut  --}}
                        </div>
                        <a href="pembekalan" class="text-decoration-none">
                            <div class="" style="width: 120px;">Test Psikotes</div>
                        </a>
                    </div>
                 
                    <div class="card-stats-item" style="margin-right: 0px;">
                        <div class="card-stats-item-count">
                            @if ($pembekalan_magang == null )
                            <i class=" fa-times-circle " style="font-size: 30px;  color: red; "></i>
                            
                            @else 
                            <i class="{{$pembekalan_magang->soft_skill == 'sudah' ? 'far fa-check-square' : 'fa-times-circle'}}" style="font-size: 30px;  {{ $pembekalan_magang->soft_skill == 'sudah' ? 'color: greenyellow;' : 'color: red;'}} "></i>

                            @endif
                        </div>
                        <a href="pembekalan" class="text-decoration-none">
                            <div class="" style="width: 120px;">Test Soft Skill</div>
                        </a>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">
                            @if ($pembekalan_magang == null )
                            <i class=" fa-times-circle " style="font-size: 30px;  color: red; "></i>
                            
                            @else 
                            <i class="{{$pembekalan_magang->file_portofolio != null ? 'far fa-check-square' : 'fa-times-circle'}}" style="font-size: 30px;  {{ $pembekalan_magang->file_portofolio != null ? 'color: greenyellow;' : 'color: red;'}} "></i>

                            @endif
                        </div>
                        <a href="pembekalan" class="text-decoration-none">
                            <div class="" style="width: 120px;">Portfolio</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-icon shadow-primary bg-primary" style="margin-top: 50px;">
                <i class="fas fa-bullhorn"></i>
            </div>
            <div class="card-wrap" style="margin-top: 33px;">
                <a href="status" class="text-decoration-none">
                   @if ($statusMagang_siswa == '')
                   <div class="card-body">
                    <div class="alert  alert-dark alert-has-icon">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                          <div class="alert-title">Status Magang</div>
                          Belum melakaukan pengajuan
                        </div>
                      </div>
                </div>
                   @else 
                            @if ($statusMagang_siswa->status === 'Pengajuan')
                            <div class="card-body">
                                <div class="alert  alert-primary alert-has-icon">
                                    <div class="alert-icon"><i class="fas fa-file-signature"></i></div>
                                    <div class="alert-body">
                                      <div class="alert-title">Status Magang</div>
                                      Pengajuan
                                    </div>
                                  </div>
                            </div>
                                
                            @elseif($statusMagang_siswa->status === 'Magang')
                            <div class="card-body">
                                <div class="alert  alert-warning alert-has-icon">
                                    <div class="alert-icon"><i class="fas fa-briefcase"></i></div>
                                    <div class="alert-body">
                                      <div class="alert-title">Status Magang</div>
                                      Magang
                                    </div>
                                  </div>
                            </div>
                                
                            @elseif($statusMagang_siswa->status === 'Selesai')
                            <div class="card-body">
                                <div class="alert  alert-success alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                      <div class="alert-title">Status Magang</div>
                                      Selesai
                                    </div>
                                  </div>
                            </div>
                            @else 
                            <div class="card-body">
                                <div class="alert  alert-danger alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                      <div class="alert-title">Status Magang</div>
                                      Batal
                                    </div>
                                  </div>
                            </div>
                        
                            @endif
                   @endif
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2" style="height: 130px;">
            <div class="card-stats">
                <div class="card-stats-title">
                    <h6 class="text-primary">Jurnal</h6>
                </div>
                <div class="card-stats-items">
                    <div class="card-stats-item" style="margin-right: 60px;">
                        {{-- dd() --}}
                        {{-- {{dd($statusMagang_siswa)}} --}}
                        @if ($statusMagang_siswa === "")
                        <div class="card-stats-item-count" style="margin-left: 35px;width: 50px;">0</div>
                        @else
                        <div class="card-stats-item-count" style="margin-left: 35px;width: 50px;"> {{$statusMagang_siswa->status != 'Magang' ? '0' : count($jurnalP_siswa)}}</div>
                        @endif
                        <a href="jurnal" class="text-decoration-none">
                            <div class="" style="width: 120px;">Jurnal Prakerin</div>
                        </a>
                    </div>
                    <div class="card-stats-item">
                        @if ($statusMagang_siswa === "")
                        <div class="card-stats-item-count" style="margin-left: 35px;width: 50px;">0</div>
                        @else
                        <div class="card-stats-item-count" style="margin-left: 35px;width: 50px;">{{ $statusMagang_siswa->status != 'Magang' ? '0' : count($jurnalH_siswa)}}</div>
                        @endif
                        <a href="jurnalH" class="text-decoration-none">
                            <div class="" style="width: 120px;">Jurnal Harian</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
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
                        {{count($perusahaan)}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <a href="kelompok_laporan" class="text-decoration-none">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="far fa-address-card"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Kelompok Laporan</h4>
                    </div>
                    <div class="card-body">
                        @if ($kelompokLaporan_siswa == null)
                        Belum ada kelompok
                    @else 
                        {{
                    $kelompokLaporan_siswa->no

                        }}
                    @endif
                        {{-- contoh --}}
                        {{-- Kelompok 1 --}}
                    </div>
                </div>
            </div>
        </a>
    </div>


</div>
@endsection
@push('script')
@endpush
