
                @extends('template.master')
                @push('link')
                <link rel="stylesheet" href="{{asset('template/')}}/node_modules/select2/dist/css/select2.min.css">

                    <style>
                        .container {
                            position: relative;
                        }

                    </style>
                @endpush
                @section('title', 'Prakerin | Data Prakerin')
                @section('judul', 'DATA PRAKERIN')
                @section('breadcrump')
                    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
                            DASBOARD</a></div>
                    <div class="breadcrumb-item"> <i class="fas fa-th"></i>>DATA PRAKERIN</div>
                @endsection
                @section('main')
                    <div class="card mt-5">

                        <div class="container">
                            <form action="{{route('data_prakerin.update',$dataPrakerin->id)}}" method="POST">
                                @method('PUT')
                                    @csrf

                                <div class="row mt-3 ml-4 ">
                                    <div class="col-6  kanan">
                                        <!-- perusa -->
                                        <div class="form-group col-lg-10">
                                            <label>Nama Perusahaan</label>
                                            <select name="id_perusahaan" class="form-control   @error('id_perusahaan')  is-invalid  @enderror select2">
                                                <option value="{{$dataPrakerin->id_perusahaan}}" selected> {{$dataPrakerin->perusahaan->nama}}</option>
                                                @foreach ($perusahaan as $perusahaann)
                                                <option value="{{$perusahaann->id}}" >{{$perusahaann->nama}}</option>
                                            @endforeach
                                            </select>
                                                @error('id_perusahaan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        </div>

                                        <!-- guru -->
                                        <div class="form-group col-lg-10">
                                            <label>Nama Guru</label>
                                            <select name="id_guru" class="form-control @error('id_guru')  is-invalid  @enderror  select2">
                                                <option value="{{$dataPrakerin->id_guru}}" selected>{{$dataPrakerin->guru->nama}}</option>
                                                @foreach ($guru as $guruu)
                                                <option value="{{$guruu->id}}" >{{$guruu->nama}}</option>
                                            @endforeach
                                            </select>
                                                @error('id_guru')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        </div>


                                        <!-- siswa -->
                                        <div class="form-group col-lg-10">
                                            <label>Nama Siswa</label>
                                            <select name="id_siswa" class="form-control  @error('id_siswa')  is-invalid  @enderror select2">
                                            <option  value="{{ $dataPrakerin->id_siswa }}" selected>{{ $dataPrakerin->siswa->nama_siswa }}</option>
                                            @foreach ($siswa as $item)
                                            <option value="{{$item->id}}" >{{$item->nama_siswa}}</option>
                                            @endforeach
                                            </select>
                                                @error('id_siswa')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        </div>


                                        <!-- kelas -->
                                        <div class="form-group col-lg-10 ">
                                            <label>kelas</label>
                                            <select name="kelas" class="form-control  @error('kelas')  is-invalid  @enderror select2" name=" jurusan" id="">
                                                <option value="X" {{(old('kelas') ?? $dataPrakerin->kelas) == 'X' ? 'selected' : ''}}>X </option>
                                                <option value="XI" {{(old('kelas') ?? $dataPrakerin->kelas) == 'XI' ? 'selected' : ''}}>XI </option>
                                                <option value="XII" {{(old('kelas') ?? $dataPrakerin->kelas) == 'XII' ? 'selected' : ''}}>XII </option>
                                            </select>
                                                @error('kelas')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <!-- jurusan -->
                                        <div class="form-group col-lg-10  mb-5">
                                            <label>Jurusan</label>
                                            <select name="jurusan" class="form-control select2 @error('jurusan')  is-invalid  @enderror"  name=" jurusan" id="">
                                                <option value="RPL" {{(old('jurusan') ?? $dataPrakerin->jurusan) == 'RPL' ? 'selected' : ''}}>Rekayasa Perangkat Lunak </option>
                                                <option value="TKJ" {{(old('jurusan') ?? $dataPrakerin->jurusan) == 'TKJ' ? 'selected' : ''}}>Teknik Komunikasi Jaringan </option>
                                                <option value="BC" {{(old('jurusan') ?? $dataPrakerin->jurusan) == 'BC' ? 'selected' : ''}}>Broadcasting </option>
                                                <option value="MM" {{(old('jurusan') ?? $dataPrakerin->jurusan) == 'MM' ? 'selected' : ''}}>Multimedia </option>
                                                <option value="TEI" {{(old('jurusan') ?? $dataPrakerin->jurusan) == 'TEI' ? 'selected' : ''}}>TeknikElektronikaIndustri </option>

                                            </select>
                                                @error('jurusan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        </div>




                                    </div>
                                    <div class="col-6">


                                        <div class="form-group">
                                            <label>Tanggal Mulai</label>
                                            <input type="date"  name="tgl_mulai" class="  @error('tgl_mulai')  is-invalid  @enderror form-control datepicker"  value="{{ \Carbon\Carbon::parse($dataPrakerin->tgl_mulai)->toDateString()}}">
                                                @error('tgl_mulai')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Selesai</label>
                                            <input type="date"  name="tgl_selesai" class=" @error('tgl_selesai')  is-invalid  @enderror form-control datepicker" value="{{ \Carbon\Carbon::parse($dataPrakerin->tgl_selesai)->toDateString()}}">
                                            @error('tgl_selesai')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                        </div>

                                        <button type="submit"  class="btn btn-success ml-3"><i class="fas fa-check"></i> Update</button>
                                        <a href="{{route('data_prakerin.index')}}" type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>

                                    </div>

                                </div>
                            </form>



                        </div>
                    @endsection
                    @push('script')
                    <script src="{{asset('template/')}}/node_modules/select2/dist/js/select2.full.min.js"></script>

                    @endpush


