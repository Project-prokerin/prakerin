
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
@section('title', 'Prakerin | Surat Penugasan')
@section('judul', 'SURAT PENUGASAN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> SURAT PENUGASAN</div>
@endsection
@section('main')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Tambah Surat Penugasan Page2</h4>
        </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
            <div class="">
                <div class="" style="height: auto;">
                    <div class="card-body">
                    <form action="{{ route('admin.surat_keluar.postt') }}" method="POST" class="input">
                        @method('PUT')
                        @csrf
                        
                        
                        
                       

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
                    <div class="input">
                        <div class="mb-3">
                            <label class="form-label">Pukul </label>
                            <div class="d-flex">
                                <i class="far fa-calendar-times border text-center"></i>
                                <input type="file" class="form-control @error('surat')
                                    is-invalid
                                @enderror" name="surat" placeholder=" 00.00 WIB s.d Selesai" value="{{ $suratt->surat ?? ''}}" >
                            </div>
                            @error('surat')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div style="margin-top: 40px;">
                        <button type="submit" class="btn btn-success rounded mr-2"><i class="fas fa-check-square mr-2"></i>Next</button>
                        </form>
                        <a href="{{ route('admin.surat_keluar.index') }}" type="button" class="btn btn-danger rounded"><i class="fas fa-window-close mr-2"></i>Cancel</a>
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
