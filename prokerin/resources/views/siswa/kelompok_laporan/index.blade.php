@extends('template.master')
@push('link')
<style>
 .header{
        text-align:center;
        margin-top:20px;
         margin-bottom:20px;
}


</style>
@endpush
@section('title', 'Prakerin | kelompok')
@section('judul', 'KELOMPOK LAPORAN')
@section('breadcrump')
        <div class="breadcrumb-item "> <a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"><i class="fas fa-user"></i> KELOMPOK LAPORAN</div>
@endsection
@section('main')
<div class="container">
<div class="card ">
        <div class="header " >
               <center> Anda belum masuk kelompok</center>
        </div>
       
        <table class="table table-bordered">
  <thead>
    <tr>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="col">Pembimbing</th>
      <td>-</td>
    
    </tr>
    <tr>
      <th scope="col">Judul Laporan</th>
      <td>-</td>
     
    </tr>
    <tr>
      <th scope="col">nama</th>
      <td>-</td>
     
    </tr>
    <tr>
      <th scope="col">nama</th>
      <td>-</td>
     
    </tr>
    <tr>
      <th scope="col">nama</th>
      <td>-</td>
     
    </tr>
    <tr>
      <th scope="col">nama</th>
      <td>-</td>
      
    </tr>
  </tbody>
</table>
        </div>
</div>
@endsection
@push('script')

@endpush

