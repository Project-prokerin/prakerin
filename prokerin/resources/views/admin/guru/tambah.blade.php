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
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Tambah Guru</h4>
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
                                    <i class="far fa-id-card border text-center"></i>
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
                                    <i class="fas fa-users-cog border text-center"></i>
                                    <select class="form-control @error('jabatan')
                                        is-invalid
                                    @enderror" name="jabatan">
                                        <option value="" selected>Pilih Jabatan</option>
                                        <option value="kepsek" @if(old('jabatan') === 'kepsek') selected @endif>Kepala Sekola</option>
                                        <option value="kaprog"  @if(old('jabatan') === 'kaprog') selected @endif>Kepala Program</option>
                                        <option value="bkk"  @if(old('jabatan') === 'bkk') selected @endif>BKK</option>
                                        <option value="tu"  @if(old('jabatan') === 'tu') selected @endif>Tu</option>
                                         <option value="litbang"  @if(old('jabatan') === 'litbang') selected @endif>Litbang</option>
                                        <option value="hubin"  @if(old('jabatan') === 'hubin') selected @endif>Hubin</option>
                                        <option value="kurikulum"  @if(old('jabatan') === 'kurikulum') selected @endif>Kurikulum</option>
                                        <option value="kesiswaan"  @if(old('jabatan') === 'kesiswaan') selected @endif>Kesiswaan</option>
                                        <option value="sarpras"  @if(old('jabatan') === 'sarpras') selected @endif>Sarpras</option>
                                        <option value="kejuruan"  @if(old('jabatan') === 'kejuruan') selected @endif>Kejuruan</option>
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
                                    <i class="fas fa-map-signs border text-center"></i>
                                    <select class="form-control  @error('id_jurusan')
                                        is-invalid
                                    @enderror"  name="id_jurusan">
                                        <option  value="">Pilih Jurusan</option>
                                        @foreach ($jurusan as $item)
                                             <option value="{{ $item->id }}"  @if(old('id_jurusan') == $item->id) selected @endif>{{ $item->jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('id_jurusan')
                                    <div class="invalid-feedback">
                                            {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No HP</label>
                                <div class="d-flex">
                                    <i class="fas fa-phone border text-center"></i>
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
                            <button type="submit" class="btn btn-success rounded mr-2"><i class="fas fa-check-square mr-2"></i>Submit</button>
                            </form>
                            <a href="{{ route('guru.index') }}" type="button" class="btn btn-danger rounded"><i class="fas fa-window-close mr-2"></i>Cancel</a>
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
