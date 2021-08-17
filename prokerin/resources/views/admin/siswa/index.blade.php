@extends('template.master')
@push('link')
<style>
    #mytable4 {
        overflow-x: hidden;
    }

    .modal-backdrop {
        position: static !important;
    }

</style>
@endpush
@section('title', 'Prakerin | Data siswa')
@section('judul', 'DATA SISWA')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> DATA SISWA</div>
@endsection
@section('main')
@if ($messege = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $messege }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($messege = Session::get('fail'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $messege }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(isset($errors) && $errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $error }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endforeach
@endif

{{-- yang ini masih ngebug --}}
@if (Session()->has('erorr'))
<div class="alert alert-danger">
    <table class="table table-bordered ">
        <thead>
            <tr>
                <td>Row</td>
                <td>Atributte / Column</td>
                <td>Erorr</td>
            </tr>
        </thead>
        <tbody>
            @foreach (Session()->get('erorr') as $errors)

            <tr>
                <td>{{ $errors->row() }}</td>
                <td>{{ $errors->attribute() }}</td>
                <td>
                    <ul>
                        @foreach ($errors->errors() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Siswa</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive" id="mytable4">
                    <table class="table table-striped" id="table9">
                        <thead class="text-center">
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>NIPD</th>
                                <th>Nisn</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Tanggal lahir</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>
                                    1
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{--  model for import --}}
<div class="modal" id="importExcel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/import/excel/siswa" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required" id="file" accept=".xlsx, .xls, .csv">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="modal_close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('script')
<script src="{{ asset('assets/js/pages-admin/siswa.js') }}"></script>
@endpush
