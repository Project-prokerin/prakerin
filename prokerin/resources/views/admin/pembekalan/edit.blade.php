@extends('template.master')
@push('link')
<link rel="stylesheet" href="{{asset('template/')}}/node_modules/select2/dist/css/select2.min.css">
@endpush
@section('title', 'Prakerin | Data Pembekalan Magang')
@section('judul', 'DATA PEMBEKALAN MAGANG')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item">  <i class="fas fa-newspaper"></i> DATA PEMBEKALAN MAGANG</div>
@endsection
@section('main')
<div class="card" style="width: 50%;">
    <div class="card-header">
        <h4 class="pt-2"><i class="fas fa-align-justify mr-2"></i>Data Pembekalan Magang Siswa</h4>
    </div>
    <div class="card-body">
        <form action="/admin/pembekalan/update/{{ $pembekalan->id }}" method="POST" id="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <section id="1">
            {{-- <div class="mb-3"> --}}
            <div class="mb-3">
                <input type="text" name="id" value="{{ $pembekalan->id }}" hidden>
                            <label>Nama Perusahaan</label>
                            <select name="siswa" id="nama" class="form-control select2">
                            <option value="" >-- Pilih siswa --</option>
                                @foreach ($Siswa as $item)
                                <option value="{{$item->id}}" @if(old('siswa') == $item->id or $pembekalan->id_siswa == $item->id) selected @endif>{{$item->nama_siswa}}</option>
                            @endforeach
                            @if (count($Siswa) < 1)
                                    <option disabled>Semua Siswa telah mendapat pembekalan!</option>
                                @endif
                            </select>
                            <div id="invalid_siswa" class="invalid-feedback d-none"></div>
                </div>
            <div>
            <div class="mb-3">
                    <label class="form-label">Kegiatan Psikotes</label>
            </div>
                <!-- <div class="mb-3 form-check" style="margin-top: -20px">
                    <input type="checkbox" name="psikotes" class="form-check-input psikotes"
                    @if(old('psikotes') == 'sudah' or $pembekalan->psikotes == 'sudah') checked @endif value="sudah">
                    <label class="form-check-label" >Sudah</label>
                    <span class="m-5"></span>
                    <input type="checkbox" name="psikotes" class="form-check-input psikotes"
                    @if(old('psikotes') == 'belum' or $pembekalan->psikotes == 'belum') checked @endif value="belum">
                    <label class="form-check-label">Belum</label>
                    <li class="d-inline validated text-danger err-psikotes ml-4"></li>
                </div> -->
                <div class="row" style="margin-top: -20px; margin-bottom: 30px;">
                    <div class="form-check mr-5 ml-3">
                        <input class="form-check-input psikotes" type="radio" name="psikotes" id="" value="sudah"
                        @if(old('psikotes') == 'sudah' or $pembekalan->psikotes == 'sudah') checked @endif value="sudah">
                        <label class="form-check-label" for="">
                            SUDAH
                        </label>
                    </div>
                    <div class="form-check ml-3">
                        <input class="form-check-input psikotes" type="radio" name="psikotes" id="" value="belum"
                        @if(old('psikotes') == 'belum' or $pembekalan->psikotes == 'belum') checked @endif value="belum">
                        <label class="form-check-label" for="">
                            BELUM
                        </label>
                    </div>
                    <li class="d-inline err-psikotes text-danger ml-4"></li>
                </div>
            </div>
            <div>
                <div class="mb-3">
                    <label class="form-label">Tahap Soft Skill</label>
                </div>
                <!-- <div class="mb-3 form-check" style="margin-top: -20px">
                    <input type="checkbox" name="soft_skill" class="form-check-input skill" value="sudah"
                    @if(old('soft_skill') == 'sudah' or $pembekalan->soft_skill == 'sudah') checked @endif>
                    <label class="form-check-label" >Sudah</label>
                    <span class="m-5"></span>
                    <input type="checkbox" name="soft_skill" class="form-check-input skill"  value="belum"
                    @if(old('soft_skill') == 'belum' or $pembekalan->soft_skill == 'belum') checked @endif>
                    <label class="form-check-label">Belum</label>
                    <li class="d-inline validated er-skill text-danger ml-4"></li>
                </div> -->
                <div class="row" style="margin-top: -20px; margin-bottom: 30px;">
                    <div class="form-check mr-5 ml-3">
                        <input class="form-check-input skill" type="radio" name="soft_skill" id="" value="sudah"
                        @if(old('soft_skill') == 'sudah' or $pembekalan->soft_skill == 'sudah') checked @endif>
                        <label class="form-check-label" for="">
                            SUDAH
                        </label>
                    </div>
                    <div class="form-check ml-3">
                        <input class="form-check-input skill" type="radio" name="soft_skill" id="" value="belum"
                        @if(old('soft_skill') == 'belum' or $pembekalan->soft_skill == 'belum') checked @endif>
                        <label class="form-check-label" for="">
                            BELUM
                        </label>
                    </div>
                    <li class="d-inline err-skill text-danger ml-4"></li>
                </div>
            </div>
            <div class="row">
                <a href="{{ route('pembekalan.index') }}" class="btn btn-danger ml-auto mr-2 mt-3 mb-3 text-white">kembali </a>
                <a class="btn btn-primary text-white mr-4 mt-3 mb-3" id="selanjutnya">Selanjutnya </a>
            </div>

            </section>
            <section id="2" >
            <div class="mb-3">
                <label class="form-label">Portfolio</label>
                <input class="form-control" type="text" name="text" id="formFile" value="{{ links($pembekalan->file_portofolio) }}" disabled>
                <label class="form-label mt-2">Edit portofolio ( boleh kosong )</label>
                <input class="form-control file " accept="application/pdf" type="file" name="file" id="formFile" value="{{ $pembekalan->file_poprtofolio }}">
                <div class="invalid-feedback d-none" id="invalid_file"></div>
            </div>
            <div class="row">
                <a class="btn btn-danger ml-auto mr-3 text-white mt-3 mb-3" id="kembali">kembali </a>
                <button type="submit"   class="submit mr-3 btn btn-success mt-3 mb-3"><i class="fas fa-check"></i> Submit</button>
            </div>
        </section>
        </form>
    </div>
</div>
{{-- tambah --}}
@endsection
@push('script')
    <script src="{{asset('template/')}}/node_modules/select2/dist/js/select2.full.min.js"></script>
<script>
    $(document).ready(function () {
    $("section#1").show();
    $("section#2").hide();

    $('a#selanjutnya').on('click', function (params) {
        var nama = $('#nama').val();
        psikotes = $('.psikotes').is(":checked");
        skill = $('.skill').is(":checked");
        if (nama == '' || psikotes == false  || skill == false )  {
            // option
            if (nama == '') {
            $('#nama').addClass('is-invalid');
            $('#invalid_siswa').html('nama siswa tidak boleh kosong').removeClass('d-none');
            }else{
                $('#invalid_siswa').addClass('d-none');
            }
            // checkbx 1
            if (psikotes == false)
            {
                $('.err-psikotes').html('required');
            }else{
                $('.err-psikotes').html('');
            }
            if (skill == false)
            {
                $('.err-skill').html('required');
            }else{
                $('.err-skill').html('');
            }
        }
        else{
            $("section#2").show();
            $("section#1").hide()
        }
    })

    $('.file').on('change', function () {
        file = $('.file');
        item  = file[0].files[0].name;
        type = file[0].files[0].type;
        if (type === 'application/pdf') {
            console.log(type);
            $('#formFile').val(item);
            $('#invalid_file').addClass('d-none');
            $('.file').removeClass('is-invalid');
        }else{
            $('.file').addClass('is-invalid');
            $('#invalid_file').html('File harus berformat pdf').removeClass('d-none');
            $('#formFile').val("{{ links($pembekalan->file_portofolio) }}");
            console.log('gagal');
        }
    })

    $('a#kembali').on('click', function (params) {
        $("section#2").hide();
        $("section#1").show()
    })

    // checkbox
    $(".test_iq").change(function()
        {
            $(".test_iq").prop('checked',false);
            $(this).prop('checked',true);
        });
    $(".person").change(function()
        {
            $(".person").prop('checked',false);
            $(this).prop('checked',true);
        });
    $(".makan_siang").change(function()
        {
            $(".makan_siang").prop('checked',false);
            $(this).prop('checked',true);
        });
    $(".intensif").change(function()
        {
            $(".intensif").prop('checked',false);
            $(this).prop('checked',true);
        });
    })
</script>
@endpush
