@extends('template.master')
@push('link')
 <style>
        .card{
                height: auto;
        }
        .buton{
            margin-top: 10px;
            margin-left: 50px;
            margin-bottom: 30px;
        }
        .table{
                margin-top: 20px;
        }


    table.dataTable th:nth-child(1) {
        width: 20px;
        max-width: 130px;
        word-break: break-all;
        white-space: pre-line;
    }

    table.dataTable td:nth-child(1) {
        width: 20px;
        max-width: 130px;
        word-break: break-all;
        white-space: pre-line;
    }
    table.dataTable th:nth-child(2) {
        width: 190px;
        max-width: 190px;
        word-break: break-all;
        white-space: pre-line;
    }

    table.dataTable td:nth-child(2) {
        width: 140px;
        max-width: 140px;
        word-break: break-all;
        white-space: pre-line;
    }
    table.dataTable td:nth-child(3) {
        width: 140px;
        max-width: 140px;
        word-break: break-all;
        white-space: pre-line;
    }
    table.dataTable th:nth-child(4) {
        width: 140px;
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
        width: 140px;
        max-width: 140px;
        word-break: break-all;
        white-space: pre-line;
    }

    table.dataTable td:nth-child(5) {
        width: 140px;
        max-width: 140px;
        word-break: break-all;
        white-space: pre-line;
    }
    table.dataTable th:nth-child(6) {
        width: 140px;
        max-width: 140px;
        word-break: break-all;
        white-space: pre-line;
    }

    table.dataTable td:nth-child(6) {
        width: 90px;
        max-width: 90px;
        word-break: break-all;
        white-space: pre-line;
    }
    table.dataTable th:nth-child(7) {
        width: 90px;
        max-width: 90px;
        word-break: break-all;
        white-space: pre-line;
    }

    table.dataTable td:nth-child(7) {
        width: 90px;
        max-width: 90px;
        word-break: break-all;
        white-space: pre-line;
    }
        </style>
@endpush
@section('title', 'Prakerin | Data Pembekalan Magang')
@section('judul', 'DATA PEMBEKALAN MAGANG')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-newspaper"></i> DATA PEMBEKALAN MAGANG</div>
@endsection
@section('main')
  <div class="card">
        <!-- table -->
        <div class="container mt-4" >
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

        {{-- update --}}
        <div class="buton">
            <a href="{{ route('pembekalan.tambah') }}"class="btn btn-primary rounded-pill"> Tambah Data <i class="fas fa-plus"></i></button></a>
        </div>
        <form class="d-flex flex-row-reverse mr-5" style="margin-top: -66px;">
            <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            <input class="form-control ml-3" type="search" placeholder="Search" aria-label="Search" id="search" style="width: 200px;">
            <div>
                <a href="/export/pdf/pembekalan"class="btn btn-danger rounded-pill "> <i class="fas fa-cloud-download-alt"></i>  PDF</a>
            </div>
            &nbsp;&nbsp;&nbsp;
            <div>
                <a href="/export/excel/pembekalan"class="btn btn-success rounded-pill "> <i class="fas fa-cloud-download-alt"></i>  Excel</a>
            </div>
        </form>
        <br>
        {{-- update --}}
        <table class="table table-bordered text-center" id="table">
        <thead>
            <tr>
           <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Test WPT IQ</th>
                    <th scope="col">PI</th>
                    <th scope="col">Test Soft Skill</th>
                    <th scope="col">Portfolio</th>
                    <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
        </table>
        <!-- tutup table -->
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
                    url: "{{route('pembekalan.ajax')}}",
                    type: "post",
                    data: function (data) {
                        data = '';
                        return data
                    }
                    },
                    columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    { data: 'siswa', name:'siswa'},
                    { data: 'test_wpt_iq', name:'test_wpt_iq'},
                    { data: 'personality_interview', name:'personality_interview'},
                    { data: 'soft_skill',name:'soft_skill'},
                    { data: 'file',name:'file'},
                    { data: 'action',name:'action'}
                    ],
                    columnDefs: [
                    { targets: [1,2,3,4], 'createdCell':  function (td, cellData, rowData, row, col) {
                            if (cellData == 'belum') { // untuk MEWARNAI COLUMN TABLE
                                $(td).addClass('bg-danger text-white');
                            }else if (cellData == 'sudah') {
                                $(td).addClass('bg-success text-white');
                            }
                    }},
                    { targets: [5], 'createdCell':  function (td, cellData, rowData, row, col) {
                            if (cellData == 'belum') { // untuk MEWARNAI COLUMN TABLE
                                $(td).addClass('bg-danger  text-white');
                            }else{
                                $(td).addClass('bg-success text-white');
                            }
                    }},
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
                                url: "/admin/pembekalan/delete/"+ id,
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
