@extends('template.master')
@push('link')
<style>
    
</style>
@endpush
@section('title', 'Prakerin | Data Prakerin')
@section('judul', 'DATA PRAKERIN')
@section('breadcrump')
  <div class="breadcrumb-item ">
    <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>DASBOARD
    </a>
  </div>
  <div class="breadcrumb-item"> <i class="fas fa-th"></i>>DATA PRAKERIN</div>
@endsection
@section('main')
<div class="card">
  <div class="card-header">
    <div class="container text-center mt-5 mb-3 ml-1">
      <h3>Detail Data Prakerin</h3>
    </div>
  </div>
  <div class="card-body">
    <div class="container">
      <form action="" method="POST">
        <div class="row mt-3 ml-4 ">
          <div class="col-6  kanan">
              <!-- perusa -->
              <div class="mb-3 col-lg-10">
                  <label>Nama Perusahaan</label>
                  <div class="">
                    <p class="fs-4" style="font-size: 15px">Joko bambang yudhoyono</p>
                  </div>
              </div>

              <!-- guru -->
              <div class="mb-3 col-lg-10">
                  <label>Nama Guru</label>
                  <div class="">
                    <p class="fs-4" style="font-size: 15px">Joko bambang yudhoyono</p>
                  </div>
              </div>


              <!-- siswa -->
              <div class="mb-3 col-lg-10">
                  <label>Nama Siswa</label>
                  <div class="">
                    <p class="fs-4" style="font-size: 15px">Joko bambang yudhoyono</p>
                  </div>
              </div>


              <!-- kelas -->
              <div class="mb-3 col-lg-10 ">
                  <label>Kelas</label>
                  <div class="">
                    <p class="fs-4" style="font-size: 15px">Joko bambang yudhoyono</p>
                  </div>
              </div>
              <!-- jurusan -->
              <div class="mb-3 col-lg-10  mb-5">
                  <label>Jurusan</label>
                  <div class="">
                    <p class="fs-4" style="font-size: 15px">Joko bambang yudhoyono</p>
                  </div>
              </div>
          </div>
          <div class="col-6">
              <div class="mb-3 ">
                  <label>Tanggal Mulai</label>
                  <div class="">
                    <p class="fs-4" style="font-size: 15px">Joko bambang yudhoyono</p>
                  </div>
              </div>

              <div class="mb-5 ">
                  <label>Tanggal Selesai</label>
                  <div class="">
                    <p class="fs-4" style="font-size: 15px">Joko bambang yudhoyono</p>
                  </div>
              </div>

              <a href="{{route('data_prakerin.index')}}" type="submit" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@push('script')

@endpush
