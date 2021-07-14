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
            h5{
        color: rgb(82, 82, 255);
    }
</style>
@endpush
@section('title', 'Prakerin | Data Alumni')
@section('judul', 'DATA ALUMNI SISWA')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASHBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> Data Alumni</div>
@endsection
@section('main')
   <div class="card">
        <div class="">
            <div class="card-body mt-2">
                <div class="">
                    <h5>Data Alumni</h5>
                </div>
                <hr>
            </div>
        </div>
        <div class="card-body" style="margin-top: -40px">
            <div class="row">
                <div class="col-sm-6">
                <div class="">
                    <div class="" style="height: auto;">
                        <div class="card-body">
                        <form action="{{ route('alumni_siswa.post') }}" method="POST" class="input">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama siswa</label>
                                <div class="d-flex">
                                    <i class="far fa-id-card border text-center"></i>
                                <input type="text" name="nama" class="form-control
                                @error('nama') is-invalid @enderror" placeholder="nama" value="{{ old('nama') }}">
                                </div>
                                @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">kelas</label>
                                <div class="d-flex">
                                    <i class="fas fa-user border text-center"></i>
                                    <input type="text" name="kelas" class="form-control @error('kelas')
                                        is-invalid
                                    @enderror" placeholder="kelas" value="{{ old('kelas') }}">
                                </div>
                                @error('kelas')
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

                                    <input class="form-control  @error('jurusan')
                                        is-invalid
                                    @enderror"  name="jurusan">
                                </div>
                                @error('jurusan')
                                    <div class="invalid-feedback">
                                            {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Lulus</label>
                                <div class="d-flex">
                                    <i class="fas fa-phone border text-center"></i>
                                    <input type="text" class="form-control @error('tahun_lulus')
                                        is-invalid
                                    @enderror" name="tahun_lulus" placeholder="Masukan nomor telepone" >
                                </div>
                                @error('tahun_lulus')
                                    <div class="invalid-feedback">
                                            {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div style="margin-top: 40px;">
                            <button type="submit" class="btn btn-success rounded mr-2"><i class="fas fa-check-square mr-2"></i>Submit</button>
                            </form>
                            <a href="{{ route('alumni_siswa.index') }}" type="button" class="btn btn-danger rounded"><i class="fas fa-window-close mr-2"></i>Cancel</a>
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
