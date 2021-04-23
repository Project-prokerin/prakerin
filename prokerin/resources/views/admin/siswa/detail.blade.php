@extends('template.master')
@push('link')
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
@section('title', 'Prakerin | Data siswa')
@section('judul', 'DATA SISWA')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i> DATA SISWA</div>
@endsection
@section('main')
<div>
    <div class="garis"></div>
    <div class="card-header">
        <h5 class="title"><i class="far fa-address-card"></i> Informasi Siswa</h5>
    </div>
    <div class="card">
        <div class="row">
            <div class="col-sm-4 mt-4">
                <div class="card-body">
                    <a class="btn btn-primary btn-sm mb-2" href="#datasiswa" role="button" style="width: 300px">
                        <div style="font-size: 15px;">
                            <i class="far fa-address-book mr-2" style="font-size: 15px;"></i>Data Siswa</div>
                    </a>
                    <a class="btn btn-primary btn-sm mb-2" href="#dataortu" role="button" style="width: 300px">
                        <div style="font-size: 15px;">
                            <i class="far fa-address-book mr-2" style="font-size: 15px;"></i>Data Orang Tua</div>
                    </a>
                    <a class="btn btn-primary btn-sm mb-2" href="#datasekolah" role="button" style="width: 300px">
                        <div style="font-size: 15px;">
                            <i class="far fa-address-book mr-2" style="font-size: 15px;"></i>Data Asal Sekolah</div>
                    </a>
                    <a class="btn btn-danger btn-sm mb-2" href="{{ route('siswa.index') }}" role="button" style="width: 300px">
                        <div style="font-size: 15px;">
                            <i class="far fa-arrow-alt-circle-left mr-2" style="font-size: 15px;"></i></i>kembali</div>
                    </a>
                </div>
            </div>
            <div class="col-sm-8 mt-4">
                <div class="card-body" id="datasiswa">
                    <h5 class="card-title">Data Siswa</h5>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Nama Siswa</label>
                        <label class="form-label">: {{ $siswa->nama_siswa }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">NIPD</label>
                        <label class="form-label">: {{ $siswa->nipd }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Jenis Kelamin</label>
                        <label class="form-label">: {{ $siswa->jk }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Tempat Lahir</label>
                        <label class="form-label">: {{ $siswa->tempat_lahir }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Tanggal Lahir</label>
                        <label class="form-label">: {{ $siswa->tanggal_lahir->Isoformat('DD MMMM YYYY') }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">No Akte</label>
                        <label class="form-label">: {{ $siswa->no_akte }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">NIK</label>
                        <label class="form-label">: {{ $siswa->nik }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Agama</label>
                        <label class="form-label">: {{ $siswa->agama }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Alamat</label>
                        <label class="form-label">: {{ $siswa->alamat }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Tinggal Bersama</label>
                        <label class="form-label">: {{ $siswa->jenis_tinggal }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Trasnportasi</label>
                        <label class="form-label">: {{ $siswa->transportasi }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">No HP</label>
                        <label class="form-label">: {{ $siswa->no_hp }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Berat Badan</label>
                        <label class="form-label">: {{ $siswa->bb }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Anak Ke-</label>
                        <label class="form-label">: {{ $siswa->anak_ke }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Jumlah Saudara</label>
                        <label class="form-label">: {{ $siswa->jmlh_saudara }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Kebutuhan Khusus</label>
                        <label class="form-label">: {{ $siswa->kebutuhan_khusus }}</label>
                      </div>
                </div>
                <br><hr style="margin-right: 14px;"><br>
                <div class="card-body" id="dataortu">
                    <h5 class="card-title">Data Orang Tua</h5>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">No KK</label>
                        <label class="form-label">: {{ $siswa->orang_tua->nomor_kk }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">Status</label>
                        <label class="form-label">: {{ $siswa->orang_tua->status }}</label>
                      </div>
                      <br>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">NIK Ayah</label>
                        <label class="form-label">: {{ $siswa->orang_tua->nik_ayah }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">Nama Ayah</label>
                        <label class="form-label">: {{ $siswa->orang_tua->nama_ayah }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">Tanggal Lahir Ayah</label>
                        <label class="form-label">: {{ $siswa->orang_tua->tl_ayah->Isoformat('DD MMMM YYYY') }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">Pendidikan Ayah</label>
                        <label class="form-label">: {{ $siswa->orang_tua->pendidikan_ayah }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">Pekerjaan Ayah</label>
                        <label class="form-label">: {{ $siswa->orang_tua->pekerjaan_ayah }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">Penghasilan Ayah</label>
                        <label class="form-label">: {{ $siswa->orang_tua->penghasilan_ayah }}</label>
                      </div>
                      <br>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">NIK Ibu</label>
                        <label class="form-label">: {{ $siswa->orang_tua->nik_ibu }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">Nama Ibu</label>
                        <label class="form-label">: {{ $siswa->orang_tua->nama_ibu }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">Tanggal Lahir Ibu</label>
                        <label class="form-label">: {{ $siswa->orang_tua->tl_ibu }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">Pendidikan Ibu</label>
                        <label class="form-label">: {{ $siswa->orang_tua->pendidikan_ibu }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">Pekerjaan Ibu</label>
                        <label class="form-label">: {{ $siswa->orang_tua->pekerjaan_ibu }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">Penghasilan Ibu</label>
                        <label class="form-label">: {{ $siswa->orang_tua->pekerjaan_ibu }}</label>
                      </div>

                </div>
                <br><hr style="margin-right: 14px;"><br>
                <div class="card-body" id="datasekolah">
                    <h5 class="card-title">Asal Sekolah</h5>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">SKHUN</label>
                        <label class="form-label">: {{ $siswa->sekolah_asal->shkun }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">No Ijazah</label>
                        <label class="form-label">: {{ $siswa->sekolah_asal->no_ijazah }}</label>
                      </div>
                      <div class="row g-3 align-items-center">
                        <label class="form-label col-7">Asal Sekolah</label>
                        <label class="form-label">: {{ $siswa->sekolah_asal->asal_sekolah }}</label>
                      </div>
                </div>
                <br><hr style="margin-right: 14px;"><br>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')

@endpush
