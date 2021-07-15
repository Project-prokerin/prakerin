@extends('template.master')
@push('link')
<style>

</style>
@endpush
@section('title','Prakerin | Tambah Tamatan Penelusuran')
@section('judul','Tambah Data Tamatan Penelusuran')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> TAMATAN PENELUSURAN</div>
@endsection
@section('main')

<div class="card">
    <div class="card-header mt-2">
        <h4 class="pt-2"><i class="fas fa-align-justify mr-2"></i>Tambah Data Tamatan Penelusuran</h4>
    </div>
    <div class="card-body">
        <div class="col-lg-12">
            <form action="{{ route('penelusuran_tamantan.post') }}" method="POST" id="form">
                @csrf
                <div class="row mb-5">
                    {{-- card col 1 --}}
                    <div class="col-6">
                        <div class="mb-3 col-lg-10">
                            <label>Nama Siswa Alumni</label>
                            <select name="id_alumni"
                                class="form-control   @error('id_alumni')  is-invalid  @enderror select2"
                                id="id_alumni">
                                <option value="">--Cari Siswa Alumni--</option>
                                {{-- <option value="siswa1">siswa1</option> --}}
                                @foreach ($alumni as $alum)
                                <option value="{{$alum->id}}" {{(old('id_alumni') == $alum->id) ? 'selected' : ''}}>
                                    {{$alum->nama}}
                                </option>
                                @endforeach
                            </select>
                            <div id="invalid_siswa" class="invalid-feedback d-none"></div>
                        </div>
                        <div class="mb-3 col-lg-10">
                            <label>Kelas</label>
                            <input type="text" name="kelas" class="form-control input_KJ kelas" disabled>
                        </div>
                        <div class="mb-3 col-lg-10">
                            <label>Jurusan</label>
                            <input type="text" name="jurusan" class="form-control input_KJ jurusan" disabled>
                        </div>
                        <div class="mb-3 col-lg-10">
                            <label>Tahun lulus</label>
                            <input type="text" name="tahun_lulus" class="form-control input_KJ tahun_lulus" disabled>
                        </div>
                        <div class="mb-3 col-lg-10">
                            <label>Status</label>
                            <select id="status" name="status"
                                class="form-control   @error('status')  is-invalid  @enderror select2">
                                <option value="">--Cari Status--</option>
                                <option value="bekerja">Bekerja</option>
                                <option value="kuliah">Kuliah</option>
                                <option value="Wirausaha">Wirausaha</option>
                                <option value="Bekerja dan Kuliah">Bekerja & Kuliah</option>
                                <option value="Wirausaha dan Kuliah">Wirausaha & Kuliah</option>
                            </select>
                            <div id="invalid_status" class="invalid-feedback d-none"></div>
                        </div>
                    </div>

                    {{-- card col 2 --}}
                    <div class="col-6">
                        {{-- bekerja --}}
                        <div class="mb-3 col-lg-10" id="namaperusahaan" hidden>
                            <label>Nama Perusahaan</label>
                            <div class="mb-3">
                                <input type="text" name="nama_perusahaan" id="valid_namaperusahaan"
                                    class="form-control @error('valid_namaperusahaan')  is-invalid  @enderror form-control"
                                    value="{{ old('nama_perusahaan') }}">
                                <div id="invalid_namaperusahaan" class="invalid-feedback d-none"></div>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-10" id="alamatperusahaan" hidden>
                            <label>Alamat Perusahaan</label>
                            <div class="mb-3">
                                <input type="text" name="alamat_perusahaan" id="valid_alamatperusahaan"
                                    class="form-control @error('valid_alamatperusahaan')  is-invalid  @enderror form-control"
                                    value="{{ old('alamat_perusahaan') }}">
                                <div id="invalid_alamatperusahaan" class="invalid-feedback d-none"></div>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-10" id="tahunkuliah" hidden>
                            <label>Tahun Masuk Kuliah</label>
                            <div class="mb-3">
                                <input type="text" name="tahun_kuliah" id="valid_tahunkuliah"
                                    class="form-control @error('valid_tahunkuliah')  is-invalid  @enderror form-control"
                                    value="{{ old('tahun_kuliah') }}">
                                <div id="invalid_tahunkuliah" class="invalid-feedback d-none"></div>
                            </div>
                        </div>
                        {{-- tutup --}}

                        {{-- kuliah --}}
                        <div class="mb-3 col-lg-10" id="namakampus" hidden>
                            <label>Nama Kampus</label>
                            <div class="mb-3">
                                <input type="text" name="nama_kampus" id="valid_namakampus"
                                    class="form-control @error('')  is-invalid  @enderror form-control"
                                    value="{{ old('nama_kampus') }}">
                                <div id="invalid_namakampus" class="invalid-feedback d-none"></div>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-10" id="alamatkampus" hidden>
                            <label>Alamat Kampus</label>
                            <div class="mb-3">
                                <input type="text" name="alamat_kampus" id="valid_alamatkampus"
                                    class="form-control @error('')  is-invalid  @enderror form-control"
                                    value="{{ old('alamat_kampus') }}">
                                <div id="invalid_alamatkampus" class="invalid-feedback d-none"></div>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-10" id="tahunmasuk" hidden>
                            <label>Tahun Masuk</label>
                            <div class="mb-3">
                                <input type="text" name="tahun_masuk_kuliah" id="valid_tahunmasuk"
                                    class="form-control @error('')  is-invalid  @enderror form-control"
                                    value="{{ old('tahun_masuk') }}">
                                <div id="invalid_tahunmasuk" class="invalid-feedback d-none"></div>
                            </div>
                        </div>
                        {{-- tutup --}}

                        {{-- wirausaha --}}
                        {{-- <div class="mb-3 col-lg-10" id="namabrand" hidden>
                            <label>Nama Brand</label>
                            <div class="mb-3">
                                <input type="text" name="nama_brand" id="valid_namabrand"
                                    class="form-control @error('')  is-invalid  @enderror form-control"
                                    value="{{ old('nama_brand') }}">
                        <div id="invalid_namabrand" class="invalid-feedback d-none"></div>
                    </div>
                </div> --}}
                <div class="mb-3 col-lg-10" id="namausaha" hidden>
                    <label>Nama Usaha</label>
                    <div class="mb-3">
                        <input type="text" name="nama_usaha" id="valid_namausaha"
                            class="form-control @error('')  is-invalid  @enderror form-control"
                            value="{{ old('nama_usaha') }}">
                        <div id="invalid_namausaha" class="invalid-feedback d-none"></div>
                    </div>
                </div>
                {{-- tutup --}}

                <div class="row">
                    <a class="btn btn-danger ml-auto mr-3 text-white mt-3 mb-3" id="kembali">kembali
                    </a>
                    <button type="submit" id="cek_submit" class="text-white mr-3 btn btn-success mt-3 mb-3">
                        <i class="fas fa-check"></i> Submit
                    </button>
                </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>

@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type='text/javascript'>
    $(document).ready(function () {
        $('#id_alumni').on('change', function () {
            let id = $(this).val();
            $('.input_KJ').empty();
            $('.input_KJ').val('Mencari...').show('slow');
            $.ajax({
                type: 'GET',
                url: '/admin/fetch/alumni/' + id,
                success: function (response) {
                    $('.kelas').val(response.alumni.kelas);
                    $('.jurusan').val(response.alumni.jurusan);
                    $('.tahun_lulus').val(response.alumni.tahun_lulus);
                }
            });
        });

        $("#status").change(function () {
            // console.log($("#status option:selected").val());
            if ($("#status option:selected").val() == 'bekerja') {
                $('#namaperusahaan').prop('hidden', false);
                $('#alamatperusahaan').prop('hidden', false);
                $('#tahunkuliah').prop('hidden', false);

                $('#namakampus').prop('hidden', 'true');
                $('#alamatkampus').prop('hidden', 'true');
                $('#tahunmasuk').prop('hidden', 'true');

                $('#namabrand').prop('hidden', 'true');
                $('#namausaha').prop('hidden', 'true');

                // remove form
                $('#invalid_namaperusahaan').addClass('d-none').val('');
                $('#valid_namaperusahaan').removeClass('is-invalid').val('');
                $('#invalid_alamatperusahaan').addClass('d-none').val('');
                $('#valid_alamatperusahaan').removeClass('is-invalid').val('');
                $('#invalid_tahunkuliah').addClass('d-none').val('');
                $('#valid_tahunkuliah').removeClass('is-invalid').val('');
            } else if ($("#status option:selected").val() == 'kuliah') {
                $('#namaperusahaan').prop('hidden', 'true');
                $('#alamatperusahaan').prop('hidden', 'true');
                $('#tahunkuliah').prop('hidden', 'true');

                $('#namakampus').prop('hidden', false);
                $('#alamatkampus').prop('hidden', false);
                $('#tahunmasuk').prop('hidden', false);

                $('#namabrand').prop('hidden', 'true');
                $('#namausaha').prop('hidden', 'true');

                $('#invalid_namakampus').addClass('d-none').val('');
                $('#valid_namakampus').removeClass('is-invalid').val('');
                $('#invalid_alamatkampus').addClass('d-none').val('');
                $('#valid_alamatkampus').removeClass('is-invalid').val('');
                $('#invalid_tahunmasuk').addClass('d-none').val('');
                $('#valid_tahunmasuk').removeClass('is-invalid').val('');
            } else if ($("#status option:selected").val() == 'Wirausaha') {
                $('#namaperusahaan').prop('hidden', 'true');
                $('#alamatperusahaan').prop('hidden', 'true');
                $('#tahunkuliah').prop('hidden', 'true');

                $('#namakampus').prop('hidden', 'true');
                $('#alamatkampus').prop('hidden', 'true');
                $('#tahunmasuk').prop('hidden', 'true');

                $('#namabrand').prop('hidden', false);
                $('#namausaha').prop('hidden', false);

                $('#invalid_namausaha').addClass('d-none').val('');
                $('#valid_namausaha').removeClass('is-invalid').val('');
            } else if ($("#status option:selected").val() == 'Bekerja dan Kuliah') {
                $('#namaperusahaan').prop('hidden', false);
                $('#alamatperusahaan').prop('hidden', false);
                $('#tahunkuliah').prop('hidden', false);

                $('#namakampus').prop('hidden', false);
                $('#alamatkampus').prop('hidden', false);
                $('#tahunmasuk').prop('hidden', false);

                $('#namabrand').prop('hidden', 'true');
                $('#namausaha').prop('hidden', 'true');

                $('#invalid_namaperusahaan').addClass('d-none').val('');
                $('#valid_namaperusahaan').removeClass('is-invalid').val('');
                $('#invalid_alamatperusahaan').addClass('d-none').val('');
                $('#valid_alamatperusahaan').removeClass('is-invalid').val('');
                $('#invalid_tahunkuliah').addClass('d-none').val('');
                $('#valid_tahunkuliah').removeClass('is-invalid').val('');
                $('#invalid_namakampus').addClass('d-none').val('');
                $('#valid_namakampus').removeClass('is-invalid').val('');
                $('#invalid_alamatkampus').addClass('d-none').val('');
                $('#valid_alamatkampus').removeClass('is-invalid').val('');
                $('#invalid_tahunmasuk').addClass('d-none').val('');
                $('#valid_tahunmasuk').removeClass('is-invalid').val('');
            } else if ($("#status option:selected").val() == 'Wirausaha dan Kuliah') {
                $('#namaperusahaan').prop('hidden', 'true');
                $('#alamatperusahaan').prop('hidden', 'true');
                $('#tahunkuliah').prop('hidden', 'true');

                $('#namakampus').prop('hidden', false);
                $('#alamatkampus').prop('hidden', false);
                $('#tahunmasuk').prop('hidden', false);

                $('#namabrand').prop('hidden', false);
                $('#namausaha').prop('hidden', false);

                $('#invalid_namakampus').addClass('d-none').val('');
                $('#valid_namakampus').removeClass('is-invalid').val('');
                $('#invalid_alamatkampus').addClass('d-none').val('');
                $('#valid_alamatkampus').removeClass('is-invalid').val('');
                $('#invalid_tahunmasuk').addClass('d-none').val('');
                $('#valid_tahunmasuk').removeClass('is-invalid').val('');
                $('#invalid_namausaha').addClass('d-none').val('');
                $('#valid_namausaha').removeClass('is-invalid').val('');
            } else if ($("#status option:selected").val() == '') {
                $('#namaperusahaan').prop('hidden', 'true');
                $('#alamatperusahaan').prop('hidden', 'true');
                $('#tahunkuliah').prop('hidden', 'true');

                $('#namakampus').prop('hidden', 'true');
                $('#alamatkampus').prop('hidden', 'true');
                $('#tahunmasuk').prop('hidden', 'true');

                $('#namabrand').prop('hidden', 'true');
                $('#namausaha').prop('hidden', 'true');

                $('#invalid_namaperusahaan').addClass('d-none').val('');
                $('#valid_namaperusahaan').removeClass('is-invalid').val('');
                $('#invalid_alamatperusahaan').addClass('d-none').val('');
                $('#valid_alamatperusahaan').removeClass('is-invalid').val('');
                $('#invalid_tahunkuliah').addClass('d-none').val('');
                $('#valid_tahunkuliah').removeClass('is-invalid').val('');
                $('#invalid_namakampus').addClass('d-none').val('');
                $('#valid_namakampus').removeClass('is-invalid').val('');
                $('#invalid_alamatkampus').addClass('d-none').val('');
                $('#valid_alamatkampus').removeClass('is-invalid').val('');
                $('#invalid_tahunmasuk').addClass('d-none').val('');
                $('#valid_tahunmasuk').removeClass('is-invalid').val('');
                $('#invalid_namausaha').addClass('d-none').val('');
                $('#valid_namausaha').removeClass('is-invalid').val('');
            }
        });

        form = $("#status").val();
        console.log(form);
        $('#cek_submit').on('click', function (e) {
            e.preventDefault();

            var status = $('#status').val();
            console.log(validation_form(status));
            if(validation_form(status)){
                $('#form').submit();

            }
        });


        function validation_form(status = null) {
            var nama = $('#id_alumni').val();
            var namaperusahaan = $('#valid_namaperusahaan').val();
            var alamatperusahaan = $('#valid_alamatperusahaan').val();
            var tahunkuliah = $('#valid_tahunkuliah').val();

            var namakampus = $('#valid_namakampus').val();
            var alamatkampus = $('#valid_alamatkampus').val();
            var tahunmasuk = $('#valid_tahunmasuk').val();

            var namabrand = $('#valid_namabrand').val();
            var namausaha = $('#valid_namausaha').val();

            if (nama == '') {
                    $('#id_alumni').addClass('is-invalid');
                    $('#invalid_siswa').html('nama siswa alumni tidak boleh kosong').removeClass('d-none');
            } else {
                    $('#invalid_siswa').addClass('d-none');
                    $('#id_alumni').removeClass('is-invalid');
            }


            if (status == '') {
                    $('#status').addClass('is-invalid');
                    $('#invalid_status').html('status siswa alumni tidak boleh kosong').removeClass('d-none');
            } else {
                    $('#invalid_status').addClass('d-none');
                    $('#status').removeClass('is-invalid');
            }
            switch (status) {
                case 'bekerja':
                    if (namaperusahaan == '') {
                        $('#valid_namaperusahaan').addClass('is-invalid');
                        $('#invalid_namaperusahaan').html('nama perusahaan tidak boleh kosong').removeClass(
                            'd-none');
                    } else {
                        $('#invalid_namaperusahaan').addClass('d-none');
                        $('#valid_namaperusahaan').removeClass('is-invalid');
                    }
                    if (alamatperusahaan == '') {
                        $('#valid_alamatperusahaan').addClass('is-invalid');
                        $('#invalid_alamatperusahaan').html('alamat perusahaan tidak boleh kosong').removeClass(
                            'd-none');
                    } else {
                        $('#invalid_alamatperusahaan').addClass('d-none');
                        $('#valid_alamatperusahaan').removeClass('is-invalid');
                    }
                    if (tahunkuliah == '') {
                        $('#valid_tahunkuliah').addClass('is-invalid');
                        $('#invalid_tahunkuliah').html('tahun kuliah tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_tahunkuliah').addClass('d-none');
                        $('#valid_tahunkuliah').removeClass('is-invalid');
                    }

                    if (namaperusahaan && alamatperusahaan && tahunkuliah && nama && status ) {
                        return 'submit';
                    }
                    break;
                case 'kuliah':
                    if (namakampus == '') {
                        $('#valid_namakampus').addClass('is-invalid');
                        $('#invalid_namakampus').html('nama kampus tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_namakampus').addClass('d-none');
                        $('#valid_namakampus').removeClass('is-invalid');
                    }
                    if (alamatkampus == '') {
                        $('#valid_alamatkampus').addClass('is-invalid');
                        $('#invalid_alamatkampus').html('alamat kampus tidak boleh kosong').removeClass(
                            'd-none');
                    } else {
                        $('#invalid_alamatkampus').addClass('d-none');
                        $('#valid_alamatkampus').removeClass('is-invalid');
                    }
                    if (tahunmasuk == '') {
                        $('#valid_tahunmasuk').addClass('is-invalid');
                        $('#invalid_tahunmasuk').html('tahun masuk tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_tahunmasuk').addClass('d-none');
                        $('#valid_tahunmasuk').removeClass('is-invalid');
                    }
                    if (namakampus && alamatkampus && tahunmasuk && nama && status ) {
                        return 'submit';
                    }
                    break;
                case 'Wirausaha':
                    if (namausaha == '') {
                        $('#valid_namausaha').addClass('is-invalid');
                        $('#invalid_namausaha').html('nama usaha tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_namausaha').addClass('d-none');
                        $('#valid_namausaha').removeClass('is-invalid');
                    }
                    if (namausaha && nama && status ) {
                        return 'submit';
                    }
                    break;
                case 'Bekerja dan Kuliah':
                    if (namaperusahaan == '') {
                        $('#valid_namaperusahaan').addClass('is-invalid');
                        $('#invalid_namaperusahaan').html('nama perusahaan tidak boleh kosong').removeClass(
                            'd-none');
                    } else {
                        $('#invalid_namaperusahaan').addClass('d-none');
                        $('#valid_namaperusahaan').removeClass('is-invalid');
                    }
                    if (alamatperusahaan == '') {
                        $('#valid_alamatperusahaan').addClass('is-invalid');
                        $('#invalid_alamatperusahaan').html('alamat perusahaan tidak boleh kosong').removeClass(
                            'd-none');
                    } else {
                        $('#invalid_alamatperusahaan').addClass('d-none');
                        $('#valid_alamatperusahaan').removeClass('is-invalid');
                    }
                    if (tahunkuliah == '') {
                        $('#valid_tahunkuliah').addClass('is-invalid');
                        $('#invalid_tahunkuliah').html('tahun kuliah tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_tahunkuliah').addClass('d-none');
                        $('#valid_tahunkuliah').removeClass('is-invalid');
                    }
                    if (namakampus == '') {
                        $('#valid_namakampus').addClass('is-invalid');
                        $('#invalid_namakampus').html('nama kampus tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_namakampus').addClass('d-none');
                        $('#valid_namakampus').removeClass('is-invalid');
                    }
                    if (alamatkampus == '') {
                        $('#valid_alamatkampus').addClass('is-invalid');
                        $('#invalid_alamatkampus').html('alamat kampus tidak boleh kosong').removeClass(
                            'd-none');
                    } else {
                        $('#invalid_alamatkampus').addClass('d-none');
                        $('#valid_alamatkampus').removeClass('is-invalid');
                    }
                    if (tahunmasuk == '') {
                        $('#valid_tahunmasuk').addClass('is-invalid');
                        $('#invalid_tahunmasuk').html('tahun masuk tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_tahunmasuk').addClass('d-none');
                        $('#valid_tahunmasuk').removeClass('is-invalid');
                    }
                    if (namakampus && alamatkampus && tahunmasuk && namaperusahaan && alamatperusahaan && tahunkuliah && nama && status ) {
                        return 'submit';
                    }
                    break;
                case 'Wirausaha dan Kuliah':
                    if (namausaha == '') {
                        $('#valid_namausaha').addClass('is-invalid');
                        $('#invalid_namausaha').html('nama usaha tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_namausaha').addClass('d-none');
                        $('#valid_namausaha').removeClass('is-invalid');
                    }
                    if (namakampus == '') {
                        $('#valid_namakampus').addClass('is-invalid');
                        $('#invalid_namakampus').html('nama kampus tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_namakampus').addClass('d-none');
                        $('#valid_namakampus').removeClass('is-invalid');
                    }
                    if (alamatkampus == '') {
                        $('#valid_alamatkampus').addClass('is-invalid');
                        $('#invalid_alamatkampus').html('alamat kampus tidak boleh kosong').removeClass(
                            'd-none');
                    } else {
                        $('#invalid_alamatkampus').addClass('d-none');
                        $('#valid_alamatkampus').removeClass('is-invalid');
                    }
                    if (tahunmasuk == '') {
                        $('#valid_tahunmasuk').addClass('is-invalid');
                        $('#invalid_tahunmasuk').html('tahun masuk tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_tahunmasuk').addClass('d-none');
                        $('#valid_tahunmasuk').removeClass('is-invalid');
                    }

                    if (namakampus && alamatkampus && tahunmasuk && namausaha && nama && status ) {
                        return 'submit';
                    }
                    break;
                default:
                    break;
            }
        }
    });

</script>
@endpush
