@extends('template.master')
@push('link')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

@endpush
@section('title', 'Prakerin | Nilai Data Prakerin Siswa')
@section('judul', 'Nilai Data Prakerin Siswa ')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-newspaper"></i> NILAI PRAKERIN SISWA</div>
@endsection
@section('main')
<div class="card" style="">
    <div class="card-header">
        <h4 class="pt-2 card-title"><i class="fas fa-th"></i> Tambah Data Nilai Prakerin</h4>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf
            <div class="row mb-5">
                {{-- card col 1 --}}
                <div class="col-6">
                    @if (Auth::user()->role == 'admin' or Auth::user()->role == 'kaprog')
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Siswa</label>
                        <div class="mb-3 col-8">
                            <select name="" class="form-control   @error('')  is-invalid  @enderror select2">
                                <option value="">--Cari Siswa--</option>
                                <option value="1">Siswa 1</option>
                                <option value="2">Siswa 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Jurusan</label>
                        <div class="mb-3 col-8">
                            <select name="" class="form-control   @error('')  is-invalid  @enderror select2">
                                <option value="">--Pilih Jurusan--</option>
                                <option value="rpl">Rekayasa Perangkat Lunak</option>
                                <option value="mm">Multimedia</option>
                            </select>
                        </div>
                    </div>
                    @endif
                    @if (Auth::user()->role == 'hubin')
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Kelompok</label>
                        <div class="mb-3 col-8">
                            <select name="" class="form-control   @error('')  is-invalid  @enderror select2">
                                <option value="">--Cari Kelompok--</option>
                                <option value="1">Kelompok 1</option>
                                <option value="2">Kelompok 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Jurusan</label>
                        <div class="mb-3 col-8">
                            <select name="" class="form-control   @error('')  is-invalid  @enderror select2">
                                <option value="">--Pilih Jurusan--</option>
                                <option value="rpl">Rekayasa Perangkat Lunak</option>
                                <option value="mm">Multimedia</option>
                            </select>
                        </div>
                    </div>
                    @endif
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Aspek Yang Dinilai</label>
                        <div class="mb-3 col-8">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    @if (Auth::user()->role == 'hubin' or Auth::user()->role == 'kaprog')
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Nilai</label>
                        <div class="mb-3 col-sm-3">
                            <input type="number" name="" id="nilai" class="form-control-sm @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                        </div>
                    </div>
                    @endif

                    @if (Auth::user()->role == 'siswa' or Auth::user()->role == 'admin')
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Nilai</label>
                        <div class="mb-3 col-sm-3">
                            <input type="number" name="" id="nilai" class="form-control-sm @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" >
                        </div>
                    </div>
                    @endif
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="mb-3 col-sm-3">
                            <input type="text" name="" id="keterangan" class="form-control-sm @error('')  is-invalid  @enderror form-control" value="{{ old('') }}" disabled>
                        </div>
                    </div>
                    <div class="mb-2 col-12 row">
                        <label for="" class="col-sm-4 col-form-label">Domain</label>
                        <div class="mb-3 col-8">
                            <select name="" class="form-control   @error('')  is-invalid  @enderror select2">
                                <option value="">--Pilih Domain--</option>
                                <option value="pelaksanaan">Pelaksanaan</option>
                                <option value="keterampilan">Keterampilan</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- card col 2 --}}
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                <div class="">
                                    <h6 class="mb-3">Konversi Keterangan Nilai :</h6>
                                </div>
                                <table class="ml-5 table-sm table-bordered">
                                    <thead class="text-center">
                                    <tr>
                                        <th scope="col" colspan="2" style="width: 300px;">Keterangan</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <th style="width: 10px;">Angka</th>
                                            <th style="width: 10px;">Huruf</th>
                                        </tr>
                                        <tr>
                                            <td>8.6 - 10.00</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>7.10 - 8.59</td>
                                            <td>B</td>
                                        </tr>
                                        <tr>
                                            <td>6.0 - 7.09</td>
                                            <td>C</td>
                                        </tr>
                                        <tr>
                                            <td>< 6.00</td>
                                            <td>D</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-4">
                        <div class="row" style="">
                            <button type="submit" class="btn btn-success mr-3"><i class="fas fa-check"></i> submit</button>
                            <a href="" type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection
@push('script')
<script>
    $(document).ready(function () {

        $('#nilai').keyup(function (e) {
        nilai = $('#nilai').val();
        console.log(nilai);
        if(nilai > 8.60)
        {
            $('#keterangan').val('A');
        }else
        if(nilai > 7.10 && nilai < 8.59){
            $('#keterangan').val('B');
        }
        else
        if (nilai > 6 && nilai < 7.09)  {
            $('#keterangan').val('C');
        }else
        if (nilai < 6) {
            $('#keterangan').val('D');
        }else{
             $('#keterangan').val('');
        }
        })

    })
</script>
@endpush
