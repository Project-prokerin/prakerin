@extends('template.master')
@push('link')
<style>
/* .card{
    width: 1000px;
    height: 600px; */
.header{
     text-align:center;   
}
@media screen and (max-width:413px){

.card{
  width: auto;
  float: none;
}
{
  width: auto;
  float: none;
}
}
</style>
@endpush
@section('title', 'Prakerin | Pembekalan')
@section('judul', 'PEMBEKALAN MAGANG')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-newspaper"></i> PEMBEKALAN MAGANG</div>
@endsection
@section('main')

        <div class="card  ">
<div class="header border-bottom border-dark">
        
        <H1>Pembekalan Magang</H1>
      
</div>
<div class="row container mw-100 mx-auto ">
<table class="table table-bordered  table-hover">
  <thead>
    <tr>
      <th scope="col">Test</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Test WPT IQ</th>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Test Personality interview</th>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Test soft skill</th>
      <td></td>
    </tr>
    <tr>
      <th scope="row">File Portofolio</th>
      <td><input type="file"></td>
    </tr>
  </tbody>
</table>
        </div>
       
        </div>

@endsection
@push('script')

@endpush
