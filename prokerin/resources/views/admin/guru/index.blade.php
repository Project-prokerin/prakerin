@extends('template.master')
@push('link')

@endpush
@section('title', 'Prakerin | Data Guru')
@section('judul', 'DATA GURU')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i>DATA GURU</div>
@endsection
@section('main')
<div class="card">
        <div class="container">
            <div class="card-body">
                <div class="">  
                    <a href=""class="btn btn-primary rounded-pill"> Tambah Data <i class="fas fa-plus"></i></button></a>
                </div>
                <form class="d-flex flex-row-reverse" style="margin-top: -36px;">
                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                    <input class="form-control ml-3" type="search" placeholder="Search" aria-label="Search" style="width: 200px;">
                    <div>
                      <a href="/export/pdf/data_prakerin"class="btn btn-danger rounded-pill"> Export to PDF</a>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div>
                      <a href="/export/excel/data_prakerin"class="btn btn-success rounded-pill"> Export to Excel</a>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center" id="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">No Tlp</th>
                            <th scope="col">Action</th>
    
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>000000000</td>
                            <td>Nur Firdaus</td>
                            <td>Kaprog</td>
                            <td>RPL</td>
                            <td>0000000000</td>
                            <td>
                                <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                    </table>
    
                    {{--  --}}
                        <nav aria-label="Page navigation example">
                            <ul class="pagination mb-4 justify-content-right">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    {{--  --}}
            </div>
    </div>
    </div>
@endsection
@push('script')

@endpush
