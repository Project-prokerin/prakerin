@extends('template.master')
@push('link')
<style>
        .card{
            /* width: 1070px;
            margin-left: -10px */
        }
        .card-body h6{
                font-size: 15px;
        }
        /* .card-name{
            border-radius: 10px;
            box-shadow: 0 0 7px grey;
            height: 125px;
            margin-top: 20px;
            margin-right: 180px;
            margin-bottom: 70px;
        } */
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
    <div class="flesh" data-id="{{ session('alert') }}"></div>
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
                        <select name="filter" id="filter" class="form-control w-25 mr-3 " >
                            <option value="">FILTER JURNAL</option>
                            <option value="Hari">Hari ini</option>
                            <option value="Minggu">Minggu ini</option>
                            <option value="Bulan">Bulan ini</option>
                        </select>
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
                            <th scope="col" style=""><p>Kompetisi Dasar</p></th>
                            <th scope="col" style=""><p>Topik Pembelajaran</p></th>
                            <th scope="col" style=""><p>Tanggal Pelaksanaan</p></th>
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
        {{-- modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="/user/jurnal" method="POST" id="form">
                                @csrf

                            <div class="row mt-3">
                                    <div class="col-sm-6">
                                    <div class="">
                                        <div class="card-body">
                                        <h5 class="card-title">Fasilitas Prakerin</h5>
                                        <div class="alert alert-danger">
                                            <div class="alert-body">

                                            </div>
                                        </div>
                                        <div class="row">
                                            {{-- mess --}}
                                            <div class="col-sm-6">
                                                    <h6 class="card-title">Mess</h6>
                                                    <div class="row checkbox"  >
                                                            <div class="form-check form-check-inline box-jurnal">
                                                                    <input class="form-check-input mess " data_id="mess" type="checkbox" id="" name="mess"  value="iya">
                                                                    <label class="form-check-label" for="mess">Iya</label>
                                                                </div>
                                                                <div class="form-check form-check-inline box-jurnal">
                                                                    <input class="form-check-input mess" data_id="mess" type="checkbox" id="" name="mess"  value="tidak">
                                                                    <label class="form-check-label" for="mess">Tidak</label>
                                                                </div>
                                                    </div>
                                            </div>
                                            {{-- mess --}}

                                            {{-- bus antar jemput --}}
                                            <div class="col-sm-6">
                                                    <h6 class="card-title">Bus Antar Jemput</h6>
                                                    <div class="row checkbox">
                                                            <div class="form-check form-check-inline box-jurnal">
                                                                    <input class="form-check-input bus_antar_jemput" type="checkbox" id="" name="bus_antar_jemput" value="iya">
                                                                    <label class="form-check-label" for="inlineCheckbox1">Iya</label>
                                                                </div>
                                                                <div class="form-check form-check-inline box-jurnal">
                                                                    <input class="form-check-input bus_antar_jemput" type="checkbox" id="" name="bus_antar_jemput" value="tidak">
                                                                    <label class="form-check-label" for="bus_antar_jemput">Tidak</label>
                                                                </div>
                                                    </div>
                                            </div>
                                            {{-- bus antar jemput --}}
                                        </div>
                                        <div class="row">
                                            {{-- makan siang --}}
                                            <div class="col-sm-6">
                                                    <h6 class="card-title">Makan Siang</h6>
                                                    <div class="row checkbox">
                                                            <div class="form-check form-check-inline box-jurnal">
                                                                    <input class="form-check-input makan_siang" type="checkbox" id="" name="makan_siang" value="iya">
                                                                    <label class="form-check-label" for="makan_siang">Iya</label>
                                                                </div>
                                                                <div class="form-check form-check-inline box-jurnal">
                                                                    <input class="form-check-input makan_siang" type="checkbox" id="" name="makan_siang" value="tidak">
                                                                    <label class="form-check-label" for="makan_siang">Tidak</label>
                                                                </div>
                                                    </div>
                                            </div>
                                            {{-- makan siang --}}

                                            {{-- intensif --}}
                                            <div class="col-sm-6">
                                                    <h6 class="card-title">Intensif</h6>
                                                    <div class="row checkbox">
                                                            <div class="form-check form-check-inline box-jurnal">
                                                                    <input class="form-check-input intensif" type="checkbox" id="" name="intensif" value="iya">
                                                                    <label class="form-check-label" for="intensif">Iya</label>
                                                                </div>
                                                                <div class="form-check form-check-inline box-jurnal">
                                                                    <input class="form-check-input intensif" type="checkbox" id="" name="intensif" value="tidak">
                                                                    <label class="form-check-label" for="i-2">Tidak</label>
                                                                </div>
                                                    </div>
                                            </div>
                                            {{-- intensif --}}
                                        </div>
                                        <br>

                                        {{-- textarea --}}
                                        <h6 class="card-title">Kompetensi Dasar</h6>
                                        <div class="textarea">
                                            <textarea class="form-control" name="kompetisi_dasar" id="kompetisi_dasar"></textarea>
                                        </div>
                                        <br>
                                        <h6 class="card-title">Topik Pekerjaan</h6>
                                        <div class="textarea">
                                            <textarea class="form-control" name="topik_pekerjaan" id="topik_pekerjaan"></textarea>
                                        </div>
                                        {{-- textarea --}}

                                        </div>
                                    </div>
                                    </div>

                                    {{-- tgl-jam --}}
                                    <div class="col-sm-6">
                                        <div class="card-body">
                                            <br>
                                        <div class="">
                                            <div class="form-group">
                                                <label><h6>Tanggal Pelaksanaan</h6></label>
                                                <div class="input-group in-jurnal">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                    </div>
                                                </div>
                                                <input type="date" class="form-control daterange-cus" name="tanggal_pelaksanaan" id="tanggal_pelaksanaan">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label><h6>Jam Masuk</h6></label>
                                                <div class="input-group in-jurnal">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                    <i class="fas fa-clock"></i>
                                                    </div>
                                                </div>
                                                <input type="time" class="form-control timepicker" name="jam_masuk" id="jam_masuk">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label><h6>Jam Istirahat</h6></label>
                                                <div class="input-group in-jurnal">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                    <i class="fas fa-clock"></i>
                                                    </div>
                                                </div>
                                                <input type="time" class="form-control timepicker" name="jam_istiharat" id="jam_istiharat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label><h6>Jam Pulang</h6></label>
                                                <div class="input-group in-jurnal">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                    <i class="fas fa-clock"></i>
                                                    </div>
                                                </div>
                                                <input type="time" class="form-control timepicker" name="jam_pulang" id="jam_pulang" >
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    {{-- tgl-jam --}}
                            </div>
                            
                        </div>
                        {{-- button save --}}
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        {{-- button save --}}
                    </div>
                    </div>
                </div>
                </form>
        {{-- modal --}}
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
                    {data: 'kompetisi_dasar', name: 'kompetisi_dasar'},
                    {data: 'topik_pekerjaan', name: 'topik_pekerjaan'},
                    {data: 'tanggal_pelaksanaan', name: 'tanggal_pelaksanaan'}, //add colump di data tab;e
                ],columnDefs: [
                { className: 'text-center', targets: [0,3] },
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


