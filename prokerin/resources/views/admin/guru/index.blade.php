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
@section('title', 'Prakerin | Data Guru')
@section('judul', 'DATA GURU')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i>   DATA GURU</div>
@endsection
@section('main')
        {{-- baru --}}
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Guru</h4>
                </div>
                <div class="card-body">

                  <div class="table-responsive" id="mytable4">
                    <table class="table table-striped" id="table1">
                      <thead class="text-center">
                        <tr>
                          <th>
                            No
                          </th>
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>Jabatan</th>
                          <th>Jurusan</th>
                          <th>No Telp</th>
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
<script src="{{ asset('assets/js/pages-admin/guru.js') }}" ></script>
@endpush
