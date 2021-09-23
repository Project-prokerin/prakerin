@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('template/') }}/node_modules/select2/dist/css/select2.min.css">

    <style>
        #inputState {
            width: 300px;
            height: 40px;
        }

        .card {
            height: auto;
        }

        .kanan {
            margin-left: 40x;
        }

        .btn-info,
        .remove_field{
            margin-top: 30px;
            margin-left: 30px;
        }

    </style>
@endpush
@section('title', 'Prakerin | Kelompok Prakerin')
@section('judul', 'KELOMPOK PRAKERIN')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i> DATA PERUSAHAAN</div>
@endsection
@section('main')



<div class="card">
    <div class="card-header">
        @if (Auth::user()->role === 'siswa')
        <h4>Ajukan Kelompok</h4>

        @else

        <h4>Tambah Kelompok</h4>

        @endif
    </div>
    <div class="card-body">
        <form action="{{ route('kelompok.post') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-7">
                    <div class="row">
                            <div class="form-group col-6">
                                <label class="d-block">Nomor Kelompok</label>
                                <select class="form-control select2 @error('no')  is-invalid  @enderror" name="no" id="">
                                    <option value="">--Pilih Nomor--</option>

                              @foreach ($noKelompok as $item)
                                  <option value="{{$item}}">{{$item}}</option>
                              @endforeach


                                </select>
                                @error('no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        <div class="form-group col-6">
                            <label class="d-block">Nama Guru</label>
                            <select class="form-control select2 @error('id_guru')  is-invalid  @enderror" name="id_guru" id="">
                                <option value="">--Cari Guru--</option>
                                @foreach ($guru as $key => $guruu)
                                    <option value="{{ $guruu->id }}" {{ old('id_guru') == $guruu ? 'selected' : '' }}>
                                        {{ $guruu->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_guru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="d-block">Nama Perusahaan</label>
                            <select id="id_perusahaan" name="id_perusahaan"
                                class="form-control   @error('id_perusahaan')  is-invalid  @enderror select2">
                                <option value="">--Cari Perusahaan--</option>
                                @foreach ($perusahaan as $perusahaann)
                                    <option value="{{ $perusahaann->id }}">{{ $perusahaann->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_perusahaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="d-block">No Telephone</label>
                            <input class="form-control @error('no_telpon')  is-invalid  @enderror" type="number"
                                name="no_telpon" placeholder="no tlp" aria-label="default input example">
                            @error('no_telpon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success ml-3" style="margin-top:20px;"><i class="fas fa-check"></i> submit</button>
                    @if (Auth::user()->role == 'siswa')
                    <a href="{{ route('user.kelompok_laporan') }}" type="submit" class="btn btn-danger"style="margin-top:20px;">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    @else
                    <a href="{{ route('kelompok.index') }}" type="submit" class="btn btn-danger"style="margin-top:20px;">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    @endif
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label class="d-block">Siswa</label>
                        <div class="table-responsive">
                            <table class="table" id="dynamic_field">
                                     <tr>
                                      <td class="col-7">
                                        <select class="form-control select2 @error('id_siswa0')  is-invalid  @enderror" name="id_siswa0" id="">
                                            <option value="">--Cari Siswa--</option>
                                            {{-- {{ dd($siswa) }} --}}
                                            @forelse ($siswa as $item)
                                              {{-- @if (Auth::user()->role === 'siswa')
                                               <option value="{{ Auth::user()->siswa->id }}" selected>{{ Auth::user()->siswa->nama_siswa }}</option>
                                              @endif --}}
                                              @if (Auth::user()->role === 'siswa')
                                                  @if (Auth::user()->siswa->nama_siswa === $item->nama_siswa)
                                                      <option value="{{ $item->id }}" selected >{{ $item->nama_siswa }}</option>
                                                  {{-- @else  --}}
                                                  {{-- <option value="{{ $item->id }}" disabled>{{ $item->nama_siswa }}</option> --}}
                                                  @endif

                                              @else
                                                      @if (empty($item->kelompok_laporan))
                                                          <option value="{{ $item->id }}">{{ $item->nama_siswa }}</option>
                                                      @endif


                                              @endif

                                              @empty
                                                  <option disabled>Semua Siswa telah mendapat kelompok!</option>
                                              @endforelse

                                        </select>
                                        {{-- <select class="form-control select2 @error('id_siswa')  is-invalid  @enderror" name="id_siswa0" id="id_siswa">
                                        </select> --}}


                                            {{-- @if ($errors->has(`id_siswa.2`))
                                                <span class="text-danger">
                                                    <small>
                                                        {{ $errors->first('id_siswa.2') }}
                                                    </small>
                                                </span>
                                            @endif --}}

                                      </td>
                                      <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>

                                    </tr>
                                 @for ($i = 1; $i <= 40; $i++)
                                        @if (Auth::user()->role === "siswa")
                                        <tr id="row{{$i}}" style="display: none;">
                                            <td class="col-7" >
                                                <select class="form-control select2 @error('id_siswa{{$i}}')  is-invalid  @enderror" name="id_siswa{{$i}}" id="">
                                                    <option value="">--Cari Siswa--</option>
                                                    {{-- {{ dd($siswa) }} --}}
                                                    @forelse ($siswa as $item)
                                                            @if (Auth::user()->siswa->nama_siswa === $item->nama_siswa)

                                                            @else

                                                                @if (empty($item->kelompok_laporan))
                                                                    <option value="{{ $item->id }}">{{ $item->nama_siswa }}</option>
                                                                @endif
                                                            @endif




                                                      @empty
                                                          <option disabled>Semua Siswa telah mendapat kelompok!</option>
                                                      @endforelse

                                                </select>


                                                    {{-- @if ($errors->has(`id_siswa.2`))
                                                        <span class="text-danger">
                                                            <small>
                                                                {{ $errors->first('id_siswa.2') }}
                                                            </small>
                                                        </span>
                                                    @endif --}}

                                              </td>

                                              </td>
                                              <td>
                                                 <button type="button" name="remove" id="{{$i}}" class="btn btn-danger btn_remove">X</button>

                                                  {{-- <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button> --}}
                                                </td>

                                           </tr>
                                        @else

                                        <tr id="row{{$i}}" style="display: none;">
                                            <td class="col-7" >
                                                <select class="form-control select2 @error('id_siswa{{$i}}')  is-invalid  @enderror" name="id_siswa{{$i}}" id="">
                                                    <option value="">--Cari Siswa--</option>
                                                    {{-- {{ dd($siswa) }} --}}
                                                    @forelse ($siswa as $item)


                                                                @if (empty($item->kelompok_laporan))
                                                                    <option value="{{ $item->id }}">{{ $item->nama_siswa }}</option>
                                                                @endif




                                                      @empty
                                                          <option disabled>Semua Siswa telah mendapat kelompok!</option>
                                                      @endforelse

                                                </select>


                                                    {{-- @if ($errors->has(`id_siswa.2`))
                                                        <span class="text-danger">
                                                            <small>
                                                                {{ $errors->first('id_siswa.2') }}
                                                            </small>
                                                        </span>
                                                    @endif --}}

                                              </td>

                                              </td>
                                              <td>
                                                 <button type="button" name="remove" id="{{$i}}" class="btn btn-danger btn_remove">X</button>

                                                  {{-- <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button> --}}
                                                </td>

                                           </tr>
                                        @endif
                                    @endfor
                            </table>
                       </div>
                   </div>
                </div>
            </div>
            {{-- <button type="submit" class="btn btn-success ml-3" style="margin-top:20px;"><i class="fas fa-check"></i> submit</button>
            <a href="{{ route('kelompok.index') }}" type="submit" class="btn btn-danger"style="margin-top:20px;">
                <i class="fas fa-times"></i> Cancel
            </a> --}}
        </form>
    </div>
</div>
@endsection
@push('script')
<script src="{{ asset('template') }}/node_modules/select2/dist/js/select2.full.min.js"></script>

<script>
    //       $(document).ready(function () {
    //             $('#id_perusahaan').on('change', function () {
    //             let id = $(this).val();
    //             $('.prakerin').empty();
    //             $('.prakerin').append(`<option value="0" disabled selected>Mencari...</option>`).show('slow');
    //             $.ajax({
    //             type: 'GET',
    //             url: 'fetch/' + id,
    //             success: function (response) {
    //             var response = JSON.parse(response);
    //             console.log(response);
    //             $('.prakerin').empty();
    //             $('.prakerin').append(`<option value="0" disabled selected>--Cari Siswa--</option>`);
    //             response.forEach(element => {
    //                 $('.prakerin').append(`<option value="${element.id}">${element.nama}</option>`);
    //                 });
    //             }
    //         });
    //     });
    // });




        $(document).ready(function(){
                    var clicks = 0;
                $('#add').click(function () {
                        var  a = clicks += 1;
                        $('#row'+ a+'').show();
                        console.log(a)
                    });



                    $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            //jika true /hide maka  buat isi yang ada di dalem row value = "" /
            if ($('#row' + button_id + '').hide()) {
                $('#id_siswa'+button_id + '').val("");

            }


        });


        });

    </script>
@endpush
