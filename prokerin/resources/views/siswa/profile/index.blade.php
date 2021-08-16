    @extends('template.master')
    @push('link')
    <style>
    .card{
        height: 300px;
    }
    *{
        text-decoration: none;
    }
    .mtop{
        margin-top: -10px;
    }
    .pleft{
        padding-left: 15px;
    }
    .garis{
        height: 10px;
        width: auto;
        background-color: rgb(82, 82, 255);
    }
    .title{
        padding-top: 10px;
    }
    h5{
        color: rgb(82, 82, 255);
    }
    .title i{
        font-size: 20px;
        margin-left: 5px;
        margin-right: 5px;
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
    <div>
        <div class="garis"></div>
        <div class="card-header">
            <h5 class="title"><i class="far fa-address-card"></i> Informasi Siswa</h5>
        </div>
        <div class="card">
            <div class="row">
                <div class="col-sm-4 mt-4">
                    <div class="card-body">
                        @if (session('alert'))
                            <div class="flash" data-id="{{ session('alert') }}"></div>
                        @endif
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
                            <a href="{{ route('user.edit.profile')}}">
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
                            <a href="{{ route('logout') }}">
                                <div class="media-body ml-3">
                                <div class="media-title"><p>Log Out</p></div>
                                </div>
                            </a>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Detail Siswa</h5>
                          <div class="row g-3 align-items-center">
                            <label class="form-label col-7 pleft">NIPD</label>
                            <label class="form-label">: {{ siswa('main')->nipd }}</label>
                          </div>
                          <div class="row g-3 align-items-center">
                            <label class="form-label col-7 pleft">Nama Siswa</label>
                            <label class="form-label">: {{ siswa('main')->nama_siswa }}</label>
                          </div>
                            <div class="row g-3 align-items-center">
                            <label class="form-label col-7 pleft">Kelas</label>
                            <label class="form-label">: {{ siswa('main')->kelas  }}</label>
                          </div>
                          <div class="row g-3 align-items-center">
                            <label class="form-label col-7 pleft">Jurusan</label>
                            <label class="form-label">: {{ siswa('main')->jurusan  }}</label>
                          </div>
                          <div class="row g-3 align-items-center">
                            <label class="form-label col-7 pleft">Tempat lahir</label>
                            <label class="form-label">: {{ siswa('main')->tempat_lahir }}</label>
                          </div>
                          <div class="row g-3 align-items-center">
                            <label class="form-label col-7 pleft">Tanggal lahir</label>
                            <label class="form-label">: {{ siswa('main')->tanggal_lahir->Isoformat('d MMM Y') }}</label>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    @endsection
    @push('script')
    <script>
        $(document).ready(function () {
            flash = $('.flash').data('id');
            if (flash) {
                Swal.fire({
                    title: 'success',
                    text: flash,
                    icon: 'success',
                    confirmButtonText: 'tutup'
                })
            }
        })
    </script>
    @endpush
