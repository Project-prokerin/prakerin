@extends('template.master')
@push('link')
<style>
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
    <div class="container">
        <div class="card-body">
            <h5 style="padding-top: 10px;">Detail Data Kelompok Prakerin</h5>
        </div>
        <hr style="margin-top: -10px;">
        <div>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Kelompok Prakerin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Kelompok 1</li>
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
            <tr>
                <th scope="row">1</th>
                <td>000000000</td>
                <td>M.Raditya</td>
                <td>RPL</td>
                <td>IX</td>
                <td>
                    <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </td>
            </tr>

            <tr>
                <th scope="row">1</th>
                <td>000000000</td>
                <td>M.Raditya</td>
                <td>RPL</td>
                <td>IX</td>
                <td>
                    <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </td>
            </tr>

            <tr>
                <th scope="row">1</th>
                <td>000000000</td>
                <td>M.Raditya</td>
                <td>RPL</td>
                <td>IX</td>
                <td>
                    <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </td>
            </tr>

            <tr>
                <th scope="row">1</th>
                <td>000000000</td>
                <td>M.Raditya</td>
                <td>RPL</td>
                <td>IX</td>
                <td>
                    <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
        </table>
        <div class="card-body">
            <button style="margin-top: 20px;" type="button" class="btn btn-danger">Kembali</button>
        </div>
    </div>
</div>
@endsection
@push('script')

@endpush
