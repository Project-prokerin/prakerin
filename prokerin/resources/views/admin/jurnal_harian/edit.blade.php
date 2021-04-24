    <form action="{{ route('jurnalH.update',$jurnalH->id) }}" method="POST" id="edit_form">
        @method('PUT')
    @csrf

    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="/admin/jurnalH">
                <div class="card-body">
                    <h5 class="card-title mb-5">Jurnal Harian</h5>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>
                                    <h6>Siswa Prakerin</h6>
                                </label>

                                <div class="input-group in-jurnal">
                                    <div class="input-group-prepend">
                                    </div>
                                    <select name="id_siswa" class="form-control id_siswa    select2"
                                        id="id_siswa">
                                        <option value="{{$jurnalH->id_siswa}}" selected> {{$jurnalH->siswa->nama_siswa}}</option>

                                        @foreach ($data_prakerin as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- tgl pelaksanaan --}}
                        <div class="col-sm-12">

                            <div class="form-group">
                                <label>
                                    <h6>Tanggal Pelaksanaan</h6>
                                </label>
                                <div class="input-group in-jurnal">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                    </div>
                                    <input type="date" name="tanggal" value="{{ \Carbon\Carbon::parse($jurnalH->tanggal)->toDateString()}}" id="tanggal"class="form-control daterange-cus ">
                                </div>
                            </div>
                        </div>
                        {{-- tgl pelaksanaan --}}
                    </div>
                    <div class="row">
                        {{-- jam masuk --}}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>
                                    <h6>Jam Masuk</h6>
                                </label>
                                <div class="input-group in-jurnal">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                    <input type="time" value="{{\Carbon\Carbon::parse($jurnalH->datang)->toTimeString()}}" name="datang" id="datang"
                                        class="form-control timepicker ">
                                </div>
                            </div>
                        </div>
                        {{-- jam masuk --}}

                        {{-- jam pulang --}}
                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>
                                    <h6>Jam Pulang</h6>
                                </label>
                                <div class="input-group in-jurnal">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                    <input type="time" value= "{{\Carbon\Carbon::parse($jurnalH->pulang)->toTimeString()}}" name="pulang" id="pulang"
                                        class="form-control timepicker">
                                </div>
                            </div>
                        </div>
                        {{-- jam pulang --}}
                    </div>

                    {{-- kegiatanharian --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>
                                    <h6>Kegiatan Harian</h6>
                                </label>
                                <div class="input-group in-jurnal">
                                    <div class="input-group-prepend">
                                    </div>
                                    <textarea id="kegiatan_harian" name="kegiatan_harian"
                                        class="form-control daterange-cus ">{{$jurnalH->kegiatan_harian}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- kegiatanharian --}}
                </div>
            </div>
        </div>
    </div>
  