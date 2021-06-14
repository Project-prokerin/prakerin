@extends('template.master')
@push('link')
<style>
    #mytable1 {
        overflow-x: hidden;
    }

    .card {
        height: auto;
    }

    .buton {

        margin-left: 25px;
        margin-bottom: 10px;
    }

    a[href$=".pdf/download"]:before {
        content: "\f1c1";
        font-family: fontawesome;
        padding-right: 10px;
    }

</style>
@endpush
@section('title','Prakerin | TU')
@section('judul','DATA TU')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> DATA TU</div>
@endsection
@section('main')
<div class="row">
    <div class="col-12">
        @if ($message = Session::get(''))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ $message }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Data Surat Masuk</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="mytable1">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>Nama Surat</th>
                                <th>Untuk</th>
                                <th>Status</th>
                                <th>status</th>
                                <th>disposisi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#" class="btn btn-primary"><i class="fas fa-search"></i></a>
                                    <a href="#" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<span class="d-none" id="role" data-role="{{ Auth::user()->role }}"></span>
@endsection
@push('script')
<script src="{{ asset('assets/js/pages-admin/surat-masuk.js') }}"></script>
@endpush
