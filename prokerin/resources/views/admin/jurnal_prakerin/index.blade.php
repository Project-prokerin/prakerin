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
@section('title', 'Prakerin | Jurnal Prakerin')
@section('judul', 'JURNAL PRAKERIN')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i> JURNAL PRAKERIN</div>
@endsection
@section('main')
<div class="row">

  <div class="col-12">

    <div class="card">

      <div class="card-header">

        <h4>Jurnal Prakerin</h4>

      </div>

      <div class="card-body">



        <div class="table-responsive" id="mytable4">

          <table class="table table-striped" id="table99">

            <thead class="text-left">

              <tr>

                <th>

                  No

                </th>

                <th>Nama siswa</th>

                <th>Kompetisi Dasar</th>

                <th>Topik Pembelajaran</th>

                <th>Hari kerja</th>

                <th style="width: 100px;">Action</th>

              </tr>

            </thead>

            <tbody class="text-left">

              <tr>

                <td>

                  1

                </td>

                <td></td>

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


      <span id="role" data-role="{{ Auth::user()->role }}"></span>

@endsection
@push('script')
    <script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('assets/js/pages-admin/jurnalp.js') }}" ></script>
@endpush
