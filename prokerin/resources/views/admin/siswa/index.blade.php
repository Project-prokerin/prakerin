@extends('template.master')
@push('link')
<style>
   #mytable4{
        overflow-x: hidden;
    }
.card{
                height: auto;
        }
        .buton{

            margin-left: 25px;
            margin-bottom: 10px;
        }
    a[href$=".pdf/download"]:before
        {
        content: "\f1c1";
        font-family: fontawesome;
        padding-right: 10px;
        }
</style>
@endpush
@section('title', 'Prakerin | Data siswa')
@section('judul', 'DATA SISWA')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i> DATA SISWA</div>
@endsection
@section('main')
  {{-- <div class="card">
        <!-- table -->
        <div class="container mt-4" >
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
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
        @endif --}}

        {{-- update --}}
        {{-- <div class="buton">
            <a href="{{ route('siswa.tambah') }}"class="btn btn-primary rounded-pill"> Tambah Data <i class="fas fa-plus"></i></button></a>
        </div>
        <form class="d-flex flex-row-reverse mr-5" style="margin-top: -66px;">
            <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            <input class="form-control ml-3" type="search" placeholder="Search" aria-label="Search" id="search" style="width: 200px;">
            <div>
                <a href="#"class="btn btn-danger rounded-pill "> <i class="fas fa-cloud-download-alt"></i>  PDF</a>
            </div>
            &nbsp;&nbsp;&nbsp;
            <div>
                <a href="/export/excel/siswa"class="btn btn-success rounded-pill "> <i class="fas fa-cloud-download-alt"></i>  Excel</a>
            </div>
        </form>
        <br> --}}
        {{-- update --}}
        {{-- <table class="table table-bordered table-hover text-center" id="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">NIPD</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Kelas</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>

        </tbody>
        </table>
        <!-- tutup table -->
        </div>
        </div> --}}
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Siswa</h4>
                </div>
                <div class="card-body">

                  <div class="table-responsive" id="mytable4">
                    <table class="table table-striped" id="table">
                      <thead class="text-center">
                        <tr>
                          <th>
                            No
                          </th>
                          <th>NIPD</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Kelas</th>
                          <th>Jurusan</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <tr>
                          <td>
                            1
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
@push('script')
<script src="{{ asset('assets/js/pages-admin/siswa.js') }}" ></script>
@endpush

