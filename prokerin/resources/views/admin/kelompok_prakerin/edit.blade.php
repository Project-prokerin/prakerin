
edit view kelompok
@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('template/') }}/node_modules/select2/dist/css/select2.min.css">

    <style>
        #inputState {
            width: 300px;
            height: 40px;
        }

        .card {
            height: 600px;
        }

        .kanan {
            margin-left: 40x;
        }

        .buton {
            margin-left: 900px;
        }

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

    <div class="card mt-5">
        <div class="container text-center mt-5 mb-3 ml-1">
            <h3>Edit kelompok</h3>
        </div>

        <div class="container">
            <form action="{{ route('kelompok.update', $kelompok_laporan[0]->no) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="row mt-3 ml-4 ">
                    <div class="col-6  kanan">
                        <!-- no kelom -->
                        {{-- <div class="form-group col-lg-10" hidden>
                            <label>No Kelompok</label>
                            <select class="form-control" name="no" id="">
                                <option value="1"
                                {{ (old('no') ?? $kelompok_laporan[0]->no) == '1' ? 'selected' : '' }}>
                                1 </option>
                                <option value="2"
                                {{ (old('no') ?? $kelompok_laporan[0]->no) == '2' ? 'selected' : '' }}>
                                2 </option>
                                <option value="3"
                                {{ (old('no') ?? $kelompok_laporan[0]->no) == '3' ? 'selected' : '' }}>
                                3 </option>
                                <option value="4"
                                {{ (old('no') ?? $kelompok_laporan[0]->no) == '4' ? 'selected' : '' }}>
                                4 </option>
                                <option value="5"
                                {{ (old('no') ?? $kelompok_laporan[0]->no) == '5' ? 'selected' : '' }}>
                                5 </option>
                            </select>
                        </div> --}}
                        {{-- <input type="hidden" name="no" value="{{$kelompok_laporan[0]->no}}"> --}}

                        <!-- gru bimbing -->
                        <div class="form-group col-lg-10 ">
                            <label>Guru Pembimbing</label>
                            <select class="form-control " name="id_guru" id="">
                                <option value="{{ $kelompok_laporan[0]->id_guru }}" selected>
                                    {{ $kelompok_laporan[0]->guru->nama }}</option>

                                @foreach ($guru as $guruu)
                                    <option value="{{ $guruu->id }}">{{ $guruu->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_guru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </select>
                        </div>
                        <!-- jurusan -->
                        <div class="form-group col-lg-10 ">
                            <label>Jurusan</label>
                            <select name="jurusan" class="form-control select2 @error('jurusan')  is-invalid  @enderror"
                                name=" jurusan" id="">
                                <option value="RPL"
                                    {{ (old('jurusan') ?? $kelompok_laporan[0]->jurusan) == 'RPL' ? 'selected' : '' }}>
                                    Rekayasa Perangkat Lunak </option>
                                <option value="TKJ"
                                    {{ (old('jurusan') ?? $kelompok_laporan[0]->jurusan) == 'TKJ' ? 'selected' : '' }}>
                                    Teknik Komunikasi Jaringan </option>
                                <option value="BC"
                                    {{ (old('jurusan') ?? $kelompok_laporan[0]->jurusan) == 'BC' ? 'selected' : '' }}>
                                    Broadcasting </option>
                                <option value="MM"
                                    {{ (old('jurusan') ?? $kelompok_laporan[0]->jurusan) == 'MM' ? 'selected' : '' }}>
                                    Multimedia </option>
                                <option value="TEI"
                                    {{ (old('jurusan') ?? $kelompok_laporan[0]->jurusan) == 'TEI' ? 'selected' : '' }}>
                                    TeknikElektronikaIndustri </option>

                            </select>
                            @error('jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                        <input class="form-control" type="hidden" value="{{ $kelompok_laporan[0]->id }}" name="id[]"
                            placeholder="id tlp" aria-label="default input example">
                        <input class="form-control" type="hidden" value="{{ $kelompok_laporan[1]->id }}" name="id[]"
                            placeholder="id tlp" aria-label="default input example">
                        <input class="form-control" type="hidden" value="{{ $kelompok_laporan[2]->id }}" name="id[]"
                            placeholder="id tlp" aria-label="default input example">
                        <input class="form-control" type="hidden" value="{{ $kelompok_laporan[3]->id }}" name="id[]"
                            placeholder="id tlp" aria-label="default input example">
                            <input class="form-control" type="hidden" value="{{ $kelompok_laporan[0]->no }}" name="no[]"
                            placeholder="no tlp" aria-label="default input example">
                            <input class="form-control" type="hidden" value="{{ $kelompok_laporan[1]->no }}" name="no[]"
                            placeholder="no tlp" aria-label="default input example">
                            <input class="form-control" type="hidden" value="{{ $kelompok_laporan[2]->no }}" name="no[]"
                            placeholder="no tlp" aria-label="default input example">
                            <input class="form-control" type="hidden" value="{{ $kelompok_laporan[3]->no }}" name="no[]"
                            placeholder="no tlp" aria-label="default input example">
                        <!-- perusahaan -->
                        <div class="form-group col-lg-10 ">
                            <label>Perusahaan</label>
                            <select name="id_perusahaan"
                                class="form-control   @error('id_perusahaan')  is-invalid  @enderror select2">
                                <option value="{{ $kelompok_laporan[0]->nama_perusahaan }}" selected>
                                    {{ $kelompok_laporan[0]->nama_perusahaan }}</option>
                                @foreach ($perusahaan as $perusahaann)
                                    <option value="{{ $perusahaann->nama }}">{{ $perusahaann->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_perusahaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group col-lg-10 ">
                            <label for="">No telephon</label>
                            <input class="form-control" type="number" value="{{ $kelompok_laporan[0]->no_telpon }}"
                                name="no_telpon" placeholder="no tlp" aria-label="default input example">
                        </div>



                    </div>
                    <div class="col-6">
                        <label>Daftar Nama Siswa</label>
                        <div class="form-group col-lg-12 ">
                            <select name="id_data_prakerin[]"
                                class="form-control  @error('id_data_prakerin')  is-invalid  @enderror select2">
                                <option value="">--Cari Siswa--</option>
                                <option value="{{ $kelompok_laporan[0]->id_data_prakerin }}" selected>
                                    {{ $kelompok_laporan[0]->data_prakerin->nama }}</option>
                                   @foreach ($data_prakerin as $item)
                                    @if (empty($item->kelompok_laporan))
                                        <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('id_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 ">
                            <select name="id_data_prakerin[]"
                                class="form-control  @error('id_data_prakerin')  is-invalid  @enderror select2">
                                <option value="">--Cari Siswa--</option>

                                <option value="{{ $kelompok_laporan[1]->id_data_prakerin }}" selected>
                                    {{ $kelompok_laporan[1]->data_prakerin->nama }}</option>
                                   @foreach ($data_prakerin as $item)
                                    @if (empty($item->kelompok_laporan))
                                        <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('id_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group col-lg-12 ">
                            <select name="id_data_prakerin[]"
                                class="form-control  @error('id_data_prakerin')  is-invalid  @enderror select2">
                                <option value="">--Cari Siswa--</option>

                                <option value="{{ $kelompok_laporan[2]->id_data_prakerin }}" selected>
                                    {{ $kelompok_laporan[2]->data_prakerin->nama }}</option>
                                   @foreach ($data_prakerin as $item)
                                    @if (empty($item->kelompok_laporan))
                                        <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('id_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        @if (empty($kelompok_laporan[3]->id_data_prakerin))
                        <div class="form-group col-lg-12 ">
                                <select name="id_data_prakerin[]" class="form-control  @error('id_data_prakerin')  is-invalid  @enderror select2">
                                    <option value="">--Cari Siswa--</option>
                                    @foreach ($data_prakerin as $item)
                                        @if (empty($item->kelompok_laporan))
                                            <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has(`id_data_prakerin.3`))
                                <span class="text-danger">
                                    <small>
                                        {{ $errors->first('id_data_prakerin.3')}}
                                    </small>

                                </span>
                            @endif
                         </div>
                        @else
                        <div class="form-group col-lg-12 ">
                            <select name="id_data_prakerin[]" class="form-control  @error('id_data_prakerin')  is-invalid  @enderror select2">
                                <option value="">--Cari Siswa--</option>
                                <option value="{{ $kelompok_laporan[3]->id_data_prakerin }}" selected>
                                    {{ $kelompok_laporan[3]->data_prakerin->nama }}</option>
                                @foreach ($data_prakerin as $item)
                                    @if (empty($item->kelompok_laporan))
                                        <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                                    @endif
                                @endforeach
                            </select>



                            @error('id_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                         </div>

                        @endif

                        <button type="submit" class="btn btn-success ml-3"><i class="fas fa-check"></i> submit</button>
                        <a href="{{ route('kelompok.index') }}" type="submit" class="btn btn-danger"><i
                                class="fas fa-times"></i> Cancel</a>

                    </div>

                </div>
            </form>

        </div>



    @endsection
    @push('script')
        <script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>


    @endpush
