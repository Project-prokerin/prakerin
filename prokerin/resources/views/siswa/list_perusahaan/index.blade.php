@extends('template.master')
@push('link')
<style>
    *{
        font-family: sans-serif;
        text-decoration: none;
    }
    a{
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
    <div class="row" id="row">

    </div>

</div>
{{-- listperusahaan end --}}
</div>
@endsection
@push('script')
<script>

    $(document).ready(function() {
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
            });
            $.ajax({
            type: 'get',
            url: '{{  route("user.perusahaan.api")  }}',
            dataType:'json',
            success: function(result){
                    let len = result.perusahaan.length;
                    for (let i = 0; i < len; i++) {
                            let perusahaan = result.perusahaan[i];
                            deskripsi = perusahaan.deskripsi_perusahaan;
                            //console.log(perusahaan)
                            let card = '<a href="/user/perusahaan/'+perusahaan.id+'" class="text-decoration-none text-dark">' +
                                '<div class="col-sm-11">' +
                                '<div class="card">' +
                                    '<li class="media">' +
                                    '<div class="card mt-3 ml-3">'+
                                            "<img alt='image' class='mr-3 altimg' src='{{ url('images/perusahaan/') }}/"+perusahaan.foto+"'>"+
                                        '</div>'+
                                        '<div class="media-body">'+
                                            '<div class="medcontent" >'+
                                            ' <div class="card-header">'+
                                                ' <h3>'+perusahaan.nama+'</h3>'+
                                            ' </div>'+
                                            '  <div class="content">'+
                                                    '<p>' + deskripsi.substr(0,400)  + '</p>'+
                                                    '<a href="/user/perusahaan/'+perusahaan.id+'" style="text-decoration: none; margin-left: 20px;">Read More</a>'+
                                                '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</li>'+
                                    '</div>'+
                                '</div>'+
                                '</a>';

                    $('#row').append(card);
                    }
            },
            fail: function(result){
                console.log(data);
            }
        });

    })
</script>
@endpush
