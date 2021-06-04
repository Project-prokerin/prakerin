@extends('template.master')
@push('link')
    <style>
        .card {
            height: auto;
        }

        .buton {
            margin-top: 30px;
            margin-left: 50px;
            margin-bottom: 30px;
            width: 40%;
        }

        .table {
            margin-top: 20px;
        }

        .card-body {
            margin-top: -20px;
        }

        table.dataTable th:nth-child(1) {
            width: 20px;
            max-width: 130px;
            word-break: break-all;
            white-space: pre-line;
        }

        table.dataTable th:nth-child(2) {
            width: 60px;
            max-width: 190px;
            word-break: break-all;
            white-space: pre-line;
        }

        table.dataTable td:nth-child(3) {
            width: 40px;
            max-width: 140px;
            word-break: break-all;
            white-space: pre-line;
        }

        table.dataTable td:nth-child(4) {
            width: 140px;
            max-width: 140px;
            word-break: break-all;
            white-space: pre-line;
        }

        table.dataTable th:nth-child(5) {
            width: 80px;
            max-width: 80px;
            word-break: break-all;
            white-space: pre-line;
        }

    </style>
@endpush
@section('title', 'Prakerin | Kelompok Prakerin')
@section('judul', ' KELOMPOK PRAKERIN')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i> Kelompok Prakerin</div>
@endsection
@section('main')
    <div class="card">
        <div class="card-body">
            <div class="buton" style="z-index: 2;">
                <a href="{{ route('kelompok.tambah') }}"><button type="button" class="btn btn-primary rounded-pill">Tambah
                        Data <i class="fas fa-plus"></i></button></a>
            </div>
            <form class="d-flex flex-row-reverse mr-5" style="margin-top: -66px;">
                <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                <input class="form-control me-2" id="search" type="search" placeholder="Search" aria-label="Search"
                    style="width: 200px;">
                {{-- <div> --}}
                {{-- <a href="/export/pdf/data_prakerin">
                    </a> --}}
                {{-- <button id="kelompok_pdf" type="button" class="btn btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i> PDF</button> --}}
                {{-- </div> --}}
                <div>
                    <a href="/export/excel/data_prakerin"><button type="button" class="btn btn-success mr-3 rounded-pill"><i
                                class="fas fa-cloud-download-alt"></i> Excel</button></a>
                </div>
            </form>
        </div>
        <!-- table -->

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ $message }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($message = Session::get('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ $message }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="container">
            <table class="table table-bordered text-center" id="table30">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Guru Pembimbing</th>
                        {{-- <th scope="col">Jurusan</th> --}}
                        <th scope="col">Perusahaan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>


            {{--  --}}
        </div>
    </div>
@endsection
@push('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/js/pages-admin/kelompok.js') }}" ></script>
@endpush
