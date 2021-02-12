@extends('template.master')
@push('link')

@endpush
@section('title', 'Prakerin | Profile')
@section('judul', 'PROFILE')
@section('breadcrump')
        <div class="breadcrumb-item "> <a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item active"> <i class="fas fa-user"></i> PROFILE</div>

@endsection
@section('content')

@endsection
@push('script')

@endpush
