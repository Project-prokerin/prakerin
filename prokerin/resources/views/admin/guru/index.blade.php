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
    table.dataTable th:nth-child(2) {
        width: 190px;
        max-width: 190px;
        word-break: break-all;
        white-space: pre-line;
    }
    table.dataTable td:nth-child(3) {
        width: 140px;
        max-width: 140px;
        word-break: break-all;
        white-space: pre-line;
    }
    table.dataTable td:nth-child(4) {
        width: 90px;
        max-width: 90px;
        word-break: break-all;
        white-space: pre-line;
    }
    table.dataTable td:nth-child(5) {
        width: 50px;
        max-width: 50px;
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
        width: 140px;
        max-width: 140px;
        word-break: break-all;
        white-space: pre-line;
    }
    a[href$=".pdf/download"]:before
        {
        content: "\f1c1";
        font-family: fontawesome;
        padding-right: 10px;
        }
</style>
@endpush
@section('title', 'Prakerin | Data Guru')
@section('judul', 'DATA GURU')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i>DATA GURU</div>
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
            <a href="{{ route('siswa.tambah') }}"class="btn btn-primary rounded-pill"> Tambah Data <i class="fas fa-plus"></i></button></a>
        </div>
        <form class="d-flex flex-row-reverse mr-5" style="margin-top: -66px;">
            <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            <input class="form-control ml-3" type="search" placeholder="Search" aria-label="Search" id="search" style="width: 200px;">
            <div>
                <a href="#"class="btn btn-danger rounded-pill "> <i class="fas fa-cloud-download-alt"></i>  PDF</a>
            </div>
            &nbsp;&nbsp;&nbsp;
            <div>
                <a href="/export/excel/guru"class="btn btn-success rounded-pill "> <i class="fas fa-cloud-download-alt"></i>  Excel</a>
            </div>
        </form>
        <br>
        {{-- update --}}
        <table class="table table-bordered" id="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Jurusan</th>
            <th scope="col">No Tlp</th>
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
                    url: "{{route('guru.ajax')}}",
                    type: "post",
                    data: function (data) {
                        data = '';
                        return data
                    }
                    },
                    columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    { data: 'nik', name:'nik'},
                    { data: 'nama', name:'nama'},
                    { data: 'jabatan', name:'jabatan'},
                    { data: 'jurusan',name:'jurusan'},
                    { data: 'no_telp',name:'no_telp'},
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
                                url: "/admin/guru/delete/"+ id,
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
