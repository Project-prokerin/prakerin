@extends('template.master')
@push('link')
<style>
    .mtop{
        margin-top: -10px;
    }
    .pleft{
        padding-left: 15px;
    }
</style>
@endpush
@section('title', 'Prakerin | Data siswa')
@section('judul', 'DATA SISWA')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i> DATA SISWA</div>
@endsection
@section('main')
{{-- detail --}}
<div class="card">
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card-body">
                      <h5 class="card-title">Data Siswa</h5>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">Nama Siswa</label>
                          <label class="form-label">: Nur Firdaus</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">NIPD</label>
                          <label class="form-label">: 123456789</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">Jenis Kelamin</label>
                          <label class="form-label">: Laki Laki</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">Tempat Lahir</label>
                          <label class="form-label">: Depok</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">Tanggal Lahir</label>
                          <label class="form-label">: 2 Agustus 2021</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">No Akte</label>
                          <label class="form-label">: 123456789</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">NIK</label>
                          <label class="form-label">: 123456789</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">Agama</label>
                          <label class="form-label">: Islam</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">Alamat</label>
                          <label class="form-label">: Jl.Jeruk Limau3</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">Tinggal Bersama</label>
                          <label class="form-label">: Orang Tua</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">Trasnportasi</label>
                          <label class="form-label">: Motor</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">No HP</label>
                          <label class="form-label">: 083896802804</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">Berat Badan</label>
                          <label class="form-label">: Tinggi Badan</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">Anak Ke-</label>
                          <label class="form-label">: 1</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">Jumlah Saudara</label>
                          <label class="form-label">: 2</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7 pleft">Kebutuhan Khusus</label>
                          <label class="form-label">: -</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-body">
                      <h5 class="card-title">Data Orang Tua</h5>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-5">No KK</label>
                          <label class="form-label">: 1234567890123456</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7">Status</label>
                          <label class="form-label">: Kandung</label>
                        </div>
                        <br>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-5">NIK Ayah</label>
                          <label class="form-label">: 1234567890123456</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7">Nama Ayah</label>
                          <label class="form-label">: Dadang</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7">Tanggal Lahir Ayah</label>
                          <label class="form-label">: 2-12-2021</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7">Pendidikan Ayah</label>
                          <label class="form-label">: SMK</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7">Pekerjaan Ayah</label>
                          <label class="form-label">: WFH</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7">Penghasilan Ayah</label>
                          <label class="form-label">: Rp.10.000.000,-</label>
                        </div>
                        <br>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-5">NIK Ibu</label>
                          <label class="form-label">: 1234567890123456</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7">Nama Ibu</label>
                          <label class="form-label">: Minay</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7">Tanggal Lahir Ibu</label>
                          <label class="form-label">: 2-12-2021</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7">Pendidikan Ibu</label>
                          <label class="form-label">: SMK</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7">Pekerjaan Ibu</label>
                          <label class="form-label">: WFH</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-7">Penghasilan Ibu</label>
                          <label class="form-label">: Rp.10.000.000,-</label>
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-body">
                      <h5 class="card-title">Asal Sekolah</h5>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-5">SKHUN</label>
                          <label class="form-label">: 1234567890123456</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-5">No Ijazah</label>
                          <label class="form-label">: Kandung</label>
                        </div>
                        <div class="row g-3 align-items-center">
                          <label class="form-label col-5">Asal Sekolah</label>
                          <label class="form-label">: Dadang</label>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
{{-- detail --}}
@endsection
@push('script')

@endpush
