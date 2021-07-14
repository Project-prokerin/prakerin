@extends('template.master')
@push('link')
<style>

</style>
@endpush
@section('title','Prakerin | Tamatan Penelusuran')
@section('judul','Tamatan Penelusuran')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> TAMATAN PENELUSURAN</div>
@endsection
@section('main')

<div class="card" style="height: 600px;">
    <div class="card-body">
        <div class="">
            <div class="col-lg-12" style="height: 500px;">
                <div class="">
                    <div class="">
                        <div class="container mt-2">
                            <h5 class="card-title">Tamatan Penelusuran</h5>
                        </div>
                        <hr>
                    </div>

                    <div class="container">
                        <form action="" method="POST">
                                @csrf
                            <div class="row mb-5">
                                {{-- card col 1 --}}
                                <div class="col-6">
                                    <div class="mb-3 col-lg-10">
                                        <label>Nama Siswa Alumni</label>
                                        <select name="" class="form-control   @error('')  is-invalid  @enderror select2">
                                            <option value="" >--Cari Siswa Alumni--</option>
                                            {{-- @foreach ($ as $)
                                            <option value="{{$->id}}"{{(old('') == $->id) ? 'selected' : ''}}>{{$->}}</option>
                                            @endforeach --}}
                                        </select>
                                            {{-- @error('')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror --}}
                                    </div>
                                    <div class="mb-3 col-lg-10">
                                        <label>Status</label>
                                        <select id="status" name="" class="form-control   @error('')  is-invalid  @enderror select2">
                                            <option value="#" >--Cari Status--</option>
                                            <option value="bekerja" >Bekerja</option>
                                            <option value="kuliah" >Kuliah</option>
                                            <option value="wirausaha" >Wirausaha</option>
                                            <option value="bekerja&kuliah" >Bekerja & Kuliah</option>
                                            <option value="wirausaha&kuliah" >Wirausaha & Kuliah</option>
                                            {{-- @foreach ($ as $)
                                            <option value="{{$->id}}"{{(old('') == $->id) ? 'selected' : ''}}>{{$->nama}}</option>
                                            @endforeach --}}
                                        </select>
                                            {{-- @error('')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror --}}
                                    </div>
                                </div>

                                {{-- card col 2 --}}
                                <div class="col-6">
                                    {{-- bekerja --}}
                                        <div class="mb-3 col-lg-10" id="namaperusahaan" hidden>
                                            <label>Nama Perusahaan</label>
                                            <div class="mb-3">
                                                <input type="text" name="" id="" class="form-control @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                                @error('')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 col-lg-10" id="alamatperusahaan" hidden>
                                            <label>Alamat Perusahaan</label>
                                            <div class="mb-3">
                                                <input type="text" name="" id="" class="form-control @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                                @error('')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 col-lg-10" id="tahunkuliah" hidden>
                                            <label>Tahun Masuk Kuliah</label>
                                            <div class="mb-3">
                                                <input type="text" name="" id="" class="form-control @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                                @error('')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    {{-- tutup --}}

                                    {{-- kuliah --}}
                                        <div class="mb-3 col-lg-10" id="namakampus" hidden>
                                            <label>Nama Kampus</label>
                                            <div class="mb-3">
                                                <input type="text" name="" id="" class="form-control @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                                @error('')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 col-lg-10" id="alamatkampus" hidden>
                                            <label>Alamat Kampus</label>
                                            <div class="mb-3">
                                                <input type="text" name="" id="" class="form-control @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                                @error('')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 col-lg-10" id="tahunmasuk" hidden>
                                            <label>Tahun Masuk</label>
                                            <div class="mb-3">
                                                <input type="text" name="" id="" class="form-control @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                                @error('')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    {{-- tutup --}}

                                    {{-- wirausaha --}}
                                        <div class="mb-3 col-lg-10" id="namabrand" hidden>
                                            <label>Nama Brand</label>
                                            <div class="mb-3">
                                                <input type="text" name="" id="" class="form-control @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                                @error('')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 col-lg-10" id="namausaha" hidden>
                                            <label>Nama Usaha</label>
                                            <div class="mb-3">
                                                <input type="text" name="" id="" class="form-control @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                                                @error('')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    {{-- tutup --}}

                                    <div class="row">
                                        <a class="btn btn-danger ml-auto mr-3 text-white mt-3 mb-3" id="kembali">kembali </a>
                                        <button type="submit"   class="submit mr-3 btn btn-success mt-3 mb-3"><i class="fas fa-check"></i> Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type='text/javascript'>
    $(window).load(function(){
    $("#status").change(function() {
                console.log($("#status option:selected").val());
                if ($("#status option:selected").val() == 'bekerja') {
                    $('#namaperusahaan').prop('hidden', false);
                    $('#alamatperusahaan').prop('hidden', false);
                    $('#tahunkuliah').prop('hidden', false);

                    $('#namakampus').prop('hidden', 'true');
                    $('#alamatkampus').prop('hidden', 'true');
                    $('#tahunmasuk').prop('hidden', 'true');

                    $('#namabrand').prop('hidden', 'true');
                    $('#namausaha').prop('hidden', 'true');
                    }
                else if($("#status option:selected").val() == 'kuliah') {
                    $('#namaperusahaan').prop('hidden', 'true');
                    $('#alamatperusahaan').prop('hidden', 'true');
                    $('#tahunkuliah').prop('hidden', 'true');

                    $('#namakampus').prop('hidden', false);
                    $('#alamatkampus').prop('hidden', false);
                    $('#tahunmasuk').prop('hidden', false);

                    $('#namabrand').prop('hidden', 'true');
                    $('#namausaha').prop('hidden', 'true');
                }
                else if($("#status option:selected").val() == 'wirausaha') {
                    $('#namaperusahaan').prop('hidden', 'true');
                    $('#alamatperusahaan').prop('hidden', 'true');
                    $('#tahunkuliah').prop('hidden', 'true');

                    $('#namakampus').prop('hidden', 'true');
                    $('#alamatkampus').prop('hidden', 'true');
                    $('#tahunmasuk').prop('hidden', 'true');

                    $('#namabrand').prop('hidden', false);
                    $('#namausaha').prop('hidden', false);
                }
                else if($("#status option:selected").val() == 'bekerja&kuliah') {
                    $('#namaperusahaan').prop('hidden', false);
                    $('#alamatperusahaan').prop('hidden', false);
                    $('#tahunkuliah').prop('hidden', false);

                    $('#namakampus').prop('hidden', false);
                    $('#alamatkampus').prop('hidden', false);
                    $('#tahunmasuk').prop('hidden', false);

                    $('#namabrand').prop('hidden', 'true');
                    $('#namausaha').prop('hidden', 'true');
                }
                else {
                    $('#namaperusahaan').prop('hidden', 'true');
                    $('#alamatperusahaan').prop('hidden', 'true');
                    $('#tahunkuliah').prop('hidden', 'true');

                    $('#namakampus').prop('hidden', false);
                    $('#alamatkampus').prop('hidden', false);
                    $('#tahunmasuk').prop('hidden', false);

                    $('#namabrand').prop('hidden', false);
                    $('#namausaha').prop('hidden', false);
                }
            });
    });
</script>
<script src="{{ asset('assets/js/pages-admin/.js') }}" ></script>
@endpush
