    @extends('template.master')
    @push('link')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('template/node_modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('template/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/node_modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/node_modules/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('template/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    @endpush
    @section('breadcrump')
            <h1 style="font-size: 20px;">Template table</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">{{ Auth::user()->role }}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('guru.index') }}">guru</a></div>
            <div class="breadcrumb-item">Tambah</a></div>
    @endsection
    @section('content')
<form action="{{ route('guru.store') }}" method="POST">
    @csrf
    <div class="row">
        <input type="text" name="created_at" value="{{ \Carbon\Carbon::now() }}" hidden>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                    <div class="card-header">
                        <h4>Tambah Guru</h4>
                    </div>
                    @if(session('fail'))
                        <div class="alert alert-danger ml-4 alert-dismissible show fade" style="width: 45%">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                            <span>×</span>
                            </button>
                            {{session('fail')}}
                        </div>
                        </div>
                        @endif
                    <div class="card-body">
                        <div class="form-group  is-invalid ">
                        <label>NIK guru</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>Nama</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                        </div>
                        </div>
                    <div class="form-group @error('Jabatan') is-invalid @enderror">
                        <label class="form-label">Jabatan</label>
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="jabatan" value="hubin" class="selectgroup-input">
                            <span class="selectgroup-button">Hubin </span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="jabatan" value="kaprog" class="selectgroup-input">
                            <span class="selectgroup-button">Kaprog </span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="jabatan" value="bkk" class="selectgroup-input">
                            <span class="selectgroup-button">BKK </span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="jabatan" value="kejuruan" class="selectgroup-input">
                            <span class="selectgroup-button">Kejuruan </span>
                            </label>
                        </div>
                        </div>
                        <div class="form-group @error('jurusan') is-invalid @enderror">
                        <label>Jurusan</label>
                        <select class="form-control select2" name="jurusan">
                            <option value="">-- Pilih jurusan --</option>
                            <option value="RPL">Rekayasa Peragkat Lunak</option>
                            <option value="TIK">Tehnik jaringan Industri</option>
                            <option value="BC">broadcasting</option>
                            <option value="TKJ">Teknik komputer dan jaringan</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <label>Nomor hp</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="nomor" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp') }}">
                        </div>
                        <br>
                        {{-- <div class="custom-file">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <input type="file" class="custom-file-input" name="file" id="customFile">
                        </div> --}}
                        <button class="btn btn-primary  mt-4">Submit</button>

    </form>

    @endsection
    @push('script')

    <!-- JS Libraies -->
        <script src="{{ asset('template/node_modules/cleave.js/dist/cleave.min.js') }}"></script>
        <script src="{{ asset('template/node_modules/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
        <script src="{{ asset('template/node_modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
        <script src="{{ asset('template/node_modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('template/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('template/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('template/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('template/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('template/assets/js/page/forms-advanced-forms.js') }}"></script>
        <script src="{{ asset('template/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
<script>
   // Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

    @endpush
{{--
    <!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <title>Bootstrap 4 File Upload Input Example</title>

  <style>
  </style>
</head>

<body>

  <div class="container">
    <div class="input-group">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput">
        <label class="custom-file-label" for="customFileInput">Select file</label>
      </div>
      <div class="input-group-append">
        <button class="btn btn-primary" type="button" id="customFileInput">Upload</button>
      </div>
    </div>
  </div>

  <script>
    document.querySelector('.custom-file-input').addEventListener('change', function (e) {
      var name = document.getElementById("customFileInput").files[0].name;
      var nextSibling = e.target.nextElementSibling
      nextSibling.innerText = name
    })
  </script>
</body>

</html> --}}
