@extends('template.master')
@push('link')
<style>
#inputState{
    width: 300px;
    height: 40px;
}.card{
    height: 600px;
}.kanan{
    margin-left: 40x;
}.buton{
 margin-left: 900px;
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
<div class="card mt-5">
    <div class="container text-center mt-5 mb-3 ml-1" >
        <h3>Tambah kelompok</h3>
    </div>

<div class="container">
<form action="">
<div class="row mt-3 ml-4 ">   
        <div class="col-6  kanan">
        <!-- no kelom -->
        <div class="form-group col-lg-10">
        <label>No Kelompok</label>
        <select  class="form-control"  name="kelompok" id="">
        <option value="">Pilih Nomor</option>
        <option value="">1</option>
        </select>
        <div class="invalid_feedback"></div>
        </div>

       
        <!-- gru bimbing -->
        <div class="form-group col-lg-10 ">
        <label>Guru Pembimbing</label>
        <select  class="form-control  name="jurusan" id="">
        <option value="">Pilih guru</option>
        <option value="">Supro</option>
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

        
        <div class="form-group col-lg-10 ">
        <label for="">No telephon</label>    
        <input class="form-control" type="text" placeholder="no tlp" aria-label="default input example">
        </div>
    
    
    
    </div>
    <div class="col-6">
        <label>Daftar Nama Siswa</label>
        <div class="form-group col-lg-12 ">
        <input class="form-control" type="text" placeholder="Nama Siswa" aria-label="default input example">
        </div>
        
       
        <div class="form-group col-lg-12  ">
        <input class="form-control" type="text" placeholder="Nama Siswa" aria-label="default input example">
        </div>

        
        <div class="form-group col-lg-12 ">
        <input class="form-control" type="text" placeholder="Nama Siswa" aria-label="default input example">
        </div>

        <div class="form-group col-lg-12 ">
        <input class="form-control" type="text" placeholder="Nama Siswa" aria-label="default input example">
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
