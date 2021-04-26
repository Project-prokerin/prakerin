@extends('template.master')
@push('link')
<link rel="stylesheet" href="{{asset('template/')}}/node_modules/select2/dist/css/select2.min.css">
<style>
</style>
@endpush
@section('title', 'Prakerin | Data Pembekalan Magang')
@section('judul', 'DATA PEMBEKALAN MAGANG')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-newspaper"></i> DATA PEMBEKALAN MAGANG</div>
@endsection
@section('main')
{{-- tambah --}}
<div class="card" style="width: 50%;">
    <div class="card-header">
        <h4 class="pt-2"><i class="fas fa-align-justify mr-2"></i>Data Pembekalan Magang Siswa</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('pembekalan.post') }}" method="POST" id="form" enctype="multipart/form-data">
            @csrf
            <section id="1">
            {{-- <div class="mb-3"> --}}
            <div class="mb-3">
                            <label>Nama Perusahaan</label>
                            <select name="siswa" id="nama" class="form-control select2">
                            <option value="" >-- Pilih siswa --</option>
                                @foreach ($siswa as $item)
                                <option value="{{$item->id}}" >{{$item->nama_siswa}}</option>
                                @endforeach
                                @if (count($siswa) < 1)
                                    <option disabled>Semua Siswa telah mendapat pembekalan!</option>
                                @endif
                            </select>
                            <div id="invalid_siswa" class="invalid-feedback d-none"></div>
                </div>
            <div>
            <div class="mb-3">
                    <label class="form-label">Test WPT IQ</label>
            </div>
                <div class="mb-3 form-check" style="margin-top: -20px">
                    <input type="checkbox" name="test_wpt_iq" class="form-check-input test_iq"
                    value="sudah">
                    <label class="form-check-label" >Sudah</label>
                    <span class="m-5"></span>
                    <input type="checkbox" name="test_wpt_iq" class="form-check-input test_iq"
                    value="belum">
                    <label class="form-check-label">Belum</label>
                    <li class="d-inline err-test_iq text-danger ml-4"></li>
                </div>

            </div>
            <div>
                <div class="mb-3">
                    <label class="form-label">Test Personality Interview</label>
                </div>
                <div class="mb-3 form-check" style="margin-top: -20px">
                    <input type="checkbox" name="personality_interview" class="form-check-input person"
                    value="sudah">
                    <label class="form-check-label">Sudah</label>
                    <span class="m-5"></span>
                    <input type="checkbox" name="personality_interview" class="form-check-input person"
                    value="belum">
                    <label class="form-check-label">Belum</label>
                    <li class="d-inline err-person text-danger ml-4"></li>
                </div>
            </div>
            <div>

                <div class="mb-3">
                    <label class="form-label">Test Soft Skill</label>
                </div>
                <div class="mb-3 form-check" style="margin-top: -20px">
                    <input type="checkbox" name="soft_skill" class="form-check-input skill" value="sudah">
                    <label class="form-check-label" >Sudah</label>
                    <span class="m-5"></span>
                    <input type="checkbox" name="soft_skill" class="form-check-input skill"  value="belum">
                    <label class="form-check-label">Belum</label>
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
                <input class="form-control" type="text" name="text" id="formFile" value="" disabled>
                <label class="form-label mt-2">Tambah portofolio ( boleh kosong )</label>
                <input class="form-control file " accept="application/pdf" type="file" name="file" id="formFile" value="">
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
        test_iq = $('.test_iq').is(":checked");
        person = $('.person').is(":checked");
        skill = $('.skill').is(":checked");
        if (nama == '' || test_iq == false || person == false || skill == false )  {
            // option
            if (nama == '') {
            $('#nama').addClass('is-invalid');
            $('#invalid_siswa').html('nama siswa tidak boleh kosong').removeClass('d-none');
            }else{
                $('#invalid_siswa').addClass('d-none');
            }
            // checkbx 1
            if (test_iq == false)
            {
                $('.err-test_iq').html('required');
            }else{
                $('.err-test_iq').html('');
            }
            if (person == false)
            {
                $('.err-person').html('required');
            }else{
                $('.err-person').html('');
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
    });

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
            $('#formFile').val("");
            console.log('gagal');
        }
    })

    $('a#kembali').on('click', function (params) {
        $("section#2").hide();
        $("section#1").show()
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
});
</script>
@endpush
