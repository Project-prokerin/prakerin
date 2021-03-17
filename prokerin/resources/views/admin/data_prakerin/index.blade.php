@extends('template.master')
@push('link')
<style>
.card{
        height: 600px;
}.d-flex{
        width: 600px;
}.butan{
        margin-left: 660px;
        width: 150px;
}.buten{
        margin-left: 835px;
        position: absolute;
        width: 150px;
}.buton{
        margin-top: 20px;
        margin-left: 50px;
}.table{
        margin-top: 20px;
}       

</style>
@endpush
@section('title', 'Prakerin | Data Prakerin')
@section('judul', 'DATA PRAKERIN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-th"></i>>DATA PRAKERIN</div>
@endsection
@section('main')
<div class="card">

<!-- button tambah -->
<div class="buton">
<button type="button" class="btn btn-primary">Tambah Data <i class="fas fa-plus"></i></button>
<a href="http://"><button type="button" class="btn btn-success buten ">Export to Excel</button></a>
<a href=""><button type="button" class="btn btn-danger butan">Export to PDF</button></a>

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
