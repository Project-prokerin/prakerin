
<form action="{{route('export.kelompokPengajuan',$pengajuan->no)}}" method="POST" id="export_form">
    @csrf


    <div class="row mt-3">
        <div class="card">
            <div class="card-header">
                <h4>Customize Surat</h4>
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
                    <label class="form-label">No Surat</label>
                    <div class="d-flex">
                    <input type="text" id="no_surat" name="no_surat" class="form-control
                    @error('no_surat') is-invalid @enderror"  value="">
                    </div>
                    @error('no_surat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                        @enderror
                </div>


                @if($cekTgl->tgl_mulai == null && $cekTgl->tgl_selesai == null)
                <div class="mb-3">
                        <label class="form-label">Tanggal Mulai S.d Selesai Magang</label>
                        <div class="d-flex">
                            <i class="far fa-calendar-times border text-center" style="padding:10px;"></i>
                        <input type="text" id="tgl_magang" name="tgl_magang" class="form-control
                        @error('tanggal') is-invalid @enderror" placeholder="xxxx-xx-xx s.d. xxxx-xx-xx " value="">
                        </div>
                        @error('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                            @enderror
                    </div>
                @else
                <input type="hidden" id="tgl_magang" name="tgl_magang" class="form-control
                @error('tanggal') is-invalid @enderror" placeholder="xxxx-xx-xx s.d. xxxx-xx-xx " value="">

                   
                @endif
                <span id="showCustome" class="btn  badge-primary" style="border-radius: 20px;">Customize Pentandatangan</span>
                

<div id="custome" style="display: none;">
    <br>
    <br>
    <div class="mb-3">
        <label class="form-label">Nama tanda-tangan</label>
        <div class="d-flex">
        <input type="text" maxlength="30" id="nama_tandatangan" name="nama_tandatangan" class="form-control
        @error('nama_tandatangan') is-invalid @enderror" value='' >
        </div>
        @error('nama_tandatangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
            @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">NIK tanda-tangan</label>
        <div class="d-flex">
        <input type="number" id="nik_tandatangan" name="nik_tandatangan" class="form-control
        @error('nik_tandatangan') is-invalid @enderror" value='' >
        </div>
        @error('nik_tandatangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
            @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Jabatan tanda-tangan</label>
        <div class="d-flex">
        <input type="text" maxlength="30" id="jabatan_tandatangan" name="jabatan_tandatangan" class="form-control
        @error('jabatan_tandatangan') is-invalid @enderror" placeholder="contoh: Wakil SMK Taruna Bhakti" value='' >
        </div>
        @error('jabatan_tandatangan')
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


        $(document).ready(function(){

            $("#showCustome").click(function(){
    $("#custome").show();
    alert('Kosong kan jika tidak ada yang di Custome');
  });

//   if($('#yourID').css('display') == 'none')
//         {
//                         document.getElementById("nama_tandatangan").value = "";
//                         document.getElementById("nik_tandatangan").value = "";
//                         document.getElementById("jabatan_tandatangan").value = "";
//         }

         
});


        </script>





