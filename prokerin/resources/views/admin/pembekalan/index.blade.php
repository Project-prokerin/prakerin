@extends('template.master')
@push('link')
<style>
    .card{
        height: auto;
    }
    .buton{
        margin-top: 30px;
        margin-left: 50px;
        margin-bottom: 30px;
        width: 40%;
    }
    .table{
        margin-top: 20px;
    }
</style>
@endpush
@section('title', 'Prakerin | Data Pembekalan Magang')
@section('judul', 'DATA PEMBEKALAN MAGANG')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item">  <i class="fas fa-newspaper"></i> DATA PEMBEKALAN MAGANG</div>
@endsection
@section('main')
<div class="card">
  <div class="buton" style="z-index: 2;">  
      <a href=""><button type="button" class="btn btn-primary rounded-pill">Tambah Data <i class="fas fa-plus"></i></button></a>
  </div>
  <form class="d-flex flex-row-reverse mr-5" style="margin-top: -66px;">
      <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width: 200px;">
      <div>
          <a href="/export/pdf/data_prakerin"><button type="button" class="btn btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i>  PDF</button></a>
      </div>
      <div>
          <a href="/export/excel/data_prakerin"><button type="button" class="btn btn-success mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i>  Excel</button></a>
      </div>
  </form>

      <!-- table -->
      <div class="container">
      <table class="table table-bordered text-center" id="table">
      <thead>
          <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Test WPT IQ</th>
              <th scope="col">Test PI</th>
              <th scope="col">Test Soft Skill</th>
              <th scope="col">Portfolio</th>
              <th scope="col">Action</th>

          </tr>
      </thead>
      <tbody>
          <tr>
              <th scope="row">1</th>
              <td>marker</td>
              <td>Sudah</td>
              <td>Belum</td>
              <td>Belum</td>
              <td>dokumen.pdf</td>
              <td>
                  <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                  <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                  <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
              </td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>marker</td>
            <td>Sudah</td>
            <td>Belum</td>
            <td>Belum</td>
            <td>dokumen.pdf</td>
            <td>
                <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
      </tbody>
      </table>
      {{-- table --}}
      
      {{--  --}}
          <nav aria-label="Page navigation example">
              <ul class="pagination mt-5 mb-4 justify-content-right">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
          </nav>
      {{--  --}}
  </div>
  </div>






  






  {{--  --}}
  {{--  --}}











  {{--  --}}
  {{--  --}}

@endsection
@push('script')

@endpush
