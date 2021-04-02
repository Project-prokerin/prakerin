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
        <h4 class="pt-2"><i class="fas fa-align-justify mr-2"></i>Tambah Data Pembekalan Magang Siswa</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('pembekalan.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div class="mb-3"> --}}
            <div class="mb-3">
                            <label>Nama Perusahaan</label>
                            <select name="siswa" class="form-control select2  @error('siswa')  is-invalid  @enderror ">
                            <option value="" >-- Pilih siswa --</option>
                                @foreach ($siswa as $item)
                                <option value="{{$item->id}}" @if(old('siswa') == $item->id) selected @endif>{{$item->nama_siswa}}</option>
                            @endforeach
                            </select>
                            @error('siswa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                </div>
            <div>
            <div class="mb-3">
                    <label class="form-label">Test WPT IQ</label>
            </div>
                <div class="mb-3 form-check" style="margin-top: -20px">
                    <input type="checkbox" name="test_wpt_iq" class="form-check-input test_iq" @if(old('test_wpt_iq') == 'sudah') checked @endif value="sudah">
                    <label class="form-check-label" >Sudah</label>
                    <span class="m-5"></span>
                    <input type="checkbox" name="test_wpt_iq" class="form-check-input test_iq" @if(old('test_wpt_iq') == 'belum') checked @endif value="belum">
                    <label class="form-check-label">Belum</label>
                    @error('test_wpt_iq')
                    <li class="d-inline text-danger ml-4">{{ $message }}</li>
                    @enderror
                </div>

            </div>
            <div>
                <div class="mb-3">
                    <label class="form-label">Test Personality Interview</label>
                </div>
                <div class="mb-3 form-check" style="margin-top: -20px">
                    <input type="checkbox" name="personality_interview" class="form-check-input person" @if(old('personality_interview') == 'sudah') checked @endif value="sudah">
                    <label class="form-check-label">Sudah</label>
                    <span class="m-5"></span>
                    <input type="checkbox" name="personality_interview" class="form-check-input person" @if(old('personality_interview') == 'belum') checked @endif value="belum">
                    <label class="form-check-label">Belum</label>
                    @error('personality_interview')
                    <li class="d-inline text-danger ml-4">{{ $message }}</li>
                    @enderror
                </div>
            </div>
            <div>
                <div class="mb-3">
                    <label class="form-label">Test Soft Skill</label>
                </div>
                <div class="mb-3 form-check" style="margin-top: -20px">
                    <input type="checkbox" name="soft_skill" class="form-check-input skill" value="sudah" @if(old('soft_skill') == 'sudah') checked @endif>
                    <label class="form-check-label" >Sudah</label>
                    <span class="m-5"></span>
                    <input type="checkbox" name="soft_skill" class="form-check-input skill"  value="belum" @if(old('soft_skill') == 'belum') checked @endif>
                    <label class="form-check-label">Belum</label>
                    @error('soft_skill')
                    <li class="d-inline text-danger ml-4">{{ $message }}</li>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Portfolio</label>
                <input type="file" name="file" accept="application/pdf" class="form-control @error('file') is-invalid @enderror form-control-sm">
                @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{route('pembekalan.index')}}" type="submit" class="btn btn-danger mt-2"><i class="fas fa-times"></i> Batal</a>
            <button type="submit"  class="btn btn-success mt-2"><i class="fas fa-check"></i> Submit</button>
        </form>
    </div>
</div>
{{-- tambah --}}
@endsection
@push('script')
    <script src="{{asset('template/')}}/node_modules/select2/dist/js/select2.full.min.js"></script>
<script>
    $(document).ready(function () {
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
