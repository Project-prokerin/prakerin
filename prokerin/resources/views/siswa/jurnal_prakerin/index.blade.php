@extends('template.master')
@push('link')
<style>
        /* .card{
            width: 1040px;
        } */
        .card-body h6{
                font-size: 15px;
        }
        .table-th p{
                text-align: center;
                margin-bottom: -3px;
                color: white;
        }
        tr td{
            font-weight: 100;
            color: black
        }
        .in-jurnal{
                margin-top: -10px;
        }
        .box-jurnal{
                margin-top: -10px;
                margin-left: 16px;
                margin-bottom: 20px;
        }
        .modal{
                margin-left: 130px;
                margin-top: 43px;
        }
        .pagination{
            margin-left: 390px
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
        }.dataTables_empty{
            text-align: center;
        }
</style>
@endpush
@section('title', 'Prakerin | jurnal prakerin')
@section('judul', 'JURNAL PRAKERIN')
@section('breadcrump')
<meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-newspaper"></i> JURNAL PRAKERIN</div>
@endsection
@section('main')
{{-- sweet alert --}}
@if (session('alert'))
    <div class="flesh" data-id="{{ session('alert') }}">{{ session('alert') }}</div>
@endif
{{-- ens sweet --}}
            <div class="card">
                <div class="card-header" style="margin-bottom: -30px;">
                        <div class="card-body card-name">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 pl-4"><h6>Nama</h6></label>
                                    <div class="col-sm-9">
                                        <label for=""><h6>: {{ empty(siswa('main')->nama_siswa) ? 'Eror please call developer' : siswa('main')->nama_siswa }}</h6></label>
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-top: -35px;">
                                    <label for="" class="col-sm-3 pl-4"><h6>Nama Perusahaan</h6></label>
                                    <div class="col-sm-9">
                                        <label for=""><h6>: {{ empty(siswa('data_prakerin')->Perusahaan->nama) ? 'Nama perushaaan belum di tentukan' : siswa('data_prakerin')->Perusahaan->nama }}</h6></label>
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-top: -35px;">
                                    <label for="" class="col-sm-3 pl-4"><h6>Lokasi</h6></label>
                                    <div class="col-sm-9">
                                        <label for=""><h6>: {{ empty(siswa('data_prakerin')->Perusahaan->alamat) ? 'Alamat perusahaan belum di tentukan ' : siswa('data_prakerin')->Perusahaan->alamat }}</h6></label>
                                    </div>
                                </div>
                        </div>
                        {{-- <select name="filter" id="filter" class="form-control w-25 mr-3 " >
                            <option value="">FILTER JURNAL</option>
                            <option value="Hari">Hari ini</option>
                            <option value="Minggu">Minggu ini</option>
                            <option value="Bulan">Bulan ini</option>
                        </select> --}}
                        <div class="card-header-action" >
                                <a href="{{ route('user.jurnal.tambah') }}" class="btn btn-primary {{ jurnal_p_stat() }}" {{ jurnal_p_stat() }} >
                                    {{ jurnal_p_val() }}
                                </a>
                        </div>
                </div>


        {{-- table --}}
        <div class="card-body p-4" style="margin-top: -45px;">
            <div class="table-responsive">
                <table class="table table-striped mb-3" id="table">
                    <thead class="text-white">
                        <tr class="bg-primary table-th pb-2">
                            <th scope="col" style="width: 30px;"><p>No</p></th>
                             <th scope="col" style=""><p>Tanggal Pelaksanaan</p></th>
                            <th scope="col" style=""><p>Kompetisi Dasar</p></th>
                             <th scope="col" style=""><p>Topik Pembelajaran</p></th>


                        </tr>
                    </thead>
                    <tbody style="padding-top: 200px">
                    {{-- @foreach ($jurnal_prakerin as $jurnal)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $jurnal->kompetisi_dasar  }}</td>
                            <td>{{ $jurnal->topik_pekerjaan }}</td>
                            <td class="text-center">{{ tanggal($jurnal->tanggal_pelaksanaan) }}</td>
                        </tr>
                    @endforeach --}}
                    </tbody>
                </table>
        </div>
        </div>
        </div>

        @include('sweetalert::alert')
@endsection
@push('script')
<script src="{{ asset('template/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
$(document).ready(function () {
    let filter = $('#filter').val();
    var table = $('#table').DataTable({
                // "dom": 't<"bottom"<"row"<"col-6"><"col-6"p>>>',
                bLengthChange: false,
                ordering:false,
                processing: true,
                serverSide: true,
                info: false,
                filtering:false,
                searching: false,
                responsive: true,
                autoWidth: false,
                "ajax": {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('user.jurnal.Api') }}",
                    type: "POST",
                    data: function (data) {
                        data.filter = filter;
                        return data
                    },
                },
                // colump dari controller
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                      {data: 'hari_pelaksanaan', name: 'hari_pelaksanaan'}, //add colump di data tab;e
                    {data: 'kompetisi_dasar', name: 'kompetisi_dasar'},
                    {data: 'topik_pekerjaan', name: 'topik_pekerjaan'},

                ],columnDefs: [
                { className: 'text-center', targets: [0] },
            ]
        });

    $('#filter').change(function () {
                filter = $(this).val();
                console.log(filter)
                table.ajax.reload(null,false)
    })

    $('.dataTables_empty').html('Jurnal anda masih kosong');

    // sweet alert
    var flesh = $('.flesh').data('id');
    if (flesh) {
        Swal.fire({
                    title: 'Berhasil',
                    text: 'Jurnal berhasil di tambahkan',
                    icon: 'success',
                    confirmButtonText: 'tutup'
                })
    }
})
</script>
@endpush


