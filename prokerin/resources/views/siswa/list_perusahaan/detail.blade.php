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
                            <img src="{{ asset('images/perusahaan/'.$perusahaan->foto) }}" style="display: block; margin-left: auto; margin-right: auto;" class="" height="165px" width="222px" alt="...">
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
                                            <td style="height:30px; width:30px;"><i class="fas fa-building" style="margin-left: 8px;"></i></td>
                                        </tr>
                                    </table>
                                </a>
                                <div class="media-body" style="margin-top: -8px;">
                                    <div class="media-title"><p>Nama Perusahaan</p></div>
                                    <div class=""><h6 style="font-size: 14px;">{{ $perusahaan->nama }}</h6></div>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <table border="1">
                                        <tr>
                                            <td style="height:30px; width:30px;"><i class="fas fa-align-center" style="margin-left: 8px;"></i></td>
                                        </tr>
                                    </table>
                                </a>
                                <div class="media-body" style="margin-top: -8px;">
                                    <div class="media-title"><p>Bidang Perusahaan</p></div>
                                    <div class=""><h6 style="font-size: 14px;">{{ $perusahaan->bidang_usaha }}</h6></div>
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
                                    <div class=""><h6 style="font-size: 14px;">{{ $perusahaan->nama_pemimpin }}</h6></div>
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
                                        <td style="height:30px; width:30px;"><i class="fas fa-map-marked-alt" style="margin-left: 8px;"></i></td>
                                    </tr>
                                </table>
                            </a>
                            <div class="media-body" style="margin-top: -8px;">
                              <div class="media-title"><p>Alamat Perusahaan</p></div>
                              <div class=""><h6 style="font-size: 14px;">{{ $perusahaan->alamat }}</h6></div>
                            </div>
                          </li>
                      <li class="media">
                        <a href="#">
                            <table border="1">
                                <tr>
                                    <td style="height:30px; width:30px;"><i class="fas fa-link" style="margin-left: 8px;"></i></td>
                                </tr>
                            </table>
                        </a>
                        <div class="media-body" style="margin-top: -8px;">
                          <div class="media-title"><p>Link Perusahaan</p></div>
                          <div class=""><h6 style="font-size: 14px;">{{ $perusahaan->link }}</h6></div>
                        </div>
                      </li>
                      <li class="media">
                        <a href="#">
                            <table border="1">
                                <tr>
                                    <td style="height:30px; width:30px;"><i class="far fa-envelope" style="margin-left: 8px;"></i></td>
                                </tr>
                            </table>
                        </a>
                        <div class="media-body" style="margin-top: -8px;">
                          <div class="media-title"><p>Email Perusahaan</p></div>
                          <div class=""><h6 style="font-size: 14px;">{{ $perusahaan->email }}</h6></div>
                        </div>
                      </li>
                      <li class="media">
                        <a href="#">
                            <table border="1">
                                <tr>
                                    <td style="height:30px; width:30px;"><i class="fab fa-amilia" style="margin-left: 8px;"></i></td>
                                </tr>
                            </table>
                        </a>
                        <div class="media-body" style="margin-top: -8px;">
                          <div class="media-title"><p>Deskripsi Perusahaan</p></div>
                          <div class="">
                              <h6 style="font-size: 14px;">{{ $perusahaan->deskripsi_perusahaan }}
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
