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
@section('title', 'Prakerin | Data Perusahaan')
@section('judul', 'JURNAL PRAKERIN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> JURNAL PRAKERIN</div>
@endsection
@section('main')
<div class="card">
<div class="buton" style="z-index: 2;">  
    <br>
    <br>
    <a href="{{ route('jurnal.tambah') }}"><button type="button" class="btn btn-primary rounded-pill">Tambah Data <i class="fas fa-plus"></i></button></a>
    {{-- <a style="margin-left: -170px" href="/export/excel/data_prakerin"><button type="button" class="btn btn-success buten ">Export to Excel</button></a>
    <a href="/export/pdf/data_prakerin"><button type="button" class="btn btn-danger butan">Export to PDF</button></a> --}}
</div>
<form class="d-flex flex-row-reverse mr-5" style="margin-top: -66px;">
    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
    <input class="form-control ml-3" type="search" placeholder="Search" aria-label="Search" id="search" style="width: 200px;">
    {{-- <input class="form-control me-2" type="search"  placeholder="Search" aria-label="Search" id="search" style="width: 200px;"> --}}
    <div>
        <a href="/export/pdf/data_prakerin"><button type="button" class="btn btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i>  PDF</button></a>
    </div>
    <div>
        <a href="/export/excel/data_prakerin"><button type="button" class="btn btn-success mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i>  Excel</button></a>
    </div>
</form>
    <!-- table -->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container">
    <table class="table table-bordered text-center" id="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Nama Perusahaaan</th>
            <th scope="col">Tanggal mulai</th>
            <th scope="col">Jam Mulai</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
      
    </tbody>
    </table>

    {{--  --}}
        {{-- <nav aria-label="Page navigation example">
            <ul class="pagination mt-5 mb-4 justify-content-right">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav> --}}
    {{--  --}}
</div>
</div>

@endsection
@push('script')
 <script>
  $(document).ready( function () {
                var filter = $("#search").val();
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
                    "responsive": true,
                    "autoWidth": false,
                    ajax:{
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('jurnal.ajax')}}",
                    type: "post",
                    data: function (data) {
                        data = '';
                        return data
                    }
                    },
                    columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    { data: 'id_siswa',name:'id_siswa'},
                    { data: 'id_perusahaan',name:'id_perusahaan'},
                    {
                           data: 'tanggal_pelaksanaan',
                           type: 'num',
                           render: {
                              _: 'display',
                              sort: 'timestamp'
                           }
                        },
                    { data: 'jam_masuk',name:'jam_masuk'},

                    { data: 'action',name:'action'}
                    ],
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
                                url: "/admin/jurnal/delete/"+ id,
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
            });
            });



          
        </script>
@endpush
