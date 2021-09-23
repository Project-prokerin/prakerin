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
@section('title', 'Prakerin | Data Prakerin')
@section('judul', 'DATA PRAKERIN')
@section('breadcrump')
  <div class="breadcrumb-item ">
    <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>DASBOARD
    </a>
  </div>
  <div class="breadcrumb-item"> <i class="fas fa-th"></i>>DATA PRAKERIN</div>
@endsection
@section('main')
<div>
    <div class="garis"></div>
    <div class="card-header">
        <h5 class="title"><i class="far fa-address-card"></i> Informasi Data Prakerin</h5>
    </div>
    <div class="card">
    <div class="row">
        <div class="col-sm-8 mt-4">
            <div class="card-body" id="">
                <h5 class="card-title">Data Prakerin</h5>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Nama Perusahaan</label>
                    <label class="form-label">: {{ $dataPrakerin->perusahaan->nama }}</label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Nama Guru</label>
                    <label class="form-label">: {{ $dataPrakerin->guru->nama }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Nama Siswa</label>
                    <label class="form-label">: {{ $dataPrakerin->nama }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Kelas</label>
                    <label class="form-label">: {{ $dataPrakerin->kelas->level }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Jurusan</label>
                    <label class="form-label">: {{ $dataPrakerin->kelas->jurusan->jurusan }}</label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Tanggal Mulai</label>
                    @if ($dataPrakerin->status === 'Magang')
                        <label class="form-label">: {{$dataPrakerin->tgl_mulai->isoFormat('dddd, D MMMM Y')}}</label>
                    @else
                    <label class="form-label">: </label>

                    @endif
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Tanggal Selesai</label>
                    @if ($dataPrakerin->status === 'Magang')
                        <label class="form-label">: {{$dataPrakerin->tgl_selesai->isoFormat('dddd, D MMMM Y')}}</label>
                    @else
                    <label class="form-label">:</label>

                    @endif
                  </div>
                  <div style="margin-top: 40px; margin-bottom:40px;">
                    <a href="{{ route('data_prakerin.index') }}" type="button" class="btn btn-danger "><i class="fas fa-backspace"></i>   Kembali</a>
                </div>
            </div>

    </div>
    </div>



</div>
@endsection
@push('script')

@endpush
