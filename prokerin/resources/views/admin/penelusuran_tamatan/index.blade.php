@extends('template.master')
@push('link')
<style>

</style>
@endpush
@section('title','Prakerin | Tamatan Penelusuran')
@section('judul','Tamatan Penelusuran')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> TAMATAN PENELUSURAN</div>
@endsection
@section('main')
<div class="row">
    <div class="col-12">
           @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ $message }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
      <div class="card">
        <div class="card-header">
          <h4>Data Tamatan Penelusuran</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive" id="">

            <table class="table table-striped" id="table9">
              <thead class="text-center">
                <tr>
                  <th>
                    No
                  </th>
                  <th>Nama</th>
                  <th>Tahun Lulus</th>
                  <th>Status</th>
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
<script src="{{ asset('assets/js/pages-admin/penelusuran_tamantan.js') }}" ></script>
@endpush
