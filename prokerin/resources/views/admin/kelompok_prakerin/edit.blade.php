@extends('template.master')
@push('link')
<style>

</style>
@endpush
@section('title', 'Prakerin | Data Perusahaan')
@section('judul', 'DATA PERUSAHAAN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> DATA PERUSAHAAN</div>
@endsection
@section('main')
<div class="card">
        <div class="container">
            <div class="card-body">
                <h5 style="padding-top: 10px;">Edit Data Kelompok Prakerin</h5>
            </div>
            <hr style="margin-top: -10px;">
            <form action="">
                <div class="row mt-3 ml-4 ">   
                        <div class="col-6  kanan">
                        <!-- no kelom -->
                        <div class="col-lg-10">
                        <label>No Kelompok</label>
                        <select  class="form-control"  name="kelompok" id="">
                            <option value="">1</option>
                            <option value="">2</option>
                        </select>
                        <div class="invalid_feedback"></div>
                        </div>
                
                       
                        <!-- gru bimbing -->
                        <div class="col-lg-10 mt-3 ">
                        <label>Guru Pembimbing</label>
                        <select  class="form-control"  name="jurusan" id="">
                            <option value="">Pak Tejo</option>
                            <option value="">Supro</option>
                        </select>
                        <div class="invalid_feedback"></div>
                        </div>
                        <!-- jurusan -->
                        <div class="col-lg-10 mt-3 ">
                        <label>Jurusan</label>
                        <select  class="form-control"  name="jurusan" id="">
                            <option value="">RPL 1</option>
                            <option value="">RPL 2</option>
                        </select>
                        <div class="invalid_feedback"></div>
                        </div>
                
                        
                        <div class="col-lg-10 mt-3 ">
                        <label for="">No telephon</label>    
                        <input class="form-control" type="text" placeholder="083896802804" aria-label="default input example">
                        </div>
                    
                    
                    
                    </div>
                    <div class="col-6">
                        <label>Daftar Nama Siswa</label>
                        <div class="form-group col-lg-12 ">
                        <input class="form-control" type="text" placeholder="Arif" aria-label="default input example" hidden>
                        {{-- or --}}
                        <select  class="form-control"  name="jurusan" id="">
                            <option value="">Adi</option>
                            <option value="">Budi</option>
                            <option value="">Alek</option>
                            <option value="">Arif</option>
                        </select>
                        </div>
                        
                       
                        <div class="form-group col-lg-12  ">
                        <input class="form-control" type="text" placeholder="Budi" aria-label="default input example">
                        {{-- <select  class="form-control"  name="jurusan" id="">
                            <option value="">Adi</option>
                            <option value="">Budi</option>
                            <option value="">Alek</option>
                            <option value="">Arif</option>
                        </select> --}}
                        </div>
                
                        
                        <div class="form-group col-lg-12 ">
                        <input class="form-control" type="text" placeholder="Adam" aria-label="default input example">
                        {{-- <select  class="form-control"  name="jurusan" id="">
                            <option value="">Adi</option>
                            <option value="">Budi</option>
                            <option value="">Alek</option>
                            <option value="">Arif</option>
                        </select> --}}
                        </div>
                
                        <div class="form-group col-lg-12 ">
                        <input class="form-control" type="text" placeholder="Adi" aria-label="default input example">
                        {{-- <select  class="form-control"  name="jurusan" id="">
                            <option value="">Adi</option>
                            <option value="">Budi</option>
                            <option value="">Alek</option>
                            <option value="">Arif</option>
                        </select> --}}
                        </div>
                        </div>
                
                 </div>
                </form>
                <!-- buton -->
                    <div class="buton">
                        <button type="button" class="btn btn-success ml-4"><i class="fas fa-check"></i>   submit</button>
                        <button type="button" class="btn btn-danger ml-3"><i class="fas fa-times"></i>  Cancel</button>
                    </div>
        </div>
    </div>
@endsection
@push('script')

@endpush
