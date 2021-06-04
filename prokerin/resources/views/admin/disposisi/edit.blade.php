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
@section('title', 'Prakerin | Disposisi')
@section('judul', 'DISPOSISI')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> TAMBAH DISPOSISI</div>
@endsection
@section('main')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Tambah Disposisi</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                <div class="">
                    <div class="" style="height: auto;">
                        <div class="card-body">
                        <form action="{{ route('guru.post') }}" method="POST" class="input">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Pokja Tujuan</label>
                                <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" name="nik" class="form-control
                                @error('nik') is-invalid @enderror" placeholder="Pokja" value="{{ old('nik') }}">
                                </div>
                                @error('nik')
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
                        <div class="card-body">
                        <div class="input">
                            <div class="mb-3">
                                <label class="form-label">Keterangan Disposisi</label>
                                <div class="d-flex">
                                    <i class="fas fa-envelope-open-text border text-center"></i>
                                    <textarea class="form-control" required=""></textarea>
                                </div>

                            </div>
                        </div>
                        <div style="margin-top: 40px;">
                            <button type="submit" class="btn btn-success rounded-pill mr-2"><i class="fas fa-check-square mr-2"></i>Submit</button>
                            </form>
                            <a href="{{ route('surat_masuk.kepsek.index') }}" type="button" class="btn btn-danger rounded-pill"><i class="fas fa-window-close mr-2"></i>Cancel</a>
                        </div>
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