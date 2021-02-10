@extends('template.master')
@push('link')
      <!-- CSS Libraries -->
  <link rel="stylesheet" href="template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush
@section('breadcrump')

    <li class="breadcrumb-item">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="far fa-user"></i>Data siswa</a></li>


@endsection
@section('content')

        <div class="card" style="height: 38rem">
                <div class="row ml-5 mt-3 mr-5">
                        <div class="card-header">
                        <a href="{{ route('pembekalan.create') }}" class="btn btn-primary">tambah data</a>
                        <form class="card-header-form ml-3">
                        <div class="input-group" >
                            <input type="text" name="search" class="form-control" placeholder="Search" id="search">
                            <div class="input-group-btn">
                            <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </form>
                        @if(session('success'))
                        <div class="alert alert-success ml-4 alert-dismissible show fade" style="width: 45%">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                            <span>×</span>
                            </button>
                            {{session('success')}}
                        </div>
                        </div>
                        @endif
                        @if(session('fail'))
                        <div class="alert alert-danger ml-4 alert-dismissible show fade" style="width: 45%">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                            <span>×</span>
                            </button>
                            {{session('success')}}
                        </div>
                        </div>
                        @endif
                        {{-- end alert --}}
                        <button class="btn btn-danger ml-auto delete-all" disabled id="delete-all" onclick="selected()">Deleted selected</button>
                        <button class="btn btn-danger ml-3 ">Export PDF</button>
                        <button class="btn btn-success ml-3">Export Excel</button>
                    </div>
                    <div class="card-body" style="margin-top:-20px;">
                        {{-- start table --}}
                            <div class="table">
                        <table class="table table-striped text-center" id="data-table">
                            <thead>
                            <tr>

                                <th class="text-center"><input type="checkbox" id="cb-head" class="ck-head"> no</th>
                                <th>nama siswa</th>
                                <th>test_wpt_iq</th>
                                <th>personality interview</th>
                                <th>soft skill</th>
                                <th>file_portofolio</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $test)
                                    <tr>

                                        <td><input type="checkbox" class="cb-child" value="{{ $test->id }}"> {{ $loop->iteration }}</td>
                                        <td>{{ $test->siswa->nama_siswa }}</td>
                                        <td style="{{ $test->test_wpt_iq == 'kosong' ? 'background-color:#ff5252; color:white;' : '' }}">{{ $test->test_wpt_iq }}</td>
                                        <td style="{{ $test->personality_interview == 'kosong' ? 'background-color:#ff5252; color:white;' : '' }}">{{ $test->personality_interview }}</td>
                                        <td  style="{{ $test->personality_interview == 'kosong' ? 'background-color:#ff5252; color:white;' : '' }}" >{{ $test->soft_skill }}</td>
                                        <td><a href="{{ route('pembekalan.download', $test->file_portofolio) }}">{{ $test->file_portofolio }}</a></td>
                                        <td>
                                            <a href="/siswa/'{{ $test->id }}'" data-toggle="tooltip"  data-id="' . $row->id . '" class="edit btn btn-primary btn-sm editProduct"><i class="fas fa-search"></i></a>
                                            <a href="/guru/'{{ $test->id }}'/editar" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{ $test->id }}" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        </div>
                        {{-- end table --}}
                    </div>
                </div>
        </div>
@endsection
@push('script')
    <!-- JS Libraies -->
    <script src="template/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="template/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // token header (ajax data table)
            }
        });
        var table = $('#data-table').DataTable({
            "dom": 't<"bottom"<"row"<"col-6"i><"col-6"p>>>',
            // jan lupa download yaita data table dulu tod
            ordering:false,
            processing: false,
            serverSide: false,
            });

        // search engine
        $('#search').on( 'keyup', function () {
            table.search( this.value ).draw();
        } );


        // end ajax 2
        // untuk passing id menggunakan ajax / jquery data table ()delete)
    $('body').on('click', '.deleteProduct', function () {
        // mengambil data_id yang ada di controller
        var value = $(this).data("id");
        console.log(value)
        // confrim biasa
        confirm("Are You sure want to delete !");

        $.ajax({
            // rout url
                    // value ngambil dari data_id
            url: "pembekalan/"+ value ,
            // method
            type: "DELETE",
            // token
            data: { _token: '{{csrf_token()}}' },
            success: function (data) {
                // jika succes table drawa
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
        // end ajax 3
    });
    // untuk passing id menggunakan jquery data table (update)
    $('body').on('click', '.editProduct', function () {
        // mengambil data_id yang di controller
        var value = $(this).data("id");
        console.log(value);

        $.ajax({
            url: "photo/"+ value,
            type: "PUT",
            data: { _token: '{{csrf_token()}}' },
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    // masih di dalam document ajax
    // start check delte
    // chekc all
    $('body').on('click','#cb-head', function () {
        // untuk mengeui cb-head yang sudah di klik
        var checked = $('#cb-head').prop('checked')
        // jika cb-head di klik maka yang cb-child juga ikut
        // cb head adalah id dari button
        $('.cb-child').prop('checked', checked)
        // jika chekec true maka menambah properti disable
        if (checked==true) {
            $('#delete-all').prop('disabled', false)
        }else{
            $('#delete-all').prop('disabled', true)
        }

    })
    // uncheck all
    // jika checkbox  child id pencet
    $('body').on('click','.cb-child', function () {
        // jika cb-child  tidak di cheked
        if ($(this).prop('checked')!=true) {
            // maka tidak akan di check
            $('#cb-child').prop('checked', false)
        }
        // mengambil semua yang di check
        let semua_checkbox = $('.cb-child:checked')
        // menghapus properti disable
        // jika checkbox properti false
        if (semua_checkbox.length>0) {
            $('#delete-all').prop('disabled', false)
        }else{
            $('#delete-all').prop('disabled', true)
        }

    });


})
// button delete all
    function selected(){
        // checkbox yag terpilih
        let checked = $('.cb-child:checked')
        // console.log(checked)
        let all_cheked = []
        // mengambil index = elemt
        $.each(checked, function (index,elm) {
            // mengambil value dari checkbox terpilih
            all_cheked.push(elm.value);
        });
        $.ajax({
            type: "POST",
            url: "{{ route('pembekalan.delete-all') }}",
            data:{id:all_cheked,  _token: '{{csrf_token()}}'},
            success: function(data) {
                location.reload();
                console.log(data);

            },
            error: function(data) {
                        console.log(data)
            }
        });
        // console.log(all_cheked);
    }
    </script>

@endpush
