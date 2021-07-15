@extends('template.master')
@push('link')
<style>
    .mtop{
        margin-top: -10px;
    }
    .pleft{
        padding-left: 15px;
    }
    .garis{
        height: 10px;
        width: auto;
        background-color: rgb(82, 82, 255);
    }
    .title{
        padding-top: 10px;
    }
    h5{
        color: rgb(82, 82, 255);
    }
    .title i{
        font-size: 20px;
        margin-left: 5px;
        margin-right: 5px;
    }
</style>
@endpush
@section('title','Prakerin | Detail Tamatan Penelusuran')
@section('judul','Detail Tamatan Penelusuran')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> TAMATAN PENELUSURAN</div>
@endsection
@section('main')
<div style="">
    <div class="garis" style="width: 50%; margin: 0px auto;"></div>
    <div class="card-header" style="width: 50%; margin: 0px auto;">
        <h5 class="title"><i class="far fa-address-card"></i> Informasi Data Siswa Alumni</h5>
    </div>
    <div class="card" style="width: 50%; margin: 0px auto;">
    <div class="row">
        <div class="col-sm-8 mt-4">
            <div class="card-body" id="dataguru">
                <h5 class="card-title mb-4" style="margin-top: -20px;">Data Siswa Alumni</h5>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Nama</label>
                    <label class="form-label">: {{ $pen->alumni_siswa->nama }}</label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Kelas</label>
                    <label class="form-label">: {{ $pen->alumni_siswa->kelas }}</label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Jurusan</label>
                    <label class="form-label">: {{ $pen->alumni_siswa->jurusan }}</label>
                  </div>
                  <div class="row g-3 align-items-center">
                    <label class="form-label col-7 pleft">Lulus Tahun</label>
                    <label class="form-label">: {{ $pen->alumni_siswa->tahun_lulus }} </label>
                  </div>
                  <div class="row g-3 align-items-center mb-3">
                    <label class="form-label col-7 pleft">Status</label>
                    <label class="form-label">: {{ $pen->status }}</label>
                    <select id="status" class="col-5 form-control form-control-sm form-control-plaintext">
                        <option value="">Lihat Status</option>
                        <option value="bekerja">Bekerja</option>
                        <option value="wirausaha">Wirausaha</option>
                        <option value="kuliah">Kuliah</option>
                        <option value="bekerja&kuliah">Bekerja & Kuliah</option>
                        <option value="wirausaha&kuliah">Wirausaha & Kuliah</option>
                    </select>
                  </div>
                  <div class="" id="bekerja" hidden>
                    <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Nama Perusahaan</label>
                        <label class="form-label">: </label>
                    </div>
                    <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Alamat Perusahaan</label>
                        <label class="form-label">: </label>
                    </div>
                    <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Tahun Kuliah</label>
                        <label class="form-label">: </label>
                    </div>
                  </div>
                  <div class="" id="wirausaha" hidden>
                    <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Nama Kampus</label>
                        <label class="form-label">: </label>
                    </div>
                    <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Alamat Kampus</label>
                        <label class="form-label">: </label>
                    </div>
                    <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Tahun Masuk</label>
                        <label class="form-label">: </label>
                    </div>
                  </div>
                  <div class="" id="kuliah" hidden>
                    <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Nama Brand</label>
                        <label class="form-label">: </label>
                    </div>
                    <div class="row g-3 align-items-center">
                        <label class="form-label col-7 pleft">Nama Usaha</label>
                        <label class="form-label">: </label>
                    </div>
                  </div>
                  {{-- make if else + isinya ya wal --}}
                  <div style="margin-top: 40px; margin-bottom:40px;">
                    <a href="" type="button" class="btn btn-danger "><i class="fas fa-backspace"></i>   Kembali</a>
                  </div>
            </div>
    </div>
    </div>



</div>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
$(window).load(function(){
        $("#status").change(function() {
			console.log($("#status option:selected").val());
			if ($("#status option:selected").val() == '') {
				$('#bekerja').prop('hidden', 'true');
				$('#wirausaha').prop('hidden', 'true');
				$('#kuliah').prop('hidden', 'true');
			} else if ($("#status option:selected").val() == 'bekerja') {
				$('#bekerja').prop('hidden', false);
                $('#wirausaha').prop('hidden', 'true');
				$('#kuliah').prop('hidden', 'true');
			} else if ($("#status option:selected").val() == 'wirausaha') {
				$('#bekerja').prop('hidden', 'true');
                $('#wirausaha').prop('hidden', false);
				$('#kuliah').prop('hidden', 'true');
			} else if ($("#status option:selected").val() == 'kuliah') {
				$('#bekerja').prop('hidden', 'true');
                $('#wirausaha').prop('hidden', 'true');
				$('#kuliah').prop('hidden', false);
			} else if ($("#status option:selected").val() == 'bekerja&kuliah') {
				$('#bekerja').prop('hidden', false);
                $('#wirausaha').prop('hidden', 'true');
				$('#kuliah').prop('hidden', false);
			} else if ($("#status option:selected").val() == 'wirausaha&kuliah') {
				$('#bekerja').prop('hidden', 'true');
                $('#wirausaha').prop('hidden', false);
				$('#kuliah').prop('hidden', false);
			}
		});
});
</script>
@endpush
