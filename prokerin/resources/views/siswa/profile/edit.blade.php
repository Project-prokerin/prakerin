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
<form action="/user/profile/{{ siswa('main')->id }}" method="POST">
@method('PUT')
@csrf
<div class="card">
<div class="card-header  border-bottom border-dark">Edit Profile</div>
  <div class="row container  mx-3 ">
    <div class="col-6 col-lg-6 border-right border-dark pt-4 col-sm=12 ">
        <div>
        <li class="media">
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
                <div class="" style="margin-top: -14px;"><h6>{{ siswa('main')->nipd }}</h6></div>
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
                <div class="" style="margin-top: -14px;"><h6><input type="text" value="{{ siswa('main')->nama_siswa }}" name="nama_siswa" id=""></h6></div>
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
                        <option value="RPL 1" {{ (siswa('main')->jurusan == 'RPL 1') ? 'selected' : '' }}>RPL 1</option>
                        <option value="RPL 2" {{ (siswa('main')->jurusan == 'RPL 2') ? 'selected' : '' }}>RPL 2</option>
                        <option value="RPL 3" {{ (siswa('main')->jurusan == 'RPL 3') ? 'selected' : '' }}>RPL 3</option>
                        <option value="TKJ 1" {{ (siswa('main')->jurusan == 'TKJ 1') ? 'selected' : '' }}>TKJ 1</option>
                        <option value="TKJ 2" {{ (siswa('main')->jurusan == 'TKJ 2') ? 'selected' : '' }}>TKJ 2</option>
                        <option value="TKJ 3" {{ (siswa('main')->jurusan == 'TKJ 3') ? 'selected' : '' }}>TKJ 3</option>
                        <option value="TKJ 4" {{ (siswa('main')->jurusan == 'TKJ 4') ? 'selected' : '' }}>TKJ 4</option>
                        <option value="TKJ 5" {{ (siswa('main')->jurusan == 'TKJ 5') ? 'selected' : '' }}>TKJ 5</option>
                        <option value="MM 1" {{ (siswa('main')->jurusan == 'MM 1') ? 'selected' : '' }}>MM 1</option>
                        <option value="MM 2" {{ (siswa('main')->jurusan == 'MM 2') ? 'selected' : '' }}>MM 2</option>
                        <option value="MM 3" {{ (siswa('main')->jurusan == 'MM 3') ? 'selected' : '' }}>MM 3</option>
                        <option value="BC 1" {{ (siswa('main')->jurusan == 'BC 1') ? 'selected' : '' }}>BC 1</option>
                        <option value="BC 2" {{ (siswa('main')->jurusan == 'BC 2') ? 'selected' : '' }}>BC 2</option>
                        <option value="BC 3" {{ (siswa('main')->jurusan == 'BC 3') ? 'selected' : '' }}>BC 3</option>
                        <option value="TEI" {{ (siswa('main')->jurusan == 'TEI') ? 'selected' : '' }}>TEI</option>
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
                <div class="" style="margin-top: -14px;"><h6><select name="kelas" id="">
                        <option value="">Pilih kelas</option>
                        <option value="X" {{ (siswa('main')->kelas == 'X') ? 'selected' : '' }}>X</option>
                        <option value="XI" {{ (siswa('main')->kelas == 'XI') ? 'selected' : '' }}>XI</option>
                        <option value="XII" {{ (siswa('main')->kelas == 'XII') ? 'selected' : '' }}>XII</option>
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
                <div class="" style="margin-top: -14px;"><h6><input type="text" name="email" value="{{ siswa('main')->email }}"></h6></div>
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
                <div class="" style="margin-top: -14px;"><h6><input type="number" name="no_hp" value="{{ siswa('main')->no_hp }}"></h6></div>
            </div>
            </li>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/user/profile" class="btn btn-danger">cancel</a>
        </div>
    </div>
    </div>
    </form>
@endsection
@push('script')

@endpush
