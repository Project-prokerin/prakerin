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
@section('title', 'Prakerin | Data Guru')
@section('judul', 'DATA GURU')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> DATA GURU</div>
@endsection
@section('main')
<div class="card mt-5">
    <div class="container text-center mt-5 mb-3 ml-1" >
        <h3>Tambah Data Guru</h3>
    </div>

<div class="container">
<form action="">
<div class="row mt-3 ml-4 ">   
        <div class="col-6  kanan">
        <!-- no kelom -->
        <div class="form-group col-lg-10 ">
        <label for="">NIK Guru</label>    
        <input class="form-control" type="text" placeholder="NIK" aria-label="default input example">
        </div>

       
        <!-- gru bimbing -->
        <div class="form-group col-lg-10 ">
        <label for="">Nama</label>    
        <input class="form-control" type="text" placeholder="nama" aria-label="default input example">
        </div>
        <!-- jurusan -->
        <div class="form-group col-lg-10 ">
        <label>Jabatan</label>
        <select  class="form-control  name="jabatan" id="">
        <option value="">Pilih Jabatan</option>
        <option value="">Hubin</option>
        <option value="">Kaprog</option>
        <option value="">BKK</option>
        <option value="">Kejuruan</option>
        </select>
        <div class="invalid_feedback"></div>
        </div>

    
    </div>
    <div class="col-6">

        <div class="form-group col-lg-12 ">
        <label>Jurusan</label>
        <select  class="form-control  name="jurusan" id="">
        <option value="">Pilih Jurusan</option>
        <option value="">RPL</option>
        <option value="">MM</option>
        <option value="">TKJ</option>
        <option value="">TEI</option>
        <option value="">BC</option>
        </select>
        <div class="invalid_feedback"></div>
        </div>
        
       
        <div class="form-group col-lg-12  ">
        <label for="">No Hp</label>
        <input class="form-control" type="text" placeholder="no Hp" aria-label="default input example">
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
