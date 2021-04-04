@extends('template.master')
@push('link')
<style>
     .card-body form .d-flex i{
         width: 50px;
         font-size: medium;
         padding-top: 11px;
     }
</style>
@endpush
@section('title', 'Prakerin | Data Guru')
@section('judul', 'DATA GURU')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> DATA GURU</div>
@endsection
@section('main')
<div class="card">
    <div class="container">
        <div class="card-body mt-3">
            <div class="">  
                <h5>Tambah Data Guru</h5>
            </div>
            <form class="d-flex flex-row-reverse" style="margin-top: -36px;">
                <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                <input class="form-control ml-3" type="search" placeholder="Search" aria-label="Search" style="width: 200px;">
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
              <div class="">
                <div class="" style="height: auto;">
                    <div class="card-body">
                      <form>
                          <div class="mb-3">
                            <label class="form-label">NIK Guru</label>
                            <div class="d-flex">
                              <i class="fas fa-user border text-center"></i>
                              <input type="text" class="form-control" placeholder="NIK">
                            </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Nama</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control" placeholder="nama">
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Jabatan</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <select class="form-control">
                                    <option selected>Pilih Jabatan</option>
                                    <option value="hubin">Hubin</option>
                                    <option value="kaprog">Kaprog</option>
                                    <option value="bkk">BKK</option>
                                    <option value="kejuruan">Kejuruan</option>
                                </select>
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
              <div class="">
                <div class="" style="height: auto;">
                    <div class="card-body">
                      <form>
                          <div class="mb-3">
                              <label class="form-label">Jurusan</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <select class="form-control">
                                    <option selected>Pilih Jurusan</option>
                                    <option value="rpl">RPL</option>
                                    <option value="mm">MM</option>
                                    <option value="tkj">TKJ</option>
                                    <option value="tei">TEI</option>
                                    <option value="bc">BC</option>
                                </select>
                              </div>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">No HP</label>
                              <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control" placeholder="+62...">
                              </div>
                          </div>
                      </form>
                      <div style="margin-top: 40px;">
                        <button type="button" class="btn btn-success rounded-pill mr-2"><i class="fas fa-check-square mr-2"></i>Submit</button>
                        <button type="button" class="btn btn-danger rounded-pill"><i class="fas fa-window-close mr-2"></i>Cancel</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
    


@endsection
@push('script')

@endpush
