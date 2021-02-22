@extends('template.master')
@push('link')
<style>
        .card{
               
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
<div class="card">

<div class="container pt-4 pb-4">
<table class="table table-bordered  table-striped table-hover ">
  <thead> 
   
  </thead>
  <tbody>
  <tr>
      <th scope="col">Nama</th>
      <th scope="col">-</th>
    </tr>
    <tr>
      <th scope="col">Status</th>
      <th scope="col">-</th>
    </tr>
    <tr>
      <th scope="col">Tanggal Mulai</th>
      <th scope="col">-</th>
    </tr>
    <tr>
      <th scope="col">Tanggal Selesai</th>
      <th scope="col">-</th>
    </tr>
    <tr>
      <th scope="col">Nama Perusahaan</th>
      <th scope="col">-</th>
    </tr>
    <tr>
      <th scope="col">Lokasi Perusahaan</th>
      <th scope="col">-</th>
    </tr>
  </tbody>
</table>
</div>

</div>
@endsection
@push('script')

@endpush
