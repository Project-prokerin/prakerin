@extends('template.master')
@push('link')

@endpush
@section('title', 'Prakerin | List Perusahaan')
@section('judul', 'LIST PERUSAHAAN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"> <i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"><a href="{{ route('user.perusahaan') }}"><i class="far fa-building"></i>List perusahaan</div></a>
        <div class="breadcrumb-item"><i class="far fa-building"></i> {{ $perusahaan->nama }}</div>
@endsection
@section('main')
<div class="control"></div>

@endsection
@push('script')
<script>

</script>
@endpush
