@extends('template.master')
@push('link')
    <style>
         .mtop{
        margin-top: -10px;
    }
    .pleft{
        padding-left: 15px;
    }
    .garis{
        height: 10px;
        width: auto;
        background-color: rgb(82, 82, 255);
    }
    .title{
        padding-top: 10px;
    }
    h5{
        color: rgb(82, 82, 255);
    }
    .title i{
        font-size: 20px;
        margin-left: 5px;
        margin-right: 5px;
    }
    </style>
@endpush
@section('title','Prakerin | Jurnal Harian')
@section('judul','JURNAL HARIAN')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> JURNAL HARIAN</div>

@endsection
@section('main')
<div>
    <div class="garis"></div>
    <div class="card-header">
        <h5 class="title"><i class="far fa-address-card"></i> Informasi Jurnal Harian</h5>
    </div>
    <div class="card">
    <div class="row">
        <div class="col-sm-8 mt-4">
            <div class="card-body" id="dataguru">
                <h5 class="card-title">Jurnal Harian</h5>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Nama Siswa</label>
                    <label class="form-label">: {{ $jurnal->siswa->nama_siswa }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Tanggal Pelaksanaan</label>
                    <label class="form-label">: {{ tanggal($jurnal->tanggal) }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Jam Masuk</label>
                    <label class="form-label">: {{ jam($jurnal->datang) }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Jam Pulang</label>
                    <label class="form-label">: {{ jam($jurnal->pulang) }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Kegiatan Harian</label>
                    <label class="form-label">: {{ $jurnal->kegiatan_harian }}</label>
                  </div>
                  <div style="margin-top: 40px; margin-bottom:40px;">
                    <a href="{{ route('jurnalH.index') }}" type="button" class="btn btn-danger "><i class="fas fa-backspace"></i>   Kembali</a>
                </div>
            </div>

    </div>
    </div>



</div>
@endsection
