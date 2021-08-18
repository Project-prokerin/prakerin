@extends('template.master')
@push('link')
<style>

.modal-backdrop {
        position: static !important;
    }
</style>
@endpush
@section('title', 'Prakerin | Data Perusahaan')
@section('judul', 'DATA PERUSAHAAN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> DATA PERUSAHAAN</div>
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

@if ($messege = Session::get('fail'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $messege }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(isset($errors) && $errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $error }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endforeach
@endif
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Perusahaan</h4>
        </div>
        <div class="card-body">

          <div class="table-responsive" id="mytable4">
            <table class="table table-striped" id="table12">
              <thead class="text-center">
                <tr>
                  <th>
                    No
                  </th>
                  <th>Nama</th>
                  <th>Bidang Usaha</th>
                  <th>Alamat</th>
                  <th>Status Mou</th>
                  <th>Tanggal Mou</th>
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



  {{--  model for import --}}
<div class="modal" id="importExcel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <form method="post" action="/admin/import/excel/perusahaan" enctype="multipart/form-data">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
              </div>
              <div class="modal-body">
                  @csrf
                  <label>Pilih file excel</label>
                  <div class="form-group">
                      <input type="file" name="file" required="required" id="file" accept=".xlsx, .xls, .csv">
                  </div>

              </div>
              <div class="modal-footer">
                  <button type="button" id="modal_close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Import</button>
              </div>
          </div>
      </form>
  </div>
</div>

  <span  id="role" data-role="{{ Auth::user()->role }}"></span>
@endsection
@push('script')
<script src="{{ asset('assets/js/pages-admin/perusahaan.js') }}" ></script>
@endpush
