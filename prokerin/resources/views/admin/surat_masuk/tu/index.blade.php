@extends('template.master')
@push('link')
<style>
      .card{
                height: auto;
        }
        .buton{
            margin-top: 10px;
            margin-left: 20px;
            margin-bottom: 30px;
        }
    a[href$=".pdf/download"]:before
        {
        content: "\f1c1";
        font-family: fontawesome;
        padding-right: 10px;
        }
</style>
@endpush
@section('title','Prakerin | TU')
@section('judul','DATA TU')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i> DATA TU</div>
@endsection
@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-align-justify mr-2"></i>Surat Masuk</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                </div>
                @endif
                <div class="buton">
                    <a href="{{ route('surat_masuk.tu.tambah') }}"class="btn btn-primary rounded-pill"> Tambah Data <i class="fas fa-plus"></i></button></a>
                </div>
                <div class="table-responsive">
                    <div id="table-1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="col-sm-12">
                            <table class="table table-striped dataTable no-footer" id="table-1" role="grid"
                                aria-describedby="table-1_info">
                                <thead class="text-center">
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="table-1"
                                            aria-sort="ascending" aria-label="# : activate to sort column descending">
                                            #
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="table-1"
                                            aria-label="NISN: activate to sort column ascending">
                                            Nama Surat
                                        </th>
                                        <th class="sorting_disabled">
                                            Untuk
                                        </th>
                                        <th class="sorting_disabled">
                                            Status
                                        </th>
                                        <th class="sorting_disabled">
                                            Isi Disposisi
                                        </th>
                                        <th class="sorting_disabled">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                            <a href="" class="btn btn-success"><i class="far fa-edit"></i></a>
                                            <form method="POST"
                                                action=""
                                                id="form" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger hapus" id="hapus"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <br>
    </div>
</div>
<span class="d-none" id="nam" data-id="transaksi"></span>
@endsection
@push('script')
<script>

</script>
@endpush
