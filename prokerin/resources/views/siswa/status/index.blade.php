@extends('template.master')
@push('link')
<style>
  .teks{
    text-align: center;
    margin-top: -20px;
    height: 65px;
    width: 350px;
    color: white;
    background: #475bf0;
  }
  .teks h3{
    margin-top: 15px;
  }

  @media screen and (max-width:413px){
  .card{
    width: auto;
    float: none;
  }
  }
</style>
@endpush
@section('title', 'Prakerin | Status Magang')
@section('judul', 'STATUS MAGANG')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-newspaper"></i> STATUS MAGANG</div>
@endsection
@section('main')
<div class="card mt-5">
    <div class="container text-center H-100 mb-3 teks" >
        <h3>Status Magang</h3>
    </div>
        <div class="container-fluid mt-4 mb-4">
        <div class="mw-100 mx-auto ">
            <table class="table table-bordered table-hover">
            <thead>
                <tr>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" style="width: 400px;background-color:#f2f2f2;" class="text-left">Nama</th>
                    <td class="" style="background-color:#f2f2f2" >{{ siswa('data_prakerin')->nama }}</td>
                </tr>
                <tr>
                    <th scope="row" class="text-left" >Status</th>
                    <td style="{{ statusWarna() }}">{{ status() }}</td>
                </tr>
                <tr>
                    <th scope="row" class="text-left" style="background-color:#f2f2f2">Tanggal Mulai</th>
                    <td style="background-color:#f2f2f2" > {{ empty(tanggal(siswa('data_prakerin')->tgl_mulai)) ? ' tanggal mulai magang belum di tentukan' : tanggal(siswa('data_prakerin')->tgl_mulai) }}</td>
                </tr>
                <tr>
                    <th scope="row" class="text-left"  >Tanggal Selesai</th>
                    <td style="background-color:#f2f2f2">{{ empty(tanggal(siswa('data_prakerin')->tgl_selesai)) ? 'tanggal selesai magang belum di tentukan' : tanggal(siswa('data_prakerin')->tgl_selesai)  }}</td>
                </tr>
                <tr>
                    <th scope="row" class="text-left" style="background-color:#f2f2f2">Nama Perusahaan</th>
                    <td style="background-color:#f2f2f2" >{{ empty(siswa('data_prakerin')->perusahaan->nama) ? 'nama perusahaan belum di tentuakan' : siswa('data_prakerin')->perusahaan->nama }}</td>
                </tr>
                <tr>
                    <th scope="row" class="text-left" >Lokasi Perusahaan</th>
                    <td style="background-color:#f2f2f2">  {{ empty(siswa('data_prakerin')->perusahaan->alamat) ? 'alamat perusahaan belum di tentukan' : siswa('data_prakerin')->perusahaan->alamat }}</td>
                </tr>
            </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection
@push('script')

@endpush
