@extends('template.master')
@push('link')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

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
        <form action="" method="POST">
            @csrf
            <div class="row mb-5">
                {{-- card col 1 --}}
                <div class="col-6">
                    @if (Auth::user()->role == 'admin' or Auth::user()->role == 'kaprog')
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Siswa</label>
                        <div class="mb-3 col-8">
                            <select name="" id="siswa" class="form-control   @error('siswa')  is-invalid  @enderror select2">
                                <option value="">--Cari Siswa--</option>
                                <option value="siswa1">Siswa 1</option>
                                <option value="siswa2">Siswa 2</option>
                            </select>
                            <div id="invalid_siswa" class="invalid-feedback d-none"></div>
                        </div>
                    </div>
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Jurusan</label>
                        <div class="mb-3 col-8">
                            <select name="" id="jurusan" class="form-control   @error('')  is-invalid  @enderror select2">
                                <option value="">--Pilih Jurusan--</option>
                                <option value="rpl">Rekayasa Perangkat Lunak</option>
                                <option value="mm">Multimedia</option>
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
                            <select name="" id="jurusan" class="form-control   @error('')  is-invalid  @enderror select2">
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
                            <div>
                                <div class="">
                                    <div class="row">
                                        <label class="" style="margin-left: 33px;">Aspek yang dinilai</label>
                                        <label class="" style="margin-left: 70px;">Nilai</label>
                                    </div>
                                </div>
                                <div class="mt-2 col-12 row">
                                    <div class="col-sm-5">
                                        <select id="aspek" name="" class="form-control select2 @error('')  is-invalid  @enderror ">
                                            <option value="">--Cari Aspek--</option>
                                            @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->aspek_yang_dinilai }}</option>
                                            @endforeach
                                        </select>
                                        <div id="invalid_aspek" class="invalid-feedback d-none"></div>
                                    </div>
                                    <div class="mb-3 col-sm-3">
                                        <input type="number" name="" id="nilai" class="form-control @error('')  is-invalid  @enderror form-control">
                                        <div id="invalid_nilai" class="invalid-feedback d-none"></div>
                                    </div>

                                    <div class="mb-2 col-12 row">
                                        <label for="" class="col-sm-5 col-form-label">Keterangan</label>
                                        <div class="mb-3 col-sm-3" style="margin-left: 15px;">
                                            <input type="number" name="" id="keterangan" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-2 col-12 row">
                                        <label class="col-sm-3 col-form-label">Domain</label>
                                        <div class="mb-3 col-6" style="margin-left: -0px;">
                                            <select name="" id="domain" class="form-control domain    @error('')  is-invalid  @enderror select2">
                                                <option value="">--Pilih Domain--</option>
                                                <option value="pelaksanaan">Pelaksanaan</option>
                                                <option value="keterampilan">Keterampilan</option>
                                            </select>
                                            <div id="invalid_domain" class="invalid-feedback d-none"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-4">
                                        <button type="button" name="" id="add" class="btn btn-success">Add More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->role == 'hubin' or Auth::user()->role == 'kaprog')
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Nilai</label>
                        <div class="mb-3 col-sm-3">
                            <input type="number" name="" id="nilai"
                                class="form-control-sm @error('')  is-invalid  @enderror form-control"
                                value="{{ old('') }}">
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
                            <a id="cek_submit" type="submit" class="btn btn-success mr-3 text-white"><i class="fas fa-check"></i> submit</a>
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
    $(document).ready(function(){
             var i=1;
             $('#add').click(function(){
                  i++;
                  $('#dynamic_field').append(
                                            '<div id="row'+i+'">'+
                                                '<div class="">'+
                                                    '<div class="row">'+
                                                        '<label class="" style="margin-left: 33px;">Aspek yang dinilai</label>'+
                                                        '<label class="" style="margin-left: 70px;">Nilai</label>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="mt-2 col-12 row" >'+
                                                    '<div class="col-sm-5"">'+
                                                        '<select id="" name="" class="form-control select2 @error('')  is-invalid  @enderror ">'+
                                                            '<option value="">--Cari Aspek--</option>'+
                                                            '@foreach ($kategori as $item)'+
                                                            '<option value="{{ $item->id }}">{{ $item->aspek_yang_dinilai }}</option>'+
                                                            '@endforeach'+
                                                        '</select>'+
                                                    '</div>'+
                                                    '<div class="mb-3 col-sm-3">'+
                                                        '<input type="number" name="" id="" class="form-control @error('')  is-invalid  @enderror form-control">'+
                                                    '</div>'+
                                                    '<div class="mb-3 col-sm-4">'+
                                                        '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>'+
                                                    '</div>'+
                                                    '<div class="mb-2 col-12 row">'+
                                                        '<label for="" class="col-sm-5 col-form-label">Keterangan</label>'+
                                                        '<div class="mb-3 col-sm-3" style="margin-left: 15px;">'+
                                                            '<input type="number" name="" id="" class="form-control" disabled>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="mb-2 col-12 row">'+
                                                        '<label class="col-sm-3 col-form-label">Domain</label>'+
                                                        '<div class="mb-3 col-6" style="margin-left: -0px;">'+
                                                            '<select name="" id="domain" class="form-control domain    @error('')  is-invalid  @enderror select2">'+
                                                                '<option value="">--Pilih Domain--</option>'+
                                                                '<option value="pelaksanaan">Pelaksanaan</option>'+
                                                                '<option value="keterampilan">Keterampilan</option>'+
                                                            '</select>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'
                                            );
                                        });
             $(document).on('click', '.btn_remove', function(){
                  var button_id = $(this).attr("id");
                  $('#row'+button_id+'').remove();
             });


            $('#cek_submit').on('click', function () {
                var siswa = $('#siswa').val();
                var jurusan = $('#jurusan').val();
                var aspek = $('#aspek').val();
                var nilai = $('#nilai').val();
                var domain = $('#domain').val();



                if (siswa == '' || jurusan == '' || aspek == '' || nilai == ''|| domain == '')  {
                    // option
                    if (siswa == '') {
                    $('#siswa').addClass('is-invalid');
                    $('#invalid_siswa').html('siswa tidak boleh kosong').removeClass('d-none');
                    }else{
                        $('#invalid_siswa').addClass('d-none');
                        $('#siswa').removeClass('is-invalid');

                    }

                    if (jurusan == '') {
                    $('#jurusan').addClass('is-invalid');
                    $('#invalid_jurusan').html('jurusan tidak boleh kosong').removeClass('d-none');
                    }else{
                        $('#invalid_jurusan').addClass('d-none');
                        $('#jurusan').removeClass('is-invalid');

                    }

                    if (aspek == '') {
                    $('#aspek').addClass('is-invalid');
                    $('#invalid_aspek').html('aspek tidak boleh kosong').removeClass('d-none');
                    }else{
                        $('#invalid_aspek').addClass('d-none');
                        $('#aspek').removeClass('is-invalid');

                    }

                    if (nilai == '') {
                    $('#nilai').addClass('is-invalid');
                    $('#invalid_nilai').html('nilai tidak boleh kosong').removeClass('d-none');
                    }else{
                        $('#invalid_nilai').addClass('d-none');
                        $('#nilai').removeClass('is-invalid');

                    }

                    if (domain == '') {
                    $('#domain').addClass('is-invalid');
                    $('#invalid_domain').html('domain tidak boleh kosong').removeClass('d-none');
                    }else{
                        $('#invalid_domain').addClass('d-none');
                        $('#domain').removeClass('is-invalid');

                    }

                }
                else{

                }
            });
    });


    $(document).ready(function () {

        $('#nilai').keyup(function (e) {
            nilai = $('#nilai').val();
            console.log(nilai);
            if (nilai > 8.60) {
                $('#keterangan').val('A');
            } else
            if (nilai > 7.10 && nilai < 8.59) {
                $('#keterangan').val('B');
            } else
            if (nilai > 6 && nilai < 7.09) {
                $('#keterangan').val('C');
            } else
            if (nilai < 6) {
                $('#keterangan').val('D');
            } else {
                $('#keterangan').val('');
            }
        })

        // ngambil domain
          $('.siswa').change(function (e) {
            id = $(this).val();
            console.log('berubah');
            $.ajax({
                url: '/admin/nilai_prakerin/option/tambah/ajax/'+id,
                method: 'get',
                success: function (response) {
                    $('.domain').append('<option value="'+response.jurusan.id+'" selected>'+response.jurusan.domain+'</option>')
                },
                fail: function (erorr) {

                }
            });
        })

        $('.aspek').change(function (e) {
            id = $(this).val();
            console.log('berubah');
            $.ajax({
                url: '/admin/nilai_prakerin/option/tambah/ajax/'+id,
                method: 'get',
                success: function (response) {
                    $('.domain').append('<option value="'+response.kategori.id+'" selected>'+response.kategori.domain+'</option>')
                },
                fail: function (erorr) {

                }
            });
        })


    })

</script>
@endpush
