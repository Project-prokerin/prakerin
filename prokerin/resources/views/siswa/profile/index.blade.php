@extends('template.master')
@push('link')
<style>
  *{
    text-decoration: none;
    }



      @media (max-width:432px) {
        .col-6.col-lg-6.border-right.border-dark.pt-4
      {
        border:0px solid !important

      }
    }
</style>
@endpush
@section('title', 'Prakerin | Profile')
@section('judul', 'PROFILE')
@section('breadcrump')
        <div class="breadcrumb-item "> <a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item active"> <i class="fas fa-user"></i> PROFILE</div>

@endsection
@section('main')
<div class="card">
<div class="card-header  border-bottom border-dark">Profile</div>
  <div class="row container  mx-3 ">
    <div class="col-6 col-lg-6 border-right border-dark pt-4 col-sm=12 ">
      <div>
        <li class="media">
          <a href="#">
              <table border="1">
                  <tr>
                      <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                  </tr>
              </table>
          </a>
          <div class="media-body ml-3" style="margin-top: -8px;">
              <div class="media-title"><p>NIPD</p></div>
              <div class="" style="margin-top: -14px;"><h6>000000000</h6></div>
          </div>
        </li>
        <li class="media mt-3">
          <a href="#">
              <table border="1">
                  <tr>
                      <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                  </tr>
              </table>
          </a>
          <div class="media-body ml-3" style="margin-top: -8px;">
              <div class="media-title"><p>Nama Siswa</p></div>
              <div class="" style="margin-top: -14px;"><h6>Nur Firdaus</h6></div>
          </div>
        </li>
        <li class="media mt-3">
          <a href="#">
              <table border="1">
                  <tr>
                      <td style="height:30px; width:30px;"><i class="fas fa-cog" style="margin-left: 8px;"></i></td>
                  </tr>
              </table>
          </a>
          <div class="media-body ml-3" style="margin-top: -8px;">
              <div class="media-title"><p>Jurusan</p></div>
              <div class="" style="margin-top: -14px;"><h6>Rekayasa Perangkat Lunak</h6></div>
          </div>
        </li>
        <li class="media mt-3">
          <a href="#">
              <table border="1">
                  <tr>
                      <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                  </tr>
              </table>
          </a>
          <div class="media-body ml-3" style="margin-top: -8px;">
              <div class="media-title"><p>Kelas</p></div>
              <div class="" style="margin-top: -14px;"><h6>XI</h6></div>
          </div>
        </li>
        <li class="media mt-3 mb-3">
          <a href="#">
              <table border="1">
                  <tr>
                      <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                  </tr>
              </table>
          </a>
          <div class="media-body ml-3" style="margin-top: -8px;">
              <div class="media-title"><p>No HP</p></div>
              <div class="" style="margin-top: -14px;"><h6>083896802804</h6></div>
          </div>
        </li>
      </div>
    </div>

    <div class="col pl-5 lg-6 ">
      <br>
      <div>
        <li class="media mb-3">
          <a href="#">
              <table border="1">
                  <tr>
                      <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                  </tr>
              </table>
          </a>
          <div class="media-body ml-3" style="margin-top: -8px;">
              <div class="media-title"><p>Email</p></div>
              <div class="" style="margin-top: -14px;"><h6>nurfirdaus@gmail.com</h6></div>
          </div>
        </li>
      </div>
      <br><br><br>
      <div>
        <li class="media">
          <a href="#">
              <table border="1">
                  <tr>
                      <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                  </tr>
              </table>
          </a>
          <div class="media-body ml-3" style="margin-top: 4px;">
              <div class="media-title"><p>User Profile</p></div>
          </div>
        </li>
        <li class="media" style="margin-top: -15px; margin-left: 32px;">
          <a href="/user/profile/edit">
            <div class="media-body ml-3" style="margin-top: 4px;">
              <div class="media-title"><p>Edit Profile</p></div>
            </div>
          </a>
        </li>
        <li class="media" style="margin-top: -15px; margin-left: 32px;">
          <a href="{{ route('ganti_password') }}">
            <div class="media-body ml-3">
              <div class="media-title"><p>Change Password</p></div>
            </div>
          </a>
        </li>
        <li class="media" style="margin-top: -15px; margin-left: 32px;">
          <a href="#">
            <div class="media-body ml-3">
              <div class="media-title"><p>Log Out</p></div>
            </div>
          </a>
        </li>
      </div>
    </div>
 </div>
</div>
@endsection
@push('script')

@endpush
