    @extends('template.master')
    @push('link')
    <style>
    .teks{
        text-align: center;
        margin-top: -20px;
        height: 65px;
        width: 250px;
        color: white;
        background: #475bf0;
    }
    .teks h3{
        margin-top: 15px;
    }
    .card{
        height: 400px;
    }
        .media-body p{
            color: #475bf0;
        }
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
    <div class="card mt-5">
    <div class="container text-center H-100 teks" >
        <h3>Profile</h3>
    </div>
    <div class="row container mx-3 ml-5">

        @if (session('alert'))
                        <div class="flash" data-id="{{ session('alert') }}"></div>
        @endif
        <div class="col-4 pt-4">
        <p style="font-size: 18px;">Detail Siswa</p>
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
                <div class="" style="margin-top: -14px;"><h6> {{ siswa('main')->nipd }}</h6></div>
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
                <div class="" style="margin-top: -14px;"><h6>{{ siswa('main')->nama_siswa }}</h6></div>
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
                <div class="" style="margin-top: -14px;"><h6>{{ siswa('main')->jurusan }}</h6></div>
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
                <div class="" style="margin-top: -14px;"><h6>{{ siswa('main')->kelas }}</h6></div>
            </div>
            </li>
        </div>
    {{-- block1 --}}


    {{-- block2 --}}
        <div class="col-4 pt-4">
        <p style="font-size: 18px; color: white;">.</p>
            <li class="media">
            <a href="#">
                <table border="1">
                    <tr>
                        <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                    </tr>
                </table>
            </a>
            <div class="media-body ml-3" style="margin-top: -8px;">
                <div class="media-title"><p>No HP</p></div>
                <div class="" style="margin-top: -14px;"><h6>{{ siswa('main')->no_hp }}</h6></div>
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
                <div class="media-title"><p>Email</p></div>
                <div class="" style="margin-top: -14px;"><h6>{{ siswa('main')->email }}</h6></div>
            </div>
            </li>
        </div>
    {{-- block2 --}}


    {{-- block3 --}}
        <div class="col-4">
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
    {{-- block3 --}}
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
