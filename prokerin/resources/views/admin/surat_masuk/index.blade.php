@extends('template.master')
@push('link')
<style>
     #mytable4{
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
@section('title','Prakerin | Surat Masuk')
@section('judul','Surat Masuk')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i> SURAT MASUK</div>
@endsection
@section('main')
<div class="row">
    <div class="col-12">
        @if ($message = Session::get('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ $message }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
      <div class="card">
        <div class="card-header">
          <h4>Data Surat Masuk</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive" id="mytable4">
            <table class="table table-striped" id="table-1">
              <thead class="text-center">
                <tr>
                @if(Auth::user()->role == "admin" or Auth::user()->role == "kepsek" or Auth::user()->role == "tu" or Auth::user()->role == "kaprok")
                    <th>
                    No
                  </th>
                  <th>Nama Surat</th>
                  <th>Untuk</th>
                  <th>Jabatan</th>
                  <th>Status</th>
                  <th>Disposisi</th>
                  <th>Action</th>
                @else
        <th>
                    No
                  </th>
                  <th>Nama Surat</th>
                  <th>dari</th>
                  <th>jabatan</th>
                  <th>status</th>
                  <th>Disposisi</th>
                  <th>Action</th>

                @endif

                </tr>
              </thead>
              <tbody class="text-center">
                {{-- <tr>
                  <td>
                    1
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                      <a href="" class="btn btn-primary"><i class="fas fa-search"></i></a>
                      <a href="#" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                  </td>
                </tr> --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if (Auth::user()->role == "admin" or Auth::user()->role == "kepsek" or Auth::user()->role == "tu" or Auth::user()->role == "kaprok" )@php $role = Auth::user()->role @endphp @else   @php $role = "pokja" @endphp @endif
<span class="d-none"id="role" data-role="{{ $role }}"></span>
@endsection
@push('script')
<script src="{{ asset('assets/js/pages-admin/surat-masuk.js') }}" ></script>
@endpush

