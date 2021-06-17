@extends('template.master')
@push('link')
<link rel="stylesheet" href="{{ asset('template/') }}/node_modules/select2/dist/css/select2.min.css">

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
        <div class="breadcrumb-item"> <i class="far fa-building"></i> Edit DISPOSISI</div>
@endsection
@section('main')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>  Edit Disposisi</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                <div class="">
                    <div class="" style="height: auto;">
                        <div class="card-body">
                        <form action="{{ route('admin.disposisi.update',$surat->id) }}" method="POST" class="input">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Pokja Tujuan</label>
                                <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <select class="form-control select2  @error('Pokjatujuan') is-invalid @enderror" placeholder="Pokja" value="{{ old('Pokjatujuan') }}" name="Pokjatujuan" id="">
                                    <option value="" selected disabled>Pokja tujuan</option>
                                    <option value="hubin"  {{(old('Pokjatujuan') ?? $surat->Pokjatujuan) === 'hubin' ? 'selected' : '' }}>Hubin</option>
                                    <option value="kurikulum"  {{(old('Pokjatujuan') ?? $surat->Pokjatujuan) === 'kurikulum' ? 'selected' : ''}} >Kurikulum</option>
                                    <option value="kesiswaan"  {{(old('Pokjatujuan') ?? $surat->Pokjatujuan) === 'kesiswaan' ? 'selected' : '' }}>Kesiswaan</option>
                                    <option value="sarpras"  {{(old('Pokjatujuan') ?? $surat->Pokjatujuan) === 'sarpras' ? 'selected' : '' }}>Sarpras  </option>
                                </select>
                                </div>
                                @error('Pokjatujuan')
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
                                    <textarea class="form-control  @error('Keterangan_disposisi')
                                        is-invalid
                                    @enderror" name="Keterangan_disposisi">{{$surat->Keterangan_disposisi}}</textarea>

                                </div>
                                  @error('Keterangan_disposisi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror

                            </div>
                        </div>
                        <div style="margin-top: 40px;">
                            <button type="submit" class="btn btn-success rounded-pill mr-2"><i class="fas fa-check-square mr-2"></i>Submit</button>
                            </form>
                            <a href="{{ route('admin.disposisi.index') }}" type="button" class="btn btn-danger rounded-pill"><i class="fas fa-window-close mr-2"></i>Cancel</a>
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
<script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>


@endpush
