@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('assets/sass/tandatangan.scss') }}" crossorigin="anonymous">
    {{-- <link src="" ></link> --}}

    <style>

    </style>

@endpush
@section('title', 'Prakerin | Data TTD')
@section('judul', 'DATA Tanda Tangan')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="fas fa-th mr-2"></i>DATA TTD</div>
@endsection
@section('main')
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('pesan') }}
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
                  <h4>Data Tanda Tangan</h4>
                </div>
                <div>
                <a href="{{ route('tanda-tangan.tambah') }}" class="btn btn-primary ml-4" >Tambah Data <i class="fas fa-plus"></i></a>
            </div>
                <div class="card-body">
                  <div class="table-responsive" id="mytable4">
                    <table class="table table-striped" id="table1">
                      <thead class="text-center">
                        <tr>
                          <th>
                            No
                          </th>
                          <th>Pemilik</th>
                          <th>Tanda Tangan</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody class="text-center">
                      @foreach ($ttd as $tandatangan)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$tandatangan->nama}}</td>
                          <td>
                              <img src="{{asset("$tandatangan->path_gambar")}}" style="max-width: 278px; width: 150px; height: 75px; margin-top: 5px;" alt=""
                              srcset="">
                          </td>
                          <td>
                              <form action="{{route('tanda-tangan.delete',$tandatangan->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Hapus</button>

                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


    {{-- <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('tanda-tangan.post') }}" method="POST" id="contact_form">
                        @csrf

                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="/admin/jurnalH">
                                    <div class="card-body">
                                        <h5 class="card-title mb-5">Tanda Tangan Digital</h5>






                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>TTD png</h6>
                                                    </label>
                                                    <div class="input-group in-jurnal">
                                                        <input type="file" id="ttd" name="file"
                                                            class=" @error('file')  is-invalid  @enderror "
                                                            value="">
                                                        @error('file')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <img id="preview-image-before-upload"
                                                src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                                alt="preview image"
                                                style="text-align:center; width: 500px; max-height: 300px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
                </div>

            </div>
        </div> --}}
        {{-- </form> --}}
    </div>

@endsection
@push('script')
    {{-- <script src="{{ asset('mainapp/public/assets/js/pages-admin/datap.js') }}" ></script> --}}
    {{-- <script>
        $(document).ready(function(e) {


            $('#ttd').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });


        $(document).ready(function() {


            $('.btn-table').append(
                '<a href="/admin/jurnalH/tambah"class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Tambah Data <i class="fas fa-plus"></i></button></a>'
            );
            $('#table99_filter').prepend(
                '<a href="/export/excel/jurnalH"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
            );

            // search engine

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


        $('#contact_form').submit(function(event) {
            event.preventDefault(),
                var form = $('#contact_form'),
                    let formData = new FormData(this),
                        form.find('.invalid-feedback').remove(),
                        form.find('.form-control').removeClass('is-invalid');
            $.ajax({
                url: "{{ route('tanda-tangan.post') }}",
                method: 'POST',
                data: formData,
                success: function name(params) {
                    form.trigger('reset');
                    $('#exampleModal').modal('hide');
                    alert = Swal.fire({
                        title: 'Berhasil',
                        text: 'Berhasil Menambah TTD!',
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

                            $('#' + key).addClass('is-invalid').closest('.input-group')
                                .append(
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
            var nama = $(".id_siswa option:selected").text();
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
                        text: '' + nama + ' Berhasil Update Absen ',
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

                            $('#' + key).addClass('is-invalid').closest('.input-group')
                                .append(
                                    '<div class="invalid-feedback">' + value + '</div>')
                            console.log(key);
                        })
                    }
                }
            });
        });

    </script> --}}
@endpush
