@extends('template.master')
@push('link')
<link rel="stylesheet" href="{{asset('template/')}}/node_modules/select2/dist/css/select2.min.css">
    <style>
        .container {
            position: relative;
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
<div class="card mt-5">
    <div class="container text-center mt-5 mb-3 ml-1">
        <h3>Tambah data Prakerin</h3>
    </div>
    <div class="container">
        <form action="{{route('tanda-tangan.post')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row mt-3 ml-4 ">
                <div class="col-6  kanan">
                    <!-- perusa -->
                    <div class="mb-5 ">
                        <label>Tanggal Selesai</label>
                        <input type="file" name="ttd" class=" @error('ttd')  is-invalid  @enderror form-control "  value="">
                            @error('ttd')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>

                    <button type="submit"  class="btn btn-success mr-3"><i class="fas fa-check"></i> submit</button>
                    <a href="{{route('tanda-tangan.index')}}" type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('template/')}}/node_modules/select2/dist/js/select2.full.min.js"></script>

@endpush