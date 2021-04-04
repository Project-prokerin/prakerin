@extends('template.master')
@push('link')
<link rel="stylesheet" href="{{asset('template/')}}/node_modules/select2/dist/css/select2.min.css">
    <style>
        #inputState {
            width: 300px;
            height: 40px;
        }

        .card {
            height: auto;
        }
        .buton {
            margin-left: 900px;
        }
    </style>
@endpush
@section('title', 'Prakerin | Kelompok Prakerin')
@section('judul', 'KELOMPOK PRAKERIN')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i> KELOMPOK PRAKERIN</div>
@endsection
@section('main')
<div class="card mt-5">
    <div class="card-body mt-3">
        <div class="">  
            <h5>Tambah Data Kelompok</h5>
        </div>
        <form class="d-flex flex-row-reverse" style="margin-top: -36px;">
            <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            <input class="form-control ml-3" type="search" placeholder="Search" aria-label="Search" style="width: 200px;">
        </form>
    </div>
    <div class="container">
        <form action="{{route('kelompok.post')}}" method="POST">
            @csrf
            <div class="row mt-3 ml-4 ">
                <div class="col-6">

                    <!-- no kelom -->
                    <div class="col-lg-10 mb-3">
                        <label class="form-label">No Kelompok</label>
                        <select class="form-control" name="no" id="">
                            <option value="">Pilih Nomor</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <!-- gru bimbing -->
                    <div class="col-lg-10 mb-3">
                        <label class="form-label">Guru Pembimbing</label>
                        <select class="form-control " name="id_guru" id="">
                            <option value="" >--Cari Guru--</option>
                            @foreach ($guru as $guruu)
                            <option value="{{$guruu->id}}">{{$guruu->nama}}</option>
                            @endforeach
                        </select>
                            @error('id_guru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>

                    <!-- jurusan -->
                    <div class="col-lg-10 mb-3">
                        <label class="form-label">Jurusan</label>
                        <select name="jurusan" class="form-control select2 @error('jurusan')  is-invalid  @enderror"  name=" jurusan" id="">
                            <option value="" selected>--Pilih Jurusan--</option>
                            <option value="RPL">Rekayasa Perangkat Lunak</option>
                            <option value="TKJ">Teknik Komunikasi Jaringan</option>
                            <option value="BC">Broadcasting</option>
                            <option value="MM">Multimedia</option>
                            <option value="TEI">TeknikElektronikaIndustri</option>
                        </select>
                            @error('jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>

                     <!-- perusahaan -->
                     <div class="col-lg-10 mb-3">
                        <label class="form-label">Perusahaan</label>
                        <select name="id_perusahaan" class="form-control   @error('id_perusahaan')  is-invalid  @enderror select2">
                            <option value="" >--Cari Perusahaan--</option>
                            @foreach ($perusahaan as $perusahaann)
                            <option value="{{$perusahaann->id}}">{{$perusahaann->nama}}</option>
                            @endforeach
                        </select>
                                @error('id_perusahaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                    </div>

                    <!-- no tlp -->
                    <div class="col-lg-10 mb-5">
                        <label class="form-label">No telephon</label>
                        <input class="form-control" type="number" name="no_telpon" placeholder="no tlp" aria-label="default input example">
                    </div>
                </div>

                <div class="col-6">
                    <label class="form-label">Daftar Nama Siswa</label>
                    <div class="col-lg-12 mb-4">
                        <select name="id_data_prakerin[]" class="form-control  @error('id_data_prakerin')  is-invalid  @enderror select2">
                            <option value="">--Cari Siswa--</option>
                            @foreach ($data_prakerin as $item)
                            <option  value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                            @error('id_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="col-lg-12 mb-4">
                        <select name="id_data_prakerin[]" class="form-control  @error('id_data_prakerin')  is-invalid  @enderror select2">
                            <option value="">--Cari Siswa--</option>
                            @foreach ($data_prakerin as $item)
                            <option  value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                            @error('id_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>


                    <div class="col-lg-12 mb-4">
                        <select name="id_data_prakerin[]" class="form-control  @error('id_data_prakerin')  is-invalid  @enderror select2">
                            <option value="">--Cari Siswa--</option>
                            @foreach ($data_prakerin as $item)
                            <option  value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                            @error('id_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>


                    <div class="col-lg-12 mb-4">
                        <select name="id_data_prakerin[]" class="form-control  @error('id_data_prakerin')  is-invalid  @enderror select2">
                            <option value="">--Cari Siswa--</option>
                            @foreach ($data_prakerin as $item)
                            <option  value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                            @error('id_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <button type="submit"  class="btn btn-success ml-3"><i class="fas fa-check"></i> submit</button>
                    <a href="{{route('kelompok.index')}}" type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('template/')}}/node_modules/select2/dist/js/select2.full.min.js"></script>
@endpush
