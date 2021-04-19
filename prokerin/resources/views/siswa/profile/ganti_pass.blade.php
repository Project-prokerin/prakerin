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
            width: 80%;
        }.invalid_feedback{
            color: red!important;
            font-size: 10px
        }
    </style>
    @endpush
    @section('title', 'Prakerin | Ganti password')
    @section('judul', 'GANTI PASSWORD')
    @section('breadcrump')
            <div class="breadcrumb-item "> <a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
            <div class="breadcrumb-item "> <a href="{{ route('user.profile') }}"><i class="fas fa-user"></i> PROFILE</a></div>
            <div class="breadcrumb-item active"><i class="fas fa-user"></i>  GANTI PASSWORD </div>
    @endsection
    @section('main')
    <div class="card mt-5">
    <div class="container text-center H-100 teks" >
        <h3>Ganti password</h3>
    </div>
    <div class=" container">
                <form action="{{ route('ganti_password.post') }}" method="POST">
                    @csrf
                <div class="row mt-4">
                    <div class="col-md-4 col-12">
                        <label for="old_pass" >Password lama</label>
                        <div class="input-group">
                        <input id="old_pass" type="password" class="form-control @error('old_pass') is-invalid @enderror" name="old_pass" value="{{ old('old_pass') }}" >
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="old_input"><i class="far fa-eye" id="icon"></i></div>
                        </div>
                        </div>
                        @error('old_pass')
                            <div class="invalid_feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="new_pass">Password baru</label>
                        <div class="input-group">
                        <input type="password" class="form-control @error('new_pass') is-invalid @enderror"  id="new_pass" name="new_pass"  value="{{ old('new_pass') }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="new_input"><i class="far fa-eye" id="icon2"></i></div>
                        </div>
                        </div>
                        @error('new_pass')
                            <div class="invalid_feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="new_pass2">ulangi password baru</label>
                        <div class="input-group">
                        <input type="password" class="form-control @error('new_pass2') is-invalid @enderror" id="new_pass2" name="new_pass2" value="{{ old('new_pass2') }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="new_input2"><i class="far fa-eye" id="icon3"></i></div>
                        </div>
                        </div>
                        @error('new_pass2')
                            <div class="invalid_feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-4">
                    <div class="row">
                        <a href="/user/profile" class="btn btn-danger ml-auto"><i class="fas fa-times"></i> Batal</a>
                        <button type="submit" class="btn btn-success ml-2 mr-3"><i class="fas fa-check"></i> simpan</button>
                    </div>
                </div>
                </form>
    </div>
    @endsection
    @push('script')
    <script>
        $(document).ready(function () {
            $('#old_input').click(function (params) {
            if('password' == $('#old_pass').attr('type')){
                $('#old_pass').prop('type', 'text');
                $('#icon').removeClass('fa-eye').addClass('fa-eye-slash');
            }else{
                $('#old_pass').prop('type', 'password');
                $('#icon').removeClass('fa-eye-slash').addClass('fa-eye');
            }
            });

            $('#new_input').click(function (params) {
            if('password' == $('#new_pass').attr('type')){
                console.log('true');
                $('#new_pass').prop('type', 'text');
                $('#icon2').removeClass('fa-eye').addClass('fa-eye-slash');
            }else{
                $('#new_pass').prop('type', 'password');
                $('#icon2').removeClass('fa-eye-slash').addClass('fa-eye');
            }
            });

            $('#new_input2').click(function (params) {
            if('password' == $('#new_pass2').attr('type')){
                console.log('true');
                $('#new_pass2').prop('type', 'text');
                $('#icon3').removeClass('fa-eye').addClass('fa-eye-slash');
            }else{
                $('#new_pass2').prop('type', 'password');
                $('#icon3').removeClass('fa-eye-slash').addClass('fa-eye');
            }
            });
        })
    </script>
    @endpush
