@extends('template.master')
@push('link')

@endpush
@section('title', 'Prakerin | Data Jurnal Prakerin')
@section('judul', 'DATA JURNAL PRAKERIN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-newspaper"></i> DATA JURNAL PRAKERIN</div>
@endsection
@section('content')

@endsection
@push('script')

@endpush
