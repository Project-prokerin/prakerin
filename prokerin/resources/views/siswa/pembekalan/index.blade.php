@extends('template.master')
@push('link')
<style>
    .header{
      text-align:center;
    }
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
    .file{
      margin-top: 15px;
    }
    .buttons{
      margin-right: 150px;
      margin-top: 8px;
      float: right;
    }
    .hover{
      transition: all .2s ease-in-out;
    }
    .hover:hover{
      transform: scale(1.1); 
    }
    .buttons a{
      transition: all .2s ease-in-out;
    }
    .buttons a:hover{
      transform: scale(1.1); 
    }
  
    @media screen and (max-width:413px){
    .card{
      width: auto;
      float: none;
    }
    }
</style>
@endpush
@section('title', 'Prakerin | Pembekalan')
@section('judul', 'PEMBEKALAN MAGANG')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-newspaper"></i> PEMBEKALAN MAGANG</div>
@endsection
@section('main')
<div class="card mt-5">
  <div class="container text-center H-100 mb-3 teks" >
      <h3>Pembekalan Magang</h3>
  </div>
    <div class="container-fluid mt-4 mb-4">
      <div class="mw-100 mx-auto ">
        <table class="table table-bordered table-hover">
          <thead>
              <tr>
                <th scope="col" style="width: 300px;" class="text-center">Test</th>
                <th scope="col" class="text-center">Status</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                <th scope="row">Test WPT IQ</th>
                <td class=""></td>
              </tr>
              <tr>
                <th scope="row">Test Personality interview</th>
                <td></td>
              </tr>
              <tr>
                <th scope="row">Test soft skill</th>
                <td></td>
              </tr>
              <tr>
                <th scope="row">Portofolio</th>
                <td>
                  <input type="file" class="file hover">
                  <div class="buttons">
                    <a href="#" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Batal</a>
                    <a href="#" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i> Simpan</a>
                  </div>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>    
@endsection
@push('script')

@endpush
