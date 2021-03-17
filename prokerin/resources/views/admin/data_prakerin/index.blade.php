@extends('template.master')
@push('link')
<style>
.card{
        height: 600px;
}
.buton{
        margin-top: 20px;
        margin-left: 50px;
}
.table{
        margin-top: 20px;
}       

</style>
@endpush
@section('title', 'Prakerin | Data Prakerin')
@section('judul', 'DATA PRAKERIN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-th mr-2"></i>DATA PRAKERIN</div>
@endsection
@section('main')
<div class="card">

<!-- button tambah -->
<div class="buton">
<form class="row g-3">
  <div class="col-auto">
    <button type="button" class="btn btn-primary">Tambah Data <i class="fas fa-plus"></i></button>
  </div>
  <div class="col-auto" style="margin-left: 300px;">
    <input style="width: 140px" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
  </div>
  <div class="col-auto" style="margin-left: -30px;">
    <button class="form-control btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
  </div>
  <div class="col-auto">
    <a href="http://" class="btn btn-success mr-4">Export to Excel</a>
  </div>
  <div class="col-auto" style="margin-left: -20px;">
    <a href="" class="btn btn-danger mr-5">Export to PDF</a>
  </div>
</form>
</div>

<!-- table -->
<div class="container">
<table class="table table-bordered text-center">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Kelas</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Tgl Mulai</th>
      <th scope="col">Tgl Selesai</th>
      <th scope="col">perusahaan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>marker</td>
      <td>11</td>
      <td>RPL</td>
      <td>121212</td>
      <td>121212</td>
      <td>Telkom</td>
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
      <td>121212</td>
      <td>Telkom</td>
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
      <td>121212</td>
      <td>Telkom</td>
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


</div>
@endsection
@push('script')

@endpush
