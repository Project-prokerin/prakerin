<form action="{{ route('admin.surat_keluar.setujui', $surat_keluar->id) }}" method="POST" id="tandatangan_form">
    @method('PUT')
    @csrf


    <div class="row mt-3">
        <div class="card">
            <div class="card-header">
                <h4>Acc Magang</h4>
            </div>
            <div class="card-body">


                <div class="mb-3">
                    <label class="form-label">Tanggal </label>
                    <div class="d-flex">
                        <i class="far fa-calendar-times border text-center"></i>
                        <input type="text" class="form-control @error('tanggal')
                                        is-invalid
                    @enderror" name="tanggal" placeholder="xxxx-xx-xx s.d. xxxx-xx-xx "
                            value="">
                    </div>
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>





            </div>


        </div>
    </div>

    </div>
    </div>
