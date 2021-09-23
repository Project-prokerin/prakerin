
@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{asset('template/')}}/node_modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet"
        href="{{ asset('template/') }}/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">

    <style>
        .card-body .input i {
            width: 50px;
            font-size: medium;
            padding-top: 11px;
        }

        .invalid-feedback {
            display: block;
        }.kanan{
            float: right;
            margin-top: -457px;
        }

    </style>
@endpush
@section('title', 'Prakerin | Surat Penugasan')
@section('judul', 'SURAT PENUGASAN')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i> SURAT PENUGASAN</div>
@endsection
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Surat Penugasan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="">
                                <div class="" style="height: auto;">
                                    <div class="card-body">
                                        <form action="{{ route('admin.surat_keluar.post') }}" method="POST" class="input">
                                            @csrf
                                            <div class="mb-3">
                                                <label dariclass="form-label">Nama Surat</label>
                                                <div class="d-flex">
                                                    <i class="far fa-envelope border text-center"></i>
                                                    <input type="text" name="nama_surat" class="form-control
                                            @error('nama_surat') is-invalid @enderror" placeholder=" Surat xxx" value="">
                                                </div>
                                                @error('nama_surat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama </label>
                                                <div class="d-flex">
                                                    <i class="far fa-envelope border text-center"></i>

                                                    <select
                                                        class="form-control select2 @error('id_guru')  is-invalid  @enderror"
                                                        name="id_guru" id="">
                                                        <option value="">--Cari Guru--</option>
                                                        @foreach ($guru as $key => $guruu)
                                                            <option value="{{ $guruu->id }}"
                                                                {{ old('id_guru') == $guruu ? 'selected' : '' }}>
                                                                {{ $guruu->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('id_guru')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label class="form-label">NIK </label>
                                                <div class="d-flex">
                                                    <i class="fas fa-user border text-center"></i>
                                                    <input type="text" name="nik" class="form-control @error('nik')
                                                            is-invalid
                                            @enderror" placeholder="23423423" value="">
                                                </div>
                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Untuk</label>
                                                <div class="d-flex">
                                                    <i class="fas fa-users border text-center"></i>
                                                    <select class="form-control @error('id_untuk') is-invalid @enderror"
                                                        name="id_untuk">
                                                        <option value="" selected>Pilih Jabatan</option>
                                                        <option value="17"
                                                            {{ '17' == old('id_untuk', $surat->id_untuk ?? '') ? 'selected' : '' }}>
                                                            Hubin</option>
                                                        <option value="2"
                                                            {{ '2' == old('id_untuk', $surat->id_untuk ?? '') ? 'selected' : '' }}>
                                                            Kaprog</option>
                                                        <option value="3"
                                                            {{ '3' == old('id_untuk', $surat->id_untuk ?? '') ? 'selected' : '' }}>
                                                            BKK</option>
                                                        <option value="12"
                                                            {{ '12 ' == old('id_untuk', $surat->id_untuk ?? '') ? 'selected' : '' }}>
                                                            Tu</option>
                                                    </select>
                                                </div>
                                                @error('id_untuk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div> --}}
                                            <div class="mb-3">
                                                <label for="">Alamat</label>
                                                <textarea id="basic-example" name="alamat" class=" form-control-sm
                                                @error('alamat')
                                                        is-invalid
                                                        @enderror" style="height: 100px;" placeholder="Jl.xxxxx"></textarea>
                                                    </div>
                                                    @error('alamat')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                            {{-- <div class="mb-3" style="margin-left: 0px">
                                                <label for="">Alamat</label>
                                                <textarea id="basic-example" name="alamat" class=" form-control-sm
                                                @error('alamat')
                                                        is-invalid
                                                        @enderror" style="height: 100px;" placeholder="Jl.xxxxx"></textarea>
                                                    </div>
                                                    @error('alamat')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                            </div> --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  --}}
                        {{--  --}}
                        <div class="kanan col-sm-6">
                            <div class="">
                                <div class="" style="height: auto;">
                                    <div class="card-body">
                                        <div class="input">
                                            <div class="mb-3">
                                                <label class="form-label">Tempat</label>
                                                <div class="d-flex">
                                                    <i class="fas fa-info-circle border text-center"></i>
                                                    <input type="text" class="form-control @error('tempat')
                                                                    is-invalid
                                                @enderror" name="tempat" placeholder="tempat" value="">
                                                </div>
                                                @error('tempat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label class="form-label">Hari </label>
                                                <div class="d-flex">
                                                    <i class="far fa-calendar-times border text-center"></i>
                                                    <input type="text" class="form-control @error('hari')
                                                            is-invalid
                                            @enderror" name="hari" placeholder=" Senin s.d. Sabtu" value="">
                                                </div>
                                                @error('hari')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div> --}}
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal </label>
                                                <div class="d-flex">
                                                    <i class="far fa-calendar-times border text-center"></i>
                                                    <input type="text" class="form-control @error('tanggal')
                                                                    is-invalid
                                                @enderror" name="tanggal" placeholder="xxxx-xx-xx s.d. xxxx-xx-xx "
                                                        value="">
                                                </div>
                                                @error('tanggal')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pukul </label>
                                                <div class="d-flex">
                                                    <i class="far fa-calendar-times border text-center"></i>
                                                    <input type="text" class="form-control timepicker @error('pukul')
                                                                    is-invalid
                                                @enderror" name="pukul" placeholder=" 00.00 WIB s.d Selesai" value="">
                                                </div>
                                                @error('pukul')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div style="margin-top: 10px;margin-left:20px;">
                                        <button type="submit" class="btn btn-success rounded mr-2"><i
                                                class="fas fa-check-square mr-2"></i>Submit</button>
                                        </form>
                                        <a href="{{ route('admin.surat_keluar.index') }}" type="button"
                                            class="btn btn-danger rounded"><i
                                                class="fas fa-window-close mr-2"></i>Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
    @push('script')
        <script src="{{asset('template/')}}/node_modules/select2/dist/js/select2.full.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script src="{{ asset('template/') }}/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.8.1/tinymce.min.js" integrity="sha512-DzR2RH5M2HEOaMkPDKIYIrSXhKtKncXM0rtO3Dlu7p9qUY1T8+lrTPPw+efglohND+HNb9PJJmxlqy/5l2bz5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script type="text/javascript">
            tinymce.init({
          selector: 'textarea#basic-example',
          height: 200,
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

        <script type="text/javascript">
            $(function() {

                $('input[name="tanggal"]').daterangepicker({
                    autoUpdateInput: false,
                    locale: {
                        cancelLabel: 'Clear'
                    }
                });

                $('input[name="tanggal"]').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('YYYY-MM-DD')  +  '  s.d.  '  +  picker.endDate.format(
                        'YYYY-MM-DD'));
                });

                $('input[name="tanggal"]').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                });

            });

        </script>
    @endpush
