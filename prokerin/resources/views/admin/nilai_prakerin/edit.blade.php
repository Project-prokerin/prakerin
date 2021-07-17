@extends('template.master')
@push('link')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

{{-- disnin nur
    ok mantap codingan nya mumet akwdpoak
    wkwkw  liat bawah nur di js nya--}}
@endpush
@section('title', 'Prakerin | Nilai Data Prakerin Siswa')
@section('judul', 'Nilai Data Prakerin Siswa ')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a>
</div>
<div class="breadcrumb-item"> <i class="fas fa-newspaper"></i> NILAI PRAKERIN SISWA</div>
@endsection
@section('main')
<div class="card" style="">
    <div class="card-header">
        <h4 class="pt-2 card-title"><i class="fas fa-th"></i> Tambah Data Nilai Prakerin</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('nilai_prakerin.update', $siswa_main->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="row mb-5">
                {{-- card col 1 --}}
                <div class="col-6">
                    @if (Auth::user()->role == 'admin' or Auth::user()->role == 'kaprog')
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Siswa</label>
                        <div class="mb-3 col-8">
                            <select name="id_siswa" id="siswa"
                            class="form-control   @error('siswa')  is-invalid  @enderror select2" disabled>
                                <option value="">--Cari Siswa--</option>
                                @foreach ($siswa as $item)
                                <option value="{{ $item->id }}" {{ ($siswa_main->id == $item->id) ? 'selected' : ' ' }}>{{ $item->nama_siswa }}</option>
                                @endforeach
                            </select>
                            <div id="invalid_siswa" class="invalid-feedback d-none"></div>
                        </div>
                    </div>
                    <!-- bentar din maghrib dulu  -->
                    <!-- //udah login -->
                    {{-- lofin github dulu nur lu gabisa gituin terimanl --}}
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Jurusan</label>
                        <div class="mb-3 col-8">
                            <select name="" id="jurusan"
                                class="form-control   @error('')  is-invalid  @enderror select2" disabled>
                                <option value="">--Pilih Jurusan--</option>
                                <option value="RPL" {{ ($jurusan[0] == "RPL") ? 'selected' : ' ' }}>RPL</option>
                                <option value="MM" {{ ($jurusan[0] == "MM") ? 'selected' : ' ' }}>MM</option>
                                <option value="BC" {{ ($jurusan[0] == "BC") ? 'selected' : ' ' }}>BC</option>
                                <option value="TKJ" {{ ($jurusan[0] == "TKJ") ? 'selected' : ' ' }}>TKJ</option>
                                <option value="TEI" {{ ($jurusan[0] == "TEI") ? 'selected' : ' ' }}>TEI</option>
                            </select>
                            <div id="invalid_jurusan" class="invalid-feedback d-none"></div>
                        </div>
                    </div>
                    @endif
                    @if (Auth::user()->role == 'hubin')
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Kelompok</label>
                        <div class="mb-3 col-8">
                            <select name="" id="siswa" class="form-control   @error('')  is-invalid  @enderror select2">
                                <option value="">--Cari Kelompok--</option>
                                <option value="1">Kelompok 1</option>
                                <option value="2">Kelompok 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Jurusan</label>
                        <div class="mb-3 col-8">
                            <select name="" id="jurusan"
                                class="form-control   @error('')  is-invalid  @enderror select2">
                                <option value="">--Pilih Jurusan--</option>
                                <option value="rpl">Rekayasa Perangkat Lunak</option>
                                <option value="mm">Multimedia</option>
                            </select>
                        </div>
                    </div>
                    @endif
                    {{-- <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Aspek Yang Dinilai</label>
                        <div class="mb-3 col-8">
                            <select name="" id="aspek" class="form-control  aspek  @error('')  is-invalid  @enderror select2">
                                <option value="">--Pilih Aspek--</option>
                                @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->aspek_yang_dinilai }}</option>
                    @endforeach
                    </select>
                </div>
            </div> --}}
            <div>
                <div id="dynamic_field">
                    @foreach ($kategori as $item)
                    @php $nilai = \App\Models\nilai_prakerin::where('id_ketegori', $item->id)->where('id_siswa',$siswa_main->id)->first(); @endphp
                    <input type="text" class="d-none" name="id_nilai[]" value="{{ !empty($nilai->id) ? $nilai->id : '' }}">
                        <div>
                        <div class="">
                            <div class="row">
                                <label class="" style="margin-left: 33px;">Aspek yang dinilai</label>
                                <label class="" style="margin-left: 70px;">Nilai</label>
                            </div>
                        </div>
                        <div class="mt-2 col-12 row">
                            <div class="col-sm-5">
                                <select id="aspek" name="aspek[]"
                                    class="form-control aspek select2 @error('')  is-invalid  @enderror "  disabled>
                                    <option value="">--Cari Aspek--</option>
                                    <option value="{{ $item->id }}" selected >{{ $item->aspek_yang_dinilai }}</option>
                                </select>
                                <div id="invalid_aspek" class="invalid-feedback d-none"></div>
                            </div>
                            <div class="mb-3 col-sm-3">
                                <input type="number" name="nilai[]" id="nilai_1"
                                    class="form-control @error('')  is-invalid  @enderror form-control" value="{{ !empty($nilai->nilai) ? $nilai->nilai : '0' }}">
                                <div id="invalid_nilai" class="invalid-feedback d-none"></div>
                            </div>

                            <div class="mb-2 col-12 row">
                                <label for="keterangan"  class="col-sm-5 col-form-label">Keterangan</label>
                                <div class="mb-3 col-sm-3"  style="margin-left: 15px;">
                                    <input type="text" name="keterangan[]" id="keterangan_1" value="{{ !empty($nilai->keterangan) ? $nilai->keterangan : 'D' }}" class="form-control keterangan"
                                       readonly >
                                </div>
                            </div>
                            <div class="mb-2 col-12 row">
                                <label class="col-sm-3 col-form-label">Domain</label>
                                <div class="mb-3 col-6" style="margin-left: -0px;">
                                    <select name="domain[]" id="domain"
                                        class="form-control domain    @error('')  is-invalid  @enderror select2"
                                        disabled>
                                        <option value="">-- Domain --</option>
                                        <option value="{{ $item->domain }}" selected>{{ $item->domain }}</option>
                                        {{-- <option value="pelaksanaan">Pelaksanaan</option>
                                        <option value="keterampilan">Keterampilan</option> --}}
                                    </select>
                                    <div id="invalid_domain" class="invalid-feedback d-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            @if (Auth::user()->role == 'hubin' or Auth::user()->role == 'kaprog')
            <div class="mb-2 col-12 row">
                <label for="" class="col-sm-4 col-form-label">Nilai</label>
                <div class="mb-3 col-sm-3">
                    <input type="number" name="" id="nilai"
                        class="form-control-sm @error('')  is-invalid  @enderror form-control" value="{{ old('') }}">
                </div>
            </div>
            @endif

            @if (Auth::user()->role == 'siswa' or Auth::user()->role == 'admin')
            {{-- <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Nilai</label>
                        <div class="mb-3 col-sm-3">
                            <input type="number" name="" id="nilai"
                                class="form-control-sm @error('')  is-invalid  @enderror form-control"
                                value="{{ old('') }}">
    </div>
</div> --}}
@endif
{{-- <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="mb-3 col-sm-3">
                            <input type="text" name="" id="keterangan"
                                class="form-control-sm @error('')  is-invalid  @enderror form-control"
                                value="{{ old('') }}" disabled>
</div>
</div> --}}

</div>

{{-- card col 2 --}}
<div class="col-6">
    <div class="row">
        <div class="col-12">
            <div class="">
                <div class="">
                    <h6 class="mb-3">Konversi Keterangan Nilai :</h6>
                </div>
                <table class="ml-5 table-sm table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" colspan="2" style="width: 300px;">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th style="width: 10px;">Angka</th>
                            <th style="width: 10px;">Huruf</th>
                        </tr>
                        <tr>
                            <td>8.6 - 10.00</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>7.10 - 8.59</td>
                            <td>B</td>
                        </tr>
                        <tr>
                            <td>6.0 - 7.09</td>
                            <td>C</td>
                        </tr>
                        <tr>
                            <td>
                                < 6.00</td> <td>D
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="modal-footer" style="">
        <div class="row" style="">
            <button id="cek_submit" type="submit" class="btn btn-success mr-3 text-white"><i class="fas fa-check"></i>
                submit</button>
            <a href="" type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>



@endsection
@push('script')
<script>
    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;
            $('#dynamic_field').append(
                '<div id="row' + i + '">' +
                '<div class="">' +
                '<div class="row">' +
                '<label class="" style="margin-left: 33px;">Aspek yang dinilai</label>' +
                '<label class="" style="margin-left: 70px;">Nilai</label>' +
                '</div>' +
                '</div>' +
                '<div class="mt-2 col-12 row" >' +
                '<div class="col-sm-5"">' +
                '<select id="aspek[]" name="aspek[]" class="form-control aspek select2 @error('
                ')  is-invalid  @enderror ">' +
                '<option value="">--Cari Aspek--</option>' +
                '</select>' +
                '</div>' +
                '<div class="mb-3 col-sm-3">' +
                '<input type="number" name="nilai[]" id="nilai_' + i + '" class="form-control @error('
                ')  is-invalid  @enderror form-control">' +
                '</div>' +
                '<div class="mb-3 col-sm-4">' +
                '<button type="button" name="remove" id="' + i +
                '" class="btn btn-danger btn_remove">X</button>' +
                '</div>' +
                '<div class="mb-2 col-12 row">' +
                '<label for="" class="col-sm-5 col-form-label">Keterangan</label>' +
                '<div class="mb-3 col-sm-3" style="margin-left: 15px;">' +
                '<input type="number" name="keterangan[]" id="keterangan_' + i +
                '" class="form-control" disabled>' +
                '</div>' +
                '</div>' +
                '<div class="mb-2 col-12 row">' +
                '<label class="col-sm-3 col-form-label">Domain</label>' +
                '<div class="mb-3 col-6" style="margin-left: -0px;">' +
                '<select name="domain[]" id="domain" class="form-control domain    @error('
                ')  is-invalid  @enderror select2">' +
                '<option value="">--Pilih Domain--</option>' +
                '<option value="pelaksanaan">Pelaksanaan</option>' +
                '<option value="keterampilan">Keterampilan</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>'
            );
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });


        $('#cek_submit').on('click', function () {
            var siswa = $('#siswa').val();
            var jurusan = $('#jurusan').val();
            var aspek = $('#aspek').val();
            var nilai = $('#nilai').val();
            var domain = $('#domain').val();



            if (siswa == '' || jurusan == '' || aspek == '' || nilai == '' || domain == '') {
                // option
                if (siswa == '') {
                    $('#siswa').addClass('is-invalid');
                    $('#invalid_siswa').html('siswa tidak boleh kosong').removeClass('d-none');
                } else {
                    $('#invalid_siswa').addClass('d-none');
                    $('#siswa').removeClass('is-invalid');

                }

                if (jurusan == '') {
                    $('#jurusan').addClass('is-invalid');
                    $('#invalid_jurusan').html('jurusan tidak boleh kosong').removeClass('d-none');
                } else {
                    $('#invalid_jurusan').addClass('d-none');
                    $('#jurusan').removeClass('is-invalid');

                }

                if (aspek == '') {
                    $('#aspek').addClass('is-invalid');
                    $('#invalid_aspek').html('aspek tidak boleh kosong').removeClass('d-none');
                } else {
                    $('#invalid_aspek').addClass('d-none');
                    $('#aspek').removeClass('is-invalid');

                }

                if (nilai == '') {
                    $('#nilai').addClass('is-invalid');
                    $('#invalid_nilai').html('nilai tidak boleh kosong').removeClass('d-none');
                } else {
                    $('#invalid_nilai').addClass('d-none');
                    $('#nilai').removeClass('is-invalid');

                }

                if (domain == '') {
                    $('#domain').addClass('is-invalid');
                    $('#invalid_domain').html('domain tidak boleh kosong').removeClass('d-none');
                } else {
                    $('#invalid_domain').addClass('d-none');
                    $('#domain').removeClass('is-invalid');

                }

            } else {}
        });
        var titles = [];
        $('option[name^=aspek]').each(function () {
            titles.push($(this).val());
        });
        console.log(titles);
        console.log()
        for (let i = 1; i < 10; i++) {
            $('#nilai_' + i).keyup(function (e) {
                nilai = $('#nilai_' + i).val();
                console.log(nilai);
                if (nilai > 80.60) {
                    $('#keterangan_' + i).val('A');
                } else
                if (nilai > 70.10 && nilai < 80.59) {
                    $('#keterangan_' + i).val('B');
                } else
                if (nilai > 60 && nilai < 70.09) {
                    $('#keterangan_' + i).val('C');
                } else
                if (nilai < 60) {
                    $('#keterangan_' + i).val('D');
                } else {
                    $('#keterangan_' + i).val('');
                }
            })

        }


        // ngambil domain

        $('#jurusan').change(function (e) {
            $('.aspek').empty().append();

            id = $(this).val();
            if (id) {
                $('.aspek').append('<option>-- Mencari.. --</option>')
            } else {
                $('.aspek').append('<option>-- Pilih Aspek --</option>')
            }
            console.log(id);
            $.ajax({
                url: '/admin/nilai_prakerin/option/tambah_1/ajax/' + id,
                method: 'get',
                success: function (response) {
                    //console.log(response.kategori);
                    $('.aspek').empty().append();
                    if (response.kategori != 0) {
                        $('.aspek').append('<option>-- Pilih Aspek --</option>')
                        response.kategori.forEach(element => {
                            if (element) {
                                $('.aspek').append('<option value="' + element.id +
                                    '" >' + element.aspek_yang_dinilai +
                                    '</option>')
                            } else {
                                $('.aspek').append(
                                    '<option>Aspek kategori kosong</option>')
                            }
                        });
                    } else {
                        $('.aspek').append('<option>Kategori kosong</option>')
                    }
                },
                fail: function (erorr) {
                    $('.aspek').append('<option>-- Pilih Aspek --</option>')
                }
            });
        })
        // gua pengen ambil id nya nur tapi bingung gw kalo multi slect gmna
        $('select[name*="aspek"]').change(function (e) {
            id = $(this).val();
            console.log('berubah');
            if (id ) {
                $('#domain').append('<option>-- Mencari.. --</option>')
            } else {
                $('#domain').append('<option>-- Domain --</option>')
            }
            $.ajax({
                url: '/admin/nilai_prakerin/option/tambah_2/ajax/' + id,
                method: 'get',
                success: function (response) {
                    console.log(response);
                    $('#domain').empty().append();
                    $('#domain').append('<option value="' + response.kategori.id +
                        '" selected>' + response.kategori.domain + '</option>')
                },
                fail: function (erorr) {
 $('#domain').append('<option>-- Domain --</option>')
                }
            });
        })

    });

</script>
@endpush
