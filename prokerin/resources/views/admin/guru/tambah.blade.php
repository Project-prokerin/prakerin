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
    @section('title', 'Prakerin | Data Guru')
    @section('judul', 'DATA GURU')
    @section('breadcrump')
            <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
            <div class="breadcrumb-item"> <i class="far fa-building"></i> DATA GURU</div>
    @endsection
    @section('main')
    <div class="card">
        <div class="container">
            <div class="card-body mt-3">
                <div class="">
                    <h5>Data Guru</h5>
                </div>
            </div>
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
                                <label class="form-label">NIK Guru</label>
                                <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" name="nik" class="form-control
                                @error('nik') is-invalid @enderror" placeholder="NIK" value="{{ old('nik') }}">
                                </div>
                                @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <div class="d-flex">
                                    <i class="fas fa-user border text-center"></i>
                                    <input type="text" name="nama" class="form-control @error('nama')
                                        is-invalid
                                    @enderror" placeholder="nama" value="{{ old('nama') }}">
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
                                    <i class="fas fa-user border text-center"></i>
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
                                <label class="form-label">Jurusan</label>
                                <div class="d-flex">
                                    <i class="fas fa-user border text-center"></i>
                                    <select class="form-control  @error('jurusan')
                                        is-invalid
                                    @enderror"  name="jurusan">
                                        <option value="">Pilih Jurusan</option>
                                        <option value="RPL"  @if(old('jurusan') === 'RPL') selected @endif>RPL</option>
                                        <option value="MM"  @if(old('jurusan') === 'MM') selected @endif>MM</option>
                                        <option value="TKJ"  @if(old('jurusan') === 'TKJ') selected @endif>TKJ</option>
                                        <option value="TEI"  @if(old('jurusan') === 'TEI') selected @endif>TEI</option>
                                        <option value="BC"  @if(old('jurusan') === 'BC') selected @endif>BC</option>
                                    </select>
                                </div>
                                @error('jurusan')
                                    <div class="invalid-feedback">
                                            {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No HP</label>
                                <div class="d-flex">
                                    <i class="fas fa-user border text-center"></i>
                                    <input type="text" class="form-control @error('no_telp')
                                        is-invalid
                                    @enderror" name="no_telp" placeholder="Masukan nomor telepone" >
                                </div>
                                @error('no_telp')
                                    <div class="invalid-feedback">
                                            {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div style="margin-top: 40px;">
                            <button type="submit" class="btn btn-success rounded-pill mr-2"><i class="fas fa-check-square mr-2"></i>Submit</button>
                            </form>
                            <a href="{{ route('guru.index') }}" type="button" class="btn btn-danger rounded-pill"><i class="fas fa-window-close mr-2"></i>Cancel</a>
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
