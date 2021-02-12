@extends('template.master')
@push('link')

@endpush
@section('title', 'Prakerin | Ganti password')
@section('judul', 'GANTI PASSWORD')
@section('breadcrump')
        <div class="breadcrumb-item "> <a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item "> <a href="{{ route('user.profile') }}"><i class="fas fa-user"></i> PROFILE</a></div>
        <div class="breadcrumb-item active"> PASSOWRD </div>
@endsection
@section('content')

@endsection
@push('script')

@endpush
