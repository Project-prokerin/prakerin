@extends('template.master')
@push('link')
<style>
    *{
        font-family: sans-serif;
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
        height: 200px;
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
<div class="" >
<div class="container-fluid text-center H-100 mb-3  content" >
    <h3 class="ml-3" style="margin-top: 70px">PRAKERIN SMK TARUNA BHAKTI</h3>
    <h6 class="ml-3 mb-5">Praktek Kerja Industri 2021-2022</h6>
</div>
{{--  --}}

{{-- itesmashboard --}}
<div class="container-fluid mt-4">
<div class="row">
    <div class="col-sm-4">
        <a href="{{ route('user.perusahaan') }}" style="text-decoration: none">
        <div class="card"  >
                <img src="{{ asset('login/photos/dashboard.png') }}" class="card-img-top" alt="" >
            <div class="card-body">
                <p class="text-dark">List Perusahaan</p>
                <p class="text-dark"> <h6>List Perusahaan</h6></p>
            </div>
        </div>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="{{ route('user.pembekalan') }}"   style="text-decoration: none">
        <div class="card" >
                <img src="{{ asset('login/photos/dashboard.png') }}" class="card-img-top"  alt="" >
            <div class="card-body">
                <p class="text-dark">Pembekalan Magang</p>
                <p class="text-dark"> <h6>Pembekalan Magang</h6></p>
            </div>
        </div>
        </a>
    </div>
    <div class="col-sm-4">
    <a href="{{ route('user.status') }}"  style="text-decoration: none">
        <div class="card" >
                <img src="{{ asset('login/photos/dashboard.png') }}" class="card-img-top" alt="" >
            <div class="card-body">
                <p class="text-dark">Status Magang</p>
                <p class="text-dark"><h6>Status Magang</h6></p>
            </div>
        </div>
    </a>
    </div>
    <div class="col-sm-4">
    <a href="{{ route('user.jurnal') }}"  style="text-decoration: none">
        <div class="card"  >
                <img src="{{ asset('login/photos/dashboard.png') }}"  class="card-img-top" alt="" >
            <div class="card-body">
                <p class="text-dark">Jurnal Prakerin</p>
                <p class="text-dark"><h6>Jurnal Prakerin</h6></p>
            </div>
        </div>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="{{ route('user.jurnalH') }}"   style="text-decoration: none">
        <div class="card">
                <img src="{{ asset('login/photos/dashboard.png') }}"  class="card-img-top" alt="" >
            <div class="card-body">
                <p class="text-dark">Jurnal Harian</p>
                <p class="text-dark"><h6>Jurnal Harian</h6></p>
            </div>
        </div>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="{{ route('user.kelompok_laporan') }}"  style="text-decoration: none">
        <div class="card" >
                <img src="{{ asset('login/photos/dashboard.png') }}"  class="card-img-top" alt="" >
            <div class="card-body">
                <p class="text-dark">Kelompok Harian</p>
                <p class="text-dark"><h6>Kelompok Harian</h6></p>
            </div>
        </div>
        </a>
    </div>
</div>
</div>
{{-- itesmashboard end --}}
</div>
@endsection
@push('script')
<script>
    // jangan di apa2 apain
    $.ajax({
        url:"{{ route('siswa.index') }}",
        type:'get',
        success: function (response) {
            // var i;
            // len = response.user;
            // for (i = 0; i < len.length; i++) {
            // text = '<p>'+response.user[i].username+'</p>';
            //     $('.p').append(text);
            // }
        },
        eror: function (eror){
            console.log('eror')
        }
    });
</script>
@endpush
