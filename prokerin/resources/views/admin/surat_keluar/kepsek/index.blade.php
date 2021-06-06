@extends('template.master')
@push('link')
<style>
    #mytable2{
        overflow-x: hidden;
    }
.card{
        height: auto;
        }
        .buton{

            margin-left: 25px;
            margin-bottom: 10px;
        }
    a[href$=".pdf/download"]:before
        {
        content: "\f1c1";
        font-family: fontawesome;
        padding-right: 10px;
        }
</style>
@endpush
@section('title','Prakerin | Surat Penugasan')
@section('judul','Surat Penugasan')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i> SURAT MASUK</div>
@endsection
@section('main')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Surat Penugasan</h4>
        </div>
        <div class="card-body">

          <div class="table-responsive" id="mytable2">
            <table class="table table-striped" id="table-1">
              <thead class="text-center">
                <tr>
                  <th>
                    No
                  </th>
                  <th>Nama Surat</th>
                  <th>Nama guru</th>
                  <th>jabatan</th>
                  <th>status</th>
                  <th>tanggal surat</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<span class="d-none" id="role" data-role="{{Auth::user()->role}}"></span>
@endsection
@push('script')
<script src="{{ asset('assets/js/pages-admin/surat-keluar.js') }}" ></script>
@endpush
