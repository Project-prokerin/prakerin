@extends('template.master')
@push('link')
<style>
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
@section('title','Prakerin | Surat Masuk')
@section('judul','Surat Masuk')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i> SURAT MASUK</div>
@endsection
@section('main')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Surat Masuk</h4>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-striped" id="table-6">
              <thead class="text-center">
                <tr>
                  <th>
                    No
                  </th>
                  <th>Pokja Tujuan</th>
                  <th>Keterangan Disposisi</th>
                  <th>Detail Surat</th>
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
                  <td>
                      <a href="" class="btn btn-primary"><i class="fas fa-search"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<span class="d-none" id="nam" data-id="transaksi"></span>
@endsection
@push('script')
<script src="{{ asset('assets/js/pages-admin/surat-masuk-pokja.js') }}" ></script>
@endpush
