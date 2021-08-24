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
@section('title', 'Prakerin |   Kelompok Prakerin')
@section('judul', ' KELOMPOK PRAKERIN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> Kelompok Prakerin</div>
@endsection
@section('main')
<div class="card">
    <div class="garis"></div>
        <div class="card-header">
            <h5 class="title"><i class="far fa-address-card"></i> Informasi Kelompok</h5>
        </div>
    <div class="container">
        <hr style="margin-top: -10px;">
        <div>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Kelompok Prakerin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Kelompok {{$kelompok_laporan[0]->no}}</li>
                </ol>
              </nav>
        </div>
        <table class="table table-bordered text-center" id="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">NIPD</th>
            <th scope="col">Nama</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Kelas</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
           @foreach ($kelompok_laporan as $kel)
           <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$kel->siswa->nipd}}</td>
            <td>{{$kel->siswa->nama_siswa}}</td>
            <td>{{$kel->siswa->jurusan}}</td>
            <td>{{$kel->siswa->kelas}}</td>
            <td>
                <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                {{-- <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button> --}}
            </td>
        </tr>
           @endforeach

        </tbody>
        </table>
        <div class="card-body">
            <a href="{{ route('kelompok.index') }}" type="button" class="btn btn-danger "><i class="fas fa-backspace"></i>   Kembali</a>
        </div>
    </div>
</div>
@endsection
@push('script')

@endpush
