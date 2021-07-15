@extends('template.master')
@push('link')
<style>
    .mtop {
        margin-top: -10px;
    }

    .pleft {
        padding-left: 15px;
    }

    .garis {
        height: 10px;
        width: auto;
        background-color: rgb(82, 82, 255);
    }

    .title {
        padding-top: 10px;
    }

    h5 {
        color: rgb(82, 82, 255);
    }

    .title i {
        font-size: 20px;
        margin-left: 5px;
        margin-right: 5px;
    }

</style>
@endpush
@section('title','Prakerin | Detail Tamatan Penelusuran')
@section('judul','Detail Tamatan Penelusuran')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> TAMATAN PENELUSURAN</div>
@endsection
@section('main')
<div style="">
    <div class="garis" style="width: 55%; margin: 0px auto;"></div>
    <div class="card-header" style="width: 55%; margin: 0px auto;">
        <h5 class="title"><i class="far fa-address-card"></i> Informasi Data Siswa Alumni</h5>
    </div>
    <div class="card" style="width: 55%; margin: 0px auto;">
        <div class="row">
            <div class="col-sm-8 mt-4">
                <div class="card-body" id="dataguru">
                    <h5 class="card-title mb-4" style="margin-top: -20px;">Data Siswa Alumni</h5>

                    <div class="" style="width: 32rem;">
                        <ul class="list-group list-group-flush">
                            <div class="row">
                                <label class="form-label col-4 pleft">Status</label>
                                <label class="form-label col-7">: {{ $pen->status }} </label>
                            </div>
                            <div class="row">
                                <label class="form-label col-4 pleft">Nama</label>
                                <label class="form-label col-7">: {{ $pen->alumni_siswa->nama }}</label>
                            </div>
                            <div class="row">
                                <label class="form-label col-4 pleft">Kelas</label>
                                <label class="form-label col-7">: {{ $pen->alumni_siswa->kelas }}</label>
                            </div>
                            <div class="row">
                                <label class="form-label col-4 pleft">Jurusan</label>
                                <label class="form-label col-7">: {{ $pen->alumni_siswa->jurusan }}</label>
                            </div>
                            <div class="row">
                                <label class="form-label col-4 pleft">Lulus Tahun</label>
                                <label class="form-label col-7">: {{ $pen->alumni_siswa->tahun_lulus }} </label>
                            </div>
                        </ul>
                    </div>
                @php
                $stat = $pen->status
                @endphp
                @if ($stat == "bekerja")
                <div class="" id="bekerja" style="width: 32rem;">
                    <ul class="list-group list-group-flush">
                        <div class="row">
                            <label class="form-label col-4 pleft">Nama Perusahaan</label>
                            <label class="form-label col-7">: {{ $pen->nama_perusahaan }} </label>
                        </div>
                        <div class="row">
                            <label class="form-label col-4 pleft">Alamat Perusahaan</label>
                            <label class="form-label col-7">: {{ $pen->alamat_perusahaan }} </label>
                        </div>
                        <div class="row">
                            <label class="form-label col-4 pleft">Tahun Kuliah</label>
                            <label class="form-label col-7">: {{ $pen->tahun_kuliah }} </label>
                        </div>
                    </ul>
                </div>
                @endif
                @if($stat == "kuliah")
                <div class="" id="kuliah" style="width: 32rem;">
                    <ul class="list-group list-group-flush">
                        <div class="row">
                            <label class="form-label col-4 pleft">Nama Kampus</label>
                            <label class="form-label col-7">: {{ $pen->nama_kampus }} </label>
                        </div>
                        <div class="row">
                            <label class="form-label col-4 pleft">Alamat Kampus</label>
                            <label class="form-label col-7">: {{ $pen->alamat_kampus }} </label>
                        </div>
                        <div class="row">
                            <label class="form-label col-4 pleft">Tahun Masuk</label>
                            <label class="form-label col-7">: {{ $pen->tahun_masuk_kuliah }} </label>
                        </div>
                    </ul>
                </div>
                @endif
                @if($stat == "wirausaha")
                <div class="" id="wirausaha" style="width: 32rem;">
                    <ul class="list-group list-group-flush">
                        <div class="row">
                            <label class="form-label col-4 pleft">Nama Usaha</label>
                            <label class="form-label col-7">: {{ $pen->nama_usaha }} </label>
                        </div>
                    </ul>
                </div>
                @endif
                @if($stat == 'Bekerja dan Kuliah')
                <div class="" id="bekerja" style="width: 32rem;">
                    <ul class="list-group list-group-flush">
                        <div class="row">
                            <label class="form-label col-4 pleft">Nama Perusahaan</label>
                            <label class="form-label col-7">: {{ $pen->nama_perusahaan }} </label>
                        </div>
                        <div class="row">
                            <label class="form-label col-4 pleft">Alamat Perusahaan</label>
                            <label class="form-label col-7">: {{ $pen->alamat_perusahaan }} </label>
                        </div>
                        <div class="row">
                            <label class="form-label col-4 pleft">Tahun Kuliah</label>
                            <label class="form-label col-7">: {{ $pen->tahun_kuliah }} </label>
                        </div>
                    </ul>
                </div>
                <div class="" id="kuliah" style="width: 32rem;">
                    <ul class="list-group list-group-flush">
                        <div class="row">
                            <label class="form-label col-4 pleft">Nama Kampus</label>
                            <label class="form-label col-7">: {{ $pen->nama_kampus }} </label>
                        </div>
                        <div class="row">
                            <label class="form-label col-4 pleft">Alamat Kampus</label>
                            <label class="form-label col-7">: {{ $pen->alamat_kampus }} </label>
                        </div>
                        <div class="row">
                            <label class="form-label col-4 pleft">Tahun Masuk</label>
                            <label class="form-label col-7">: {{ $pen->tahun_masuk_kuliah }} </label>
                        </div>
                    </ul>
                </div>
                @endif
                @if($stat == "Wirausaha dan Kuliah")
                <div class="" id="kuliah" style="width: 32rem;">
                    <ul class="list-group list-group-flush">
                        <div class="row">
                            <label class="form-label col-4 pleft">Nama Kampus</label>
                            <label class="form-label col-7">: {{ $pen->nama_kampus }} </label>
                        </div>
                        <div class="row">
                            <label class="form-label col-4 pleft">Alamat Kampus</label>
                            <label class="form-label col-7">: {{ $pen->alamat_kampus }} </label>
                        </div>
                        <div class="row">
                            <label class="form-label col-4 pleft">Tahun Masuk</label>
                            <label class="form-label col-7">: {{ $pen->tahun_masuk_kuliah }} </label>
                        </div>
                    </ul>
                </div>
                <div class="" id="wirausaha" style="width: 32rem;">
                    <ul class="list-group list-group-flush">
                        <div class="row">
                            <label class="form-label col-4 pleft">Nama Usaha</label>
                            <label class="form-label col-7">: {{ $pen->nama_usaha }} </label>
                        </div>
                    </ul>
                </div>
                @endif

                <div style="margin-top: 40px; margin-bottom:40px;">
                    <a href="{{ route('penelusuran_tamantan.index') }}" type="button" class="btn btn-danger "><i class="fas fa-backspace"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection
@push('script')
@endpush
