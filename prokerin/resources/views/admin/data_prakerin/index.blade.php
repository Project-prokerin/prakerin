    @extends('template.master')
    @push('link')
    <style>
    .card{
            height: 600px;
    }
    .buton{
            margin-top: 10px;
            /* margin-left: 50px; */
            /* margin-bottom: 30px; */
    }
    .table{
            margin-top: 20px;
    }.buten{
      margin-left: 865px;
      position: absolute;
    }.butan{
      margin-left: 740px;
    }

    table.dataTable th:nth-child(1) {
    width: 130px;
    max-width: 130px;
    word-break: break-all;
    white-space: pre-line;
  }
  
  table.dataTable td:nth-child(1) {
    width: 130px;
    max-width: 130px;
    word-break: break-all;
    white-space: pre-line;
  }
  table.dataTable th:nth-child(2) {
    width: 35px;
    max-width: 35px;
    word-break: break-all;
    white-space: pre-line;
  }
  
  table.dataTable td:nth-child(2) {
    width: 35px;
    max-width: 35px;
    word-break: break-all;
    white-space: pre-line;
  }
  table.dataTable th:nth-child(4) {
    width: 190px;
    max-width: 190px;
    word-break: break-all;
    white-space: pre-line;
  }
  
  table.dataTable td:nth-child(4) {
    width: 190px;
    max-width: 190px;
    word-break: break-all;
    white-space: pre-line;
  }
  table.dataTable th:nth-child(5) {
    width: 90px;
    max-width: 90px;
    word-break: break-all;
    white-space: pre-line;
  }
  
  table.dataTable td:nth-child(5) {
    width: 90px;
    max-width: 90px;
    word-break: break-all;
    white-space: pre-line;
  }
  table.dataTable th:nth-child(6) {
    width: 90px;
    max-width: 90px;
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
    width: 90px;
    max-width: 90px;
    word-break: break-all;
    white-space: pre-line;
  }
  
  table.dataTable td:nth-child(7) {
    width: 90px;
    max-width: 90px;
    word-break: break-all;
    white-space: pre-line;
  }


    </style>
    @endpush
    @section('title', 'Prakerin | Data Prakerin')
    @section('judul', 'DATA PRAKERIN')
    @section('breadcrump')
            <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
            <div class="breadcrumb-item"> <i class="fas fa-th mr-2"></i>DATA PRAKERIN</div>
            <link rel="stylesheet" href="{{ asset('template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
            <link rel="stylesheet" href="{{ asset('template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @endsection
    @section('main')
    <div class="card">
    <!-- button tambah -->
    <!-- <div class="buton">
    <form class="row g-3">
    <div class="col-auto">
        <a href="{{ route('data_prakerin.tambah') }}" type="button" class="btn btn-primary text-white">Tambah Data <i class="fas fa-plus"></i></a>
    </div>
    <div class="col-auto" style="margin-left: 300px;">
        <input style="width: 140px" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    </div>
    <div class="col-auto" style="margin-left: -30px;">
        <button class="form-control btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
    </div>
    <div class="col-auto">
        <a href="/export/excel/data_prakerin" class="btn btn-success mr-4">Export to Excel</a>
    </div>
    <div class="col-auto" style="margin-left: -20px;">
        <a href="/export/pdf/data_prakerin" class="btn btn-danger mr-5">Export to PDF</a>
    </div>
    </form>
    </div>


<div class="buton">
<form class="row g-3">
  <div class="col-auto">
    <button type="button" class="btn btn-primary">Tambah Data <i class="fas fa-plus"></i></button>
  </div>
  <div class="col-auto" style="margin-left: 300px;">
    <input style="width: 140px" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
  </div>
  <div class="col-auto" style="margin-left: -30px;">
    <button class="form-control btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
  </div>
  <div class="col-auto">
    <a href="http://" class="btn btn-success mr-4">Export to Excel</a>
  </div>
  <div class="col-auto" style="margin-left: -20px;">
    <a href="" class="btn btn-danger mr-5">Export to PDF</a>
  </div>
</form> -->
  <div class="buton">

  </div>
    <!-- table -->
    <div class="container" >
      <div class="row" style="margin-bottom: -30px;"> 
        <div class="col-3">
          <a href="{{ route('data_prakerin.tambah') }}"class="btn btn-primary"> Tambah Data <i class="fas fa-plus"></i></button></a>
        </div>
        <div class="col-9 d-flex justify-content-end" >
          <a href="/export/excel/data_prakerin"class="btn btn-success "> Export to Excel</a>
          &nbsp;&nbsp;&nbsp;
          <a href="/export/pdf/data_prakerin"class="btn btn-danger "> Export to PDF</a>
        </div>
      </div>
    <br><br>
    
    <table class="table table-bordered text-center" id="table">
    <thead>
        <tr>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col">Jurusan</th>
        <th scope="col">perusahaan</th>
        <th scope="col">Tgl Mulai</th>
        <th scope="col">Tgl Selesai</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      
        {{-- <tr>
        <th scope="row">1</th>
        <td>marker</td>
        <td>11</td>
        <td>RPL</td>
        <td>121212</td>
        <td>121212</td>
        <td>Telkom</td>
        <td>
        <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
        <button type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
        <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
        </td>
        </tr> --}}

    </tbody>
    </table>
    <!-- tutup table -->
    </div>


    </div>
    @endsection
    @push('script')
    <script src="{{ asset('template/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                bLengthChange: false,
                ordering:false,
                info: true,
                filtering:true,
                searching: true,
                serverside: true,
                processing: true, 
                serverSide: true, 
                "responsive": true,
                "autoWidth": false,
                ajax:{
                  url: "{{route('data_prakerin.index')}}",
                  type: "get",
                },
                columns:[
                  { data: 'nama',name:'nama'},
                  { data: 'kelas',name:'kelas'},
                  { data: 'jurusan',name:'jurusan'},
                  { data: 'perusahaan',name:'perusahaan.nama'},
                  {
                   data: 'tgl_mulai',
                   type: 'num',
                   render: {
                      _: 'display',
                      sort: 'timestamp'
                   }
                },{
                   data: 'tgl_selesai',
                   type: 'num',
                   render: {
                      _: 'display',
                      sort: 'timestamp'
                   }
                },
                  { data: 'action',name:'action'}
                ],
                order: [[0,'asc']]
            });
        });
    </script>
    @endpush
