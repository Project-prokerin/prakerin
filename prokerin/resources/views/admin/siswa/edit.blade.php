@extends('template.master')
@push('link')
<style>
    .card-body .input .d-flex i {
        width: 40px;
        font-size: medium;
        padding-top: 5px;
    }

    .invalid-feedback {
        display: block;
    }

</style>
@endpush
@section('title', 'Prakerin | Data siswa')
@section('judul', 'DATA SISWA')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> DATA SISWA</div>
@endsection
@section('main')
{{-- edit --}}
<div class="card">
    <div class="card-body">
        <div class="card">
            <div class="">
                {{-- <div class="container mt-2"> --}}
                <h5 class="card-title">Data Siswa</h5>
                {{-- </div> --}}
                <hr>
                <div class="card-body">
                    <form action="{{ url("admin/siswa/update/$siswa->id") }}" method="POST" class="input">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Siswa</label>
                                    <div class="d-flex">
                                        <i class="fas fa-user border text-center"></i>
                                        <input type="text" name="nama_siswa"
                                            class="form-control @error('nama_siswa') is-invalid @enderror"
                                            value="{{ old('nama_siswa', $siswa->nama_siswa) }}">
                                    </div>
                                    @error('nama_siswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">NIPD</label>
                                    <div class="d-flex">
                                        <i class="far fa-id-card border text-center"></i>
                                        <input type="text" name="nipd"
                                            class="form-control @error('nipd') is-invalid @enderror"
                                            value="{{ old('nipd', $siswa->nipd) }}">
                                    </div>
                                    @error('nipd')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Kelas</label>
                                    <div class="d-flex">
                                        <i class="fas fa-user border text-center pt-2"></i>
                                        <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas"  placeholder="kelas" value="{{ old('kelas',$siswa->kelas) }}">
                                        {{-- <select class="form-control  select2 @error('kelas') is-invalid @enderror"
                                            name="kelas">
                                            <option value=" " selected>Pilih Kelas</option>
                                            @foreach ($kelas as $item)
                                            <option value="{{ $item->id }}" @if(old('kelas', $siswa->kelas->id)===$item->id) selected
                                                @endif>{{ $item->level .' '. $item->jurusan->singkatan_jurusan }}
                                            </option>
                                            @endforeach
                                        </select> --}}
                                    </div>
                                    @error('kelas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Jurusan</label>
                                    <div class="d-flex">
                                        <i class="fas fa-user border text-center pt-2"></i>
                                        <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="jurusan"  placeholder="jurusan" value="{{ old('jurusan',$siswa->jurusan) }}">
                                        {{-- <select class="form-control  select2 @error('jurusan') is-invalid @enderror"
                                            name="jurusan">
                                            <option value=" " selected>Pilih Kelas</option>
                                            @foreach ($jurusan as $item)
                                            <option value="{{ $item->id }}" @if(old('jurusan', $siswa->jurusan->id)===$item->id) selected
                                                @endif>{{ $item->level .' '. $item->jurusan->singkatan_jurusan }}
                                            </option>
                                            @endforeach
                                        </select> --}}
                                    </div>
                                    @error('jurusan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <label for="form-label" class="form-label">Nisn</label>
                                    <div class="d-flex">
                                        <i class="far fa-id-card border text-center pt-2"></i>
                                        <input type="text" class="form-control @error('nisn')
                                    is-invalid
                                @enderror" name="nisn" value="{{ old('nisn', $siswa->nisn) }}">

                                    </div>

                                    @error('nisn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tempat Lahir</label>
                                    <div class="d-flex">
                                        <i class="fas fa-hospital border text-center"></i>
                                        <input type="text" name="tempat_lahir" class="form-control
                                        @error('tempat_lahir')
                                            is-invalid
                                        @enderror" value="{{ old('tempat_lahir',$siswa->tempat_lahir) }}">
                                    </div>
                                    @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <div class="d-flex">
                                        <i class="fas fa-calendar-week border text-center"></i>
                                        <input type="date" name="tanggal_lahir" class="form-control  @error('tanggal_lahir')
                                            is-invalid
                                        @enderror" value="{{ old('tanggal_lahir',$siswa->tanggal_lahir->format('Y-m-d')) }}">
                                    </div>
                                    @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="d-flex ml-4">
                <div>
                    <button type="submit" class="btn btn-primary rounded-pill"><i
                            class="fas fa-check-square mr-2"></i>Submit</button>
                </div>
                </form>
                &nbsp;&nbsp;&nbsp;
                <div>
                    <a href="{{ route('siswa.index') }}" class="btn btn-danger rounded-pill"><i
                            class="fas fa-window-close mr-2"></i>Cancel</a>
                </div>
            </div>
        </div>
        {{--  --}}
        {{--  --}}

    </div>


</div>

{{-- edit --}}
@endsection
@push('script')
<script>
    $(".duit").keyup(function () {
        var a = formatRupiah($(this).val(), 'Rp. ');
        $(this).val(a);
    });
    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

</script>
@endpush
