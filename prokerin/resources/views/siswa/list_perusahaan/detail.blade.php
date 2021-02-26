@extends('template.master')
@push('link')
<style>
        *{
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
        .card-header{
            margin-left: -25px;
        }
</style>
@endpush
@section('title', 'Prakerin | List Perusahaan')
@section('judul', 'LIST PERUSAHAAN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"> <i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"><a href="{{ route('user.perusahaan') }}"><i class="far fa-building"></i>List perusahaan</div></a>
        <div class="breadcrumb-item"><i class="far fa-building"></i> {{ $perusahaan->nama }}</div>
@endsection
@section('main')
<div class="control">
        {{--  --}}
<div class="card mt-5">
        <div class="container-fluid text-center H-100 mb-3 teks" >  
            <h3>Detail Perusahaan</h3>          
        </div>
        <hr>
    {{--  --}}
    
    {{-- detailperusahaan --}}
    <div class="container-fluid">
        <div class="row">
        {{-- 1 --}}
        <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('login/photos/dashboard.png') }}" style="display: block; margin-left: auto; margin-right: auto;" class="" height="165px" width="222px" alt="...">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="summary">
                    <div class="summary-item">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <a href="#">
                                    <table border="1">
                                        <tr>
                                            <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                                        </tr>
                                    </table>
                                </a>
                                <div class="media-body" style="margin-top: -8px;">
                                    <div class="media-title"><p>Nama Perusahaan</p></div>
                                    <div class=""><h6 style="font-size: 14px;">PT.Telkom.Net</h6></div>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <table border="1">
                                        <tr>
                                            <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                                        </tr>
                                    </table>
                                </a>
                                <div class="media-body" style="margin-top: -8px;">
                                    <div class="media-title"><p>Bidang Perusahaan</p></div>
                                    <div class=""><h6 style="font-size: 14px;">Isi Pulsa</h6></div>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <table border="1">
                                        <tr>
                                            <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                                        </tr>
                                    </table>
                                </a>
                                <div class="media-body" style="margin-top: -8px;">
                                    <div class="media-title"><p>Nama Pemimpin</p></div>
                                    <div class=""><h6 style="font-size: 14px;">H.Drs.Ir. Dadang Syuaib</h6></div>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <table border="1">
                                        <tr>
                                            <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                                        </tr>
                                    </table>
                                </a>
                                <div class="media-body" style="margin-top: -8px;">
                                    <div class="media-title"><p>Status Perusahaan</p></div>
                                    <div class=""><h6 style="font-size: 14px;">Aktif Lah Bor</h6></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
          </div>
        </div>
        {{-- 1 --}}
        
        {{-- 2 --}}
        <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                  </div>
                <div class="summary">
                  <div class="summary-item">
                    <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                            <a href="#">
                                <table border="1">
                                    <tr>
                                        <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                                    </tr>
                                </table>
                            </a>
                            <div class="media-body" style="margin-top: -8px;">
                              <div class="media-title"><p>Alamat Perusahaan</p></div>
                              <div class=""><h6 style="font-size: 14px;">Lurus belok kanan ada pertigaan belok kiri No.223 Jl.Bungur1</h6></div>
                            </div>
                          </li>
                      <li class="media">
                        <a href="#">
                            <table border="1">
                                <tr>
                                    <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                                </tr>
                            </table>
                        </a>
                        <div class="media-body" style="margin-top: -8px;">
                          <div class="media-title"><p>Link Perusahaan</p></div>
                          <div class=""><h6 style="font-size: 14px;">TelkomIndonesia.com</h6></div>
                        </div>
                      </li>
                      <li class="media">
                        <a href="#">
                            <table border="1">
                                <tr>
                                    <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                                </tr>
                            </table>
                        </a>
                        <div class="media-body" style="margin-top: -8px;">
                          <div class="media-title"><p>Email Perusahaan</p></div>
                          <div class=""><h6 style="font-size: 14px;">telkomindonesia@email.com</h6></div>
                        </div>
                      </li>
                      <li class="media">
                        <a href="#">
                            <table border="1">
                                <tr>
                                    <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                                </tr>
                            </table>
                        </a>
                        <div class="media-body" style="margin-top: -8px;">
                          <div class="media-title"><p>No Tlp Perusahaan</p></div>
                          <div class=""><h6 style="font-size: 14px;">+6283896802804</h6></div>
                        </div>
                      </li>
                      <li class="media">
                        <a href="#">
                            <table border="1">
                                <tr>
                                    <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                                </tr>
                            </table>
                        </a>
                        <div class="media-body" style="margin-top: -8px;">
                          <div class="media-title"><p>Deskripsi Perusahaan</p></div>
                          <div class="">
                              <h6 style="font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, nihil?
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, nihil?
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, nihil?
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, nihil?
                                  </h6></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        {{-- 2 --}}
        </div>
    </div>
    {{-- detailperusahaan end --}}
    </div>
</div>
@endsection
@push('script')
<script>

</script>
@endpush
