@extends('template.master')
@push('link')
<style>
    .card{
        height: auto;
    }
    .buton{
        margin-top: 30px;
        margin-left: 50px;
        margin-bottom: 30px;
        width: 40%;
    }
    .table{
        margin-top: 20px;
    }

</style>
@endpush
@section('title', 'Prakerin | LAPORAN PRAKERIN')
@section('judul', 'LAPORAN PRAKERIN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> LAPORAN PRAKERIN</div>
@endsection
@section('main')
<div class="card">
<div class="buton" style="z-index: 2;">  
    <a href="{{ route('kelompok.tambah') }}"><button type="button" class="btn btn-primary rounded-pill">Tambah Data <i class="fas fa-plus"></i></button></a>
    {{-- <a style="margin-left: -170px" href="/export/excel/data_prakerin"><button type="button" class="btn btn-success buten ">Export to Excel</button></a>
    <a href="/export/pdf/data_prakerin"><button type="button" class="btn btn-danger butan">Export to PDF</button></a> --}}
</div>
<form class="d-flex flex-row-reverse mr-5" style="margin-top: -66px;">
    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width: 200px;">
    <div>
        <a href="/export/pdf/data_prakerin"><button type="button" class="btn btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i>  PDF</button></a>
    </div>
    <div>
        <a href="/export/excel/data_prakerin"><button type="button" class="btn btn-success mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i>  Excel</button></a>
    </div>
</form>
    <!-- table -->
    <div class="container">
    <table class="table table-bordered text-center" id="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Judul Laporan</th>
            <th scope="col">Nama Perusahaan</th>
            <th scope="col">Alamat Perusahaan</th>
            <th scope="col">Actiom</th>
        </tr>
    </thead>
    <tbody>
        {{-- <tr>
            <th scope="row">1</th>
            <td>marker</td>
            <td>11</td>
            <td>RPL</td>
            <td>
                <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </td>
        </tr> --}}
        
    </tbody>
    </table>

    {{--  --}}
        <nav aria-label="Page navigation example">
            {{-- <ul class="pagination mt-5 mb-4 justify-content-right">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul> --}}
        </nav>
    {{--  --}}
</div>
</div>
@endsection
@push('script')
    <script>
         $(document).ready( function () {
                var filter = $('#search').val();
                console.log(filter);
                var table = $('#table').DataTable({
                    dom: 't<"bottom"<"row"<"col-6"i><"col-6 mb-4"p>>>',
                    bLengthChange: false,
                    ordering:false,
                    info: true,
                    filtering:false,
                    searching: true,
                    serverside: true,
                    processing: true,
                    serverSide: true,
                    "responsive": true,
                    "autoWidth": false,
                    ajax:{
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('laporan.ajax')}}",
                    type: "post",
                    data: function (data) {
                        data = '';
                        return data
                    }
                    },
                    columns:[
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    { data: 'judul_laporan',name:'judul_laporan'},
                    { data: 'nama_perusahaan',name:'id_kelompok_laporan.nama_perusahaan'},
                    { data: 'alamat_perusahaan',name:'alamat_perusahaan'},
                    { data: 'action',name:'action'}
                    ],
                    order: [[0,'asc']]
                });

            // search engine
            $("#search").keyup(function () {
                table.search( this.value ).draw();
            })

                // hapus data
            $('body').on('click','#hapus', function () {
            // sweet alert
                Swal.fire({
                title: 'Apa anda yakin?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    id = $(this).data('id');
                    $.ajax({
                            url: "/admin/laporan/delete/"+ id,
                            type: "DELETE",
                            data: { _token: '{{csrf_token()}}' },
                            success: function (data) {
                                console.log(data);
                                table.draw();
                                Swal.fire(
                                    'success',
                                    'Data anda berhasil di hapus.',
                                    'success'
                                )
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {}
            })

            })
            });
    </script>

@endpush
