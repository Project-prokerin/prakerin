@extends('template.master')
@push('link')
<style>
        .card-body h6{
                font-size: 15px;
        }
        .table-th p{
                text-align: center;
                margin-bottom: -3px;
                color: white;
        }
        .in-jurnal{
                margin-top: -10px;
        }
        .modal{
                margin-left: 130px;
                margin-top: 43px;
        }
        tr td{
            font-weight: 100;
            color: black
        }
        /* remove validation icons */
        .form-control.is-invalid, .was-validated .form-control:invalid {
            background-image: none !important;
            border-color: red;
            padding-right: 0.75em;
        }

        .form-control.is-valid, .was-validated .form-control:valid {
            background-image: none !important;
            border-color:red;
            padding-right: 0.75em;
        }tr.odd,.even{
            height: 50px
        }
</style>
    <link rel="stylesheet" href="{{ asset('template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('title', 'Prakerin | jurnal harian')
@section('judul', 'JURNAL HARIAN')
@section('breadcrump')
{{-- token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-newspaper"></i> JURNAL HARIAN</div>
@endsection
@section('main')
<div class="card">
        <div class="card-header" style="margin-bottom: -30px;">
                <div class="card-body card-name">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 "><h6>Nama Perusahaan</h6></label>
                            <div class="col-sm-7">
                                <label for=""><h6>: {{ empty(Auth::user()->siswa->data_prakerin->Perusahaan->nama) ? 'Nama perusahaan belum di tentuakan' : Auth::user()->siswa->data_prakerin->Perusahaan->nama }}</h6></label>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-top: -35px;">
                            <label for="" class="col-sm-3 "><h6>Lokasi</h6></label>
                            <div class="col-sm-7">
                                <label for=""><h6>: {{ empty(Auth::user()->siswa->data_prakerin->Perusahaan->alamat) ? 'Alamat perusahaan belum di tentukan ' : Auth::user()->siswa->data_prakerin->Perusahaan->alamat }}</h6></label>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-top: -35px;">
                            <label for="" class="col-sm-3 "><h6>Tanggal</h6></label>
                            <div class="col-sm-7">
                                <label for=""><h6>: {{ \Carbon\Carbon::now()->isoFormat('dddd, DD MMMM YYYY') }}</h6></label>
                            </div>
                        </div>
                </div>
                <select name="filter_absen" id="filter_absen" class="form-control w-25 mr-3 " >
                        <option value="">FILTER ABSEN</option>
                        {{-- <option value="Hari">Hari ini</option> --}}
                        <option value="Minggu">Minggu ini</option>
                        <option value="Bulan">Bulan ini</option>
                    </select>
                <div class="card-header-action" >
                    <button type="button" class="btn btn-primary  {{ jurnal_status() }}" data-toggle="modal" {{ jurnal_status() }} data-target="#exampleModal">
                            {{ jurnal_val() }}
                    </button>
                </div>
        </div>


{{-- table --}}
<div class="card-body p-4" style="margin-top: -50px;">

        <table class="table table-striped mb-0" id="example">
            <thead class="text-white">
                <tr class="bg-primary table-th">
                    <th scope="col"  style="width: 30px;"><p>No</p></th>
                    <th scope="col "style="width: 180px;"><p>Tanggal</p></th>
                    <th scope="col" style="width: 130px;"><p>Jam Datang</p></th>
                    <th scope="col" style="width: 130px;"><p>Jam Pulang</p></th>
                    <th scope="col" style="width: 400px;"><p>Kegiatan Harian</p></th>
                </tr>
            </thead>
            <tbody style="padding-top: 200px" class="">
                {{-- @foreach ($jurnal as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ tanggal($item->tanggal) }}</td>
                    <td class="text-center">{{ jam($item->datang) }}</td>
                    <td class="text-center">{{ jam($item->pulang) }}</td>
                    <td>{{ $item->kegiatan_harian }}</td>
                </tr>
                @endforeach --}}
        </tbody>
        </table>

</div>










    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                <form action="{{ route('user.jurnalH') }}"  method="POST" id="contact_form">
                                        @csrf

                    <div class="row mt-3">
                            <div class="col-sm-12">
                            <div class="/user/jurnal">
                                <div class="card-body">
                                <h5 class="card-title mb-5">Jurnal Harian</h5>

                                <div class="row">
                                    {{-- tgl pelaksanaan --}}
                                    <div class="col-sm-12">

                                            <div class="form-group">
                                                    <label><h6>Tanggal Pelaksanaan</h6></label>
                                                    <div class="input-group in-jurnal">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                        <i class="fas fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    <input type="date" name="tanggal" id="tanggal" class="form-control daterange-cus ">
                                                    </div>
                                                </div>
                                    </div>
                                    {{-- tgl pelaksanaan --}}
                                </div>
                                <div class="row">
                                    {{-- jam masuk --}}
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><h6>Jam Masuk</h6></label>
                                        <div class="input-group in-jurnal">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                            <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" name="datang" id="datang" class="form-control timepicker ">
                                        </div>
                                    </div>
                                    </div>
                                    {{-- jam masuk --}}

                                    {{-- jam pulang --}}
                                    <div class="col-sm-6">
                                        <div class="form-group ">
                                        <label><h6>Jam Pulang</h6></label>
                                        <div class="input-group in-jurnal">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                            </div>
                                            <input type="time" name="pulang" id="pulang" class="form-control timepicker">
                                        </div>
                                        </div>
                                    </div>
                                    {{-- jam pulang --}}
                                </div>

                                {{-- kegiatanharian --}}
                                <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group">
                                            <label><h6>Kegiatan Harian</h6></label>
                                            <div class="input-group in-jurnal">
                                                <div class="input-group-prepend">
                                                </div>
                                                <textarea  id="kegiatan_harian" name="kegiatan_harian" class="form-control daterange-cus " ></textarea>
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
                <button type="submit"  id="submit" class="btn btn-primary">Save changes</button>
                </div>

                {{-- button save --}}
            </div>
            </div>
             </form>
        </div>
    @include('sweetalert::alert')
{{-- modal --}}
@endsection
@push('script')
    <script src="{{ asset('template/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function (params) {
            console.log($('.flash').data('id'))
            let absen = $('#filter-absen').val();
            var table = $('#example').DataTable({
                // "dom": 't<"bottom"<"row"<"col-6"><"col-6"p>>>',
                bLengthChange: false,
                ordering:false,
                processing: true,
                serverSide: true,
                info: false,
                filtering:false,
                searching: false,
                "responsive": true,
                "autoWidth": false,
                "ajax": {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('user.jurnalH.Api') }}",
                    type: "POST",
                    data: function (data) {
                        data.absen = absen;
                        return data
                    },
                },
                // colump dari controller
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'datang', name: 'datang'},
                    {data: 'pulang', name: 'pulang'}, //add colump di data tab;e
                    {data: 'kegiatan_harian', name: 'kegiatan_harian'}, //add colump di data tab;e
                ],
                columnDefs: [
                { className: 'text-center', targets: [1,2,3] },
                    ],


        });

        // setInterval(() => {
        //     table.draw();
        // }, 3000);

        $('.dataTables_empty').html('Jurnal anda masih kosong');

        $('#filter_absen').change(function () {
            absen = $(this).val();
            console.log(absen)
            table.ajax.reload(null,false)
        })

     // submit modal
        $('#submit').click(function (event) {
            event.preventDefault();
            var form = $('#contact_form'),
                url = form.attr('action'),
                method = form.attr('method');

                form.find('.invalid-feedback').remove();
                form.find('.form-control').removeClass('is-invalid')
            $.ajax({
                url:url,
                method:method,
                data:form.serialize(),
                success: function name(params) {
                form.trigger('reset');
                $('#exampleModal').modal('hide');
                table.draw();
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
                    if ($.isEmptyObject(err)==false) {
                        $.each(err.errors, function (key,value) {

                            $('#' + key).addClass('is-invalid').closest('.input-group').append('<div class="invalid-feedback">'+ value +'</div>')
                            console.log(key);
                        })
                    }
                }
            });
        })
    });
    </script>
    <script>

    </script>
@endpush


