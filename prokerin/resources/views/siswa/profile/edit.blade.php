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
        }.invalid_feedback{
            color: red!important;
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
    <div class="card mt-5">
    <div class="container text-center H-100 teks" >
        <h3>Edit Profile</h3>
    </div>
    <div class="row container mx-3 ml-5">

    {{-- block1 --}}
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
                <div class="" style="margin-top: -14px;"><h6>{{ siswa('main')->nipd }}</h6></div>
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
            <div class="media-body ml-3 mb-1" style="margin-top: -8px;">
                <div class="media-title"><p>Nama Siswa</p></div>
                <input type="text" style="width: 230px; margin-top: -8px;" class="form-control @error('nama_siswa') is-invalid @enderror" value="{{ old('nama_siswa', siswa('main')->nama_siswa) }}" name="nama_siswa" id="">
                    @error('nama_siswa')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
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
                <select style="width: 230px; margin-top: -8px;" class="form-control  @error('jurusan') is-invalid @enderror" name="jurusan" id="">
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
                </select>
                @error('jurusan')
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
                <div class="media-title"><p>Kelas</p></div>
                <select style="width: 120px; margin-top: -8px;" class="form-control  @error('kelas') is-invalid @enderror"  name="kelas" id="">
                    <option value="">Pilih kelas</option>
                            <option value="X" {{ (siswa('main')->kelas == 'X') ? 'selected' : '' }}>X</option>
                            <option value="XI" {{ (siswa('main')->kelas == 'XI') ? 'selected' : '' }}>XI</option>
                            <option value="XII" {{ (siswa('main')->kelas == 'XII') ? 'selected' : '' }}>XII</option>
                </select>
                @error('jurusan')
                        <div class="invalid_feedback">{{ $message }}</div>
                @enderror
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
                <input type="number" style="width: 230px; margin-top: -8px;" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp', siswa('main')->no_hp) }}">
                    @error('no_hp')
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
                <div class="media-title"><p>Email</p></div>
                <input type="text" style="width: 230px; margin-top: -8px;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',  siswa('main')->email) }}">
                 @error('email')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
            </div>
            </li>
            <div class="card-body mt-4" style="margin-left: 59px;">
                <div class="">
                <a href="/user/profile" class="btn btn-icon icon-left btn-danger" style="margin-right: 15px;"><i class="fas fa-times"></i> Cancel</a>
                <button type="submit" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i> Simpan</button>
                </div>
            </div>
        </div>
    {{-- block2 --}}
    </form>
    @endsection
    @push('script')

    @endpush
