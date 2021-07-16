@extends('template.master')
@push('link')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
    a{
        color: blue;
    }
</style>

@endpush
@section('title', 'Prakerin | Nilai Data Prakerin')
@section('judul', 'Nilai Data Prakerin')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-newspaper"></i> NILAI DATA PRAKERIN</div>
@endsection
@section('main')
@if (session('success'))
    <div  class="alert alert-success alert-dismissible fade show" role="alert">
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
          <h4>Nilai Data Prakerin</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive" id="">
            <table class="table table-striped" id="">
              <thead class="text-center">
                @if (Auth::user()->role == 'admin' or Auth::user()->role == '')
                <tr>
                    <th>No</th>
                    <th>Siswa</th>
                    <th>Jurusan</th>
                    <th>Nilai Perusahaan</th>
                    <th>Aspek</th>
                    <th>Keterangan</th>
                    <th>Domain</th>
                    <th>Action</th>
                </tr>
                @endif
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
<script src="{{ asset('assets/js/pages-admin/pembekalan.js') }}" ></script>
@endpush
