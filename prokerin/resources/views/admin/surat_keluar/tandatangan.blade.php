<form action="{{ route('admin.surat_keluar.setujui', $surat_keluar->id) }}" method="POST" id="tandatangan_form">
    @method('PUT')
    @csrf


    <div class="row mt-3">
        <div class="card">
            <div class="card-header">
                <h4>Persetujuan Tanda-tangan (PTTD)</h4>
            </div>
            <div class="card-body">




                <div class="input-group" >
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-file-signature fa-lg"></i>
                        </div>
                    </div>
                    <select name="ttd" id="ttd" class="form-control  " >
                        <option value="" selected>Pilih Tanda-tangan</option>
                        @foreach ($tandatangan as $ttd)
                            <option value="{{ $ttd->id }}">{{ $ttd->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


        </div>
    </div>

    </div>
    </div>
