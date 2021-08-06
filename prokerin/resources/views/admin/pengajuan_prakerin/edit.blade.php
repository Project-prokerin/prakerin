
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
            <h3>Edit  Pengajuan</h3>
        </div>

        <div class="container">
            <form action="{{ route('pengajuan_prakerin.update', $pengajuan_prakerin[0]->no) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="row mt-3 ml-4 ">
                    <div class="col-6  kanan">
                       

                        <!-- gru bimbing -->
                        <div class="form-group col-lg-10 ">
                            <label>Guru Pembimbing</label>
                            <select class="form-control  select2" name="id_guru" id="">
                                <option value="{{ $pengajuan_prakerin[0]->id_guru }}" selected>
                                    {{ $pengajuan_prakerin[0]->guru->nama }}</option>

                                @foreach ($guru as $guruu)
                                    <option value="{{ $guruu->id }}">{{ $guruu->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_guru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </select>
                        </div>
                       
                        @foreach ($pengajuan_prakerin as $peng)
                        <input class="form-control" type="hidden" value="{{ $peng->id }}" name="id[]"
                            placeholder="id tlp" aria-label="default input example">
                            <input class="form-control" type="hidden" value="{{ $peng->no }}" name="no[]"
                                placeholder="no tlp" aria-label="default input example">
                        @endforeach

                        <!-- perusahaan -->
                        <div class="form-group col-lg-10 ">
                            <label>Perusahaan</label>
                            <select  name="id_perusahaan"  id="perusahaan"
                                class="form-control   @error('id_perusahaan')  is-invalid  @enderror select2">
                                <option value="{{ $perusahaan_select->id }}" selected>
                                    {{ $pengajuan_prakerin[0]->nama_perusahaan }}</option>
                                @foreach ($perusahaan as $perusahaann)
                                    <option value="{{ $perusahaann->id }}">{{ $perusahaann->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_perusahaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- <div class="form-group col-lg-10 ">
                            <label for="">No telephon</label>
                            <input class="form-control" type="number" value="{{ $pengajuan_prakerin[0]->no_telpon }}"
                                name="no_telpon" placeholder="no tlp" aria-label="default input example">
                                
                        </div> --}}



                    </div>
                    <div class="col-6">
                        <label>Daftar Nama Siswa</label>
                        {{-- @foreach ($pengajuan_prakerin as $item)
                        <div class="form-group col-lg-12 ">
                            <select name="id_data_prakerin[]"
                                class="form-control  @error('id_data_prakerin')  is-invalid  @enderror select2">
                                <option value="">--Cari Siswa--</option>
                                <option value="{{ $item->id_data_prakerin }}" selected>
                                    {{ $item->data_prakerin->nama }}</option>
                                   @foreach ($data_prakerin as $item)
                                    @if (empty($item->pengajuan_prakerin))
                                        <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                        @endforeach --}}

                        <div class="table-responsive">
                            <table class="table" id="dynamic_field">
                                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>

                                <input type="text" hidden id="jumlah" value="{{count($pengajuan_prakerin)}}" >
                               @foreach ($pengajuan_prakerin as $item)
                                             <tr id="row{{$loop->iteration}}">
                                                 <td class="col-7">
                                                     <select name="id_data_prakerin[]"
                                                     class="form-control prakerin  @error('id_data_prakerin')  is-invalid  @enderror select2">
                                                     <option value="">--Cari Siswa--</option>
                                                     <option value="{{ $item->id_siswa }}" selected>
                                                         {{ $item->siswa->nama_siswa }}</option>
                                                        @foreach ($siswa as $item)
                                                         @if (empty($item->pengajuan_prakerin))
                                                             <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                                                         @endif
                                                     @endforeach
                                                 </select>
                                                 </td>
                                                 </td><td><button type="button" name="remove" id="{{$loop->iteration}}" class="btn btn-danger btn_remove">X</button></td></tr>

                                             </tr>
                                @endforeach

                                    
                            </table>
                       </div>



                       


                    

                        <button type="submit" class="btn btn-success ml-3"><i class="fas fa-check"></i> submit</button>
                        <a href="{{ route('pengajuan_prakerin.index') }}" type="submit" class="btn btn-danger"><i
                                class="fas fa-times"></i> Cancel</a>

                    </div>

                </div>
            </form>

        </div>








    @endsection
    @push('script')

    <script>

      
        
        
        
        
                $(document).ready(function(){
                     var i= $('#jumlah').val();
                     $('#add').click(function(){
                          i++;
                          $('#dynamic_field').append('<tr id="row'+i+'"><td>'+
                                                        '<select name="id_data_prakerin[]" class="form-control select2 prakerin @error('id_data_prakerin')  is-invalid  @enderror ">'+
                                                            '@forelse ($siswa as $item)'+
                                                                  '@if (empty($item->kelompok_laporan))'+
                                                                      '<option value="{{ $item->id }}">{{ $item->nama_siswa }}</option>'+
                                                                 '@endif'+
                                                                 '@empty'+
                                                                     '<option disabled>Semua Siswa telah mendapat kelompok!</option>'+
                                                            '@endforelse'+
                                                        '</select>'+
                                                           
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
