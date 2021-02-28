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
        .media-body p{
            color: #475bf0;
        }
        .invalid_feedback{
            color: red!important;
        }
    </style>
    @endpush
    @section('title', 'Prakerin | Edit Profile')
    @section('judul', 'EDIT PROFILE')
    @section('breadcrump')
            <div class="breadcrumb-item "> <a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
            <div class="breadcrumb-item "> <a href="{{ route('user.profile') }}"><i class="fas fa-user"></i> PROFILE</a></div>
            <div class="breadcrumb-item active"><i class="fas fa-user"></i> EDIT PROFILE </div>
    @endsection
    @section('main')
    <div class="card mt-5">
    <div class="container text-center H-100 teks" >
        <h3>Edit Profile</h3>
    </div>
    <div class=" container">
        <form action="/user/profile/{{ siswa('main')->id }}" method="POST">
        @method('PUT')
        @csrf
                                <div class="row mt-3 mr-3 ml-3">
                                <div class="form-group col-md-6 col-12">
                                    <label>Nama</label>
                                    <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" value="{{ old('nama_siswa', siswa('main')->nama_siswa) }}" name="nama_siswa" required="">
                                    @error('nama_siswa')
                                        <div class="invalid_feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Email</label>
                                    <input type="text"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',  siswa('main')->email) }}" required="">
                                    @error('email')
                                        <div class="invalid_feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="row mr-3 ml-3">
                                <div class="form-group col-md-3 col-12">
                                    <label>Kelas</label>
                                    <select class="form-control  @error('kelas') is-invalid @enderror"  name="kelas" id="">
                                    <option value="" {{ ( old('kelas') == '') ? 'selected' : '' }}>Pilih kelas</option>
                                            <option value="X" {{ ( old('kelas',siswa('main')->kelas)  == 'X') ? 'selected' : '' }}>X</option>
                                            <option value="XI" {{ ( old('kelas',siswa('main')->kelas)  == 'XI') ? 'selected' : '' }}>XI</option>
                                            <option value="XII" {{ ( old('kelas',siswa('main')->kelas)  == 'XII') ? 'selected' : '' }}>XII</option>
                                </select>
                                @error('kelas')
                                        <div class="invalid_feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label>Jurusan</label>
                                <select  class="form-control  @error('jurusan') is-invalid @enderror" name="jurusan" id="">
                                    <option value="" {{ ( old('jurusan') == '') ? 'selected' : '' }}>Pilih Jurusan</option>
                                            <option value="RPL 1" {{ ( old('jurusan', siswa('main')->jurusan) == 'RPL 1') ? 'selected' : '' }}>RPL 1</option>
                                            <option value="RPL 2" {{ ( old('jurusan', siswa('main')->jurusan) == 'RPL 2') ? 'selected' : '' }}>RPL 2</option>
                                            <option value="RPL 3" {{ (old('jurusan', siswa('main')->jurusan) == 'RPL 3') ? 'selected' : '' }}>RPL 3</option>
                                            <option value="TKJ 1" {{ (old('jurusan', siswa('main')->jurusan) == 'TKJ 1') ? 'selected' : '' }}>TKJ 1</option>
                                            <option value="TKJ 2" {{ (old('jurusan', siswa('main')->jurusan) == 'TKJ 2') ? 'selected' : '' }}>TKJ 2</option>
                                            <option value="TKJ 3" {{ (old('jurusan', siswa('main')->jurusan) == 'TKJ 3') ? 'selected' : '' }}>TKJ 3</option>
                                            <option value="TKJ 4" {{ (old('jurusan', siswa('main')->jurusan) == 'TKJ 4') ? 'selected' : '' }}>TKJ 4</option>
                                            <option value="TKJ 5" {{ (old('jurusan', siswa('main')->jurusan) == 'TKJ 5') ? 'selected' : '' }}>TKJ 5</option>
                                            <option value="MM 1" {{ (old('jurusan',siswa('main')->jurusan) == 'MM 1') ? 'selected' : '' }}>MM 1</option>
                                            <option value="MM 2" {{ (old('jurusan',siswa('main')->jurusan) == 'MM 2') ? 'selected' : '' }}>MM 2</option>
                                            <option value="MM 3" {{ (old('jurusan', siswa('main')->jurusan) == 'MM 3') ? 'selected' : '' }}>MM 3</option>
                                            <option value="BC 1" {{ (old('jurusan', siswa('main')->jurusan) == 'BC 1') ? 'selected' : '' }}>BC 1</option>
                                            <option value="BC 2" {{ (old('jurusan', siswa('main')->jurusan) == 'BC 2') ? 'selected' : '' }}>BC 2</option>
                                            <option value="BC 3" {{ (old('jurusan', siswa('main')->jurusan) == 'BC 3') ? 'selected' : '' }}>BC 3</option>
                                            <option value="TEI" {{ (old('jurusan', siswa('main')->jurusan) == 'TEI') ? 'selected' : '' }}>TEI</option>
                                </select>
                                @error('jurusan')
                                        <div class="invalid_feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group col-md-4 col-12">
                                <label>nomor    hp</label>
                                <input type="text"class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp', siswa('main')->no_hp) }}">
                                @error('no_hp')
                                    <div class="invalid_feedback">{{ $message }}</div>
                                @enderror
                                        </div>
                                        </div>
                                <div class="row">

                                            <a href="/user/profile" class="btn btn-danger ml-auto mb-3 "><i class="fas fa-times"></i> Batal</a>
                                            <button type="submit" class="btn btn-success ml-2 mr-5 mb-3 "><i class="fas fa-check"></i> simpan</button>

                                </div>
        </form>
    </div>
    </div>

    @endsection
    @push('script')

    @endpush
