@extends('template.master')
@push('link')
<link rel="stylesheet" href="{{ asset('template/') }}/node_modules/select2/dist/css/select2.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
@endpush
@section('title', 'Prakerin | Kategori')
@section('judul', 'KATEGORI')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a>
</div>
<div class="breadcrumb-item"> <i class="fas fa-newspaper"></i> KATEGORI</div>
@endsection
@section('main')
<div class="card" style="">
    <div class="card-header">
        <h4 class="pt-2 card-title"><i class="fas fa-th"></i> Tambah Data Kategori</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('kategori.post') }}" method="POST">
            @csrf
            <div class="row mb-5">
                {{-- card col 1 --}}
                <div class="col-6">
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Aspek</label>
                        <div class="mb-3 col-8">
                            <input type="text" name="aspek_yang_dinilai" class="form-control  @error('aspek_yang_dinilai')  is-invalid  @enderror">
                            @error('aspek_yang_dinilai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <!-- bentar din maghrib dulu  -->
                    <!-- //udah login -->
                    {{-- lofin github dulu nur lu gabisa gituin terimanl --}}
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Jurusan</label>
                        <div class="mb-3 col-8">
                            <select name="jurusan" id="jurusan"
                                class="form-control   @error('jurusan')  is-invalid  @enderror select2">
                                <option value="">--Pilih Jurusan--</option>
                               @foreach ($jurusan as $jrsn)
                               <option value="{{$jrsn->id}}">{{$jrsn->singkatan_jurusan}}</option>
                               @endforeach
                            </select>
                            @error('jurusan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>


</div>

{{-- card col 2 --}}
<div class="col-6">
    <div class="row">
        <div class="col-12">
            <div class="">
                <div class="mb-2 col-12 row">
                    <label for="" class="col-sm-4 col-form-label">Domain</label>
                    <div class="mb-3 col-8">
                        <select name="domain" id="domain"
                            class="form-control   @error('domain')  is-invalid  @enderror select2">
                            <option value="">--Pilih Domain--</option>
                            <option value="pelaksanaan">pelaksanaan</option>
                            <option value="ketrampilan">ketrampilan</option>

                        </select>
                        @error('domain')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="mb-2 col-12 row">
                    <label for="" class="col-sm-4 col-form-label">Keterangan</label>
                    <div class="mb-3 col-8">
                        <select name="keterangan" id="keterangan"
                            class="form-control   @error('keterangan')  is-invalid  @enderror select2">
                            <option value="">--Pilih Keterangan--</option>
                            <option value="Nilai Sekolah">Nilai Sekolah</option>
                            <option value="Nilai Perusahaan">Nilai Perusahaan</option>
                        </select>
                        @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="modal-footer" style="">
        <div class="row" style="">
            <button id="cek_submit" type="submit" class="btn btn-success mr-3 text-white"><i class="fas fa-check"></i>
                submit</button>
            <a href="{{route('kategori.index')}}" type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>



@endsection

@push('script')
<script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>

@endpush
