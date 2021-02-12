@extends('template.master')
@push('link')

@endpush
@section('title', 'Prakerin | jurnal harian')
@section('judul', 'JURNAL HARIAN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-newspaper"></i> JURNAL HARIAN</div>
@endsection
@section('content')

@endsection
@push('script')

@endpush


