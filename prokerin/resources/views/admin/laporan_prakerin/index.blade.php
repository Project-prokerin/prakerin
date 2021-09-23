
@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('template/') }}/node_modules/select2/dist/css/select2.min.css">

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

    </style>
@endpush
@section('title', 'Prakerin | LAPORAN PRAKERIN')
@section('judul', 'LAPORAN PRAKERIN')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i> LAPORAN PRAKERIN</div>
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
                    <h4>Laporan Prakerin</h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive" id="mytable4">
                        <table class="table table-striped" id="table16">
                            <thead class="text-center">
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>Judul Laporan</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat Perusahaan</th>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- for add --}}
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-left: 90px;">
                <div class="modal-body">
                    <form action="{{ route('laporan.post') }}" method="POST" id="contact_form">
                        @csrf




                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="/admin/jurnalH">
                                    <div class="card-body">
                                        <h5 class="card-title mb-5">Laporan Prakerin</h5>

                                        <div class="row">

                                            <div class="col-sm-12">

                                                <div class="form-group">
                                                    <label>
                                                        <h6>Judul Laporan</h6>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" name="judul_laporan" id="judul_laporan"
                                                            class="form-control ">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        <h6>No kelompok</h6>
                                                    </label>
                                                    <div class="input-group">

                                                        <select name="id_kelompok_laporan" id="id_kelompok_laporan"
                                                            class="form-control select2">
                                                            <option value="">--No Kelompok--</option>
                                                            @forelse ($kelompok as $item)
                                                                <option value="{{ $item->no }}">{{ $item->no }}
                                                                @empty
                                                                <option disabled>Belom ada kelompok laporan!
                                                                </option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- button save --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
                        </div>

                        {{-- button save --}}
                </div>
            </div>
            </form>
        </div>
    </div>
    {{-- for add --}}

    {{-- for edit --}}
    <div class="modal fade" id="editModal" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="editBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="update" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    {{-- for edit --}}
  <span  id="role" data-role="{{ Auth::user()->role }}"></span>


@endsection
@push('script')
    <script src="{{ asset('assets/js/pages-admin/laporan.js') }}"></script>
    <script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>

@endpush
