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
@section('title', 'Prakerin | Data Perusahaan')
@section('judul', 'Pengajuan Prakerin')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i>  Surat Prakerin</div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i>  Pengajuan Prakerin</div>
@endsection
@section('main')




<div class="card">
    <div class="card-header">
      <h4>Tambah Pengajuan</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('pengajuan_prakerin.post') }}" method="POST">
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
                        {{-- <div class="form-group col-6">
                            <label class="d-block">No Telephone</label>
                            <input class="form-control @error('no_telpon')  is-invalid  @enderror" type="number"
                                name="no_telpon" placeholder="no tlp" aria-label="default input example">
                            @error('no_telpon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
                    </div>
                    <button type="submit" class="btn btn-success ml-3" style="margin-top:20px;"><i class="fas fa-check"></i> submit</button>
                    <a href="{{ route('pengajuan_prakerin.index') }}" type="submit" class="btn btn-danger"style="margin-top:20px;">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label class="d-block">Siswa</label>
                        <div class="table-responsive">
                            <table class="table" id="dynamic_field">
                                   <tr>
                                      <td class="col-7">
                                        <select name="id_data_prakerin0"
                                            class="form-control select2  prakerin @error('id_data_prakerin0')   is-invalid  @enderror ">
                                            <option value="">--Cari Siswa--</option>
                                            @forelse ($siswa as $item)
                                                @if (empty($item->data_prakrin))
                                                    <option value="{{ $item->id }}">{{ $item->nama_siswa }}</option>
                                                @endif
                                            @empty
                                                <option disabled>Semua Siswa telah melakukan Pengajuan!</option>
                                            @endforelse
                                        </select>

                                      </td>
                                      <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                    </tr>

                                    @for ($i = 1; $i <= 40; $i++)
                                          <tr id="row{{$i}}" style="display: none;" >
                                        <td class="col-7">
                                          <select name="id_data_prakerin{{$i}}"
                                              class="form-control select2  prakerin @error('id_data_prakerin{{$i}}')   is-invalid  @enderror ">
                                              <option value="">--Cari Siswa--</option>
                                              @forelse ($siswa as $item)
                                                  @if (empty($item->data_prakrin))
                                                      <option value="{{ $item->id }}">{{ $item->nama_siswa }}</option>
                                                  @endif
                                              @empty
                                                  <option disabled>Semua Siswa telah melakukan Pengajuan!</option>
                                              @endforelse
                                          </select>

                                        </td>
                                        <td>
                                            <button type="button" name="remove" id="{{$i}}" class="btn btn-danger btn_remove">X</button>
                                        </td>
                                    </tr>
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


    <script>



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
    <script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>
@endpush
