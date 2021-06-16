<form action="{{ route('admin.surat_keluar.setujui', $surat_keluar->id) }}" method="POST" id="tandatangan_form">
    @method('PUT')
    @csrf


    <div class="row mt-3">
        <div class="card">
            <div class="card-header">
                <h4>Persetujuan Tanda-tangan (PTTD)</h4>
            </div>
            <div class="card-body">




                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-file-signature fa-lg"></i>
                        </div>
                    </div>
                    <select name="ttd" id="ttd" class="form-control  ">
                        <option value="" selected>Pilih Tanda-tangan</option>
                        @foreach ($tandatangan as $ttd)
                            <option value="{{ $ttd->id }}">{{ $ttd->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">

                    <input hidden type="text" name="nama_surat" class="form-control"
                        value="{{ $isi_surat->nama_surat }}">

                </div>
                <div class="input-group">
                  <input hidden type="text" class="form-control" name="id_guru" value="{{ $isi_surat->id_guru }}">
                </div>


                <div class="input-group">
                    <input hidden type="text" class="form-control" name="alamat" value="{{ $isi_surat->alamat }}">
                    
                   
                </div>
                <div class="input-group">
                    <input hidden type="text" class="form-control" name="tempat" placeholder="tempat"
                        value="{{ $isi_surat->tempat }}">

                </div>
                <div class="input-group">
                    <input hidden type="text" class="form-control " name="tanggal"
                        placeholder="xxxx-xx-xx s.d. xxxx-xx-xx " value="{{ $isi_surat->tanggal }}">

                </div>
                <div class="input-group">
                    <input hidden type="text" class="form-control timepicker " name="pukul"
                        placeholder=" 00.00 WIB s.d Selesai" value="{{ $isi_surat->pukul }}">

                </div>





            </div>


        </div>
    </div>

    </div>
    </div>
