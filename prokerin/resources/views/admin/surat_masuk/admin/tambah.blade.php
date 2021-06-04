@extends('template.master')
@push('link')
<style>
    .card-body .input i{
                width: 50px;
                font-size: medium;
                padding-top: 11px;
            }
            .invalid-feedback{
                    display: block;
                }


</style>
@endpush
@section('title', 'Prakerin | Surat Masuk')
    @section('judul', 'SURAT MASUK')
    @section('breadcrump')
            <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
            <div class="breadcrumb-item"> <i class="far fa-building"></i> SURAT MASUK</div>
    @endsection
@section('main')
<div class="card">
    <div class="container">
        <div class="card-body mt-3">
            <div class="">
                <h5>Data Guru</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
            <div class="">
                <div class="" style="height: auto;">
                    <div class="card-body">
                    <form action="{{ route('admin.surat_masuk.post') }}" method="POST" class="input">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Surat</label>
                            <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" name="nama" class="form-control @error('nama')
                                    is-invalid
                                @enderror" placeholder="nama surat" value="{{ old('nama') }}">
                            </div>
                            @error('nama')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dikirim Ke</label>
                            <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <select class="form-control @error('jabatan')
                                    is-invalid
                                @enderror" name="jabatan">
                                    <option value="" selected>Pilih Tujuan</option>
                                    <option value="hubin" @if(old('jabatan') === 'hubin') selected @endif>Hubin</option>
                                    <option value="kurikulum"  @if(old('jabatan') === 'kaprog') selected @endif>Kurikulum</option>
                                    <option value="kesiswaan"  @if(old('jabatan') === 'bkk') selected @endif>Kesiswaan</option>

                                </select>
                            </div>
                            @error('jabatan')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            </div>
            {{--  --}}
            {{--  --}}
            <div class="col-sm-6">
            <div class="">
                <div class="" style="height: auto;">

                        <div class="row">
                            <div class="col-12">
                              <div class="card">
                                <div class="card-header">
                                  <h4></h4>
                                </div>
                                  {{-- <form action="#" class="dropzone" id="mydropzone">
                                    <div class="fallback">
                                      <input name="file" type="file" multiple />
                                    </div>
                                  </form> --}}
                                </div>
                              </div>
                            </div>
                          </div>
                    <div style="margin-top: 40px;">
                        <button type="submit" class="btn btn-success rounded-pill mr-2"><i class="fas fa-check-square mr-2"></i>Submit</button>
                        </form>
                        <a href="{{ route('admin.surat_masuk.index') }}" type="button" class="btn btn-danger rounded-pill"><i class="fas fa-window-close mr-2"></i>Cancel</a>
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
{{-- <script src="{{ asset('assets/js/main/table.js') }}" ></script> --}}
<script src="{{ asset('assets/js/pages-admin/surat-masuk-TU.js') }}" ></script>
@endpush

