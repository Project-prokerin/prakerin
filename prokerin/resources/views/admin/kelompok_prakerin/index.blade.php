@extends('template.master')
@push('link')
<style>
.card{
        height: 600px;
    }
    .buton{
        margin-top: 30px;
        margin-left: 50px;
        margin-bottom: 30px;
    }
    .table{
        margin-top: 20px;
    }.buten{
      margin-left: 865px;
      position: absolute;
    }.butan{
      margin-left: 740px;
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
<div class="buton">  
    <a href="{{ route('kelompok.tambah') }}"><button type="button" class="btn btn-primary">Tambah Data <i class="fas fa-plus"></i></button></a>
    <a style="margin-left: -170px" href="/export/excel/data_prakerin"><button type="button" class="btn btn-success buten ">Export to Excel</button></a>
    <a href="/export/pdf/data_prakerin"><button type="button" class="btn btn-danger butan">Export to PDF</button></a>
</div>
    <!-- table -->
    <div class="container">
    <table class="table table-bordered text-center" id="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">No Kelompok</th>
        <th scope="col">Guru Pembimbing</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Perusahaan</th>
        <th scope="col">Actiom</th>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td>marker</td>
        <td>11</td>
        <td>RPL</td>
        <td>121212</td>
        <td>
        <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
        <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
        <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
        </td>
        </tr>
        <tr>
        <th scope="row">1</th>
        <td>marker</td>
        <td>11</td>
        <td>RPL</td>
        <td>121212</td>
        <td>
        <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
        <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
        <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
        </td>
        </tr>
        <tr>
        <th scope="row">1</th>
        <td>marker</td>
        <td>11</td>
        <td>RPL</td>
        <td>121212</td>
        <td>
        <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
        <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
        <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
        </td>
        </tr>
    </tbody>
    </table>
</div>
</div>
@endsection
@push('script')

@endpush
