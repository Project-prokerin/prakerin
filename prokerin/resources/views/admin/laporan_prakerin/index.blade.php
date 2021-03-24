@extends('template.master')
@push('link')
<style>
        .card{
                height: 1000px;
        }
        .buton{
            margin-top: 10px;
            margin-left: 50px;
            margin-bottom: 30px;
        }
        .table{
                margin-top: 20px;
        }

</style>
@endpush
@section('title', 'Prakerin | Data Perusahaan')
@section('judul', 'DATA PERUSAHAAN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> DATA PERUSAHAAN</div>
@endsection
@section('main')
<div class="card">
        <div class="buton">

    </div> 
        <!-- table -->
        <div class="container" >
      

        
        <div class="buton">
            <a href="{{ route('data_prakerin.tambah') }}"class="btn btn-primary"> Tambah Data <i class="fas fa-plus"></i></button></a>
        </div>
        <form class="d-flex flex-row-reverse mr-5" style="margin-top: -66px;">
            <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            <input class="form-control ml-3" type="search" placeholder="Search" aria-label="Search" id="search" style="width: 200px;">
            <div>
                <a href="/export/pdf/data_prakerin"class="btn btn-danger "> Export to PDF</a>
            </div>
            &nbsp;&nbsp;&nbsp;
            <div>
                <a href="/export/excel/data_prakerin"class="btn btn-success "> Export to Excel</a>
            </div>
        </form>
        <br>
      
        <table class="table table-bordered text-center" id="table">
        <thead>
            <tr>
            <th scope="0">No</th>
            <th scope="col">Judul Laporan</th>
            <th scope="col">Nama Perusahaan</th>
            <th scope="col">Alamat Perusahaan</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

             <tr>
            <th scope="row">1</th>
            <td>marker</td>
            <td>11</td>
            <td>RPL</td>
            <td>
            <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
            <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
            <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </td>
            </tr> 

        </tbody>
        </table>
        <!-- tutup table -->
        </div>
@endsection
@push('script')

@endpush
