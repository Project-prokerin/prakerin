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
  .header{
    text-align:center;
    margin-top:20px;
    margin-bottom:20px;
  }

</style>
@endpush
@section('title', 'Prakerin | kelompok')
@section('judul', 'KELOMPOK LAPORAN')
@section('breadcrump')
        <div class="breadcrumb-item "> <a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"><i class="fas fa-user"></i> KELOMPOK LAPORAN</div>
@endsection
@section('main')
<div class="card mt-5">
  <div class="container text-center H-100 mb-3 teks" >
      <h3>Kelompok Laporan</h3>
  </div>
      <div class="container-fluid mt-4 mb-4">
      <div class="mw-100 mx-auto ">
          <table class="table table-bordered table-hover">
          <thead>
              <tr>
                <th scope="col" colspan="2" class="text-center">
                  @if (empty($kelompok))
                      <center> Anda belum masuk kelompok</center>
                  @else
                      <center>Anda sudah masuk kelompok no {{ $no_kelompok }}</center>
                  @endif
                </th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <th scope="row" style="width: 400px;;" class="text-left">Pembimbing</th>
                  <td class="" style="">{{ $guru_nama }}</td>
              </tr>
              <tr>
                  <th scope="row" class="text-left">Judul Laporan</th>
                  <td style="">{{ $laporan }}</td>
              </tr>
              {{--  --}}
              @if(empty($kelompok))
              {{--  --}}
                  <th scope="row" class="text-left" style="">Anggota 1</th>
                  <td style="">-</td>
              </tr>
              <tr>
                  <th scope="row" class="text-left">Anggota 2</th>
                  <td style="">-</td>
              </tr>
              <tr>
                  <th scope="row" class="text-left" style="">Anggota 3</th>
                  <td style="">-</td>
              </tr>
              <tr>
                  <th scope="row" class="text-left" >Anggota 4</th>
                  <td style="">-</td>
              </tr>
              <tr>
                <th scope="row" class="text-left" >Anggota 5</th>
                <td style="">-</td>
            </tr>
            <tr>
              <th scope="row" class="text-left" >Anggota 6</th>
              <td style="">-</td>
            </tr>
            {{--  --}}
            @else
              @foreach ($kelompok as $index => $item)
                </tr>
                <tr>
                  <th scope="col">Anggota {{ $index + 1 }}</th>
                  <td>{{ $item->data_prakerin->nama }}</td>
                </tr>
              @endforeach
            @endif
            {{--  --}}
          </tbody>
          </table>
      </div>
      </div>
  </div>
@endsection
@push('script')

@endpush

