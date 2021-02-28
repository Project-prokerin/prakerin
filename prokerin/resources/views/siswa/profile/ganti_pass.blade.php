    @extends('template.master')
    @push('link')
    <style>
        .teks{
        text-align: center;
        margin-top: -20px;
        height: 65px;
        width: 320px;
        color: white;
        background: #475bf0;
        }
        .teks h3{
            margin-top: 15px;
        }
        .card{
            margin-left: 55px;
            height: 430px;
            width: 950px;
        }
        .media-body p{
            color: #475bf0;
        }.invalid_feedback{
            color: red!important;
        }
    </style>
    @endpush
    @section('title', 'Prakerin | Ganti password')
    @section('judul', 'GANTI PASSWORD')
    @section('breadcrump')
            <div class="breadcrumb-item "> <a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
            <div class="breadcrumb-item "> <a href="{{ route('user.profile') }}"><i class="fas fa-user"></i> PROFILE</a></div>
            <div class="breadcrumb-item active"> PASSWORD </div>
    @endsection
    @section('main')
    <div class="card mt-5">
    <div class="container text-center H-100 teks" >
        <h3>Edit Profile</h3>
    </div>
    <div class="row container mx-3 ml-5">
    {{-- alert --}}

    {{-- block1 --}}
        <div class="col-8 pt-4" style="margin-left: 130px;">
        <form action="{{ route('ganti_password.post') }}" method="POST">

        @csrf
            <li class="media mt-4">
            <a href="#">
                <table border="1">
                    <tr>
                        <td style="height:30px; width:30px;"><i class="far fa-user" style="margin-left: 8px;"></i></td>
                    </tr>
                </table>
            </a>
            <div class="media-body ml-3" style="margin-top: -8px;">
                <div class="media-title"><p>Password Sebelumnya</p></div>
                <input type="password" style="width: 230px; margin-top: -8px;" class="form-control @error('old_pass') is-invalid @enderror" name="old_pass" value="{{ old('old_pass') }}">
                    @error('old_pass')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
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
                    <div class="media-title"><p>Password Baru</p></div>
                    <input type="text" style="width: 230px; margin-top: -8px;" class="form-control    @error('new_pass') is-invalid @enderror" name="new_pass" value="{{ old('new_pass') }}" >
                    @error('new_pass')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
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
                    <div class="media-title"><p>Password Baru (Ulangi)</p></div>
                    <input type="text" style="width: 230px; margin-top: -8px;" class="form-control   @error('new_pass2') is-invalid @enderror " name="new_pass2" value="{{ old('new_pass2') }}">
                    @error('new_pass2')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
            </div>
            </li>
            <div class=" col-6 card-body mt-4" style="float: right;">
                <div class="" style="margin-top: -80px;">
                <a href="/user/profile" class="btn btn-icon icon-left btn-danger" style="margin-right: 15px;"><i class="fas fa-times"></i> Cancel</a>
                <button type="submit" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i> Simpan</button>
                </div>
            </div>
        </form>
        </div>
    {{-- block1 --}}
    @endsection
    @push('script')

    @endpush
