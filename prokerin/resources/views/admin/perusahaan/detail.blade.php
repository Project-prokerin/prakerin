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
@section('title','Prakerin | Data Perusahaan')
@section('judul','DATA PERUSAHAAN')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> DATA PERUSAHAAN</div>
@endsection
@section('main')
<div>
    <div class="garis"></div>
    <div class="card-header">
        <h5 class="title"><i class="far fa-address-card"></i> Informasi Perusahaan</h5>
    </div>
    <div class="card">
        <div class="row">


            <div class="col-sm-4 mt-5" style="margin-left:40px;">
                <img src="https://awsimages.detik.net.id/community/media/visual/2016/01/07/4da80f4a-fe5e-4585-977d-5c3cae9e0ce2_169.jpg?w=700&q=90" style="width: 400px">
                <div style="margin-top: 40px; margin-bottom:40px;">
                    <a href="{{ route('perusahaan.index') }}" type="button" class="btn btn-danger "><i class="fas fa-backspace"></i>   Kembali</a>
                </div>
            </div>

            <div class="col-sm-6 mt-4">
                <div class="card-body" id="dataguru">
                    <h5 class="card-title">Data Perusahaan</h5>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Nama</label>
                        <label class="form-label">: </label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Bidang Usaha</label>
                        <label class="form-label">:</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Alamat</label>
                        <label class="form-label">: </label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Status Mou</label>
                        <label class="form-label">: </label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Tanggal Mou</label>
                        <label class="form-label">:</label>
                      </div>

                </div>
        </div>
    </div>



</div>
@endsection
