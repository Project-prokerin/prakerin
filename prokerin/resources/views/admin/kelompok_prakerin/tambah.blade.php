@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('template/') }}/node_modules/select2/dist/css/select2.min.css">

    <style>
        #inputState {
            width: 300px;
            height: 40px;
        }

        .card {
            height: auto;
        }

        .kanan {
            margin-left: 40x;
        }

        /* .buton {
            margin-left: 900px;
        } */

    </style>
@endpush
@section('title', 'Prakerin | Data Perusahaan')
@section('judul', 'DATA PERUSAHAAN')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i> DATA PERUSAHAAN</div>
@endsection
@section('main')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Tambah Kelompok</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('kelompok.post') }}" method="POST">
                @csrf
                <div class="input-group ">
                        <div class="col-3">
                            <select class="form-control select2 @error('no')  is-invalid  @enderror" name="no" id="">
                                <option value="">--Pilih Nomor--</option>
                                <option value="1" @if (old('no') === '1') selected @endif>1</option>
                                <option value="2" @if (old('no') === '2') selected @endif>2</option>
                                <option value="3" @if (old('no') === '3') selected @endif>3</option>
                                <option value="4" @if (old('no') === '4') selected @endif>4</option>
                                <option value="5" @if (old('no') === '5') selected @endif>5</option>
                            </select>
                            @error('no')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                         <div class="col-3 ">
                            <select class="form-control select2 @error('id_guru')  is-invalid  @enderror" name="id_guru"
                                id="">
                                <option value="">--Cari Guru--</option>
                                @foreach ($guru as $key => $guruu)
                                    <option value="{{ $guruu->id }}" {{ old('id_guru') == $guruu ? 'selected' : '' }}>
                                        {{ $guruu->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_guru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <select name="id_perusahaan"
                                class="form-control   @error('id_perusahaan')  is-invalid  @enderror select2">
                                <option value="">--Cari Perusahaan--</option>
                                @foreach ($perusahaan as $perusahaann)
                                    <option value="{{ $perusahaann->id }}">{{ $perusahaann->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_perusahaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <input class="form-control @error('no_telpon')  is-invalid  @enderror" type="number"
                                name="no_telpon" placeholder="no tlp" aria-label="default input example">
                            @error('no_telpon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                </div>

    <div class="input-group" style="margin-top:20px;">
        <div class="col-3">
                            <select name="id_data_prakerin[]"
                                class="form-control  @error('id_data_prakerin')  is-invalid  @enderror select2">
                                <option value="">--Cari Siswa--</option>
                                @forelse ($data_prakerin as $item)
                                    @if (empty($item->kelompok_laporan))
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endif
                                @empty
                                    <option disabled>Semua Siswa telah mendapat kelompok!</option>
                                @endforelse
                            </select>
                            @if ($errors->has(`id_data_prakerin.2`))
                                <span class="text-danger">
                                    <small>
                                        {{ $errors->first('id_data_prakerin.2') }}
                                    </small>

                                </span>
                            @endif

        </div>
        <div class="col-3">
                            <select name="id_data_prakerin[]"
                                class="form-control  @error('id_data_prakerin')  is-invalid  @enderror select2">
                                <option value="">--Cari Siswa--</option>
                                @forelse ($data_prakerin as $item)
                                    @if (empty($item->kelompok_laporan))
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endif
                                @empty
                                    <option disabled>Semua Siswa telah mendapat kelompok!</option>
                                @endforelse
                            </select>
                            @if ($errors->has(`id_data_prakerin.2`))
                                <span class="text-danger">
                                    <small>
                                        {{ $errors->first('id_data_prakerin.2') }}
                                    </small>

                                </span>
                            @endif

        </div>
        <div class="col-3">
                            <select name="id_data_prakerin[]"
                                class="form-control  @error('id_data_prakerin')  is-invalid  @enderror select2">
                                <option value="">--Cari Siswa--</option>
                                @forelse ($data_prakerin as $item)
                                    @if (empty($item->kelompok_laporan))
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endif
                                @empty
                                    <option disabled>Semua Siswa telah mendapat kelompok!</option>
                                @endforelse
                            </select>
                            @if ($errors->has(`id_data_prakerin.2`))
                                <span class="text-danger">
                                    <small>
                                        {{ $errors->first('id_data_prakerin.2') }}
                                    </small>

                                </span>
                            @endif

        </div>
        <div class="col-3">
                            <select name="id_data_prakerin[]"
                                class="form-control  @error('id_data_prakerin')  is-invalid  @enderror select2">
                                <option value="">--Cari Siswa--</option>
                                @forelse ($data_prakerin as $item)
                                    @if (empty($item->kelompok_laporan))
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endif
                                @empty
                                    <option disabled>Semua Siswa telah mendapat kelompok!</option>
                                @endforelse
                            </select>
                            @if ($errors->has(`id_data_prakerin.2`))
                                <span class="text-danger">
                                    <small>
                                        {{ $errors->first('id_data_prakerin.2') }}
                                    </small>

                                </span>
                            @endif

        </div>
    </div>
        <button type="submit" class="btn btn-success ml-3" style="margin-top:20px;"><i class="fas fa-check"></i> submit</button>
        <a href="{{ route('kelompok.index') }}" type="submit" class="btn btn-danger"style="margin-top:20px;">
            <i class="fas fa-times"></i> Cancel
        </a>
        </div>
        </div>
        </form>
    @endsection
    @push('script')
        <script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>
    @endpush
