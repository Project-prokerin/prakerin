@extends('template.master')
@push('link')
<link rel="stylesheet" href="{{asset('template/')}}/node_modules/select2/dist/css/select2.min.css">
<style>
  .mtop{
        margin-top: -10px;
    }
    .pleft{
        padding-left: 15px;
    }
    .garis{
        height: 10px;
        width: auto;
        background-color: rgb(82, 82, 255);
    }
    .title{
        padding-top: 10px;
    }
    h5{
        color: rgb(82, 82, 255);
    }
    .title i{
        font-size: 20px;
        margin-left: 5px;
        margin-right: 5px;
    }

</style>
@endpush
@section('title', 'Prakerin | Data Perusahaan')
@section('judul', 'JURNAL PRAKERIN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> JURNAL PRAKERIN</div>
@endsection
@section('main')
<div>
    <div class="garis"></div>
    <div class="card-header">
        <h5 class="title"><i class="far fa-address-card"></i> Jurnal Prakerin</h5>
    </div>
    <div class="card">
    <div class="row">
        <div class="col-sm-8 mt-2">
            <div class="card-body" id="jurnalpra">
                <h5 class="card-title">Data Jurnal</h5>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Mess</label>
                    <label class="form-label">: {{ ($jurnal->fasilitas_prakerin->mess == "iya") ? "Sudah" : "Belum"  }}</label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Makan Siang</label>
                    <label class="form-label">: {{ ($jurnal->fasilitas_prakerin->makan_siang == "iya") ? "Sudah" : "Belum" }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Bus Antar Jemput</label>
                    <label class="form-label">: {{ ($jurnal->fasilitas_prakerin->buss_antar_jemput == "iya") ? "Sudah" : "Belum" }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Intensif</label>
                    <label class="form-label">: {{ ($jurnal->fasilitas_prakerin->intensif == "iya") ? "Sudah" : "Belum" }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Kompetensi Dasar</label>
                    <label class="form-label">: {{ $jurnal->kompetisi_dasar }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Topik Pekerjaaan</label>
                    <label class="form-label">: {{ $jurnal->topik_pekerjaan }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Nama Siswa</label>
                    <label class="form-label">: {{ $jurnal->siswa->nama_siswa }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Hari Pelaksanaan</label>
                    <label class="form-label">: {{ tanggal($jurnal->hari_pelaksanaan) }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Jam Masuk</label>
                    <label class="form-label">: {{ jam($jurnal->jam_masuk) }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Jam Istirahat</label>
                    <label class="form-label">: {{ jam($jurnal->jam_istirahat) }} </label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Jam Pulang</label>
                    <label class="form-label">: {{ jam($jurnal->jam_pulang) }} </label>
                  </div>
                  <div style="margin-top: 40px; margin-bottom:40px;">
                    <a href="{{ route('jurnal.index') }}" type="button" class="btn btn-danger "><i class="fas fa-backspace"></i>   Kembali</a>
                </div>
            </div>

    </div>
    </div>



</div>
@endsection
@push('script')

@endpush
