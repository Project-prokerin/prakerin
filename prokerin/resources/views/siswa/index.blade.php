@extends('template.master')
@push('link')
      <!-- CSS Libraries -->
  <link rel="stylesheet" href="stisla-master/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="stisla-master/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush
@section('breadcrump')
        <h1 style="font-size: 20px;">Template table</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">Dashboard</a></div>
        <div class="breadcrumb-item">template</a></div>
@endsection
@section('content')
            <div class="card" style="height: 45rem">
                <div class="row ml-5 mt-3 mr-5">
                        <div class="card-header">
                        <button class="btn btn-primary">tambah data</button>
                        <form class="card-header-form ml-3">
                        <div class="input-group" >
                            <input type="text" name="search" class="form-control" placeholder="Search" >
                            <div class="input-group-btn">
                            <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </form>
                        {{-- end alert --}}
                        <button class="btn btn-danger ml-auto ">Export PDF</button>
                        <button class="btn btn-success ml-3">Export Excel</button>
                    </div>
                    <div class="card-body" style="margin-top:-20px;">
                        {{-- start table --}}
                            <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Username</th>
                                <th>siswa name</th>
                                <th>nama  perusahaan</th>
                                <th>created as user</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ !empty($item->siswa->nama) ?$item->siswa->nama :$item->name }}</td>
                                    <td>{{ !empty($item->siswa->data_prakerin->nama) ?$item->siswa->data_prakerin->nama:'' }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->Isoformat('DD MMMM YYYY')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        {{-- end table --}}
                    </div>
                </div>
            </div>
            @foreach ($unique as $item)
                <a href="">{{ 'kelompok no ='. $item->no }}</a>
            @endforeach
@endsection
@push('script')
    <!-- JS Libraies -->
    <script src="stisla-master/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="stisla-master/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="stisla-master/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="stisla-master/assets/js/page/features-post-create.js"></script>

    <script>
        $(document).ready( function () {
            $('#table-1').DataTable({
                "dom": 't<"bottom"<"row"<"col-6"i><"col-6"p>>>'
            });
        });
    </script>
@endpush
