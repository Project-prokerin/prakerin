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
<div class="card" >
<div class="container-fluid text-center H-100 mb-3  content" >
    <h3 class="ml-3" style="margin-top: 35px">PRAKERIN SMK TARUNA BHAKTI</h3>
    <h6 class="ml-3 mb-5">Praktek Kerja Industri 2021-2022</h6>
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
{{-- itesmashboard end --}}
</div>
@endsection
@push('script')
@endpush
