@extends('template.master')
@push('link')
<style>
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
<div class="container">
<div class="card ">
        <div class="header " >
            @if (empty($kelompok))
                 <center> Anda belum masuk kelompok</center>
            @else
                <center>Anda sudah masuk kelompok no {{ $no_kelompok }}</center>
            @endif

        </div>
        <table class="table table-bordered">
  <thead>
    <tr>
    </tr>
  </thead>
<tbody>

        <tr>
        <th scope="col">Pembimbing</th>
        <td>{{ $guru_nama }}</td>

        </tr>
        <tr>
        <th scope="col">Judul Laporan</th>
        <td>
            {{ $laporan }}
        </td>
        </tr>
        @if(empty($kelompok))
        <th scope="col">nama</th>
        <td>-</td>

        </tr>
        <tr>
        <th scope="col">nama</th>
        <td></td>

        </tr>
        <tr>
        <th scope="col">nama</th>
        <td>-</td>
        <th scope="col">nama</th>
        <td>-</td>
        </tr>
        @else
            @foreach ($kelompok as $index => $item)
            </tr>
            <tr>
            <th scope="col">Anggota {{ $index + 1 }}</th>
            <td>{{ $item->data_prakerin->nama }}</td>
            </tr>
            @endforeach
        @endif




  </tbody>
</table>
        </div>
</div>
@endsection
@push('script')

@endpush

