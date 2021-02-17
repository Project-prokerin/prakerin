@extends('template.master')
@push('link')
<style>
    *{
        font-family: sans-serif;
        text-decoration: none;
    }
    @media screen and (max-width:680px){

    #maincontent{
    width: auto;
    float: none;
    }
    #sidebar{
    width: auto;
    float: none;
    }
    }
    .card-body h6,p{
        margin: 0;
        padding: 0;
        text-align: left;
        position: inherit;
        margin-left: 20px;
    }
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
    .col-sm-11{
        margin-left: 40px;
    }
    .altimg{
        width: 215px;
        height: 145px;
    }
    .medcontent{
        margin-left: 20px;
        margin-top: -15px;
    }
    .card-header{
        margin-left: -25px;
    }
    .content{
        margin-top: -20px;
        margin-left: -20px;
    }
</style>
@endpush
@section('title', 'Prakerin | List Perusahaan')
@section('judul', 'LIST PERUSAHAAN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"> <i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"><i class="far fa-building"></i> List perusahaan</div>
@endsection
@section('main')
{{--  --}}
<div class="card mt-5">
                <div class="container-fluid text-center H-100 mb-3 teks" >  
                    <h3>Perusahaan</h3>           
                </div>
{{--  --}}


{{-- listperusahaan --}}
<div class="container-fluid mt-4">
    <div class="row">
    {{-- 1 --}}
    <div class="col-sm-11">
        <div class="card">
            <li class="media">
                <div class="card mt-3 ml-3">
                    <img alt="image" class="mr-3 altimg" src="{{ asset('login/photos/dashboard.png') }}">
                </div>
            <div class="media-body">
                <div class="medcontent" >
                    <div class="card-header">
                        <h3>PT.Telkom.Net</h3>
                    </div>
                    <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, modi?
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, modi?
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, modi?
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, modi?
                        </p>
                        <a href="" style="text-decoration: none; margin-left: 20px;">Read More</a>
                    </div>
              </div>
            </div>
            </li>
        </div>
    </div>
    {{-- 1 --}}

    {{-- 2 --}}
    <div class="col-sm-11">
        <div class="card">
            <li class="media">
                <div class="card mt-3 ml-3">
                    <img alt="image" class="mr-3 altimg" src="{{ asset('login/photos/dashboard.png') }}">
                </div>
            <div class="media-body">
                <div class="medcontent">
                    <div class="card-header">
                        <h3>PT.Telkom.Net</h3>
                    </div>
                    <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, modi?
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, modi?
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, modi?
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, modi?
                        </p>
                        <a href="" style="text-decoration: none; margin-left: 20px;">Read More</a>
                    </div>
              </div>
            </div>
            </li>
        </div>
    </div>
    {{-- 2 --}}
    </div>
</div>
{{-- listperusahaan end --}}
</div>
@endsection
@push('script')

@endpush
