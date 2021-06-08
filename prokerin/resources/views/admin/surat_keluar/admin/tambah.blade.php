
@extends('template.master')
@push('link')
<style>
        .card-body .input i{
            width: 50px;
            font-size: medium;
            padding-top: 11px;
        }
        .invalid-feedback{
                display: block;
            }
</style>
@endpush
@section('title', 'Prakerin | Surat Penugasan')
@section('judul', 'SURAT PENUGASAN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> SURAT PENUGASAN</div>
@endsection
@section('main')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Tambah Surat Penugasan</h4>
        </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
            <div class="">
                <div class="" style="height: auto;">
                    <div class="card-body">
                    <form action="{{ route('admin.surat_keluar.post') }}" method="POST" class="input">
                        @csrf
                        <div class="mb-3">
                            <label dariclass="form-label">Nama Surat</label>
                            <div class="d-flex">
                                <i class="far fa-envelope border text-center"></i>
                            <input type="text" name="nama_surat" class="form-control
                            @error('nama_surat') is-invalid @enderror" placeholder=" Surat xxx" value="{{  $surat->nama_surat ?? ""  }}">
                            </div>
                            @error('nama_surat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama </label>
                            <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="JOhndoe" value="{{ $surat->nama ?? "" }}">
                            </div>
                            @error('nama')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIK </label>
                            <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" name="nik" class="form-control @error('nik')
                                    is-invalid
                                @enderror" placeholder="23423423" value="{{ $surat->nik ?? "" }}">
                            </div>
                            @error('nik')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Untuk</label>
                            <div class="d-flex">
                                <i class="fas fa-users border text-center"></i>
                                <select class="form-control @error('id_untuk') is-invalid @enderror" name="id_untuk">
                                    <option value="" selected>Pilih Jabatan</option>
                                    <option value="17"  {{'17' == old('id_untuk', $surat->id_untuk ?? '') ? 'selected' : '' }} >Hubin</option>
                                    <option value="2"   {{'2'  == old('id_untuk', $surat->id_untuk ?? '') ? 'selected' : '' }} >Kaprog</option>
                                    <option value="3"   {{'3'  == old('id_untuk', $surat->id_untuk ?? '') ? 'selected' : '' }} >BKK</option>
                                    <option value="12"  {{'12 '== old('id_untuk', $surat->id_untuk ?? '') ? 'selected' : '' }} >Tu</option>
                                </select>
                            </div>
                            @error('id_untuk')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat </label>
                            <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <textarea name="alamat" id="" class="form-control  @error('alamat')
                                is-invalid
                            @enderror" style="height: 100px;" placeholder="Jl.xxxxx">{{ $surat->alamat ?? ''}}</textarea>
                            </div>
                            @error('alamat')
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
                <div class="" style="height: auto;">
                    <div class="card-body">
                    <div class="input">
                        <div class="mb-3">
                            <label class="form-label">Tempat</label>
                            <div class="d-flex">
                                <i class="fas fa-info-circle border text-center"></i>
                                <input type="text" class="form-control @error('tempat')
                                    is-invalid
                                @enderror" name="tempat" placeholder="tempat" value="{{ $surat->tempat ?? ''}}" >
                            </div>
                            @error('tempat')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hari </label>
                            <div class="d-flex">
                                <i class="far fa-calendar-times border text-center"></i>
                                <input type="text" class="form-control @error('hari')
                                    is-invalid
                                @enderror" name="hari" placeholder=" Senin s.d. Sabtu" value="{{ $surat->hari ?? ''}}" >
                            </div>
                            @error('hari')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal </label>
                            <div class="d-flex">
                                <i class="far fa-calendar-times border text-center"></i>
                                <input type="text" class="form-control @error('tanggal')
                                    is-invalid
                                @enderror" name="tanggal" placeholder=" xx Januari s.d. xx Februari 2021" value="{{ $surat->tanggal ?? ''}}" >
                            </div>
                            @error('tanggal')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pukul </label>
                            <div class="d-flex">
                                <i class="far fa-calendar-times border text-center"></i>
                                <input type="text" class="form-control @error('pukul')
                                    is-invalid
                                @enderror" name="pukul" placeholder=" 00.00 WIB s.d Selesai" value="{{ $surat->pukul ?? ''}}" >
                            </div>
                            @error('pukul')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div style="margin-top: 40px;">
                        <button type="submit" class="btn btn-success rounded mr-2"><i class="fas fa-check-square mr-2"></i>Next</button>
                        </form>
                        <a href="{{ route('admin.surat_keluar.index') }}" type="button" class="btn btn-danger rounded"><i class="fas fa-window-close mr-2"></i>Cancel</a>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('script')

@endpush
