    @extends('template.master')
    @push('link')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('template/node_modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('template/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/node_modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/node_modules/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('template/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    @endpush
    @section('breadcrump')
            <h1 style="font-size: 20px;">Template table</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">{{ Auth::user()->role }}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('siswa.index') }}">siswa</a></div>
            <div class="breadcrumb-item">Tambah</a></div>
    @endsection
    @section('content')
<form action="/siswa/{{ $siswa->id }}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-primary mb-3">Submit</button>
    <a href="{{ route('siswa.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                    <div class="card-header">
                        <h4>Tambah siswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group  is-invalid ">
                        <label>Nama siswa</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror" value="{{ $siswa->nama_siswa }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>NIPD</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="nipd" class="form-control @error('nipd') is-invalid @enderror" value="{{ $siswa->nipd }}">
                        </div>
                        </div>
                    <div class="form-group @error('jk') is-invalid @enderror">
                        <label class="form-label">Jenis kelamin</label>
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="jk" value="L" class="selectgroup-input" {{ $siswa->jk == 'L' ? 'checked' : ''  }}>
                            <span class="selectgroup-button">L </span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="jk" value="P" class="selectgroup-input" {{ $siswa->jk == 'P' ? 'checked' : ''  }}>
                            <span class="selectgroup-button">P </span>
                            </label>
                        </div>
                        </div>
                        <div class="form-group">
                        <label>Tempat lahir</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-home"></i>
                            </div>
                            </div>
                            <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ $siswa->tempat_lahir }}" data-indicator="pwindicator">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>Tanggal lahir</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                            </div>
                            </div>
                            <input type="text" name="tanggal_lahir" class="form-control datepicker @error('tanggal_lahir') is-invalid @enderror" {{ $siswa->tanggal_lahir }} data-indicator="pwindicator">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>NIK</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ $siswa->nik }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>agama</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" value="{{ $siswa->agama }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>alamat</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"   value="{{ $siswa->alamat }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>jenis tinggal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="jenis_tinggal" class="form-control @error('jenis_tinggal') is-invalid @enderror" value="{{ $siswa->jenis_tinggal }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>Transportasi</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="transportasi" class="form-control @error('transportasi') is-invalid @enderror" value="{{ $siswa->transportasi }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>no hp</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ $siswa->no_hp }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $siswa->email }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>Berat badan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="number" name="bb" class="form-control @error('bb') is-invalid @enderror" value="{{ $siswa->bb }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>tinggi badan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="tb" class="form-control @error('tb') is-invalid @enderror" value="{{ $siswa->tb }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>anak ke</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="anak_ke" class="form-control @error('anak_ke') is-invalid @enderror" value="{{ $siswa->anak_ke }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>jumlah saudara</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="jmlh_saudara" class="form-control @error('jmlh_saudara') is-invalid @enderror" value="{{ $siswa->jmlh_saudara }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>kebutuhan khusus</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="kebutuhan_khusus" class="form-control @error('kebutuhan_khusus') is-invalid @enderror" value="{{ $siswa->kebutuhan_khusus }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>no akte</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="no_akte" class="form-control @error('no_akte') is-invalid @enderror" value="{{ $siswa->no_akte }}">
                        </div>
                        </div>
                    </div>
{{-- end siswa --}}
                    </div>
                </div>
{{-- {-- end siswa --}}
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                    <div class="card-header">
                        <h4>Orang tua siswa</h4>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                        <label>Nomor kartu keluarga</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="nomor_kk" class="form-control @error('nomor_kk') is-invalid @enderror"   value="{{ $orangtua->nomor_kk }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>Nomor ayah</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror"  value="{{ $orangtua->nama_ayah }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>Tanggal lahir ayah</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="tl_ayah" class="form-control datepicker @error('tl_ayah') is-invalid @enderror" value="{{ $orangtua->nama_ibu }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>pendidikan ayah</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="pendidikan_ayah" class="form-control @error('pendidikan_ayah') is-invalid @enderror" value="{{ $orangtua->pendidikan_ayah }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>pekerjaan ayah</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="pekerjaan_ayah" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" value="{{ $orangtua->pekerjaan_ayah }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>Penghasilan ayah</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="penghasilan_ayah" id="duit" class="form-control duit @error('penghasilan_ayah') is-invalid @enderror" value="{{ $orangtua->penghasilan_ayah }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>Nik ayah</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="nik_ayah" class="form-control @error('nik_ayah') is-invalid @enderror" value="{{ $orangtua->nik_ayah }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>Nama ibu</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" value="{{ $orangtua->nama_ibu }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>Tanggal lahir ibu</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="tl_ibu" class="form-control datepicker @error('tl_ibu') is-invalid @enderror" value="{{ $orangtua->tl_ibu }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>pendidikan ibu</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="pendidikan_ibu" class="form-control @error('pendidikan_ibu') is-invalid @enderror" value="{{ $orangtua->pendidikan_ibu }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>pekerjaan ibu</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="pekerjaan_ibu" class="form-control  @error('pekerjaan_ibu') is-invalid @enderror" value="{{ $orangtua->pekerjaan_ibu }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>penghasilan ibu</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="penghasilan_ibu" id="duit" class="form-control duit @error('penghasilan_ibu') is-invalid @enderror" value="{{ $orangtua->penghasilan_ibu }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label>nik ibu</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="number" name="nik_ibu" class="form-control @error('nik_ibu') is-invalid @enderror" value="{{ $orangtua->nik_ibu }}">
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Status</label>
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="status" value="Kandung" class="selectgroup-input" {{ $orangtua->status =='Kandung' ? 'checked' : '' }}>
                            <span class="selectgroup-button">Kandung </span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="status" value="Wali" class="selectgroup-input" {{ $orangtua->status == 'Wali' ? 'checked' : '' }}>
                            <span class="selectgroup-button">Wali </span>
                            </label>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="card">
                    <div class="card-header">
                        <h4>Asal sekolah</h4>
                    </div>
                    <div class="card-body">
                     <div class="form-group">
                        <label>Nomor ijazah</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="no_ijazah" class="form-control @error('no_ijazah') is-invalid @enderror" value="{{ $sekolah->no_ijazah   }}">
                        </div>
                        </div>
                         <div class="form-group">
                        <label>shukun</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="shkun" class="form-control  @error('shkun') is-invalid @enderror"  value="{{ $sekolah->shkun }}">
                        </div>
                        </div>
                         <div class="form-group">
                        <label>asal sekolah</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="asal_sekolah" class="form-control @error('asal_sekolah') is-invalid @enderror" value="{{ $sekolah->asal_sekolah }}">
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
    </form>

    @endsection
    @push('script')
    <script>
    $( ".duit" ).keyup(function() {
        var a = formatRupiah( $(this).val() , 'Rp. ');
        $(this).val(a);
    });
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    </script>
    <!-- JS Libraies -->
        <script src="{{ asset('template/node_modules/cleave.js/dist/cleave.min.js') }}"></script>
        <script src="{{ asset('template/node_modules/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
        <script src="{{ asset('template/node_modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
        <script src="{{ asset('template/node_modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('template/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('template/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('template/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('template/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('template/assets/js/page/forms-advanced-forms.js') }}"></script>
        <script src="{{ asset('template/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
    @endpush
