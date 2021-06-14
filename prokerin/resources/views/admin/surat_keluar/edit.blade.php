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
                    <form action="{{ route('guru.post') }}" method="POST" class="input">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Surat</label>
                            <div class="d-flex">
                                <i class="far fa-envelope border text-center"></i>
                            <input type="text" name="nik" class="form-control
                            @error('nik') is-invalid @enderror" placeholder="nama surat" value="{{ old('nik') }}">
                            </div>
                            @error('nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dari</label>
                            <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" name="nama" class="form-control @error('nama')
                                    is-invalid
                                @enderror" placeholder="dari" value="{{ old('nama') }}">
                            </div>
                            @error('nama')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan</label>
                            <div class="d-flex">
                                <i class="fas fa-users border text-center"></i>
                                <select class="form-control @error('jabatan')
                                    is-invalid
                                @enderror" name="jabatan">
                                    <option value="" selected>Pilih Jabatan</option>
                                    <option value="hubin" @if(old('jabatan') === 'hubin') selected @endif>Hubin</option>
                                    <option value="kaprog"  @if(old('jabatan') === 'kaprog') selected @endif>Kaprog</option>
                                    <option value="bkk"  @if(old('jabatan') === 'bkk') selected @endif>BKK</option>
                                    <option value="kejuruan"  @if(old('jabatan') === 'kejuruan') selected @endif>Kejuruan</option>
                                    <option value="kejuruan"  @if(old('jabatan') === 'tu') selected @endif>Tu</option>
                                    <option value="kejuruan"  @if(old('jabatan') === 'waka') selected @endif>Waka</option>
                                </select>
                            </div>
                            @error('jabatan')
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
                            <label class="form-label">Status</label>
                            <div class="d-flex">
                                <i class="fas fa-info-circle border text-center"></i>
                                <input type="text" class="form-control @error('no_telp')
                                    is-invalid
                                @enderror" name="status" placeholder="status" >
                            </div>
                            @error('no_telp')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Surat</label>
                            <div class="d-flex">
                                <i class="far fa-calendar-times border text-center"></i>
                                <input type="text" class="form-control @error('no_telp')
                                    is-invalid
                                @enderror" name="tgl_mulai" placeholder="tgl mulai" >
                            </div>
                            @error('no_telp')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div style="margin-top: 40px;">
                        <button type="submit" class="btn btn-success rounded mr-2"><i class="fas fa-check-square mr-2"></i>Submit</button>
                        </form>
                        <a href="{{ route('hubin.surat_keluar.index') }}" type="button" class="btn btn-danger rounded"><i class="fas fa-window-close mr-2"></i>Cancel</a>
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

