@extends('template.master')
@push('link')
<style>
    .modal-backdrop {
        position: static !important;
    }

</style>
@endpush
@section('title','Prakerin | Alumni Siswa')
@section('judul','Alumni Siswa')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> TAMATAN PENELUSURAN</div>
@endsection
@section('main')
<div class="row">
    <div class="col-12">
        @if ($message = Session::get('berhasil'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ $message }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if ($message = Session::get('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> {{ $message }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Data Alumni Siswa</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="">
                    <table class="table table-striped" id="table9">
                        <thead class="text-center">
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>Nama</th>
                                <th>kelas</th>
                                <th>jurusan</th>
                                <th>tahun sekolah</th>
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
<span class="d-none" id="role" data-role="{{ Auth::user()->role }}"></span>

<!-- Import Excel -->
<div class="modal" id="importExcel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/import/excel/alumni_siswa" enctype="multipart/form-data">
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
<script src="{{ asset('assets/js/pages-admin/alumni_siswa.js') }}"></script>
@endpush
