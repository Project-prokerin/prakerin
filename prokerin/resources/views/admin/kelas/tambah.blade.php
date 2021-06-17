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
            h5{
        color: rgb(82, 82, 255);
    }
</style>
@endpush
@section('title', 'Prakerin | Data Kelas')
@section('judul', 'DATA KELAS')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> DATA KELAS</div>
@endsection
@section('main')
<div class="card">
    <div class="">
        <div class="card-body mt-2">
            <div class="">
                <h5>Data Kelas</h5>
            </div>
            <hr>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
            <div class="">
                <div class="" style="height: auto;">
                    <div class="card-body">
                    <form action="{{route('kelas.post')}}" method="POST" class="input">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Level</label>
                            <div class="d-flex">
                                <i class="fas fa-layer-group border text-center"></i>
                            <input type="text" name="level" class="form-control
                            @error('level') is-invalid @enderror" placeholder="Level" value="{{ old('level') }}">
                            </div>
                            @error('level')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success rounded ml-4"><i class="fas fa-check-square mr-2"></i>Submit</button>
                <a href="{{ route('kelas.index') }}" type="button" class="btn btn-danger rounded"><i class="fas fa-window-close mr-2"></i>Cancel</a>
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
                                <label class="form-label">Jurusan</label>
                                <div class="d-flex">
                                    <i class="fas fa-map-signs border text-center"></i>
                                    <select class="form-control select2  @error('id_jurusan')
                                        is-invalid
                                    @enderror"  name="id_jurusan">
                                      <option  value="">Pilih Jurusan</option>
                                        @foreach ($jurusan as $item)
                                             <option value="{{ $item->id }}"  @if(old('id_jurusan') == $item->id) selected @endif>{{ $item->jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('id_jurusan')
                                    <div class="invalid-feedback">
                                            {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                    </div>
                    <div style="margin-top: 40px;">
                       
                        </form>
                       
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
