@extends('template.master')
@push('link')
<style>
  .header{
    text-align:center;
  }
  .teks{
    text-align: center;
    margin-top: -20px;
    height: 65px;
    width: 350px;
    color: white;
    background: #475bf0;
  }
  .teks h3{
    margin-top: 15px;
  }
  .file{
    margin-top: 15px;
  }
  
  @media screen and (max-width:413px){
  .card{
    width: auto;
    float: none;
  }
  }
</style>
@endpush
@section('title', 'Prakerin | Status Magang')
@section('judul', 'STATUS MAGANG')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-newspaper"></i> STATUS MAGANG</div>
@endsection
@section('main')
<div class="card mt-5">
  <div class="container text-center H-100 mb-3 teks" >
      <h3>Status Magang</h3>
  </div>
    <div class="container-fluid mt-4 mb-4">
      <div class="mw-100 mx-auto ">
        <table class="table table-bordered table-hover">
          <thead>
              <tr>
              </tr>
          </thead>
          <tbody>
              <tr>
                <th scope="row" style="width: 400px;" class="text-center">Nama</th>
                <td class="">Nur Firdaus M</td>
              </tr>
              <tr>
                <th scope="row" class="text-center">Status</th>
                <td>Belum Mulai Magang</td>
              </tr>
              <tr>
                <th scope="row" class="text-center">Tanggal Mulai</th>
                <td>25 Februari 2021</td>
              </tr>
              <tr>
                <th scope="row" class="text-center">Tanggal Selesai</th>
                <td>25 Februari 2021</td>
              </tr>
              <tr>
                <th scope="row" class="text-center">Nama Perusahaan</th>
                <td>Telkom.Net.Co</td>
              </tr>
              <tr>
                <th scope="row" class="text-center">Lokasi Perusahaan</th>
                <td>Depok</td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
@push('script')

@endpush
