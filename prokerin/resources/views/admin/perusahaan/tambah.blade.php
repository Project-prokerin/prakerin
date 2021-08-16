@extends('template.master')
@push('link')
<link rel="stylesheet" href="{{asset('template/')}}/node_modules/summernote/dist/summernote-bs4.css">
<link rel="stylesheet" href="{{asset('template/')}}/node_modules/select2/dist/css/select2.min.css">
<style>
        .card-body .input i {
        width: 40px;
        font-size: medium;
        padding-top: 6px;
    }
    .invalid-feedback{
        display: block;
    }
    h5{
        color: rgb(82, 82, 255);
    }.card{
        height: 1100px;
    }
</style>
@endpush
@section('title', 'Prakerin | Data Perusahaan')
@section('judul', 'DATA PERUSAHAAN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> DATA PERUSAHAAN</div>
@endsection
@section('main')
<div class="card">
    {{-- <div class="container">
        <div class="card-body mt-3">
            <div class="">
                <h5>Tambah Data Perusahaan</h5>
            </div>
        </div>
    </div> --}}
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6" style="height: 500px;">
                <div class="">
                    <div class="">
                        <div class="container mt-2">
                            <h5 class="card-title">Data Perusahaan</h5>
                        </div>
                        <hr>
                        <div class="card-body">
                            <form action="{{ route('perusahaan.post') }}" method="POST" class="input" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nama Perusahaan</label>
                                    <div class="d-flex">
                                        <i class="far fa-building border text-center"></i>
                                        <input type="text" name="nama"  class="form-control form-control-sm
                                        @error('nama')
                                            is-invalid
                                        @enderror" value="{{ old('nama') }}">
                                    </div>
                                    @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Bidang usaha</label>
                                    <select name="bidang_usaha" class="form-control  select2 @error('bidang_usaha')  is-invalid  @enderror select2" name="bidang_usaha" id="">
                                        <option value="" selected>--Pilih Bidang usaha--</option>
                                        {{-- @foreach ($jurusan as $item)
                                        <option value="{{ $item->id }}" {{(old('id_jurusan') == $item->id) ? 'selected' : ''}}>{{ $item->singkatan_jurusan }}</option>
                                        @endforeach --}}
                                    </select>
                                        @error('bidang_usaha')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <div class="d-flex">
                                        <i class="fas fa-map-marked border text-center"></i>
                                        <input type="text" name="alamat"  class="form-control form-control-sm
                                        @error('alamat')
                                            is-invalid
                                        @enderror" value="{{ old('alamat') }}">
                                    </div>
                                    @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Link Perusahaan</label>
                                    <div class="d-flex">
                                        <i class="fas fa-link border text-center"></i>
                                        <input type="text" name="link"  class="form-control form-control-sm
                                        @error('link')
                                            is-invalid
                                        @enderror" value="{{ old('link') }}">
                                    </div>
                                    @error('link')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                                <div class="">
                                    <label class="form-label">Email Perusahaan</label>
                                    <div class="d-flex">
                                        <i class="far fa-envelope border text-center"></i>
                                        <input type="text" name="email"  class="form-control form-control-sm
                                        @error('email')
                                            is-invalid
                                        @enderror" value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                                </div>
                        </div>
                        <div class="" style="margin-left: 25px">
                        <label for="">Deskripsi Perusahaan</label>
                        <textarea id="basic-example" name="deskripsi_perusahaan" class="summernote form-control form-control-sm
                        @error('deskripsi_perusahaan')
                                is-invalid
                        @enderror" rows="3" >
                        {{ old('deskripsi_perusahaan') }}</textarea>
                        </div>
                        @error('deskripsi_perusahaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div style="margin-left: 25px; margin-top:10px;">

                    </div>
                </div>
            </div>
            {{--  --}}
            {{--  --}}
            <div class="col-sm-6" >
                <div class="">
                    <div class="input">
                        <div class="container mt-2">
                            <h5 class="card-title pt-4"></h5>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Pemimpin</label>
                                <div class="d-flex">
                                    <i class="fas fa-user-tie border text-center"></i>
                                    <input type="text" name="nama_pemimpin"  class="form-control form-control-sm
                                    @error('nama_pemimpin')
                                            is-invalid
                                    @enderror"
                                    value="{{ old('nama_pemimpin') }}"
                                    >
                                </div>
                                @error('nama_pemimpin')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label">Deskripsi Perusahaan</label>
                                <div class="d-flex">
                                    <i class="fas fa-align-left border text-center pt-3"></i>

                                    <textarea type="text"  name="deskripsi_perusahaan" class="summernote form-control form-control-sm
                                    @error('deskripsi_perusahaan')
                                            is-invalid
                                    @enderror" rows="3"> {{ old('deskripsi_perusahaan') }}</textarea>
                                </div>
                                @error('deskripsi_perusahaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                            </div> --}}
                            <div class="mb-3">
                                <label class="form-label">Tanggal Mou</label>
                                <div class="d-flex">
                                    <i class="far fa-calendar-alt border text-center"></i>
                                    <input type="date" name="tanggal_mou"  class="form-control form-control-sm ui-datepicker
                                    @error('tanggal_mou')
                                            is-invalid
                                    @enderror" value="{{ old('tanggal_mou') }}">
                                </div>
                                @error('tanggal_mou')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Mou</label>
                                <div class="d-flex">
                                    <i class="far fa-chart-bar border text-center"></i>
                                    <input type="text" name="status_mou"  class="form-control form-control-sm
                                    @error('status_mou')
                                            is-invalid
                                    @enderror" value="{{ old('status_mou') }}">
                                </div>
                                @error('status_mou')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gambar Perusahaan</label>
                                <div class="d-flex">
                                    <i class="fas fa-image border text-center" style="height: 41px; padding-top: 10px;"></i>
                                    <div class="input-group">
                                        <input type="file" name="foto" class="form-control
                                        @error('foto')
                                            is-invalid
                                    @enderror  " id="upload" >
                                    </div>
                                </div>
                                @error('foto')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                            </div>
                            <img src="{{ asset('images/perusahaan/default.jpg') }}" id="image" alt="" style="width: 512px; height:260px;object-fit:cover;" >
                            <p id="imageName">default.jpg</p>
                            <div style="text-align: right;float:right;">
                                <button type="submit"  class="btn btn-success"><i class="fas fa-check"></i> submit</button>
                                <a href="{{route('perusahaan.index')}}" type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                                </div>
                        </div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
                </form>
</div>
@endsection
@push('script')
<script src="{{asset('template/')}}/node_modules/select2/dist/js/select2.full.min.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string

        }
    }
    $("#upload").change(function () {
        file = $('#upload');
        item  = file[0].files[0].name;
        $('#imageName').html(item);
        readURL(this);
    });

</script>
<script src="{{asset('template/')}}/node_modules/summernote/dist/js/summernote-bs4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.8.1/tinymce.min.js" integrity="sha512-DzR2RH5M2HEOaMkPDKIYIrSXhKtKncXM0rtO3Dlu7p9qUY1T8+lrTPPw+efglohND+HNb9PJJmxlqy/5l2bz5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    tinymce.init({
  selector: 'textarea#basic-example',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});

</script>
@endpush
