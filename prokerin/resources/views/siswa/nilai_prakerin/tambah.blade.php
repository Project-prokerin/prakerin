@extends('template.master')
@push('link')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('template/') }}/node_modules/select2/dist/css/select2.min.css">


    <style>

        #row1 {
  width: 100%;
}
    </style>
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
      
        <h4 class="pt-2 card-title"><i class="fas fa-th"></i> Tambah Data Nilai Prakerin Perusahaan</h4>

    </div>
    <div class="card-body">
        <form action="{{ route('Siswanilai_prakerin.post') }}" method="POST">
            @csrf
            <div class="row mb-5">
                {{-- card col 1 --}}
                <div class="col-6">
                    {{-- @if (Auth::user()->role == 'admin' or Auth::user()->role == 'kaprog' or Auth::user()->role == 'hubin') --}}
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Siswa</label>
                        <div class="mb-3 col-8">
                            <select name="id_siswa" id="siswa"
                            class="form-control   @error('siswa')  is-invalid  @enderror select2">
                                <option value="{{Auth::user()->siswa->id}}" selected>{{Auth::user()->siswa->nama_siswa}}</option>
                               
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
                                class="form-control   @error('')  is-invalid  @enderror select2">
                                <option value="" selected>--Cari Jurusan--</option>
                                <option value="{{$jurusan->id}}" >{{$jurusan->singkatan_jurusan}}</option>
                                {{-- <option value="RPL">RPL</option>
                                <option value="MM">MM</option>
                                <option value="BC">BC</option>
                                <option value="TKJ">TKJ</option>
                                <option value="TEI">TEI</option> --}}
                                {{-- @foreach ($jurusan as $item) --}}
                                    {{-- <option value="{{ $item->id }}" {{ ($item->id == old('jurusan')) ? 'selected' : '' }}>{{ $item->singkatan_jurusan  }}</option> --}}
                                {{-- @endforeach --}}
                            </select>
                            <div id="invalid_jurusan" class="invalid-feedback d-none"></div>
                        </div>
                    </div>
                    {{-- @endif --}}
                    {{-- @if (Auth::user()->role == 'hubin')
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Kelompok</label>
                        <div class="mb-3 col-8">
                            <select name="id_siswa" id="siswa" class="form-control   @error('')  is-invalid  @enderror select2">
                                @foreach ($kelompok as $item)
                                    <option value="{{ $item->id_siswa }}">{{ $item->no }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                      <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Jurusan</label>
                        <div class="mb-3 col-8">
                            <select name="" id="jurusan"
                                class="form-control   @error('')  is-invalid  @enderror select2">
                                <option value="">--Pilih Jurusan--</option>
                                {{-- <option value="RPL">RPL</option>
                                <option value="MM">MM</option>
                                <option value="BC">BC</option>
                                <option value="TKJ">TKJ</option>
                                <option value="TEI">TEI</option> --}}
                                {{-- @foreach ($jurusan as $item)
                                    <option value="{{ $item->id }}" {{ ($item->id == old('jurusan')) ? 'selected' : '' }}>{{ $item->singkatan_jurusan  }}</option>
                                @endforeach
                            </select>
                            <div id="invalid_jurusan" class="invalid-feedback d-none"></div>
                        </div>
                    </div>
                    @endif  --}}
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
                    <div id="row0">
                        <div class="">
                            <div class="row">
                                <label class="" style="margin-left: 33px;">Aspek yang dinilai</label>
                                <label class="" style="margin-left: 70px;">Nilai</label>
                            </div>
                        </div>
                        <div class="mt-2 col-12 row">
                            <div class="col-sm-5">
                                <select id="aspek0" name="aspek0"
                                    class="form-control aspek0 select2 @error('')  is-invalid  @enderror ">
                                    <option value="">--Cari Aspek--</option>
                                    {{-- @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->aspek_yang_dinilai }}</option>
                                    @endforeach --}}
                                </select>
                                @error('aspek0')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                                <div id="invalid_aspek" class="invalid-feedback d-none"></div>
                            </div>
                            <div class="mb-3 col-sm-3">
                                <input type="number" name="nilai[]" id="nilai_0"
                                    class="form-control @error('')  is-invalid  @enderror form-control">
                                <div id="invalid_nilai" class="invalid-feedback d-none"></div>
                            </div>

                            <div class="mb-2 col-12 row">
                                <label for="keterangan"  class="col-sm-5 col-form-label">Keterangan</label>
                                <div class="mb-3 col-sm-3"  style="margin-left: 15px;">
                                    <input type="text" name="keterangan[]" id="keterangan_0" class="form-control keterangan"
                                       readonly >
                                </div>
                            </div>
                            <div class="mb-2 col-12 row">
                                <label class="col-sm-3 col-form-label">Domain</label>
                                <div class="mb-3 col-6" style="margin-left: -0px;">
                                    <select name="domain0" id="domain0"
                                        class="form-control domain    @error('')  is-invalid  @enderror select2"
                                        disabled>
                                        <option value="">-- Domain --</option>
                                        {{-- <option value="pelaksanaan">Pelaksanaan</option>
                                        <option value="keterampilan">Keterampilan</option> --}}
                                    </select>
                                    <div id="invalid_domain" class="invalid-feedback d-none"></div>
                                </div>
                            </div>
                            <div class="mb-3 col-sm-4">
                                <button type="button" name="" id="add" class="btn btn-success">Add More</button>
                            </div>
                        </div>
                    </div>


                  @for ($i = 1; $i <= 50; $i++)
                  <div id="row{{$i}}" style="display:none;">
                    <div class="">
                        <div class="row">
                            <label class="" style="margin-left: 33px;">Aspek yang dinilai</label>
                            <label class="" style="margin-left: 70px;">Nilai</label>
                        </div>
                    </div>
                    @error('aspek{{$i}}')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                    <div class="mt-2 col-12 row">
                        <div class="col-sm-5">
                            <select id="aspek{{$i}}" name="aspek{{$i}}"
                                class="form-control aspek0 select2 @error('')  is-invalid  @enderror ">
                                <option value="">--Cari Aspek--</option>
                                {{-- @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->aspek_yang_dinilai }}</option>
                                @endforeach --}}
                            </select>
                            <div id="invalid_aspek" class="invalid-feedback d-none"></div>
                        </div>
                        <div class="mb-3 col-sm-3">
                            <input type="number" name="nilai[]" id="nilai_{{$i}}"
                                class="form-control @error('')  is-invalid  @enderror form-control">
                            <div id="invalid_nilai" class="invalid-feedback d-none"></div>
                        </div>
                        <div class="mb-3 col-sm-4">
                            <button type="button" name="remove" id="{{$i}}" class="btn btn-danger btn_remove">X</button>
                            </div>

                        <div class="mb-2 col-12 row">
                            <label for="keterangan"  class="col-sm-5 col-form-label">Keterangan</label>
                            <div class="mb-3 col-sm-3"  style="margin-left: 15px;">
                                <input type="text" name="keterangan[]" id="keterangan_{{$i}}" class="form-control keterangan"
                                   readonly >
                            </div>
                        </div>
                        <div class="mb-2 col-12 row">
                            <label class="col-sm-3 col-form-label">Domain</label>
                            <div class="mb-3 col-6" style="margin-left: -0px;">
                                <select name="domain{{$i}}" id="domain{{$i}}"
                                    class="form-control domain    @error('')  is-invalid  @enderror select2"
                                    disabled>
                                    <option value="">-- Domain --</option>
                                    {{-- <option value="pelaksanaan">Pelaksanaan</option>
                                    <option value="keterampilan">Keterampilan</option> --}}
                                </select>
                                <div id="invalid_domain" class="invalid-feedback d-none"></div>
                            </div>
                        </div>
                        <div class="mb-3 col-sm-4">
                            {{-- <button type="button" name="" id="add" class="btn btn-success">Add More</button> --}}
                        </div>
                    </div>
                </div>
                  @endfor
                </div>

            </div>


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
<input type="hidden" id="auth" value="{{Auth::user()->role}}">
<div class="card-body">
    <div class="modal-footer" style="">
        <div class="row" style="">
            <button id="cek_submit" type="submit" class="btn btn-success mr-3 text-white"><i class="fas fa-check"></i>
                submit</button>
            <a href="{{route('Siswanilai_prakerin.index')}}" type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>



@endsection
@push('script')
<script src="{{ asset('template') }}/node_modules/select2/dist/js/select2.full.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        var clicks = 0;
        $('#add').click(function () {
                var  a = clicks += 1;
                $('#row'+ a+'').show();
                console.log(a)

            // i++;

            // $('#dynamic_field').append(
            //     '<div id="row' + i + '">' +
            //     '<div class="">' +
            //     '<div class="row">' +
            //     '<label class="" style="margin-left: 33px;">Aspek yang dinilai</label>' +
            //     '<label class="" style="margin-left: 70px;">Nilai</label>' +
            //     '</div>' +
            //     '</div>' +
            //     '<div class="mt-2 col-12 row" >' +
            //     '<div class="col-sm-5"">' +
            //     '<select id="aspek'+i+'" name="aspek'+i+'" class="form-control aspek'+i+' select2 @error('
            //     ')  is-invalid  @enderror ">' +
            //     '<option value="">--Cari Aspek--</option>' +
            //     '<option value="1">intensif</option>' +
            //     '</select>' +
            //     '</div>' +
            //     '<div class="mb-3 col-sm-3">' +
            //     '<input type="number" name="nilai[]" id="nilai_' + i + '" class="form-control @error('
            //     ')  is-invalid  @enderror form-control">' +
            //     '</div>' +
            //     '<div class="mb-3 col-sm-4">' +
            //     '<button type="button" name="remove" id="' + i +
            //     '" class="btn btn-danger btn_remove">X</button>' +
            //     '</div>' +
            //     '<div class="mb-2 col-12 row">' +
            //     '<label for="" class="col-sm-5 col-form-label">Keterangan</label>' +
            //     '<div class="mb-3 col-sm-3" style="margin-left: 15px;">' +
            //     '<input type="number" name="keterangan[]" id="keterangan_' + i +
            //     '" class="form-control" disabled>' +
            //     '</div>' +
            //     '</div>' +
            //     '<div class="mb-2 col-12 row">' +
            //     '<label class="col-sm-3 col-form-label">Domain</label>' +
            //     '<div class="mb-3 col-6" style="margin-left: -0px;">' +
            //     '<select name="domain'+i+'" id="domain'+i+'" class="form-control domain    @error('')  is-invalid  @enderror select2" disabled>' +
            //     '<option value="">-- Domain--</option>' +
            //     // '<option value="pelaksanaan">Pelaksanaan</option>' +
            //     // '<option value="keterampilan">Keterampilan</option>' +
            //     '</select>' +
            //     '<div id="invalid_domain" class="invalid-feedback d-none"></div>'+
            //     '</div>' +
            //     '</div>' +
            //     '</div>' +
            //     '</div>'
            // );

        });

        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            //jika true /hide maka  buat isi yang ada di dalem row value = "" /
            if ($('#row' + button_id + '').hide()) {
                $('#aspek'+button_id + '').val("");
                $('#nilai_'+button_id + '').val("");
                $('#keterangan_'+button_id + '').val("");
                $('#domain'+button_id + '').val("");

            }


        });


        // $('#cek_submit').on('click', function (e) {
        //     event.preventDefault();
        //                  var siswa = $('#siswa').val();
        //                  var jurusan = $('#jurusan').val();

        //                  var aspek0 = $("#aspek0").val();
        //                  var nilai0 = $("#nilai_0").val();
        //                  var domain0 = $("#domain0").val();
        //                  if ( aspek0 == '' || nilai0 == '' || domain0 == '') {
        //                  // option
        //                     // let showRow  =  $('#row0').show();

        //                         //  if (showRow) {
        //                               if (aspek0 == '') {
        //                                   $('#aspek0').addClass('is-invalid');
        //                                   $('#invalid_aspek').html('aspek tidak boleh kosong').removeClass('d-none');
        //                               } else {
        //                                   $('#invalid_aspek').addClass('d-none');
        //                                   $('#aspek0').removeClass('is-invalid');

        //                               }

        //                               if (nilai0 == '') {
        //                                   $('#nilai_0').addClass('is-invalid');
        //                                   $('#invalid_nilai').html('nilai tidak boleh kosong').removeClass('d-none');
        //                               } else {
        //                                   $('#invalid_nilai').addClass('d-none');
        //                                   $('#nilai_0').removeClass('is-invalid');

        //                               }

        //                               if (domain0 == '') {
        //                                   $('#domain0').addClass('is-invalid');
        //                                   $('#invalid_domain').html('domain tidak boleh kosong').removeClass('d-none');
        //                               } else {
        //                                   $('#invalid_domain').addClass('d-none');
        //                                   $('#domain0').removeClass('is-invalid');

        //                               }
        //                         //  }

        //                      } else {

        //                      }

        // });

        var titles = [];
        $('option[name^=aspek0]').each(function () {
            titles.push($(this).val());
        });
        $('option[name^=aspek1]').each(function () {
            titles.push($(this).val());
        });

        console.log(titles,'title');
        // console.log()
        for (let i = 0; i <= 10; i++) {
            $('#nilai_' + i).keyup(function (e) {
                nilai = $('#nilai_' + i).val();
                console.log(nilai);
                if (nilai > 80.60) {
                    $('#keterangan_' + i).val('A');
                } else
                if (nilai > 70.10 && nilai < 80.59) {
                    $('#keterangan_' + i).val('B');
                } else
                if (nilai >= 60 && nilai < 70.09) {
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

let role = $('#auth').val();

               for (let index = 0; index <= 50; index++) {
                  $('#jurusan').change(function (e) {
                      $('.aspek'+index+'').empty().append();

                      id = $(this).val();
                      if (id) {
                          $('.aspek'+index+'').append('<option>-- Mencari.. --</option>')
                      } else {
                          $('.aspek'+index+'').append('<option>-- Pilih Aspek --</option>')
                      }
                      console.log(id);
                      $.ajax({
                          url: '/siswa/nilai_prakerin/option/tambah_1/ajax/' + id,
                          method: 'get',
                          success: function (response) {
                              console.log(response);
                              //console.log(response.kategori);
                              $('.aspek'+index+'').empty().append();
                              if (response.kategori != null) {
                                  $('.aspek'+index+'').append('<option value="">-- Pilih Aspek --</option>')
                                  response.kategori.forEach(element => {
                                      if (element) {
                                          $('.aspek'+index+'').append('<option value="' + element.id +
                                              '" >' + element.aspek_yang_dinilai +
                                              '</option>')
                                      } else {
                                          $('.aspek'+index+'').append(
                                              '<option>Aspek kategori kosong</option>')
                                      }
                                  });
                              } else {
                                  $('.aspek'+index+'').append('<option>Kategori kosong</option>')
                              }
                          },
                          fail: function (erorr) {
                              $('.aspek'+index+'').append('<option>-- Pilih Aspek --</option>')
                          }
                      });
                  })
                 }
                  // gua pengen ambil id nya nur tapi bingung gw kalo multi slect gmna
                  // gua makan dulu nur

                  // $('select[name="aspek0"]').change(function (e) {
                  //     id = $(this).val();
                  //     console.log('berubah',id);
                  //     if (id ) {
                  //         $('#domain').append('<option>-- Mencari.. --</option>')
                  //     } else {
                  //         $('#domain').append('<option>-- Domain --</option>')
                  //     }
                  //     $.ajax({
                  //         url: '/siswa/nilai_prakerin/option/tambah_2/ajax/' + id,
                  //         method: 'get',
                  //         success: function (response) {
                  //             console.log(response);
                  //             $('#domain').empty().append();
                  //             $('#domain').append('<option value="' + response.kategori.id +
                  //                 '" selected>' + response.kategori.domain + '</option>')
                  //         },
                  //         fail: function (erorr) {
                  //         $('#domain').append('<option>-- Domain --</option>')
                  //         }
                  //     });
                  // })

                  for (let x = 0; x <= 50; x++) {
                      // const element = array[index];

                  $('select[name="aspek'+x+'"]').change(function (e) {
                      id = $(this).val();
                      console.log('berubah',id);
                      if (id ) {
                          $('#domain'+x+'').append('<option>-- Mencari.. --</option>')
                      } else {
                          $('#domain'+x+'').append('<option>-- Domain --</option>')
                      }
                      $.ajax({
                          url: '/siswa/nilai_prakerin/option/tambah_2/ajax/' + id,
                          method: 'get',
                          success: function (response) {
                              console.log(response);
                              $('#domain'+x+'').empty().append();
                              $('#domain'+x+'').append('<option value="' + response.kategori.id +
                                  '" selected>' + response.kategori.domain + '</option>')
                          },
                          fail: function (erorr) {
                          $('#domain'+x+'').append('<option>-- Domain --</option>')
                          }
                      });
                  })
                  }




    });

</script>
@endpush
