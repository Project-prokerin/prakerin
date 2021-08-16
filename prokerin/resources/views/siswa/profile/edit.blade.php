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
                                    <label>Tempat lahir</label>
                                    <input type="text"  class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir',  siswa('main')->tempat_lahir) }}" required="">
                                    @error('tempat_lahir')
                                        <div class="invalid_feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="row mr-3 ml-3">
                                <div class="form-group col-md-4 col-12">
                                    <label>Kelas</label>
                                    <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas',siswa('main')->kelas) }}">
                                    {{-- <select class="form-control  @error('kelas') is-invalid @enderror"  name="kelas" id="">
                                    <option value="" {{ ( old('kelas') == '') ? 'selected' : '' }}>Pilih kelas</option>
                                    @foreach ($kelas as $item)
                                            <option value="{{ $item->id }}" @if(old('kelas',siswa('main')->kelas->jurusan->id) == $item->id ) selected @endif>{{ $item->level .' '. $item->jurusan->singkatan_jurusan ." (".$item->jurusan->jurusan.")"  }}</option>
                                    @endforeach
                                </select> --}}
                                @error('kelas')
                                        <div class="invalid_feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                  <div class="form-group col-md-4 col-12">
                                    <label>Jurusan</label>
                                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan',siswa('main')->jurusan) }}">
                                    {{-- <select class="form-control  @error('kelas') is-invalid @enderror"  name="kelas" id="">
                                    <option value="" {{ ( old('kelas') == '') ? 'selected' : '' }}>Pilih kelas</option>
                                    @foreach ($kelas as $item)
                                            <option value="{{ $item->id }}" @if(old('kelas',siswa('main')->kelas->jurusan->id) == $item->id ) selected @endif>{{ $item->level .' '. $item->jurusan->singkatan_jurusan ." (".$item->jurusan->jurusan.")"  }}</option>
                                    @endforeach
                                </select> --}}
                                @error('jurusan')
                                        <div class="invalid_feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group col-md-4 col-12">
                                <label>Tanggal lahir</label>
                                <input type="date"class="form-control ui-datepicker  @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir', siswa('main')->tanggal_lahir->format('Y-m-d')) }}" >
                                @error('tanggal_lahir')
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
