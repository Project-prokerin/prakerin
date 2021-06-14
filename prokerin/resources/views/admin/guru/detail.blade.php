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
@section('title','Prakerin | Data Guru')
@section('judul','DATA GURU')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> DATA GURU</div>

@endsection
@section('main')
<div>
    <div class="garis"></div>
    <div class="card-header">
        <h5 class="title"><i class="far fa-address-card"></i> Informasi Guru</h5>
    </div>
    <div class="card">
    <div class="row">
        <div class="col-sm-8 mt-4">
            <div class="card-body" id="dataguru">
                <h5 class="card-title">Data Guru</h5>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">NIK</label>
                    <label class="form-label">: {{ $guru->nik }}</label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Nama</label>
                    <label class="form-label">: {{ $guru->nama }}</label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Jabatan</label>
                    <label class="form-label">: {{ $guru->jabatan }}</label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Jurusan</label>
                    <label class="form-label">: {{ $guru->jurusan->jurusan }}</label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">No Telepon</label>
                    <label class="form-label">: {{ $guru->no_telp }}</label>
                  </div>
                  <div style="margin-top: 40px; margin-bottom:40px;">
                    <a href="{{ route('guru.index') }}" type="button" class="btn btn-danger "><i class="fas fa-backspace"></i>   Kembali</a>
                </div>
            </div>

    </div>
    </div>



</div>
@endsection
