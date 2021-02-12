@extends('template.master')
@push('link')

@endpush
@section('title', 'Prakerin | jurnal prakerin')
@section('judul', 'JURNAL PRAKERIN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-newspaper"></i> JURNAL PRAKERIN</div>
@endsection
@section('content')

@endsection
@push('script')

@endpush


