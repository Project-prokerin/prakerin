@extends('template.master')
@push('link')
<link rel="stylesheet" href="{{ asset('template/') }}/node_modules/select2/dist/css/select2.min.css">
<style>
    .card-body .input  i {
        width: 40px;
        font-size: medium;
        padding-top: 5px;
    }
    .invalid-feedback{
        display: block;
    }
    h5{
        color: rgb(82, 82, 255);
    }
</style>
@endpush
@section('title', 'Prakerin | Tambah Data siswa')
@section('judul', 'DATA SISWA')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> DATA SISWA</div>
@endsection
@section('main')
{{-- tambah --}}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="">
                    <div class="" style="height: auto;">
                        <div class="container mt-2">
                            <h5 class="card-title">Data Siswa</h5>
                        </div>
                        <hr>
                        <div class="card-body">
                            <form action="{{ route('siswa.post') }}" method="POST" class="input">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nama Siswa</label>
                                    <div class="d-flex">
                                        <i class="fas fa-user border text-center"></i>
                                        <input type="text" name="nama_siswa"  class="form-control form-control-sm @error('nama_siswa') is-invalid @enderror" value="{{ old('nama_siswa') }}">
                                    </div>
                                    @error('nama_siswa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NIPD</label>
                                    <div class="d-flex">
                                        <i class="far fa-id-card border text-center"></i>
                                        <input type="text" name="nipd" class="form-control form-control-sm @error('nipd') is-invalid @enderror" value="{{ old('nipd') }}">
                                    </div>
                                    @error('nipd')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <div class="d-flex">
                                    <i class="fas fa-user border text-center pt-2"></i>
                                    <select class="form-control  form-control-sm select2 @error('kelas') is-invalid @enderror" name="kelas">
                                        <option value=" " selected>Pilih Kelas</option>
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->id }}" @if(old('kelas') === $item->id) selected @endif>{{ $item->level .' '. $item->jurusan->singkatan_jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('kelas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                @enderror
                                </div>
                                {{-- jenis kel --}}
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="jk" value="L" class="selectgroup-input"
                                                @if (old('jk') === 'L')
                                                    checked
                                                @endif>
                                            <span class="selectgroup-button">L</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="jk" value="P"
                                                class="selectgroup-input" @if (old('jk') === 'P')
                                                    checked
                                                @endif>
                                            <span class="selectgroup-button">P</span>
                                        </label>
                                    </div>
                                </div>
                                {{-- jenis kel --}}
                                <div class="mb-3">
                                    <label class="form-label">Tempat Lahir</label>
                                    <div class="d-flex">
                                        <i class="fas fa-hospital border text-center"></i>
                                        <input type="text"  name="tempat_lahir" class="form-control form-control-sm
                                        @error('tempat_lahir')
                                            is-invalid
                                        @enderror" value="{{ old('tempat_lahir') }}">
                                    </div>
                                    @error('tempat_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <div class="d-flex">
                                        <i class="fas fa-calendar-week border text-center"></i>
                                        <input type="date"  name="tanggal_lahir" class="form-control form-control-sm @error('tanggal_lahir')
                                            is-invalid
                                        @enderror" value="{{ old('tanggal_lahir') }}">
                                    </div>
                                    @error('tanggal_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <div class="d-flex">
                                        <i class="far fa-id-card border  text-center"></i>
                                        <input type="text"  name="nik"class="form-control form-control-sm
                                        @error('nik')
                                            is-invalid
                                        @enderror" value="{{ old('nik') }}">
                                    </div>
                                    @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Agama</label>
                                    <div class="d-flex">
                                        <i class="fas fa-pray border text-center"></i>
                                        <input type="text" class="form-control form-control-sm
                                        @error('agama')
                                            is-invalid
                                        @enderror"
                                        name="agama" value="{{ old('agama') }}">
                                    </div>
                                    @error('agama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <div class="d-flex">
                                        <i class="fas fa-map-marked-alt border text-center"></i>
                                        <input type="text" name="alamat"class="form-control form-control-sm
                                        @error('alamat')
                                            is-invalid
                                        @enderror" value="{{ old('alamat') }}">
                                    </div>
                                    @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Tinggal</label>
                                    <div class="d-flex">
                                        <i class="fas fa-user border text-center"></i>
                                        <input type="text" name="jenis_tinggal" class="form-control form-control-sm @error('jenis_tinggal') is-invalid @enderror"
                                        value="{{ old('jenis_tinggal') }}">
                                    </div>
                                    @error('jenis_tinggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Transportasi</label>
                                    <div class="d-flex">
                                        <i class="fas fa-car border text-center"></i>
                                        <input type="text" name="transportasi" class="form-control form-control-sm @error('transportasi') is-invalid @enderror"
                                        value="{{ old('transportasi') }}">
                                    </div>
                                    @error('transportasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div class="d-flex">
                                        <i class="far fa-envelope border text-center"></i>
                                        <input type="text" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No HP</label>
                                    <div class="d-flex">
                                        <i class="fas fa-phone border text-center"></i>
                                        <input type="text" name="no_hp" class="form-control form-control-sm @error('no_hp') is-invalid @enderror"
                                        value="{{ old('no_hp') }}">
                                    </div>
                                    @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Berat Badan</label>
                                    <div class="d-flex">
                                        <i class="fas fa-weight border text-center"></i>
                                        <input type="text" name="bb" class="form-control form-control-sm @error('bb') is-invalid @enderror"
                                        value="{{ old('bb') }}">
                                    </div>
                                    @error('bb')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tinggi Badan</label>
                                    <div class="d-flex">
                                        <i class="fas fa-ruler-vertical border text-center"></i>
                                        <input type="text" name="tb" class="form-control form-control-sm @error('tb') is-invalid @enderror"
                                        value="{{ old('tb') }}">
                                    </div>
                                    @error('tb')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Anak Ke-</label>
                                    <div class="d-flex">
                                        <i class="fas fa-user border text-center"></i>
                                        <input type="text" name="anak_ke" class="form-control form-control-sm @error('anak_ke') is-invalid @enderror"
                                        value="{{ old('anak_ke') }}">
                                    </div>
                                    @error('anak_ke')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jumlah Saudara</label>
                                    <div class="d-flex">
                                        <i class="fas fa-user border text-center"></i>
                                        <input type="text" name="jmlh_saudara" class="form-control form-control-sm @error('jmlh_saudara') is-invalid @enderror"
                                        value="{{ old('jmlh_saudara') }}">
                                    </div>
                                    @error('jmlh_saudara')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kebutuhan Khusus</label>
                                    <div class="d-flex">
                                        <i class="fas fa-user border text-center"></i>
                                        <input type="text" name="kebutuhan_khusus" class="form-control form-control-sm @error('kebutuhan_khusus') is-invalid @enderror"
                                        value="{{ old('kebutuhan_khusus') }}">
                                    </div>
                                    @error('kebutuhan_khusus')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No Akte</label>
                                    <div class="d-flex">
                                        <i class="far fa-id-card border text-center"></i>
                                        <input type="text" name="no_akte" class="form-control form-control-sm @error('no_akte') is-invalid @enderror"
                                        value="{{ old('no_akte') }}">
                                    </div>
                                    @error('no_akte')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  --}}
            {{--  --}}
            <div class="col-sm-6">
                <div class="">
                    <div class="" style="height: 690px;">
                        <div class="container mt-2">
                            <h5 class="card-title">Data Orang Tua Siswa</h5>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="input">
                                {{-- ayah --}}
                                <div class="mb-3">
                                    <label class="form-label">No KK</label>
                                    <div class="d-flex">
                                        <i class="far fa-id-card border text-center"></i>
                                        <input type="text" name="nomor_kk" class="form-control form-control-sm @error('nomor_kk') is-invalid @enderror"
                                        value="{{ old('nomor_kk') }}">
                                    </div>
                                    @error('nomor_kk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Ayah</label>
                                    <div class="d-flex">
                                        <i class="fas fa-user border text-center"></i>
                                        <input type="text" name="nama_ayah" class="form-control form-control-sm @error('nama_ayah') is-invalid @enderror"
                                        value="{{ old('nama_ayah') }}">
                                    </div>
                                    @error('nama_ayah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir Ayah</label>
                                    <div class="d-flex">
                                        <i class="fas fa-calendar-week border text-center"></i>
                                        <input type="date" name="tl_ayah" class="form-control form-control-sm @error('tl_ayah') is-invalid @enderror"
                                        value="{{ old('tl_ayah') }}">
                                    </div>
                                    @error('tl_ayah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pendidikan Ayah</label>
                                    <div class="d-flex">
                                        <i class="fas fa-user border text-center"></i>
                                        <input type="text" name="pendidikan_ayah" class="form-control form-control-sm @error('pendidikan_ayah') is-invalid @enderror"
                                        value="{{ old('pendidikan_ayah') }}">
                                    </div>
                                    @error('pendidikan_ayah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pekerjaan Ayah</label>
                                    <div class="d-flex">
                                        <i class="fas fa-user-tie border text-center"></i>
                                        <input type="text" name="pekerjaan_ayah" class="form-control form-control-sm @error('pekerjaan_ayah') is-invalid @enderror"
                                        value="{{ old('pekerjaan_ayah') }}">
                                    </div>
                                    @error('pekerjaan_ayah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Penghasilan Ayah</label>
                                    <div class="d-flex">
                                        <i class="fas fa-dollar-sign border text-center"></i>
                                        <input type="text" name="penghasilan_ayah" class="form-control duit form-control-sm @error('penghasilan_ayah') is-invalid @enderror"
                                        value="{{ old('penghasilan_ayah') }}">
                                    </div>
                                    @error('penghasilan_ayah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nik Ayah</label>
                                    <div class="d-flex">
                                        <i class="far fa-id-card border text-center"></i>
                                        <input type="text" name="nik_ayah" class="form-control form-control-sm @error('nik_ayah') is-invalid @enderror"
                                        value="{{ old('nik_ayah') }}">
                                    </div>
                                    @error('nik_ayah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- ayah --}}

                                {{-- ibu --}}
                                <div class="mb-3">
                                    <label class="form-label">Nama Ibu</label>
                                    <div class="d-flex">
                                        <i class="fas fa-user border text-center"></i>
                                        <input type="text" name="nama_ibu" class="form-control form-control-sm @error('nama_ibu') is-invalid @enderror"
                                        value="{{ old('nama_ibu') }}">
                                    </div>
                                    @error('nama_ibu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir Ibu</label>
                                    <div class="d-flex">
                                        <i class="fas fa-calendar-week border text-center"></i>
                                        <input type="date" name="tl_ibu" class="form-control form-control-sm @error('tl_ibu') is-invalid @enderror"
                                        value="{{ old('tl_ibu') }}">
                                    </div>
                                    @error('tl_ibu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pendidikan Ibu</label>
                                    <div class="d-flex">
                                        <i class="fas fa-user border text-center"></i>
                                        <input type="text" name="pendidikan_ibu" class="form-control form-control-sm @error('pendidikan_ibu') is-invalid @enderror"
                                        value="{{ old('pendidikan_ibu') }}">
                                    </div>
                                    @error('pendidikan_ibu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pekerjaan Ibu</label>
                                    <div class="d-flex">
                                        <i class="fas fa-user-tie border text-center"></i>
                                        <input type="text" name="pekerjaan_ibu" class="form-control form-control-sm @error('pekerjaan_ibu') is-invalid @enderror"
                                        value="{{ old('pekerjaan_ibu') }}">
                                    </div>
                                    @error('pekerjaan_ibu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Penghasilan Ibu</label>
                                    <div class="d-flex">
                                        <i class="fas fa-dollar-sign border text-center"></i>
                                        <input type="text" name="penghasilan_ibu" class="form-control duit form-control-sm @error('penghasilan_ibu') is-invalid @enderror"
                                        value="{{ old('penghasilan_ibu') }}">
                                    </div>
                                    @error('penghasilan_ibu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nik Ibu</label>
                                    <div class="d-flex">
                                        <i class="far fa-id-card border text-center"></i>
                                        <input type="text" name="nik_ibu" class="form-control form-control-sm @error('nik_ibu') is-invalid @enderror"
                                        value="{{ old('nik_ibu') }}">
                                    </div>
                                    @error('nik_ibu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- ibu --}}
                                {{-- status keluarga --}}
                                <div class="mb-3">
                                    <label class="form-label">Status Orang Tua</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="Kandung" class="selectgroup-input"
                                                @if (old('status') === 'Kandung')
                                                    checked
                                                @endif>
                                            <span class="selectgroup-button">Kandung</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="Wali" class="selectgroup-input"
                                            @if (old('status') === 'Wali')
                                                    checked
                                            @endif>
                                            <span class="selectgroup-button">Wali</span>
                                        </label>
                                    </div>
                                </div>
                                {{-- status keluarga --}}
                            </div>
                        </div>
                        <br>
                        <h5 class="card-title">Asal Sekolah</h5>
                        <hr>
                        <div class="card-body">
                            <div class="input">
                                {{-- asalsekolah --}}
                                <div class="mb-3">
                                    <label class="form-label">No Ijazah</label>
                                    <div class="d-flex">
                                        <i class="far fa-id-badge border text-center"></i>
                                        <input type="text" name="asal_sekolah" class="form-control form-control-sm @error('asal_sekolah') is-invalid @enderror"
                                        value="{{ old('asal_sekolah') }}">
                                    </div>
                                    @error('asal_sekolah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SKHUN</label>
                                    <div class="d-flex">
                                        <i class="far fa-id-badge border text-center"></i>
                                        <input type="text" name="no_ijazah" class="form-control form-control-sm @error('no_ijazah') is-invalid @enderror"
                                        value="{{ old('no_ijazah') }}">
                                    </div>
                                    @error('no_ijazah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Asal Sekolah</label>
                                    <div class="d-flex">
                                        <i class="fas fa-university border text-center"></i>
                                        <input type="text" name="shkun" class="form-control form-control-sm @error('shkun') is-invalid @enderror"
                                        value="{{ old('shkun') }}">
                                    </div>
                                    @error('shkun')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- asalsekolah --}}
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body mb-3">
        <div class="d-flex">
            <div>
                <button type="submit" class="btn btn-success rounded"><i
                        class="fas fa-check-square mr-2"></i>Submit</button>
            </div>
            </form>
            &nbsp;&nbsp;&nbsp;
            <div>
                <a href="{{ route('siswa.index') }}" class="btn btn-danger rounded"><i
                        class="fas fa-window-close mr-2"></i>Cancel</a>
            </div>
        </div>
    </div>
</div>

{{-- tambah --}}
@endsection
@push('script')
<script>
    $( ".duit" ).keyup(function() {
        var a = formatRupiah( $(this).val() , 'Rp. ');
        $(this).val(a);
    });
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    </script>
    <script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>

@endpush
