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
@section('title','Prakerin | Detail Tamatan Penelusuran')
@section('judul','Detail Tamatan Penelusuran')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> TAMATAN PENELUSURAN</div>
@endsection
@section('main')
<div style="">
    <div class="garis" style="width: 50%; margin: 0px auto;"></div>
    <div class="card-header" style="width: 50%; margin: 0px auto;">
        <h5 class="title"><i class="far fa-address-card"></i> Informasi Data Siswa Alumni</h5>
    </div>
    <div class="card" style="width: 50%; margin: 0px auto;">
    <div class="row">
        <div class="col-sm-8 mt-4">
            <div class="card-body" id="dataguru">
                <h5 class="card-title mb-4" style="margin-top: -20px;">Data Siswa Alumni</h5>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Nama</label>
                    <label class="form-label">:</label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Kelas</label>
                    <label class="form-label">:</label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Jurusan</label>
                    <label class="form-label">: </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Lulus Tahun</label>
                    <label class="form-label">: </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Status</label>
                    <label class="form-label">:</label>
                  </div>
                  <div style="margin-top: 40px; margin-bottom:40px;">
                    <a href="" type="button" class="btn btn-danger "><i class="fas fa-backspace"></i>   Kembali</a>
                </div>
            </div>

    </div>
    </div>



</div>
@endsection
@push('script')
@endpush
