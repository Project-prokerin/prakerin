@extends('template.master')
@push('link')
    <style>
        .card-body .input i {
            width: 50px;
            font-size: medium;
            padding-top: 11px;
        }

        .invalid-feedback {
            display: block;
        }


    </style>
@endpush
@section('title', 'Prakerin | Surat Masuk')
@section('judul', 'SURAT MASUK')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i> SURAT MASUK</div>
@endsection
@section('main')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Tambah Surat</h4>
        </div>
        <div class="card-body">
            <div class="row" >
                <div class="col-sm-8">
                    <div class="">
                        <div class="" style="height: auto;">
                            <div class="card-body">
                                <form action="{{ route('admin.surat_masuk.post') }}" method="POST" class="input"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Nama Surat</label>
                                        <div class="d-flex">
                                            <i class="fas fa-user border text-center"></i>
                                            <input type="text" name="nama_surat" class="form-control @error('nama_surat')
                                            is-invalid
                                    @enderror" placeholder="nama surat" value="{{ old('nama_surat') }}">
                                        </div>
                                        @error('nama_surat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Dikirim Ke</label>
                                        <div class="d-flex">
                                            <i class="fas fa-user border text-center"></i>
                                            <select class="form-control  select2 @error('id_untuk')
                                            is-invalid
                                    @enderror" name="id_untuk">
                                                <option value="" selected>Pilih Tujuan</option>
                                                @foreach ($guru as $gurus )
                                            <option value="{{ $gurus->id }}" @if (old('id_untuk') == $gurus->id) selected @endif > {{ $gurus->nama ." | Jabatan :". $gurus->jabatan  }} </option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @error('id_untuk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <div class="mb-3 mt-3">
                                            <label for="">Masukan surat</label>
                                            <input name="surat"  id="surat" class="form-control @error('surat')
                                            is-invalid
                                    @enderror" type="file" />
                                             @error('surat')
                                                <small class="invalid-feedback">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>

                                    </div>

                            </div>
                            <div style="margin-top: 10px; margin-left:30px;">
                                <button type="submit" class="btn btn-success rounded mr-2"><i
                                        class="fas fa-check-square mr-2" margin-left="10px"></i>Submit</button>
                                </form>
                                <a href="{{ route('admin.surat_masuk.index') }}" type="button"
                                    class="btn btn-danger rounded"><i class="fas fa-window-close mr-2"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  --}}
                {{--  --}}
                <div class="col-sm-12">
                    <div class="">
                        <div class="" style="height: auto;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">

                                        </div>
                                        <div class="embed-responsive embed-responsive-16by9" >
                                            <iframe class="embed-responsive-item"  id="preview-image-before-upload" type="application/pdf" src="https://commercial.bunn.com/img/image-not-available.png" allowfullscreen></iframe>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    {{-- <h3>Preview : <b>{{ ltrim(strstr($surat_masuk->surat_m->path_surat, '.'), '.') }}</b></h3> --}}

                    {{-- <embed id="preview-image-before-upload"  src="https://commercial.bunn.com/img/image-not-available.png" type="application/pdf"
                    style="width:800px; height:600px; border-radius:10px;  box-shadow:    3px 3px 5px 6px #ccc;"      /> --}}
                    {{-- <div class="embed-responsive embed-responsive-16by9" >
                        <iframe class="embed-responsive-item"  id="preview-image-before-upload" type="application/pdf" src="https://commercial.bunn.com/img/image-not-available.png" allowfullscreen></iframe>
                      </div> --}}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
@push('script')
    {{-- <script src="{{ asset('assets/js/main/table.js') }}" ></script> --}}
    <script src="{{ asset('assets/js/pages-admin/surat-masuk-TU.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function (e) {


           $('#surat').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

              $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

           });

        });

        </script>
@endpush
