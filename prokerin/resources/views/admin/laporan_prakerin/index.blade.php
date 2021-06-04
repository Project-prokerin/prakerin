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
@section('title', 'Prakerin | LAPORAN PRAKERIN')
@section('judul', 'LAPORAN PRAKERIN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> LAPORAN PRAKERIN</div>
@endsection
@section('main')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('fail'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('fail') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
@endif
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Laporan Prakerin</h4>
        </div>
        <div class="card-body">

          <div class="table-responsive" id="mytable4">
            <table class="table table-striped" id="table16">
              <thead class="text-center">
                <tr>
                  <th>
                    No
                  </th>
                  <th>Judul Laporan</th>
                  <th>Nama Perusahaan</th>
                  <th>Alamat Perusahaan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                  <td>
                    1
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('script')
<script src="{{ asset('assets/js/pages-admin/laporan.js') }}" ></script>

@endpush
