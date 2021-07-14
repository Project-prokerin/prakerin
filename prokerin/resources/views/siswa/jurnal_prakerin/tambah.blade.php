@extends('template.master')
@push('link')
<style>
    /* div.card{
        width: 55%;
    } */
     .box-jurnal{
                margin-top: -10px;
                margin-left: 16px;
                margin-bottom: 20px;
        }.form-control.is-invalid, .was-validated .form-control:invalid {
            background-image: none !important;
            border-color: red;
            padding-right: 0.75em;
        }

        .form-control.is-valid, .was-validated .form-control:valid {
            background-image: none !important;
            border-color:red;
            padding-right: 0.75em;
        }
</style>
@endpush
@section('title', 'Prakerin | jurnal prakerin')
@section('judul', 'JURNAL PRAKERIN')
@section('breadcrump')
<meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"><a href="{{ route('user.jurnal') }}"><i class="far fa-newspaper"></i> JURNAL PRAKERIN</a></div>
        <div class="breadcrumb-item"> TAMBAH</div>
@endsection
@section('main')
<div class="card">
<div class="card-header text-center bold">
    <h4 class="">Tambah Jurnal Prakerin siswa</h4>
</div>
     <form action="/user/jurnal" method="POST" id="form">
@csrf
<div class="row mt-3">
    <div class="col-sm-6">
    <div class="">
        <div class="card-body">
        <h5 class="card-title">Fasilitas Prakerin</h5>
        @if ($errors->has('mess') || $errors->has('bus_antar_jemput') || $errors->has('makan_siang') || $errors->has('intensif'))
        <div class="alert alert-danger">
            <div class="alert-body">
                @error('mess')  <li> {{ $message }} </li> @enderror
                @error('bus_antar_jemput')  <li> {{ $message }} </li> @enderror
                @error('makan_siang')  <li> {{ $message }} </li> @enderror
                @error('intensif')  <li> {{ $message }} </li> @enderror
            </div>
        </div>
        @endif
        <div class="row">
            {{-- mess --}}
            <div class="col-sm-6">
                    <h6 class="card-title">Mess</h6>
                    <div class="row checkbox"  >
                            <div class="form-check form-check-inline box-jurnal">
                                    <input class="form-check-input mess "  {{ (old('mess')=='iya') ? 'checked' : '' }} data_id="mess" type="checkbox" id="" name="mess"  value="iya">
                                    <label class="form-check-label" for="mess">Iya</label>
                                </div>
                                <div class="form-check form-check-inline box-jurnal">
                                    <input class="form-check-input mess" {{ (old('mess')=='tidak') ? 'checked' : '' }} data_id="mess" type="checkbox" id="" name="mess"  value="tidak">
                                    <label class="form-check-label"  for="mess">Tidak</label>
                                </div>
                    </div>
            </div>
            {{-- mess --}}

            {{-- bus antar jemput --}}
            <div class="col-sm-6">
                    <h6 class="card-title">Bus Antar Jemput</h6>
                    <div class="row checkbox">
                            <div class="form-check form-check-inline box-jurnal">
                                    <input class="form-check-input bus_antar_jemput"  {{ (old('bus_antar_jemput')=='iya') ? 'checked' : '' }} type="checkbox" id="" name="bus_antar_jemput" value="iya">
                                    <label class="form-check-label" for="inlineCheckbox1">Iya</label>
                                </div>
                                <div class="form-check form-check-inline box-jurnal">
                                    <input class="form-check-input bus_antar_jemput"  {{ (old('bus_antar_jemput')=='tidak') ? 'checked' : '' }} type="checkbox" id="" name="bus_antar_jemput" value="tidak">
                                    <label class="form-check-label" for="bus_antar_jemput">Tidak</label>
                                </div>
                    </div>
            </div>
            {{-- bus antar jemput --}}
        </div>
        <div class="row">
            {{-- makan siang --}}
            <div class="col-sm-6">
                    <h6 class="card-title">Makan Siang</h6>
                    <div class="row checkbox">
                            <div class="form-check form-check-inline box-jurnal">
                                    <input class="form-check-input makan_siang"  {{ (old('makan_siang')=='iya') ? 'checked' : '' }} type="checkbox" id="" name="makan_siang" value="iya">
                                    <label class="form-check-label" for="makan_siang">Iya</label>
                                </div>
                                <div class="form-check form-check-inline box-jurnal">
                                    <input class="form-check-input makan_siang"  {{ (old('makan_siang')=='tidak') ? 'checked' : '' }} type="checkbox" id="" name="makan_siang" value="tidak">
                                    <label class="form-check-label" for="makan_siang">Tidak</label>
                                </div>
                    </div>
            </div>
            {{-- makan siang --}}

            {{-- intensif --}}
            <div class="col-sm-6">
                    <h6 class="card-title">Intensif</h6>
                    <div class="row checkbox">
                            <div class="form-check form-check-inline box-jurnal">
                                    <input class="form-check-input intensif" {{ (old('intensif')=='iya') ? 'checked' : '' }} type="checkbox"  id="" name="intensif" value="iya">
                                    <label class="form-check-label" for="intensif">Iya</label>
                                </div>
                                <div class="form-check form-check-inline box-jurnal">
                                    <input class="form-check-input intensif" {{ (old('intensif')=='tidak') ? 'checked' : '' }} type="checkbox" id="" name="intensif" value="tidak">
                                    <label class="form-check-label" for="i-2">Tidak</label>
                                </div>
                    </div>
            </div>
            {{-- intensif --}}
        </div>
        <br>

        {{-- textarea --}}
        <h6 class="card-title">Kompetensi Dasar</h6>
        <div class="textarea">
            <textarea class="form-control  @error('kompetisi_dasar') is-invalid @enderror" name="kompetisi_dasar" id="kompetisi_dasar">{{ old('kompetisi_dasar') }}</textarea>
            @error('kompetisi_dasar')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <h6 class="card-title">Topik Pekerjaan</h6>
        <div class="textarea">
            <textarea  class="form-control  @error('topik_pekerjaan') is-invalid @enderror" name="topik_pekerjaan" id="topik_pekerjaan"> {{ old('topik_pekerjaan') }}</textarea>
            @error('topik_pekerjaan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- textarea --}}

        </div>
    </div>
</div>

{{-- tgl-jam --}}
<div class="col-sm-6">
    <div class="card-body">
        <br>
    <div class="">
        <div class="form-group">
            <label><h6>Hari Pelaksanaan</h6></label>
            <div class="input-group in-jurnal">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <i class="fas fa-calendar"></i>
                </div>
            </div>
            <input type="date" class="form-control daterange-cus @error('hari_pelaksanaan') is-invalid @enderror" value="{{ old('hari_pelaksanaan') }}" name="hari_pelaksanaan" id="hari_pelaksanaan">
            @error('hari_pelaksanaan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        </div>
        <div class="form-group">
            <label><h6>Jam Masuk</h6></label>
            <div class="input-group in-jurnal">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <i class="fas fa-clock"></i>
                </div>
            </div>
            <input type="time" class="form-control timepicker @error('jam_masuk') is-invalid @enderror" value="{{ old('jam_masuk') }}" name="jam_masuk" id="jam_masuk">
            @error('jam_masuk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        </div>
        <div class="form-group">
            <label><h6>Jam Istirahat</h6></label>
            <div class="input-group in-jurnal">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <i class="fas fa-clock"></i>
                </div>
            </div>
            <input type="time" class="form-control timepicker @error('jam_istiharat') is-invalid @enderror" value="{{ old('jam_istiharat') }}" name="jam_istiharat" id="jam_istiharat">
            @error('jam_istiharat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        </div>
        <div class="form-group">
            <label><h6>Jam Pulang</h6></label>
            <div class="input-group in-jurnal">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <i class="fas fa-clock"></i>
                </div>
            </div>
            <input type="time" class="form-control timepicker @error('jam_pulang') is-invalid @enderror" value="{{ old('jam_pulang') }}"  name="jam_pulang" id="jam_pulang" >
            @error('jam_pulang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        </div>
    </div>
    </div>
</div>
{{-- tgl-jam --}}




        <a href="{{ route('user.jurnal') }}" class="btn btn-danger ml-5 mb-3 mr-3">Kembali</a>
        <button type="submit" id="submit" class="btn btn-success mb-3">tambah</button>
        </form>
</div>
@endsection
@push('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  $(document).ready(function () {
    // checkbox
    $(".mess").change(function()
        {
            $(".mess").prop('checked',false);
            $(this).prop('checked',true);
        });
    $(".bus_antar_jemput").change(function()
        {
            $(".bus_antar_jemput").prop('checked',false);
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
