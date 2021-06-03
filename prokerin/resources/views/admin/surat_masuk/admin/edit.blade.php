@extends('template.master')
@push('link')
<style>
    .card-body .input i{
                width: 50px;
                font-size: medium;
                padding-top: 11px;
            }
            .invalid-feedback{
                    display: block;
                }


</style>
@endpush
@section('title', 'Prakerin | Surat Masuk')
    @section('judul', 'SURAT MASUK')
    @section('breadcrump')
            <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
            <div class="breadcrumb-item"> <i class="far fa-building"></i> SURAT MASUK</div>
    @endsection
@section('main')


@endsection
@push('script')
{{-- <script src="{{ asset('assets/js/main/table.js') }}" ></script> --}}
<script src="{{ asset('assets/js/pages-admin/surat-masuk-TU.js') }}" ></script>
@endpush
