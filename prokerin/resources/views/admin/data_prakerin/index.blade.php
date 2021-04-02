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
        width: 130px;
        max-width: 130px;
        word-break: break-all;
        white-space: pre-line;
    }

    table.dataTable td:nth-child(1) {
        width: 130px;
        max-width: 130px;
        word-break: break-all;
        white-space: pre-line;
    }
    table.dataTable th:nth-child(2) {
        width: 35px;
        max-width: 35px;
        word-break: break-all;
        white-space: pre-line;
    }

    table.dataTable td:nth-child(2) {
        width: 35px;
        max-width: 35px;
        word-break: break-all;
        white-space: pre-line;
    }
    table.dataTable th:nth-child(4) {
        width: 190px;
        max-width: 190px;
        word-break: break-all;
        white-space: pre-line;
    }

    table.dataTable td:nth-child(4) {
        width: 190px;
        max-width: 190px;
        word-break: break-all;
        white-space: pre-line;
    }
    table.dataTable th:nth-child(5) {
        width: 90px;
        max-width: 90px;
        word-break: break-all;
        white-space: pre-line;
    }

    table.dataTable td:nth-child(5) {
        width: 90px;
        max-width: 90px;
        word-break: break-all;
        white-space: pre-line;
    }
    table.dataTable th:nth-child(6) {
        width: 90px;
        max-width: 90px;
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
        @section('title', 'Prakerin | Data Prakerin')
        @section('judul', 'DATA PRAKERIN')
        @section('breadcrump')
                <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
                <div class="breadcrumb-item"> <i class="fas fa-th mr-2"></i>DATA PRAKERIN</div>
        @endsection
        @section('main')
        <div class="card">
        <!-- table -->
        <div class="container mt-4" >
        {{-- <div class="row" style="margin-bottom: -30px;">
            <div class="col-3">
            <a href="{{ route('data_prakerin.tambah') }}"class="btn btn-primary"> Tambah Data <i class="fas fa-plus"></i></button></a>
            </div>
            <div class="col-9 d-flex justify-content-end" >
            <a href="/export/excel/data_prakerin"class="btn btn-success "> Export to Excel</a>
            &nbsp;&nbsp;&nbsp;
            <a href="/export/pdf/data_prakerin"class="btn btn-danger "> Export to PDF</a>
            </div>
        </div> --}}
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
            <a href="{{ route('data_prakerin.tambah') }}"class="btn btn-primary rounded-pill"> Tambah Data <i class="fas fa-plus"></i></button></a>
        </div>
        <form class="d-flex flex-row-reverse mr-5" style="margin-top: -66px;">
            <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            <input class="form-control ml-3" type="search" placeholder="Search" aria-label="Search" id="search" style="width: 200px;">
            <div>
                <a href="/export/pdf/data_prakerin"class="btn btn-danger rounded-pill "> <i class="fas fa-cloud-download-alt"></i>  PDF</a>
            </div>
            &nbsp;&nbsp;&nbsp;
            <div>
                <a href="/export/excel/data_prakerin"class="btn btn-success rounded-pill "> <i class="fas fa-cloud-download-alt"></i>  Excel</a>
            </div>
        </form>
        <br>
        {{-- update --}}
        <table class="table table-bordered text-center" id="table">
        <thead>
            <tr>
            {{-- <th scope="col">no</th> --}}
            <th scope="col">Nama</th>
            <th scope="col">Kelas</th>
            <th scope="col">Jurusan</th>
            <th scope="col">perusahaan</th>
            <th scope="col">Tgl Mulai</th>
            <th scope="col">Tgl Selesai</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

            {{-- <tr>
            <th scope="row">1</th>
            <td>marker</td>
            <td>11</td>
            <td>RPL</td>
            <td>121212</td>
            <td>121212</td>
            <td>Telkom</td>
            <td>
            <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
            <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
            <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </td>
            </tr> --}}

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
                    url: "{{route('data_prakerin.ajax')}}",
                    type: "post",
                    data: function (data) {
                        data = '';
                        return data
                    }
                    },
                    columns:[
                    // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    { data: 'nama',name:'nama'},
                    { data: 'kelas',name:'kelas'},
                    { data: 'jurusan',name:'jurusan'},
                    { data: 'perusahaan',name:'perusahaan.nama'},
                    {
                    data: 'tgl_mulai',
                    type: 'num',
                    render: {
                        _: 'display',
                        sort: 'timestamp'
                    }
                    },{
                    data: 'tgl_selesai',
                    type: 'num',
                    render: {
                        _: 'display',
                        sort: 'timestamp'
                    }
                    },
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
                            url: "/admin/data_prakerin/delete/"+ id,
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
