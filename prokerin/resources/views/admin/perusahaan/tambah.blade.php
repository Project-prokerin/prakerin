@extends('template.master')
@push('link')
<style>
        .card-body .input i {
        width: 40px;
        font-size: medium;
        padding-top: 6px;
    }
    .invalid-feedback{
        display: block;
    }
</style>
@endpush
@section('title', 'Prakerin | Data Perusahaan')
@section('judul', 'DATA PERUSAHAAN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> DATA PERUSAHAAN</div>
@endsection
@section('main')
<div class="card">
    <div class="container">
        <div class="card-body mt-3">
            <div class="">
                <h5>Tambah Data Perusahaan</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6" style="height: 500px;">
                <div class="">
                    <div class="">
                        <div class="container mt-2">
                            <h5 class="card-title">Data Perusahaan</h5>
                        </div>
                        <hr>
                        <div class="card-body">
                            <form action="" method="POST" class="input">
                                <div class="mb-3">
                                    <label class="form-label">Nama Perusahaan</label>
                                    <div class="d-flex">
                                        <i class="far fa-building border text-center"></i>
                                        <input type="text" name="nama_siswa"  class="form-control form-control-sm">
                                    </div>
                                    @error('')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Bidang Perusahaan</label>
                                    <div class="d-flex">
                                        <i class="far fa-building border text-center"></i>
                                        <input type="text" name="nama_siswa"  class="form-control form-control-sm">
                                    </div>
                                    @error('')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No Tlp</label>
                                    <div class="d-flex">
                                        <i class="far fa-building border text-center"></i>
                                        <input type="text" name="nama_siswa"  class="form-control form-control-sm">
                                    </div>
                                    @error('')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Link Perusahaan</label>
                                    <div class="d-flex">
                                        <i class="far fa-building border text-center"></i>
                                        <input type="text" name="nama_siswa"  class="form-control form-control-sm">
                                    </div>
                                    @error('')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="">
                                    <label class="form-label">Email Perusahaan</label>
                                    <div class="d-flex">
                                        <i class="far fa-building border text-center"></i>
                                        <input type="text" name="nama_siswa"  class="form-control form-control-sm">
                                    </div>
                                    @error('')
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
            <div class="col-sm-6" style="height: 500px;">
                <div class="">
                    <div class="input">
                        <div class="container mt-2">
                            <h5 class="card-title pt-4"></h5>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Pemimpin</label>
                                <div class="d-flex">
                                    <i class="far fa-building border text-center"></i>
                                    <input type="text" name="nama_siswa"  class="form-control form-control-sm">
                                </div>
                                @error('')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Perusahaan</label>
                                <div class="d-flex">
                                    <i class="far fa-building border text-center pt-3"></i>
                                    <textarea type="text" class="form-control form-control-sm" name="nama_siswa" rows="3"></textarea>
                                </div>
                                @error('')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Perusahaan</label>
                                <div class="d-flex">
                                    <i class="far fa-building border text-center"></i>
                                    <input type="text" name="nama_siswa"  class="form-control form-control-sm">
                                </div>
                                @error('')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Perusahaan</label>
                                <div class="d-flex">
                                    <i class="far fa-building border text-center" style="height: 41px; padding-top: 10px;"></i>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control">
                                    </div>
                                </div>
                                @error('')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" style="margin-top: -40px;">
                <div class="card-body mb-3">
                    <div class="d-flex">
                        <div>
                            <button type="submit" class="btn btn-primary rounded-pill"><i
                                    class="fas fa-check-square mr-2"></i>Submit</button>
                        </div>
                        </form>
                        &nbsp;&nbsp;&nbsp;
                        <div>
                            <a href="" class="btn btn-danger rounded-pill"><i
                                    class="fas fa-window-close mr-2"></i>Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection
@push('script')

@endpush
