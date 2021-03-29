@extends('template.master')
@push('link')

@endpush
@section('title', 'Prakerin | Data Pembekalan Magang')
@section('judul', 'DATA PEMBEKALAN MAGANG')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item">  <i class="fas fa-newspaper"></i> DATA PEMBEKALAN MAGANG</div>
@endsection
@section('main')
{{-- tambah --}}
<div class="card" style="width: 50%; margin:0px auto;">
  <div class="card-header">
    <h4 class="pt-2"><i class="fas fa-align-justify mr-2"></i>Tambah Data Pembekalan Magang Siswa</h4>
  </div>
  <div class="card-body">
    <form>
      <div class="mb-3">
        <label class="form-label">Nama Siswa</label>
        <input type="text" class="form-control form-control-sm">
      </div>
      <div>
        <div class="mb-3">
          <label class="form-label">Test WPT IQ</label>
        </div>
        <div class="mb-3 form-check" style="margin-top: -20px">
          <input type="checkbox" class="form-check-input" >
          <label class="form-check-label" >Sudah</label>
          <span class="m-5"></span>
          <input type="checkbox" class="form-check-input" >
          <label class="form-check-label" >Blum</label>
        </div>
      </div>
      <div>
        <div class="mb-3">
          <label class="form-label">Test Personality Interview</label>
        </div>
        <div class="mb-3 form-check" style="margin-top: -20px">
          <input type="checkbox" class="form-check-input" >
          <label class="form-check-label" >Sudah</label>
          <span class="m-5"></span>
          <input type="checkbox" class="form-check-input" >
          <label class="form-check-label" >Blum</label>
        </div>
      </div>
      <div>
        <div class="mb-3">
          <label class="form-label">Test Soft Skill</label>
        </div>
        <div class="mb-3 form-check" style="margin-top: -20px">
          <input type="checkbox" class="form-check-input" >
          <label class="form-check-label" >Sudah</label>
          <span class="m-5"></span>
          <input type="checkbox" class="form-check-input" >
          <label class="form-check-label" >Blum</label>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Portfolio</label>
        <input type="text" class="form-control form-control-sm">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
{{-- tambah --}}
@endsection
@push('script')

@endpush
