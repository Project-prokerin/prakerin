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
<form action="{{ route('pembekalan.store') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="file" class="file" value="">
                        <a class="remove"> remove file</a>
                        <input type="checkbox" name="test_wp" data-id="" class="wp" value="sudah">
                        <input type="checkbox" name="test_wp" class="wp" value="belum">
                        <br>
                         <div class="custom-file">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <input type="file" class="custom-file-input" name="file" value="" id="customFile">
                        </div>
                        <a class="remove">remove file</a>
                        <button class="btn btn-primary hidden  mt-4">Submit</button>

    </div>

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
$('.btn').hide();
$(".custom-file-input").on("change", function() {
var fileName = $(this).val().split("\\").pop();
$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
// $(this).val("");
console.log($(this).val());
$('.btn').show(true)
});

// remove file
$(".remove").on("click", function() {
// $(".custom-file-input").val("");
// $(".costom-file-input").siblings(".custom-file-label").addClass("uselected").html("");
// // $(this).val("");
// console.log($(".custom-file-input").val());
$('.file').val("");
console.log('halo');
// $('.btn').show(true)
});

$(".wp").change(function()
        {
            let a = $(this).data('id');
            console.log(a);
            $(".wp").prop('checked',false);
            $(this).prop('checked',true);
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

</html> --}} --}}
