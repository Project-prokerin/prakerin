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
      <h4>Tambah Kelompok</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('kelompok.post') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-7">
                    <div class="row">
                            <div class="form-group col-6">
                                <label class="d-block">No Telephone</label>
                                <input class="form-control @error('no_telpon')  is-invalid  @enderror" type="number"
                                    name="no_telpon" placeholder="no tlp" aria-label="default input example">
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
                    <a href="{{ route('kelompok.index') }}" type="submit" class="btn btn-danger"style="margin-top:20px;">
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
                                        <select id="id_data_prakerin" name="id_data_prakerin[]"
                                            class="form-control select2 prakerin  @error('id_data_prakerin')  is-invalid  @enderror ">
                                            {{-- <option value="">--Cari Siswa--</option>
                                            @forelse ($data_prakerin as $item)
                                                @if (empty($item->kelompok_laporan))
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endif
                                            @empty
                                                <option disabled>Semua Siswa telah mendapat kelompok!</option>
                                            @endforelse --}}
                                        </select>
                                            {{-- @if ($errors->has(`id_data_prakerin.2`))
                                                <span class="text-danger">
                                                    <small>
                                                        {{ $errors->first('id_data_prakerin.2') }}
                                                    </small>
                                                </span>
                                            @endif --}}
                                      </td>
                                      <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                    </tr>
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
          $(document).ready(function () {
                $('#id_perusahaan').on('change', function () {
                let id = $(this).val();
                $('.prakerin').empty();
                $('.prakerin').append(`<option value="0" disabled selected>Mencari...</option>`).show('slow');
                $.ajax({
                type: 'GET',
                url: 'fetch/' + id,
                success: function (response) {
                var response = JSON.parse(response);
                console.log(response);   
                $('.prakerin').empty();
                $('.prakerin').append(`<option value="0" disabled selected>--Cari Siswa--</option>`);
                response.forEach(element => {
                    $('.prakerin').append(`<option value="${element.id}">${element.nama}</option>`);
                    });
                }
            });
        });
    });


        $(document).ready(function(){
             var i=1;
             $('#add').click(function(){
                  i++;
                  $('#dynamic_field').append('<tr id="row'+i+'"><td>'+
                                                '<select id="id_data_prakerin" name="id_data_prakerin[]" class="form-control select2  prakerin @error('id_data_prakerin')  is-invalid  @enderror ">'+
                                                    // '<option value="">--Cari Siswa--</option>'+
                                                    // '@forelse ($data_prakerin as $item)'+
                                                    //     '@if (empty($item->kelompok_laporan))'+
                                                    //         '<option value="{{ $item->id }}">{{ $item->nama }}</option>'+
                                                    //     '@endif'+
                                                    // '@empty'+
                                                    //     '<option disabled>Semua Siswa telah mendapat kelompok!</option>'+
                                                    // '@endforelse'+
                                                '</select>'+
                                                    '@if ($errors->has(`id_data_prakerin.2`))'+
                                                        '<span class="text-danger">'+
                                                            '<small>'+
                                                                '{{ $errors->first('id_data_prakerin.2') }}'+
                                                            '</small>'+
                                                        '</span>'+
                                                    '@endif'+
                                            '</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

             });
             $(document).on('click', '.btn_remove', function(){
                  var button_id = $(this).attr("id");
                  $('#row'+button_id+'').remove();
             });
            //  $('#submit').click(function(){
            //       $.ajax({
            //            url:"",
            //            method:"POST",
            //            data:$('#add_name').serialize(),
            //            success:function(data)
            //            {
            //                 alert(data);
            //                 $('#add_name')[0].reset();
            //            }
            //       });
            //  });
        });

    </script>
    <script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>
@endpush
