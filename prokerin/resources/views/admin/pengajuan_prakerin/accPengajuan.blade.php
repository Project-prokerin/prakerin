<form action="{{ route('pengajuan_prakerin.accmagang', $pengajuan->no) }}" method="POST" id="accmagang_form">
    @method('PUT')
    @csrf


    <div class="row mt-3">
        <div class="card">
            <div class="card-header">
                <h4>Acc Magang</h4>
            </div>
            <div class="card-body">
              

                <!-- <div class="input-group">
                    <label class="form-label">Tanggal Mulai s.d Selesai Magang </label>
                    <div class="d-flex">
                        <i class="far fa-calendar-times border text-center"style="width:20px;"></i>
                        <input type="text" class="form-control @error('tanggal') is-invalid @enderror" name="tgl_magang" placeholder="xxxx-xx-xx s.d. xxxx-xx-xx " value="">
                    </div>
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> -->

                <div class="mb-3">
                                <label class="form-label">Tanggal Mulai S.d Selesai Magang</label>
                                <div class="d-flex">
                                    <i class="far fa-calendar-times border text-center" style="padding:10px;"></i>
                                <input type="text" name="tgl_magang" class="form-control
                                @error('tanggal') is-invalid @enderror" placeholder="xxxx-xx-xx s.d. xxxx-xx-xx " value="">
                                </div>
                                @error('tanggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                    @enderror
                            </div>

                            <select name="tanda_tangan" id="tanda_tangan" class="form-control  ">
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


   

    <script type="text/javascript">
        $(function() {
        
          $('input[name="tgl_magang"]').daterangepicker({
              autoUpdateInput: false,
              locale: {
                  cancelLabel: 'Clear'
              }
          });
        
          $('input[name="tgl_magang"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD')  +  '  s.d.  '  +  picker.endDate.format('YYYY-MM-DD'));
          });
        
          $('input[name="tgl_magang"]').on('cancel.daterangepicker', function(ev, picker) {
              $(this).val('');
          });
        
        });
        </script>