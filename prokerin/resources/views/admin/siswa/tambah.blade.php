@extends('template.master')
@push('link')
<style>
     .card-body form .d-flex i{
         width: 40px;
         font-size: medium;
         padding-top: 5px;
     }
</style>
@endpush
@section('title', 'Prakerin | Tambah Data siswa')
@section('judul', 'TAMBAH DATA SISWA')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i> DATA SISWA</div>
@endsection
@section('main')
{{-- tambah --}}
<div class="card">
    <div class="container">
        <div class="card-body mt-3">
            <div class="">  
                <h5>Tambah Data Siswa</h5>
            </div>
            <form class="d-flex flex-row-reverse" style="margin-top: -36px;">
                <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                <input class="form-control ml-3" type="search" placeholder="Search" aria-label="Search" style="width: 200px;">
                <div>
                    <button type="button" class="btn btn-danger rounded-pill"><i class="fas fa-window-close mr-2"></i>Cancel</button>
                </div>
                &nbsp;&nbsp;&nbsp;
                <div>
                    <button type="button" class="btn btn-primary rounded-pill"><i class="fas fa-check-square mr-2"></i>Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="" style="height: auto;">
                  <div class="container mt-2">
                    <h5 class="card-title">Data Siswa</h5>
                  </div><hr>
                    <div class="card-body">
                      <form>
                          <div class="mb-3">
                            <label class="form-label">Nama Siswa</label>
                            <div class="d-flex">
                              <i class="fas fa-user border text-center"></i>
                              <input type="text" class="form-control form-control-sm">
                            </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">NIPD</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          {{-- jenis kel --}}
                          <div class="mb-3">
                              <label class="form-label">Jenis Kelamin</label>
                                  <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                      <input type="radio" name="value" value="Laki-Laki" class="selectgroup-input" checked="">
                                      <span class="selectgroup-button">L</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="radio" name="value" value="Perempuan" class="selectgroup-input">
                                      <span class="selectgroup-button">P</span>
                                    </label>
                                  </div>
                          </div>
                          {{-- jenis kel --}}
                          <div class="mb-3">
                              <label class="form-label">Tempat Lahir</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Tanggal Lahir</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="date" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">NIK</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Agama</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Alamat</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Jenis Tinggal</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Transportasi</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">NO HP</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Berat Badan</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Tinggi Badan</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Anak Ke-</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Jumlah Saudara</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Kebutuhan Khusus</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">No Akte</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
            {{--  --}}
            {{--  --}}
            <div class="col-sm-6">
              <div class="card">
                <div class="" style="height: 690px;">
                  <div class="container mt-2">
                    <h5 class="card-title">Data Orang Tua Siswa</h5>
                  </div><hr>
                    <div class="card-body">
                      <form>
                          {{-- ayah --}}
                          <div class="mb-3">
                            <label class="form-label">No KK</label>
                            <div class="d-flex">
                              <i class="fas fa-user border text-center"></i>
                              <input type="text" class="form-control form-control-sm">
                            </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Nama Ayah</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Tanggal Lahir Ayah</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="date" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Pendidikan Ayah</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Pekerjaan Ayah</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Penghasilan Ayah</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Nik Ayah</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          {{-- ayah --}}
      
                          {{-- ibu --}}
                          <div class="mb-3">
                              <label class="form-label">Nama Ibu</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Tanggal Lahir Ibu</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="date" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Pendidikan Ibu</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Pekerjaan Ibu</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Penghasilan Ibu</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Nik Ibu</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                          </div>
                          {{-- ibu --}}
                          {{-- status keluarga --}}
                          <div class="mb-3">
                              <label class="form-label">Status Orang Tua</label>
                                  <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                      <input type="radio" name="value" value="Kandung" class="selectgroup-input" checked="">
                                      <span class="selectgroup-button">Kandung</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="radio" name="value" value="Wali" class="selectgroup-input">
                                      <span class="selectgroup-button">Wali</span>
                                    </label>
                                  </div>
                          </div>
                          {{-- status keluarga --}}
                        </form>
                    </div>
                    <br>
                    <h5 class="card-title">Asal Sekolah</h5>
                    <hr>
                    <div class="card-body">
                      <form action="">
                          {{-- asalsekolah --}}
                          <div class="mb-3">
                              <label class="form-label">No Ijazah</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control form-control-sm">
                              </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">SKHUN</label>
                                <div class="d-flex">
                                  <i class="fas fa-user border text-center"></i>
                                  <input type="text" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Asal Sekolah</label>
                                <div class="d-flex">
                                  <i class="fas fa-user border text-center"></i>
                                  <input type="text" class="form-control form-control-sm">
                                </div>
                            </div>
                            {{-- asalsekolah --}}
                      </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="card-body mb-3">
      <div class="d-flex">
          <div>
            <button type="button" class="btn btn-primary rounded-pill"><i class="fas fa-check-square mr-2"></i>Submit</button>
          </div>
          &nbsp;&nbsp;&nbsp;
          <div>
              <button type="button" class="btn btn-danger rounded-pill"><i class="fas fa-window-close mr-2"></i>Cancel</button>
          </div>
      </div>
  </div>
</div>
{{-- tambah --}}
@endsection
@push('script')

@endpushTambah 
