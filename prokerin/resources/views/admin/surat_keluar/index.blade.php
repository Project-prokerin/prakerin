@extends('template.master')
@push('link')
    <style>
        #mytable2 {
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
@section('title', 'Prakerin | Surat Penugasan')
@section('judul', 'Surat Penugasan')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="fas fa-user"></i> SURAT MASUK</div>
@endsection
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Surat Penugasan</h4>
                </div>
                <div class="card-body">
                    @if (session('pesan'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('pesan') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive" id="mytable2">
                        <table class="table table-striped" id="table80">
                            <thead class="text-center">
                                <tr>
                                    @if (Auth::user()->role == 'hubin' || Auth::user()->role == 'tu' || Auth::user()->role == 'bkk')
                                        <th>
                                            No
                                        </th>
                                        <th>Nama Surat</th>
                                        <th>status</th>
                                        <th>tanggal surat</th>
                                        <th>Action</th>
                                    @elseif(Auth::user()->role == 'admin' or Auth::user()->role == 'kepsek' or
                                        Auth::user()->role == 'kaprog')
                                        <th>
                                            No
                                        </th>
                                        <th>Nama Surat</th>
                                        <th>Nama guru</th>
                                        <th>jabatan</th>
                                        <th>status</th>
                                        <th>Persetujuan</th>
                                        <th>tanggal surat</th>
                                        <th>Action</th>
                                    @endif


                                </tr>
                            </thead>
                            <tbody class="text-center">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="tandatanganModal" aria-labelledby="tandatanganModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="tandatanganBody">

                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="setujui" class="btn btn-primary">Setujui</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <span class="d-none" id="role" data-role="{{ Auth::user()->role }}"></span>
@endsection
@push('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="{{ asset('assets/js/pages-admin/surat-keluar.js') }}"></script>

    <script>


    </script>
@endpush
