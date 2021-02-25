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
    }.card{
        height:550px;
    }
</style>
@endpush
@section('title', 'Prakerin | Edit Profile')
@section('judul', 'EDIT PROFILE')
@section('breadcrump')
        <div class="breadcrumb-item "> <a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item "> <a href="{{ route('user.profile') }}"><i class="fas fa-user"></i> PROFILE</a></div>
        <div class="breadcrumb-item active"> EDIT PROFILE </div>
@endsection
@section('main')
<div class="card">
<div class="card-header  border-bottom border-dark">Edit Profile</div>
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
              <div class="media-title"><p>USER ID</p></div>
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
              <div class="media-title"><p>NIPD</p></div>
              <div class="" style="margin-top: -14px;"><h6>000000000</h6></div>
          </div>
        </li>
        <li class="media mt-4">
          <a href="#">
              <table border="1">
                  <tr>
                      <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                  </tr>
              </table>
          </a>
          <div class="media-body ml-3" style="margin-top: -16px;">
              <div class="media-title"><p>Nama Siswa</p></div>
              <div class="" style="margin-top: -14px;"><h6><input type="text" name="" id=""></h6></div>
          </div>
        </li>
        <li class="media mt-4">
          <a href="#">
              <table border="1">
                  <tr>
                      <td style="height:30px; width:30px;"><i class="fas fa-cog" style="margin-left: 8px;"></i></td>
                  </tr>
              </table>
          </a>
          <div class="media-body ml-3" style="margin-top: -16px;">
              <div class="media-title"><p>Jurusan</p></div>
              <div class="" style="margin-top: -14px;"><h6><select name="jurusan" id="">
                      <option value="">Pilih Jurusan</option>
                      <option value="">RPL1</option>
                      <option value="">RPL2</option>
                      <option value="">RPL3</option>
                      <option value="">TKJ1</option>
                      <option value="">TKJ2</option>
                      <option value="">TKJ3</option>
                      <option value="">TKJ4</option>
                      <option value="">TKJ5</option>
                      <option value="">MM1</option>
                      <option value="">MM2</option>
                      <option value="">MM3</option>
                      <option value="">BC1</option>
                      <option value="">BC2</option>
                      <option value="">BC3</option>
                      <option value="">TEI</option>
                  </select></h6></div>
          </div>
        </li>
        <li class="media mt-4">
          <a href="#">
              <table border="1">
                  <tr>
                      <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                  </tr>
              </table>
          </a>
          <div class="media-body ml-3" style="margin-top: -16px;">
              <div class="media-title"><p>Kelas</p></div>
              <div class="" style="margin-top: -14px;"><h6><select name="Kelas" id="">
                      <option value="">Pilih kelas</option>
                      <option value="">X</option>
                      <option value="">XI</option>
                      <option value="">XII</option>
                  </select></h6></div>
          </div>
        </li>
        
      </div>
    </div>

    <div class="col pl-5 lg-6 ">
      <br>
      <div>
        <li class="media mb-4">
          <a href="#">
              <table border="1">
                  <tr>
                      <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                  </tr>
              </table>
          </a>
          <div class="media-body ml-3" style="margin-top: -16px;">
              <div class="media-title"><p>Email</p></div>
              <div class="" style="margin-top: -14px;"><h6><input type="text"></h6></div>
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
          <div class="media-body ml-3" style="margin-top: -16px;">
              <div class="media-title"><p>No HP</p></div>
              <div class="" style="margin-top: -14px;"><h6><input type="number"></h6></div>
          </div>
        </li>
      </div>
      <button type="button" class="btn btn-success">Simpan</button>
      <button type="button" class="btn btn-danger">cancel</button>
    </div>
 </div>
</div>
@endsection
@push('script')

@endpush
