@extends('template.master')
@push('link')
<style>
        .card-body .input i {
        width: 40px;
        font-size: medium;
        padding-top: 6px;
    }
    .invalid-feedback{
        display: block;
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
<div class="card">
    {{-- <div class="container">
        <div class="card-body mt-3">
            <div class="">
                <h5>Tambah Data Perusahaan</h5>
            </div>
        </div>
    </div> --}}
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6" style="height: 500px;">
                <div class="">
                    <div class="">
                        <div class="container mt-2">
                            <h5 class="card-title">Data Perusahaan</h5>
                        </div>
                        <hr>
                        <div class="card-body">
                            <form action="{{ route('perusahaan.update', ['id' => $perusahaan->id]) }}" method="POST" class="input" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label class="form-label">Nama Perusahaan</label>
                                    <div class="d-flex">
                                        <i class="far fa-building border text-center"></i>
                                        <input type="text" name="nama"  class="form-control form-control-sm
                                        @error('nama')
                                            is-invalid
                                        @enderror" value="{{ old('nama', $perusahaan->nama) }}">
                                    </div>
                                    @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                 <div class="mb-3">
                                    <label>Bidang usaha</label>
                                    <select name="id_jurusan" class="form-control  select2 @error('id_jurusan')  is-invalid  @enderror select2" name="id_jurusan" id="">
                                        <option value="" selected>--Pilih Bidang usaha--</option>
                                        @foreach ($jurusan as $item)
                                        <option value="{{ $item->id }}" {{(old('id_jurusan', $perusahaan->jurusan->id) == $item->id) ? 'selected' : ''}}>{{ $item->singkatan_jurusan }}</option>
                                        @endforeach
                                    </select>
                                        @error('id_jurusan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <div class="d-flex">
                                        <i class="far fa-building border text-center"></i>
                                        <input type="text" name="alamat"  class="form-control form-control-sm
                                        @error('alamat')
                                            is-invalid
                                        @enderror" value="{{ old('alamat', $perusahaan->alamat) }}">
                                    </div>
                                    @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Link Perusahaan</label>
                                    <div class="d-flex">
                                        <i class="far fa-building border text-center"></i>
                                        <input type="text" name="link"  class="form-control form-control-sm
                                        @error('link')
                                            is-invalid
                                        @enderror" value="{{ old('link', $perusahaan->link) }}">
                                    </div>
                                    @error('link')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="">
                                    <label class="form-label">Email Perusahaan</label>
                                    <div class="d-flex">
                                        <i class="far fa-building border text-center"></i>
                                        <input type="text" name="email"  class="form-control form-control-sm
                                        @error('email')
                                            is-invalid
                                        @enderror" value="{{ old('email', $perusahaan->email) }}">
                                    </div>
                                    @error('email')
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
            <div class="col-sm-6" >
                <div class="">
                    <div class="input">
                        <div class="container mt-2">
                            <h5 class="card-title pt-4"></h5>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Pemimpin</label>
                                <div class="d-flex">
                                    <i class="far fa-building border text-center"></i>
                                    <input type="text" name="nama_pemimpin"  class="form-control form-control-sm
                                    @error('nama_pemimpin')
                                            is-invalid
                                    @enderror"
                                    value="{{ old('nama_pemimpin', $perusahaan->nama_pemimpin) }}"
                                    >
                                </div>
                                @error('nama_pemimpin')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Perusahaan</label>
                                <div class="d-flex">
                                    <i class="far fa-building border text-center pt-3"></i>
                                    <textarea type="text"  name="deskripsi_perusahaan" class="form-control form-control-sm
                                    @error('deskripsi_perusahaan')
                                            is-invalid
                                    @enderror" rows="3"> {{ old('deskripsi_perusahaan', $perusahaan->deskripsi_perusahaan) }}</textarea>
                                </div>
                                @error('deskripsi_perusahaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Mou</label>
                                <div class="d-flex">
                                    <i class="far fa-building border text-center"></i>
                                    <input type="date" name="tanggal_mou"  class="form-control form-control-sm ui-datepicker
                                    @error('tanggal_mou')
                                            is-invalid
                                    @enderror" value="{{ old('tanggal_mou', \Carbon\Carbon::parse($perusahaan->tanggal_mou)->toDateString()) }}">
                                </div>
                                @error('tanggal_mou')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Mou</label>
                                <div class="d-flex">
                                    <i class="far fa-building border text-center"></i>
                                    <input type="text" name="status_mou"  class="form-control form-control-sm
                                    @error('status_mou')
                                            is-invalid
                                    @enderror" value="{{ old('status_mou', $perusahaan->status_mou) }}">
                                </div>
                                @error('status_mou')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gambar Perusahaan</label>
                                <div class="d-flex">
                                    <i class="far fa-building border text-center" style="height: 41px; padding-top: 10px;"></i>
                                    <div class="input-group">
                                        <input type="file" name="foto" class="form-control
                                        @error('foto')
                                            is-invalid
                                    @enderror  " id="upload" >
                                    </div>
                                </div>
                                @error('foto')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                            </div>
                            <img src="{{ asset("images/perusahaan/$perusahaan->foto") }}" id="image" alt="" style="width: 200px; height:100px;object-fit:cover;" >
                            <input type="text" name="val" value="{{ $perusahaan->foto }}" hidden>
                            @php $a = explode(' ', $perusahaan->foto);
                            if (count($a) > 1) {unset($a[0]);}
                            @endphp
                            <p id="imageName">{{ implode(' ', $a) }}</p>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" style="margin-top: -40px;">
                <div class="card-body mb-3">
                    <div class="d-flex">
                        <div>
                            <button type="submit" class="btn btn-primary rounded-pill"><i
                                    class="fas fa-check-square mr-2"></i>Submit</button>
                        </div>
                        </form>
                        &nbsp;&nbsp;&nbsp;
                        <div>
                            <a href="{{ route('perusahaan.index') }}" class="btn btn-danger rounded-pill"><i
                                    class="fas fa-window-close mr-2"></i>Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection
@push('script')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string

        }
    }
    $("#upload").change(function () {
        file = $('#upload');
        item  = file[0].files[0].name;
        $('#imageName').html(item);
        readURL(this);
    });

</script>
<script src="{{asset('template/')}}/node_modules/select2/dist/js/select2.full.min.js"></script>
@endpush
