@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('template/') }}/node_modules/select2/dist/css/select2.min.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Script -->
        <!-- Font Awesome JS -->
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
@section('title', 'Prakerin | Jurnal Harian')
@section('judul', 'JURNAL HARIAN')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i> JURNAL HARIAN</div>
@endsection
@section('main')
    <div class="card">
        <div class="buton" style="z-index: 2;">
            <button type="button" class="btn btn-primary rounded-pill" data-toggle="modal" data-target="#exampleModal">
                Tambah JurnalH <i class="fas fa-plus"></i>
            </button>

            {{-- <a style="margin-left: -170px" href="/export/excel/data_prakerin"><button type="button" class="btn btn-success buten ">Export to Excel</button></a>
    <a href="/export/pdf/data_prakerin"><button type="button" class="btn btn-danger butan">Export to PDF</button></a> --}}
        </div>
        <form class="d-flex flex-row-reverse mr-5" style="margin-top: -66px;">
            <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width: 200px;">
            <div>
                <a href="/export/pdf/data_prakerin"><button type="button" class="btn btn-danger mr-3 rounded-pill"><i
                            class="fas fa-cloud-download-alt"></i> PDF</button></a>
            </div>
            <div>
                <a href="/export/excel/data_prakerin"><button type="button" class="btn btn-success mr-3 rounded-pill"><i
                            class="fas fa-cloud-download-alt"></i> Excel</button></a>
            </div>
        </form>


        <!-- table -->
        <div class="container">
            <table class="table table-bordered text-center" id="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No Kelompok</th>
                        <th scope="col">Guru Pembimbing</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Perusahaan</th>
                        <th scope="col">Actiom</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
            <th scope="row">1</th>
            <td>marker</td>
            <td>11</td>
            <td>RPL</td>
            <td>121212</td>
            <td>
                <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </td>
        </tr> --}}
                    {{-- <tr>
            <th scope="row">1</th>
            <td>marker</td>
            <td>11</td>
            <td>RPL</td>
            <td>121212</td>
            <td>
                <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>marker</td>
            <td>11</td>
            <td>RPL</td>
            <td>121212</td>
            <td>
                <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </td>
        </tr> --}}
                </tbody>
            </table>

            {{--  --}}
            {{-- <nav aria-label="Page navigation example"> --}}
            {{-- <ul class="pagination mt-5 mb-4 justify-content-right">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul> --}}
            {{-- </nav> --}}
            {{--  --}}
        </div>
    </div>
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('jurnalH.post') }}" method="POST" id="contact_form">
                        @csrf

                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="/admin/jurnalH">
                                    <div class="card-body">
                                        <h5 class="card-title mb-5">Jurnal Harian</h5>


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Siswa Prakerin</h6>
                                                    </label>

                                                    <div class="input-group in-jurnal">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <select name="id_siswa" class="form-control    select2"
                                                            id="id_siswa">
                                                            <option value="">--Cari Siswa--</option>
                                                            @foreach ($data_prakerin as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            {{-- tgl pelaksanaan --}}
                                            <div class="col-sm-12">

                                                <div class="form-group">
                                                    <label>
                                                        <h6>Tanggal Pelaksanaan</h6>
                                                    </label>
                                                    <div class="input-group in-jurnal">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                        <input type="date" name="tanggal" id="tanggal"
                                                            class="form-control daterange-cus ">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- tgl pelaksanaan --}}
                                        </div>
                                        <div class="row">
                                            {{-- jam masuk --}}
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Jam Masuk</h6>
                                                    </label>
                                                    <div class="input-group in-jurnal">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-clock"></i>
                                                            </div>
                                                        </div>
                                                        <input type="time" name="datang" id="datang"
                                                            class="form-control timepicker ">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- jam masuk --}}

                                            {{-- jam pulang --}}
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <label>
                                                        <h6>Jam Pulang</h6>
                                                    </label>
                                                    <div class="input-group in-jurnal">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-clock"></i>
                                                            </div>
                                                        </div>
                                                        <input type="time" name="pulang" id="pulang"
                                                            class="form-control timepicker">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- jam pulang --}}
                                        </div>

                                        {{-- kegiatanharian --}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Kegiatan Harian</h6>
                                                    </label>
                                                    <div class="input-group in-jurnal">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <textarea id="kegiatan_harian" name="kegiatan_harian"
                                                            class="form-control daterange-cus "></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- kegiatanharian --}}
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








    {{-- <div class="modal fade" id="mediumModal"  role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="mediumBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div> --}}








@endsection
@push('script')
    <script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            var filter = $("#search").val();
            console.log(filter);
            var table = $('#table').DataTable({
                dom: 't<"bottom"<"row"<"col-6"i><"col-6 mb-4"p>>>',
                bLengthChange: false,
                ordering: false,
                info: true,
                filtering: false,
                searching: true,
                serverside: true,
                processing: true,
                "responsive": true,
                "autoWidth": false,
                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('jurnalH.ajax') }}",
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
                        data: 'no_kelompok',
                        name: 'no_kelompok'
                    },
                    {
                        data: 'pembimbing',
                        name: 'pembimbing'
                    },
                    {
                        data: 'id_siswa',
                        name: 'id_siswa.jurusan'
                    },
                    {
                        data: 'perusahaan',
                        name: 'perusahaan'
                    },

                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
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
                        id = $(this).data('id');
                        $.ajax({
                            url: "/admin/jurnalH/delete/" + id,
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
            });
        });




        $('#submit').click(function(event) {
            event.preventDefault();
            var form = $('#contact_form'),
                url = form.attr('action'),
                method = form.attr('method');

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
                        text: 'Anda sudah absen hari ini',
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

                            $('#' + key).addClass('is-invalid').closest('.input-group').append(
                                '<div class="invalid-feedback">' + value + '</div>')
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
                url = form.attr('action'),
                method = form.attr('method');
            var nama = $( ".id_siswa option:selected" ).text();
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
                        text: ''+nama+' Berhasil Update Absen ',
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

                            $('#' + key).addClass('is-invalid').closest('.input-group').append(
                                '<div class="invalid-feedback">' + value + '</div>')
                            console.log(key);
                        })
                    }
                }
            });
        })


    </script>
@endpush
