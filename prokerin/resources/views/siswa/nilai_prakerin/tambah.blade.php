@extends('template.master')
@push('link')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

@endpush
@section('title', 'Prakerin | Nilai Data Prakerin Siswa')
@section('judul', 'Nilai Data Prakerin Siswa ')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-newspaper"></i> NILAI PRAKERIN SISWA</div>
@endsection
@section('main')
<div class="card" style="height: 850px;">
    <div class="card-header">
        <h4 class="pt-2 card-title">Tambah Data Nilai Prakerin</h4>
    </div>
    <div class="card-body">
        <div class="col-lg-12" style="height: 500px;">
            <form action="" method="POST">
                @csrf
                <div class="row mb-5">
                    {{-- card col 1 --}}
                    <div class="col-6">
                        {{-- <div class="mb-3 col-lg-10">
                            <label>Nama Siswa</label>
                            <select name="" class="form-control   @error('')  is-invalid  @enderror select2">
                                <option value="" >--Cari Siswa--</option>
                            </select>
                        </div> --}}
                        {{-- <div class="mb-3 col-lg-10">
                            <label>Kelompok</label>
                            <select name="" class="form-control   @error('')  is-invalid  @enderror select2">
                                <option value="" >--Cari Kelompok--</option>
                            </select>
                        </div> --}}
                        {{-- <div class="mb-3 col-lg-10">
                            <label>Kelas Dan Jurusan</label>
                            <select name="" class="form-control   @error('')  is-invalid  @enderror select2">
                                <option value="" >--Cari Kelas&Jurusan--</option>
                            </select>
                        </div> --}}
                        <div class="mb-2 col-12 row">
                            <label for="" class="col-sm-4 col-form-label">Nilai Perusahaan</label>
                            <div class="mb-3 col-sm-6">
                                <input type="number" name="" id="" class="form-control-sm @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                @error('')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2 col-12 row">
                            <label for="" class="col-sm-4 col-form-label">Aspek Yang Dinilai</label>
                            <div class="mb-3 col-sm-6">
                                <input disabled type="number" name="" id="" class="form-control-sm @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                @error('')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2 col-12 row">
                            <label for="" class="col-sm-4 col-form-label">Keterangan</label>
                            <div class="mb-3 col-sm-6">
                                <input disabled type="text" name="" id="" class="form-control-sm @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                @error('')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- card col 2 --}}
                    <div class="col-6">
                        <div class="">
                            <div class="card-body">
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="">
                                            <div class="">
                                                <h6 class="mb-3">Konversi Keterangan Nilai :</h6>
                                            </div>
                                            <table class="ml-5 table-sm table-bordered">
                                                <thead class="text-center">
                                                <tr>
                                                    <th scope="col" colspan="2" style="width: 300px;">Keterangan</th>
                                                </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <tr>
                                                        <th style="width: 10px;">Angka</th>
                                                        <th style="width: 10px;">Huruf</th>
                                                    </tr>
                                                    <tr>
                                                        <td>8.6 - 10.00</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7.10 - 8.59</td>
                                                        <td>B</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6.0 - 7.09</td>
                                                        <td>C</td>
                                                    </tr>
                                                    <tr>
                                                        <td>< 6.00</td>
                                                        <td>D</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="" style="margin-top: -50px;">
                    <h5 class="card-title">Aspek Yang Dinilai</h5>
                </div><hr>

                <div class="row">
                    {{-- card col 1 --}}
                    <div class="col-6">
                        <div class="">
                            <div class="col-11">
                                <h6 class="">A. Pelaksanaan</h6>
                            </div>
                            <div class="">
                                <div class="mt-2 mb-2 col-12 row">
                                    <label for="" class="ml-4 col-sm-5 col-form-label">Kedisiplinan</label>
                                    <div class="mb-3 col-sm-4">
                                        <input type="number" name="" id="" class="form-control-sm @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                        @error('')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 col-12 row">
                                    <label for="" class="ml-4 col-sm-5 col-form-label">Tanggung Jawab</label>
                                    <div class="mb-3 col-sm-4">
                                        <input type="number" name="" id="" class="form-control-sm @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                        @error('')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 col-12 row">
                                    <label for="" class="ml-4 col-sm-5 col-form-label">Inisiatif</label>
                                    <div class="mb-3 col-sm-4">
                                        <input type="number" name="" id="" class="form-control-sm @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                        @error('')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 col-12 row">
                                    <label for="" class="ml-4 col-sm-5 col-form-label">Kerajinan</label>
                                    <div class="mb-3 col-sm-4">
                                        <input type="number" name="" id="" class="form-control-sm @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                        @error('')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 col-12 row">
                                    <label for="" class="ml-4 col-sm-5 col-form-label">Kerja Sama</label>
                                    <div class="mb-3 col-sm-4">
                                        <input type="number" name="" id="" class="form-control-sm @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                        @error('')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- card col 2 --}}
                    <div class="col-6">
                        <div class="">
                            <div class="col-11">
                                <h6 class="">B. Keterampilan</h6>
                            </div>
                            <div class="">
                                <div class="mt-2 mb-2 col-12 row">
                                    <label for="" class="ml-4 col-sm-5 col-form-label">Keterampilan 1</label>
                                    <div class="mb-3 col-sm-4">
                                        <input type="number" name="" id="" class="form-control-sm @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                        @error('')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 col-12 row">
                                    <label for="" class="ml-4 col-sm-5 col-form-label">Keterampilan 2</label>
                                    <div class="mb-3 col-sm-4">
                                        <input type="number" name="" id="" class="form-control-sm @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                        @error('')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer mb-5">
                    <div class="row" style="margin-bottom: 30px;">
                        <button type="submit" class="btn btn-success mr-3"><i class="fas fa-check"></i> submit</button>
                        <a href="" type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')

@endpush