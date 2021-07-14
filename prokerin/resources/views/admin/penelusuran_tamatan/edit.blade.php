@extends('template.master')
@push('link')
<style>

</style>
@endpush
@section('title','Prakerin | Edit Tamatan Penelusuran')
@section('judul','Edit Data Tamatan Penelusuran')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> TAMATAN PENELUSURAN</div>
@endsection
@section('main')

<div class="card" style="height: 600px;">
    <div class="card-header mt-2">
        <h4 class="pt-2"><i class="fas fa-align-justify mr-2"></i>Edit Data Tamatan Penelusuran</h4>
    </div>
    <div class="card-body">
        <div class="">
            <div class="col-lg-12" style="height: 500px;">
                <div class="">
                    <div class="container">
                        <form action="{{ route('penelusuran_tamantan.update', $pen->id) }}" method="POST" id="form">
                            @csrf
                            @method('put')
                            <div class="row mb-5">
                                {{-- card col 1 --}}
                                <div class="col-6">
                                    <div class="mb-3 col-lg-10">
                                        <label>Nama Siswa Alumni</label>
                                        <select name="id_alumni"
                                            class="form-control   @error('id_alumni')  is-invalid  @enderror select2"
                                            id="id_alumni">
                                            <option value="">--Cari Siswa Alumni--</option>
                                            @foreach ($alumni as $alum)
                                            <option value="{{$alum->id}}"
                                                {{(old('id_alumni', $pen->id_alumni) == $alum->id) ? 'selected' : ''}}>{{$alum->nama}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div id="invalid_siswa" class="invalid-feedback d-none"></div>
                                    </div>
                                    <div class="mb-3 col-lg-10">
                                        <label>Kelas</label>
                                        <input type="text" name="kelas" class="form-control input_KJ kelas" disabled value="{{ $pen->alumni_siswa->kelas }}" >
                                        <div id="invalid_siswa" class="invalid-feedback d-none " ></div>
                                    </div>
                                    <div class="mb-3 col-lg-10">
                                        <label>Jurusan</label>
                                        <input type="text" name="jurusan" class="form-control input_KJ jurusan" disabled value="{{ $pen->alumni_siswa->jurusan }}">
                                        <div id="invalid_siswa" class="invalid-feedback d-none "></div>
                                    </div>
                                        <div class="mb-3 col-lg-10">
                                        <label>Tahun lulus</label>
                                        <input type="text" name="tahun_lulus" class="form-control input_KJ tahun_lulus" disabled value="{{ $pen->alumni_siswa->tahun_lulus }}">
                                        <div id="invalid_siswa" class="invalid-feedback d-none "></div>
                                    </div>
                                    <div class="mb-3 col-lg-10">
                                        <label>Status</label>
                                        <select id="status" name="status"
                                            class="form-control   @error('status')  is-invalid  @enderror select2">
                                            <option value="#">--Cari Status--</option>
                                            <option {{ ($pen->status == 'bekerja') ? 'selected' : '' }} value="bekerja">Bekerja</option>
                                            <option {{ ($pen->status == 'kuliah') ? 'selected' : '' }} value="kuliah">Kuliah</option>
                                            <option {{ ($pen->status == 'Wirausaha') ? 'selected' : '' }} value="Wirausaha">Wirausaha</option>
                                            <option {{ ($pen->status == 'Bekerja dan Kuliah') ? 'selected' : '' }} value="Bekerja dan Kuliah">Bekerja & Kuliah</option>
                                            <option {{ ($pen->status == 'Wirausaha dan Kuliah') ? 'selected' : '' }} value="Wirausaha dan Kuliah">Wirausaha & Kuliah</option>
                                        </select>
                                        @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- card col 2 --}}
                                <div class="col-6">
                                    {{-- bekerja --}}
                                    <div class="mb-3 col-lg-10" id="namaperusahaan" hidden>
                                        <label>Nama Perusahaan</label>
                                        <div class="mb-3">
                                            <input type="text"  id="namaperusahaan"
                                                class="form-control @error('')  is-invalid  @enderror form-control"
                                                value="{{ empty($pen->nama_perusahaan) ? '' : $pen->nama_perusahaan  }}" name="nama_perusahaan">
                                            <div id="invalid_namaperusahaan" class="invalid-feedback d-none"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-10" id="alamatperusahaan" hidden>
                                        <label>Alamat Perusahaan</label>
                                        <div class="mb-3">
                                            <input type="text"  id=""
                                                class="form-control @error('')  is-invalid  @enderror form-control"
                                                value="{{ empty($pen->alamat_perusahaan) ? '' : $pen->alamat_perusahaan  }}" name="alamat_perusahaan">
                                            @error('')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-10" id="tahunkuliah" hidden>
                                        <label>Tahun Masuk Kuliah</label>
                                        <div class="mb-3">
                                            <input type="text"  id=""
                                                class="form-control @error('')  is-invalid  @enderror form-control"
                                                value="{{ empty($pen->tahun_kuliah) ? '' : $pen->tahun_kuliah  }}" name="tahun_kuliah">
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
                                            <input type="text"  id=""
                                                class="form-control @error('')  is-invalid  @enderror form-control"
                                                value="{{ empty($pen->nama_kampus) ? '' : $pen->nama_kampus  }}" name="nama_kampus">
                                            @error('')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-10" id="alamatkampus" hidden>
                                        <label>Alamat Kampus</label>
                                        <div class="mb-3">
                                            <input type="text"  id=""
                                                class="form-control @error('')  is-invalid  @enderror form-control"
                                                value="{{ empty($pen->alamat_kampus) ? '' : $pen->alamat_kampus  }}" name="alamat_kampus">
                                            @error('')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-10" id="tahunmasuk" hidden>
                                        <label>Tahun Masuk</label>
                                        <div class="mb-3">
                                            <input type="text"  id=""
                                                class="form-control @error('')  is-invalid  @enderror form-control"
                                                value="{{ empty($pen->tahun_masuk) ? '' : $pen->tahun_masuk  }}" name="tahun_masuk_kuliah">
                                            @error('')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- tutup --}}

                                    {{-- wirausaha --}}
                                    {{-- <div class="mb-3 col-lg-10" id="namabrand" hidden>
                                        <label>Nama Brand</label>
                                        <div class="mb-3">
                                            <input type="text"  id=""
                                                class="form-control @error('')  is-invalid  @enderror form-control"
                                                value="{{ empty($pen->nama_perusahaan) ? '' : $pen->nama_perusahaan  }}" >
                                            @error('')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="mb-3 col-lg-10" id="namausaha" hidden>
                                        <label>Nama Usaha</label>
                                        <div class="mb-3">
                                            <input type="text" name="nama_usaha" id=""
                                                class="form-control @error('')  is-invalid  @enderror form-control"
                                                value="{{ empty($pen->nama_usaha) ? '' : $pen->nama_usaha  }}">
                                            @error('')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- tutup --}}

                                    <div class="row">
                                        <a class="btn btn-danger ml-auto mr-3 text-white mt-3 mb-3" id="kembali">kembali
                                        </a>
                                        <button type="submit" id="cek_submit"
                                            class="text-white mr-3 btn btn-success mt-3 mb-3"><i
                                                class="fas fa-check"></i> Submit</button>
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
            } else if ($("#status option:selected").val() == 'kuliah') {
                $('#namaperusahaan').prop('hidden', 'true');
                $('#alamatperusahaan').prop('hidden', 'true');
                $('#tahunkuliah').prop('hidden', 'true');

                $('#namakampus').prop('hidden', false);
                $('#alamatkampus').prop('hidden', false);
                $('#tahunmasuk').prop('hidden', false);

                $('#namabrand').prop('hidden', 'true');
                $('#namausaha').prop('hidden', 'true');
            } else if ($("#status option:selected").val() == 'Wirausaha') {
                $('#namaperusahaan').prop('hidden', 'true');
                $('#alamatperusahaan').prop('hidden', 'true');
                $('#tahunkuliah').prop('hidden', 'true');

                $('#namakampus').prop('hidden', 'true');
                $('#alamatkampus').prop('hidden', 'true');
                $('#tahunmasuk').prop('hidden', 'true');

                $('#namabrand').prop('hidden', false);
                $('#namausaha').prop('hidden', false);
            } else if ($("#status option:selected").val() == 'Bekerja dan Kuliah') {
                $('#namaperusahaan').prop('hidden', false);
                $('#alamatperusahaan').prop('hidden', false);
                $('#tahunkuliah').prop('hidden', false);

                $('#namakampus').prop('hidden', false);
                $('#alamatkampus').prop('hidden', false);
                $('#tahunmasuk').prop('hidden', false);

                $('#namabrand').prop('hidden', 'true');
                $('#namausaha').prop('hidden', 'true');
            } else if ($("#status option:selected").val() == 'Wirausaha dan Kuliah') {
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


    $('#cek_submit').on('click', function (e) {
        e.preventDefault();
        var nama = $('#id_alumni').val();
        var status = $('#status').val();

        if (nama == '' || status == '') {
            // option
            if (nama == '') {
                $('#id_alumni').addClass('is-invalid');
                $('#invalid_siswa').html('nama siswa alumni tidak boleh kosong').removeClass('d-none');
            } else {
                $('#invalid_siswa').addClass('d-none');
            }

            if (status == '') {
                $('#status').addClass('is-invalid');
                $('#invalid_status').html('status siswa alumni tidak boleh kosong').removeClass('d-none');
            } else {
                $('#invalid_status').addClass('d-none');
            }
        } else {
            $('#form').submit();
        }
    });
 });
</script>
{{-- <script src="{{ asset('assets/js/pages-admin/.js') }}"></script> --}}
@endpush
