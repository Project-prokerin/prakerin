@extends('template.master')
@push('link')
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

        .card-body {
            margin-top: -20px;
        }

        table.dataTable th:nth-child(1) {
            width: 20px;
            max-width: 130px;
            word-break: break-all;
            white-space: pre-line;
        }

        table.dataTable th:nth-child(2) {
            width: 60px;
            max-width: 190px;
            word-break: break-all;
            white-space: pre-line;
        }

        table.dataTable td:nth-child(3) {
            width: 40px;
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
            width: 80px;
            max-width: 80px;
            word-break: break-all;
            white-space: pre-line;
        }

    </style>
@endpush
@section('title', 'Prakerin | Kelompok Prakerin')
@section('judul', ' KELOMPOK PRAKERIN')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i> Kelompok Prakerin</div>
@endsection
@section('main')
    <div class="card">
        <div class="card-body">
            <div class="buton" style="z-index: 2;">
                <a href="{{ route('kelompok.tambah') }}"><button type="button" class="btn btn-primary rounded-pill">Tambah
                        Data <i class="fas fa-plus"></i></button></a>
            </div>
            <form class="d-flex flex-row-reverse mr-5" style="margin-top: -66px;">
                <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                <input class="form-control me-2" id="search" type="search" placeholder="Search" aria-label="Search"
                    style="width: 200px;">
                {{-- <div> --}}
                {{-- <a href="/export/pdf/data_prakerin">
                    </a> --}}
                {{-- <button id="kelompok_pdf" type="button" class="btn btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i> PDF</button> --}}
                {{-- </div> --}}
                <div>
                    <a href="/export/excel/data_prakerin"><button type="button" class="btn btn-success mr-3 rounded-pill"><i
                                class="fas fa-cloud-download-alt"></i> Excel</button></a>
                </div>
            </form>
        </div>
        <!-- table -->

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ $message }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($message = Session::get('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ $message }}.
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
                        <th scope="col">Guru Pembimbing</th>
                        {{-- <th scope="col">Jurusan</th> --}}
                        <th scope="col">Perusahaan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>


            {{--  --}}
        </div>
    </div>
@endsection
@push('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            var filter = $('#search').val();
            console.log(filter);
            var table = $('#table').DataTable({
                dom: 't<"bottom"<"row"<"col-6"i><"col-6"p>>>',
                bLengthChange: false,
                ordering: false,
                info: true,
                filtering: false,
                searching: true,
                serverside: true,
                processing: true,
                serverSide: true,
                "responsive": true,
                "autoWidth": false,
                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('kelompok.ajax') }}",
                    type: "post",
                    data: function(data) {
                        data = '';
                        return data
                    }
                },
                columns: [{
                        data: 'no',
                        name: 'no'
                    },
                    {
                        data: 'guru',
                        name: 'guru.nama'
                    },
                    // { data: 'no_telpon',name:'no_telpon'},
                    // { data: 'jurusan',name:'jurusan'},
                    {
                        data: 'nama_perusahaan',
                        name: 'nama_perusahaan'
                    },
                    // { data: 'data_prakerin',name:'data_prakerin.'},
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                order: [
                    [0, 'asc']
                ]
            });

            // search engine
            $("#search").keyup(function() {
                table.search(this.value).draw();
            })

            // hapus data
            $('body').on('click', '#hapus', function() {
                // sweet alert
                Swal.fire({
                    title: 'Apa anda yakin?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        id = $(this).data('no');
                        $.ajax({
                            url: "/kelompok/destroy_all/" + id,
                            type: "DELETE",
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                console.log(data);
                                table.draw();
                                Swal.fire(
                                    'success',
                                    'Data anda berhasil di hapus.',
                                    'success'
                                )
                            },
                            error: function(data) {
                                console.log('Error:', data);
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {}
                })

            })

        });
        $(document).ready(function() {


            $(document).on('click', '#kelompoks', function() {
                swal("Masukan Nomor Kertas", {
                        content: "input",
                    })
                    .then((value) => {
                        var id = $(this).data('no');
                        var nomor = value;
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "/export/pdf/kelompok/" + id + "/" + nomor,
                            type: "POST",
                            data: {
                                "id": id,
                                "nomor": nomor,
                            },
                            xhrFields: {
                                responseType: 'blob'
                            },
                            success: function(response) {
                                // swal(`Berhasil Di download!`);
                                swal({
                                    title: "Success!",
                                    text: "Berhasil Di Download",
                                    icon: "success",
                                });
                                var blob = new Blob([response]);
                                var link = document.createElement('a');
                                link.href = window.URL.createObjectURL(blob);
                                link.download = "Sample.pdf";
                                link.click();
                            },
                            error: function(blob) {
                                console.log(blob);
                                swal({
                                    title: "Error!",
                                    text: "Gagal Di Download",
                                    icon: "error",
                                });


                            }
                        });

                    });
            })

        });

    </script>
@endpush
