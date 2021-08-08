
edit view kelompok
@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('template/') }}/node_modules/select2/dist/css/select2.min.css">

    <style>
        #inputState {
            width: 300px;
            height: 40px;
        }

        .card {
            height: 600px;
        }

        .kanan {
            margin-left: 40x;
        }

        .buton {
            margin-left: 900px;
        }

    </style>
@endpush
@section('title', 'Prakerin | Data Perusahaan')
@section('judul', 'DATA PERUSAHAAN')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i> DATA PERUSAHAAN</div>
@endsection
@section('main')

<div class="card mt-5">
    <div class="container text-center mt-5 mb-3 ml-1">
        <h3>Edit  Kelompok</h3>
    </div>

    <div class="container">
        <form action="{{ route('kelompok.update', $kelompok_laporan[0]->no) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="row mt-3 ml-4 ">
                <div class="col-6  kanan">
                  
                    <!-- gru bimbing -->
                    <div class="form-group col-lg-10 ">
                        <label>Guru Pembimbing</label>
                        <select class="form-control " name="id_guru" id="">
                            <option value="{{ $kelompok_laporan[0]->id_guru }}" selected>
                                {{ $kelompok_laporan[0]->guru->nama }}</option>

                            @foreach ($guru as $guruu)
                                <option value="{{ $guruu->id }}">{{ $guruu->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_guru')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </select>
                    </div>
                  
                    @foreach ($kelompok_laporan as $klmpk)
                    <input class="form-control" type="hidden" value="{{ $klmpk->id }}" name="id[]"
                        placeholder="id tlp" aria-label="default input example">
                        <input class="form-control" type="hidden" value="{{ $klmpk->no }}" name="no[]"
                            placeholder="no tlp" aria-label="default input example">
                    @endforeach

                    <!-- perusahaan -->
                    <div class="form-group col-lg-10 ">
                        <label>Perusahaan</label>
                        <select  name="id_perusahaan"  id="perusahaan"
                            class="form-control   @error('id_perusahaan')  is-invalid  @enderror select2">
                            <option value="{{ $perusahaan_select->id }}" selected>
                                {{ $kelompok_laporan[0]->nama_perusahaan }}</option>
                            @foreach ($perusahaan as $perusahaann)
                                @if ($perusahaann->id == $perusahaan_select->id)
    
                                @else
                                <option value="{{ $perusahaann->id }}">{{ $perusahaann->nama }}</option>
                                
                                @endif
                            @endforeach
                        </select>
                        @error('id_perusahaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group col-lg-10 ">
                            <label for="">No telephon</label>
                            <input class="form-control" type="number" value="{{ $kelompok_laporan[0]->no_telpon }}"
                                name="no_telpon" placeholder="no tlp" aria-label="default input example">
                                @error('no_telpon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       



                </div>
                <div class="col-6">
                    <label>Daftar Nama Siswa</label>
                    

                    <div class="table-responsive">
                        <table class="table" id="dynamic_field">
                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>

                            <input type="text" hidden id="jumlah" value="{{count($kelompok_laporan)}}" >
                           @foreach ($kelompok_laporan as $item)
                                         <tr id="row{{$loop->iteration}}">
                                             <td class="col-7">
                                                 <select name="id_siswa[]"
                                                 class="form-control prakerin  @error('id_siswa')  is-invalid  @enderror select2">
                                                 <option value="">--Cari Siswa--</option>
                                                 <option value="{{ $item->id_siswa }}" selected>
                                                     {{ $item->siswa->nama_siswa }}</option>
                                                    @foreach ($siswa as $item)
                                                    {{-- {{dd($siswa)}} --}}
                                                     {{-- @if (empty($item->kelompok_laporan)) --}}
                                                         <option value="{{ $item->id }}" >{{ $item->nama_siswa }}</option>
                                                     {{-- @endif --}}
                                                 @endforeach
                                             </select>
                                             </td>
                                             </td><td><button type="button" name="remove" id="{{$loop->iteration}}" class="btn btn-danger btn_remove">X</button></td></tr>

                                         </tr>
                            @endforeach

                                
                        </table>
                   </div>



                   


                

                    <button type="submit" class="btn btn-success ml-3"><i class="fas fa-check"></i> submit</button>
                    <a href="{{ route('kelompok.index') }}" type="submit" class="btn btn-danger"><i
                            class="fas fa-times"></i> Cancel</a>

                </div>

            </div>
        </form>

    </div>


   


    @endsection
    @push('script')
        <script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>

        <script>
            //  $(document).ready(function () {
            //             $('#perusahaan').on('change', function () {
            //             let id = $(this).val();
            //             $('.prakerin').empty();
            //             $('.prakerin').append(`<option value="0" disabled selected>Mencari...</option>`).show('slow');
            //             $.ajax({
            //             type: 'GET',
            //             url: '../fetch_edit/' + id,                        
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
                     var i= $('#jumlah').val();
                     $('#add').click(function(){
                          i++;
                          $('#dynamic_field').append('<tr id="row'+i+'"><td>'+
                                                        '<select name="id_siswa[]" class="form-control select2 prakerin @error('id_siswa')  is-invalid  @enderror ">'+
                                                            '<option value="">--Cari Siswa--</option>'+
                                                            '@forelse ($siswa as $item)'+
                                                                // '@if (empty($item->kelompok_laporan))'+
                                                                    '<option value="{{ $item->id }}">{{ $item->nama_siswa }}</option>'+
                                                                // '@endif'+
                                                            '@empty'+
                                                                '<option disabled>Semua Siswa telah mendapat kelompok!</option>'+
                                                            '@endforelse'+
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
                     });
        </script>

    @endpush
