@extends('template.master')
@push('link')
<style>
    .card{
        height: auto;
    }
    .buton{
        margin-top: 30px;
        margin-left: 50px;
        margin-bottom: 30px;
        width: 40%;
    }
    .table{
        margin-top: 20px;
    }
    /* .buten{
      margin-left: 865px;
      position: absolute;
    } */
    /* .butan{
      margin-left: 740px;
    } */
</style>
@endpush
@section('title', 'Prakerin |   Kelompok Prakerin')
@section('judul', ' KELOMPOK PRAKERIN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> Kelompok Prakerin</div>
@endsection
@section('main')
<div class="card">
<div class="buton" style="z-index: 2;">  
    <a href="{{ route('kelompok.tambah') }}"><button type="button" class="btn btn-primary rounded-pill">Tambah Data <i class="fas fa-plus"></i></button></a>
    {{-- <a style="margin-left: -170px" href="/export/excel/data_prakerin"><button type="button" class="btn btn-success buten ">Export to Excel</button></a>
    <a href="/export/pdf/data_prakerin"><button type="button" class="btn btn-danger butan">Export to PDF</button></a> --}}
</div>
<form class="d-flex flex-row-reverse mr-5" style="margin-top: -66px;">
    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
    <input class="form-control me-2" id="search" type="search" placeholder="Search" aria-label="Search" style="width: 200px;">
    <div>
        <a href="/export/pdf/data_prakerin"><button type="button" class="btn btn-danger mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i>  PDF</button></a>
    </div>
    <div>
        <a href="/export/excel/data_prakerin"><button type="button" class="btn btn-success mr-3 rounded-pill"><i class="fas fa-cloud-download-alt"></i>  Excel</button></a>
    </div>
</form>
    <!-- table -->

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{$message}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  @endif
  @if ($message = Session::get('update'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> {{$message}}.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
    <div class="container">
    <table class="table table-bordered text-center" id="table">
    <thead>
        <tr>
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

{{--     
        <nav aria-label="Page navigation example">
            <ul class="pagination mt-5 mb-4 justify-content-right">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav> --}}
    {{--  --}}
</div>
</div>
@endsection
@push('script')

<script>
    $(document).ready( function () {
        var filter = $('#search').val();
        console.log(filter);
        var table = $('#table').DataTable({
            dom: 't<"bottom"<"row"<"col-6"i><"col-6"p>>>',
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
            url: "{{route('kelompok.ajax')}}",
            type: "post",
            data: function (data) {
                data = '';
                return data
            }
            },
            columns:[
            { data: 'no',name:'no'},
            { data: 'guru',name:'guru.nama'},
            // { data: 'no_telpon',name:'no_telpon'},
            { data: 'jurusan',name:'jurusan'},
            { data: 'nama_perusahaan',name:'nama_perusahaan'},
            // { data: 'data_prakerin',name:'data_prakerin.'},
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
            id = $(this).data('no');
            $.ajax({
                    url: "/kelompok/destroy_all/"+ id,
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