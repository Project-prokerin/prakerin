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

@endsection
@push('script')
    {{-- <script src="{{ asset('assets/js/pages-admin/laporan.js') }}"></script> --}}
    <script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>
    <script>
        $(document).ready(function() {
            var filter = $('#search').val();
            console.log(filter);
            var table = $('#table16').DataTable({
                dom: "<'row'<'ol-sm-12 col-md-6 btn-table'><'col-sm-12 col-md-6  pdf-button'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
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
                    url: "/admin/laporan/ajax/",
                    type: "post",
                    data: function(data) {
                        data = '';
                        return data
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'judul_laporan',
                        name: 'judul_laporan'
                    },
                    {
                        data: 'nama_perusahaan',
                        name: 'id_kelompok_laporan.nama_perusahaan'
                    },
                    {
                        data: 'alamat_perusahaan',
                        name: 'alamat_perusahaan'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                order: [
                    [0, 'asc']
                ]
            });

            $('.btn-table').append(
                '<a href="/admin/laporan/tambah"class="btn btn-primary " data-toggle="modal" data-target="#exampleModal"> Tambah Data <i class="fas fa-plus"></i></button></a>'
            );
            $('#table16_filter').prepend(
                '<a href="/admin/export/excel/laporan"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
            );

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
                        id = $(this).data('id');
                        $.ajax({
                            url: "/admin/laporan/delete/" + id,
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


            $('#submit').click(function(event) {
                event.preventDefault();
                var form = $('#contact_form'),
                    url = form.attr('action'),
                    method = form.atteditModalr('method');

                form.find('.invalid-feedback').remove();
                form.find('.form-control').removeClass('is-invalid')
                $.ajax({
                    url: url,
                    method: method,
                    data: form.serialize(),
                    success: function name(params) {
                        form.trigger('reset');
                        $('#exampleModal').modal('hide');
                        alert = Swal.fire({
                            title: 'Berhasil',
                            text: 'Anda Berhasil menambah laporan baru',
                            icon: 'success',
                            confirmButtonText: 'tutup'
                        })

                        setInterval(() => {
                            alert
                        }, 3000);

                        location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseJSON)
                        var err = xhr.responseJSON;
                        if ($.isEmptyObject(err) == false) {
                            $.each(err.errors, function(key, value) {

                                $('#' + key).addClass('is-invalid').closest(
                                    '.input-group').append(
                                    '<div class="invalid-feedback">' + value +
                                    '</div>')


                                console.log(key);
                            })
                        }
                    }
                });
            })


            //edit
            $(document).on('click', '#editButton', function(event) {
                event.preventDefault();
                let href = $(this).attr("data-attr");

                $.ajax({
                    url: href,
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(result) {
                        $('#editModal').modal("show");
                        $('#editBody').html(result).show();
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        alert("Page " + href + " cannot open. Error:" + error);
                        $('#loader').hide();
                    },
                    timeout: 8000
                })
            });

            $('#update').click(function(event) {
                event.preventDefault();
                var form = $('#edit_form'),
                    url = form.attr('action');
                    method = form.attr('method');
                form.find('.invalid-feedback').remove();
                form.find('.form-control').removeClass('is-invalid')
                $.ajax({
                    url: url,
                    method: method,
                    data: form.serialize(),
                    success: function name(params) {
                        form.trigger('reset');
                        $('#editModal').modal('hide');
                        alert = Swal.fire({
                            title: 'Berhasil',
                            text: ' Berhasil Update Laporan ',
                            icon: 'success',
                            confirmButtonText: 'tutup'
                        })

                        setInterval(() => {
                            alert
                        }, 7000);

                        location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseJSON)
                        var err = xhr.responseJSON;
                        if ($.isEmptyObject(err) == false) {
                            $.each(err.errors, function(key, value) {

                                $('#' + key).addClass('is-invalid').closest(
                                    '.input-group').append(
                                    '<div class="invalid-feedback">' + value +
                                    '</div>')
                                console.log(key);
                            })
                        }
                    }
                });
            })

        });

    </script>

@endpush
