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
        margin-left: 0px;
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
        <div class="breadcrumb-item "><i class="fas fa-user"></i> {{ strtoupper(Auth::user()->role) }}</div>
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DASBOARD</div>
@endsection
@section('main')
<div class="card" >
        <div class="container-fluid text-center H-100 mb-3  content" >
            <h3 class="ml-3" style="margin-top: 35px">PRAKERIN SMK TARUNA BHAKTI</h3>
            <h6 class="ml-3 mb-5">Praktek Kerja Industri {{$tahun}} - {{$tahunDepan}}</h6>
        </div>
        {{--  --}}
        {{-- itesmashboard --}}
        <div class="card-body">
            <div class="mb-3 row">
                {{-- <label class="col-sm-2 col-form-label">Email</label> --}}
                <label class="col-sm-2 col-form-label">Ringkasan Khusus</label>
                <div class="col-sm-10" style="margin-left: -25px">
                  <div class="btn-group dropright">
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle button-course" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <label>Detail</label>
                        </button>
                        <div class="dropdown-menu">
                            @if (Auth::user()->role == 'hubin' or Auth::user()->role == 'kaprog' or Auth::user()->role == 'bkk')
                            @if(Auth::user()->role == 'hubin')
                                <a class="dropdown-item" href="{{route('siswa.index')}}">Data Siswa</a>
                                <a class="dropdown-item" href="{{route('guru.index')}}">Data Guru</a>
                                <a class="dropdown-item" href="{{route('perusahaan.index')}}">Data Perusahaan</a>
                                @endif
                            @if (Auth::user()->role == 'bkk' or Auth::user()->role == 'hubin')
                                <a class="dropdown-item" href="{{route('pembekalan.index')}}">Pembekalan Magang</a>
                                @endif
                            @if (Auth::user()->role == 'kaprog' or Auth::user()->role == 'hubin')
                                <a class="dropdown-item" href="{{route('data_prakerin.index')}}">Data Prakerin</a>
                                <a class="dropdown-item" href="{{route('jurnal.index')}}">Jurnal Prakerin</a>
                                <a class="dropdown-item" href="{{route('jurnalH.index')}}">Jurnal Harian</a>
                                <a class="dropdown-item" href="{{route('kelompok.index')}}">Kelompok Prakerin</a>
                                <a class="dropdown-item" href="{{route('laporan.index')}}">Laporan Prakerin</a>
                                @endif
                            @else''@endif
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>




        <div class="card-body  container-fluid mt-2">
        <div class="row">
            @if (Auth::user()->role == 'hubin' or Auth::user()->role == 'kaprog' or Auth::user()->role == 'bkk')
            @if(Auth::user()->role == 'hubin')
            <div class="col-sm-4">
                <a href="" style="text-decoration: none">
                <div class="card box">
                        <img src="{{ asset('images/dashboard.png') }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <p class="text-dark">Data Siswa</p>
                        <p class="text-dark"> <h6>Data Siswa</h6></p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="" style="text-decoration: none">
                <div class="card box">
                        <img src="{{ asset('images/dashboard.png') }}" class="card-img-top" alt="" >
                    <div class="card-body">
                        <p class="text-dark">Data Guru</p>
                        <p class="text-dark"> <h6>Data Guru</h6></p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="" style="text-decoration: none">
                <div class="card box">
                        <img src="{{ asset('images/dashboard.png') }}" class="card-img-top" alt="" >
                    <div class="card-body">
                        <p class="text-dark">Data Perusahaan</p>
                        <p class="text-dark"> <h6>Data Perusahaan</h6></p>
                    </div>
                </div>
                </a>
            </div>
            @endif
            @if (Auth::user()->role == 'bkk' or Auth::user()->role == 'hubin')
                <div class="col-sm-4">
                <a href="" style="text-decoration: none">
                <div class="card box">
                        <img src="{{ asset('images/dashboard.png') }}" class="card-img-top" alt="" >
                    <div class="card-body">
                        <p class="text-dark">Pembekalan Magang</p>
                        <p class="text-dark"> <h6>Pembekalan Magang</h6></p>
                    </div>
                </div>
                </a>
            </div>
            @endif
            @if (Auth::user()->role == 'kaprog' or Auth::user()->role == 'hubin')
            <div class="col-sm-4">
                <a href="" style="text-decoration: none">
                <div class="card box">
                        <img src="{{ asset('images/dashboard.png') }}" class="card-img-top" alt="" >
                    <div class="card-body">
                        <p class="text-dark">Data Prakerin</p>
                        <p class="text-dark"> <h6>Data Prakerin</h6></p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="" style="text-decoration: none">
                <div class="card box">
                        <img src="{{ asset('images/dashboard.png') }}" class="card-img-top" alt="" >
                    <div class="card-body">
                        <p class="text-dark">Jurnal Prakerin</p>
                        <p class="text-dark"> <h6>Jurnal Prakerin</h6></p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="" style="text-decoration: none">
                <div class="card box">
                        <img src="{{ asset('images/dashboard.png') }}" class="card-img-top" alt="" >
                    <div class="card-body">
                        <p class="text-dark">Jurnal Harian</p>
                        <p class="text-dark"> <h6>Jurnal Harian</h6></p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="" style="text-decoration: none">
                <div class="card box">
                        <img src="{{ asset('images/dashboard.png') }}" class="card-img-top" alt="" >
                    <div class="card-body">
                        <p class="text-dark">Kelompok Prakerin</p>
                        <p class="text-dark"> <h6>Kelompok Prakerin</h6></p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="" style="text-decoration: none">
                <div class="card box">
                        <img src="{{ asset('images/dashboard.png') }}" class="card-img-top" alt="" >
                    <div class="card-body">
                        <p class="text-dark">Laporan Prakerin</p>
                        <p class="text-dark"> <h6>Laporan Prakerin</h6></p>
                    </div>
                </div>
                </a>
            </div>
            @endif
        @else
            ''
        @endif
        </div>
        </div>
        {{-- itesmashboard end --}}

</div>
@endsection
@push('script')

@endpush
