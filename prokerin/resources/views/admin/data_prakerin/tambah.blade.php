@extends('template.master')
@push('link')
<style>
  .container{
          position: relative;
  } 

</style>
@endpush
@section('title', 'Prakerin | Data Prakerin')
@section('judul', 'DATA PRAKERIN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-th"></i>>DATA PRAKERIN</div>
@endsection
@section('main')
<div class="card mt-5">
    <div class="container text-center mt-5 mb-3 ml-1" >
        <h3>Tambah data Prakerin</h3>
    </div>
<div class="container">
<form action="">


<div class="row mt-3 ml-4 ">   
        <div class="col-6  kanan">
        <!-- perusa -->
        <div class="form-group col-lg-10 ">
        <label for="">Nama Perusahaan</label>    
        <input class="form-control" type="text" placeholder="nama perusahaan" aria-label="default input example">
        </div>
        <!-- guru -->
        <div class="form-group col-lg-10 ">
        <label for="">Nama Guru</label>    
        <input class="form-control" type="text" placeholder="nama guru" aria-label="default input example">
        </div>
        <!-- siswa -->
        <div class="form-group col-lg-10 ">
        <label for="">Nama Siswa</label>    
        <input class="form-control" type="text" placeholder="nama siswa" aria-label="default input example">
        </div>
        <!-- kelas -->
        <div class="form-group col-lg-10 ">
        <label>kelas</label>
        <select  class="form-control  name="jurusan" id="">
        <option value="">Pilih kelas</option>
        <option value="">XI </option>
        </select>
        <div class="invalid_feedback"></div>
        </div>
        <!-- jurusan -->
        <div class="form-group col-lg-10 ">
        <label>Jurusan</label>
        <select  class="form-control  name="jurusan" id="">
        <option value="">Pilih Jurusan</option>
        <option value="">RPL 1</option>
        </select>
        <div class="invalid_feedback"></div>
        </div>

        
    
    
    </div>
    <div class="col-6">
        <label>Nama Perusahaan</label>
        <div class="form-group col-lg-12 ">
        <input class="form-control" type="text" placeholder="Nama perusahaan" aria-label="default input example">
        </div>
        
        <label for="">Tanggal Mulai</label>
        <div class="form-group col-lg-12  ">
        <input class="form-control" type="text" placeholder="mulai" aria-label="default input example">
        </div>

        <label for="">Tanggal Selesai</label>
        <div class="form-group col-lg-12 ">
        <input class="form-control" type="text" placeholder="selesai" aria-label="default input example">
        </div>

        <button type="button" class="btn btn-success ml-3"><i class="fas fa-check"></i>   submit</button>
        <button type="button" class="btn btn-danger"><i class="fas fa-times"></i>  Cancel</button>

        </div>

 </div>
</form>



</div>
@endsection
@push('script')

@endpush
