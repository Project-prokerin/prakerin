@extends('template.master')
@push('link')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
    a {
        color: blue;
    }

</style>

@endpush
@section('title', 'Prakerin | Nilai Data Prakerin')
@section('judul', 'Nilai Data Prakerin')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-newspaper"></i> NILAI DATA PRAKERIN</div>
@endsection
@section('main')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('fail'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('fail') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @if (Auth::user()->role === 'kaprog')
                <h4>Nilai Sekolah Data Prakerin</h4>

                @else
                <h4>Nilai Perusahaan Data Prakerin</h4>

                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @if (Auth::user()->role != 'kepsek' && Auth::user()->role != 'tu'  && Auth::user()->role != 'bkk'  )
                        <a href="/admin/nilai_prakerin/tambah" class="btn btn-primary ml-3 "> Tambah Data <i
                                class="fas fa-plus"></i></button></a>

                        @else

                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-7">
                                <select name="" class="form-control mb-2  jurusan  @error('')  is-invalid  @enderror select2">
                                    <option value="RPL">--Pilih Jurusan--</option>
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->id }}" {{ ($item->id == 1) ? 'selected' : '' }}>{{ $item->singkatan_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <a href="/admin/export/excel/nilai_prakerin" class="btn btn-success mr-3  ml-2"> Excel
                                    <i class="fas fa-cloud-download-alt"></i></button></a>
                                <label>Search:<input type="search" id="search" class="form-control form-control-sm" placeholder=""
                                        aria-controls="table19"></label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="table9">
                        <thead class="text-center">
                            {{-- @if (Auth::user()->role == 'admin' or Auth::user()->role == '')
                            <tr>
                                <th>No</th>
                                <th>Siswa</th>
                            </tr>
                            @endif --}}
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td> 1</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="{{ asset('assets/js/pages-admin/nilai-prakerin.js') }}"></script>
@endpush
