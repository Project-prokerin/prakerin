@extends('template.master')
@push('link')

@endpush
@section('breadcrump')
        <h1 style="font-size: 20px;">Template table</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">{{ Auth::user()->role }}</a></div>
        <div class="breadcrumb-item">siswa</a></div>
@endsection
@section('content')
        <div class="card">

        </div>
@endsection
@push('script')


@endpush
