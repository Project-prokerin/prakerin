@extends('template.master')
@push('link')
<link rel="stylesheet" href="{{asset('template/')}}/node_modules/select2/dist/css/select2.min.css">
<style>


</style>
@endpush
@section('title', 'Prakerin | Data Perusahaan')
@section('judul', 'JURNAL PRAKERIN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> JURNAL PRAKERIN</div>
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
          <h4>Data Perusahaan</h4>
        </div>
        <div class="card-body">

          <div class="table-responsive" id="mytable4">
            <table class="table table-striped" id="table8">
              <thead class="text-center">
                <tr>
                  <th>
                    No
                  </th>
                  <th>Nama Siswa</th>
                  <th>Nama Perusahaan</th>
                  <th>Tanggal Mulai</th>
                  <th>Jam Mulai</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                  <td></td>
                  <td></td>
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
<script src="{{ asset('assets/js/pages-admin/jurnalp.js') }}" ></script>
@endpush
