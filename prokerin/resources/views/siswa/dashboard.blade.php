@extends('template.master')
@push('link')
<style>
    .card-body h6,p{
        margin-top: -17px;
    }
    .content{
        text-align: center;
        padding-bottom: 20px;
    }
</style>
@endpush
@section('title', 'Prakerin | DASHBOARD')
@section('judul', 'DASHBOARD')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DASBOARD</div>
@endsection
@section('main')

{{-- content --}}
<div class="content">
    <h1>Prakerin SMK Taruna Bhakti</h1>
    <h5>Praktek Kerja Industri 2021-2022</h5>
</div>
{{--  --}}


{{-- itemdashboard --}}
<div class="row">
    <div class="col-sm-4">
        <div class="card" style="width: 20rem;">
            <a href="http://127.0.0.1:8000/user/perusahaan" class="pb-2 ml-2">
                <img src="http://127.0.0.1:8000/login/photos/dashboard.png" alt="" height="75">
            </a>
            <div class="card-body">
                <p class="">List Perusahaan</p>
                <a href="http://127.0.0.1:8000/user/perusahaan" class=""><h6>List Perusahaan</h6></a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card" style="width: 20rem;">
            <a href="http://127.0.0.1:8000/user/pembekalan" class="pb-2 ml-2">
                <img src="http://127.0.0.1:8000/login/photos/dashboard.png" alt="" height="75">
            </a>
            <div class="card-body">
                <p class="">Pembekalan Magang</p>
                <a href="http://127.0.0.1:8000/user/pembekalan" class=""><h6>Pembekalan Magang</h6></a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card" style="width: 20rem;">
            <a href="http://127.0.0.1:8000/user/status" class="pb-2 ml-2">
                <img src="http://127.0.0.1:8000/login/photos/dashboard.png" alt="" height="75">
            </a>
            <div class="card-body">
                <p class="">Status Magang</p>
                <a href="http://127.0.0.1:8000/user/status" class=""><h6>Status Magang</h6></a>
            </div>
        </div>
    </div>
</div>

<div class="row pt-4">
    <div class="col-sm-4">
        <div class="card" style="width: 20rem;">
            <a href="http://127.0.0.1:8000/user/jurnal" class="pb-2 ml-2">
                <img src="http://127.0.0.1:8000/login/photos/dashboard.png" alt="" height="75">
            </a>
            <div class="card-body">
                <p class="">Jurnal Prakerin</p>
                <a href="http://127.0.0.1:8000/user/jurnal" class=""><h6>Jurnal Prakerin</h6></a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card" style="width: 20rem;">
            <a href="http://127.0.0.1:8000/user/jurnalH" class="pb-2 ml-2">
                <img src="http://127.0.0.1:8000/login/photos/dashboard.png" alt="" height="75">
            </a>
            <div class="card-body">
                <p class="">Jurnal Harian</p>
                <a href="http://127.0.0.1:8000/user/jurnalH" class=""><h6>Jurnal Harian</h6></a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card" style="width: 20rem;">
            <a href="http://127.0.0.1:8000/user/kelompok_laporan" class="pb-2 ml-2">
                <img src="http://127.0.0.1:8000/login/photos/dashboard.png" alt="" height="75">
            </a>
            <div class="card-body">
                <a href="http://127.0.0.1:8000/user/kelompok_laporan" class=""><h6>Kelompok Harian</h6></a>
                <p class="">Kelompok Harian</p>
            </div>
        </div>
    </div>
</div>
{{-- itemdashboard end --}}

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
