@extends('template.master')
@push('link')
<link rel="stylesheet" href="{{asset('template/')}}/node_modules/select2/dist/css/select2.min.css">
    <style>
        .container {
            position: relative;
        }
        h5{
        color: rgb(82, 82, 255);
    }
    </style>
@endpush
@section('title', 'Prakerin | Data Prakerin')
@section('judul', 'DATA PRAKERIN')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="fas fa-th"></i>>DATA PRAKERIN</div>
@endsection
@section('main')
<div class="card">
    <div class="card-body">
        <div class="">
            <div class="col-lg-12" style="height: 500px;">
                <div class="">
                    <div class="">
                        <div class="container mt-2">
                            <h5 class="card-title">Tambah Data Prakerin</h5>
                        </div>
                        <hr>
    </div>

    <div class="container">
        <form action="{{route('data_prakerin.post')}}" method="POST">
                @csrf
            <div class="row">
                <div class="col-6  kanan">
                    <!-- perusa -->
                    <div class="mb-3 col-lg-10">
                        <label>Nama Perusahaan</label>
                        <select name="id_perusahaan" class="form-control   @error('id_perusahaan')  is-invalid  @enderror select2">
                            <option value="" >--Cari Perusahaan--</option>
                            @foreach ($perusahaan as $perusahaann)
                            <option value="{{$perusahaann->id}}"{{(old('id_perusahaan') == $perusahaann->id) ? 'selected' : ''}}>{{$perusahaann->nama}}</option>
                            @endforeach
                        </select>
                            @error('id_perusahaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>

                    <!-- guru -->
                    <div class="mb-3 col-lg-10">
                        <label>Nama Guru</label>
                        <select name="id_guru" class="form-control @error('id_guru')  is-invalid  @enderror  select2">
                        <option value="" >--Cari Guru--</option>
                            @foreach ($guru as $guruu)
                            <option value="{{$guruu->id}}" {{(old('id_guru') == $guruu->id) ? 'selected' : ''}}>{{$guruu->nama}}</option>
                            @endforeach
                        </select>
                            @error('id_guru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>


                    <!-- siswa -->
                    <div class="mb-3 col-lg-10">
                        <label>Nama Siswa</label>
                        <select name="id_siswa" class="form-control  @error('id_siswa')  is-invalid  @enderror select2">
                        <option value="">--Cari Siswa--</option>
                            @foreach ($siswa as $item)
                                <option  value="{{ $item->id }}" {{(old('id_siswa') == $item->id) ? 'selected' : ''}}>{{ $item->nama_siswa }}</option>
                            @endforeach
                        </select>
                            @error('id_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>


                    <!-- kelas -->
                    <div class="mb-3 col-lg-10 mb-5">
                        <label>kelas</label>
                        <select name="kelas" class="form-control  @error('kelas')  is-invalid  @enderror select2" name=" jurusan" id="">
                            <option value="" selected>--Pilih kelas--</option>
                            @foreach ($kelas as $item)
                            <option value="{{ $item->id }}" {{(old('kelas') == $item->id) ? 'selected' : ''}}>{{ $item->level.' '. $item->jurusan->singkatan_jurusan }}</option>
                            @endforeach
                        </select>
                            @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="col-6">
                <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control select2 @error('status')  is-invalid  @enderror"  name="status" id="">
                            <option value="" selected>--Pilih Status--</option>
                            <option value="Pengajuan" {{(old('status') == "Pengajuan") ? 'selected' : ''}}>Pengajuan</option>
                            <option value="Magang" {{(old('status') == "Magang") ? 'selected' : ''}}>Magang</option>
                            <option value="Selesai" {{(old('status') == "Selesai") ? 'selected' : ''}}>Selesai</option>
                            <option value="Batal" {{(old('status') == "Batal") ? 'selected' : ''}}>Batal</option>
                        </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3 ">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="tgl_mulai" class="  @error('tgl_mulai')  is-invalid  @enderror form-control datepicker" value="{{ old('tgl_mulai') }}">
                            @error('tgl_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="mb-5 ">
                        <label>Tanggal Selesai</label>
                        <input type="date" name="tgl_selesai" class=" @error('tgl_selesai')  is-invalid  @enderror form-control datepicker"  value="{{ old('tgl_selesai') }}">
                            @error('tgl_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="modal-footer" style="margin-bottom: 30px;">
                        <button type="submit" class="btn btn-success mr-3"><i class="fas fa-check"></i> submit</button>
                        <a href="{{route('data_prakerin.index')}}" type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('template/')}}/node_modules/select2/dist/js/select2.full.min.js"></script>

@endpush
