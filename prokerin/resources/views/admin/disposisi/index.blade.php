@extends('template.master')
@push('link')
<style>
     #mytable5{
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
@section('title','Prakerin | Disposisi')
@section('judul','Disposisi')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i> DISPOSISI</div>
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
          <h4>Data Disposisi</h4>
        </div>
        <div class="card-body">

          <div class="table-responsive" id="mytable5">
            <table class="table table-striped" id="table-6">
              <thead class="text-center">
                <tr>
                  <th>
                    No
                  </th>
                  <th>Keterangan Disposisi</th>
                  <th>Pokja Tujuan</th>
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

                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<span class="d-none" id="role">{{ Auth::user()->role }}</span>
@endsection
@push('script')
<script src="{{ asset('assets/js/pages-admin/disposisi.js') }}" ></script>
@endpush
