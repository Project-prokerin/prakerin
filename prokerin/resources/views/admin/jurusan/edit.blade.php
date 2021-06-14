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
@section('title', 'Prakerin | Data Jurusan')
@section('judul', 'DATA JURUSAN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-building"></i> DATA JURUSAN</div>
@endsection
@section('main')
<div class="card">
    <div class="container">
        <div class="card-body mt-3">
            <div class="">
                <h5>Data Jurusan</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            {{--  --}}
            {{--  --}}
               <div class="col-sm-6">
            <div class="">
                <div class="" style="height: auto;">
                    <div class="card-body">
                    <div class="input">
                        <div class="mb-3">
                             <form action="{{ route('jurusan.update', ['id' => $jurusan->id]) }}" method="POST">
                                @method('PUT')
                                @csrf
                            <label class="form-label">Singakatan Jurusan</label>
                            <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control @error('singkatan_jurusan')
                                    is-invalid
                                @enderror" name="singkatan_jurusan" placeholder="Singkatan juruasan" value="{{ old('singkatan_jurusan', $jurusan->singkatan_jurusan) }}">
                            </div>
                            @error('singkatan_jurusan')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-sm-6">
            <div class="">
                <div class="" style="height: auto;">
                    <div class="card-body">
                    <div class="input">


                        <div class="mb-3">

                            <label class="form-label">Jurusan</label>
                            <div class="d-flex">
                                <i class="fas fa-user border text-center"></i>
                                <input type="text" class="form-control @error('jurusan')
                                    is-invalid
                                @enderror" name="jurusan" placeholder="Jurusan" value="{{old('jurusan',$jurusan->jurusan)}}">
                            </div>
                            @error('jurusan')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            </div>
                <button type="submit" class="btn btn-success  mb-2 mr-2 ml-auto"><i class="fas fa-check-square  mr-2"></i>Submit</button>
            </form>
            <a href="{{ route('kelas.index') }}" type="button" class="btn btn-danger  mr-5 mb-2"><i class="fas fa-window-close mr-2"></i>Cancel</a>
        </div>
    </div>
</div>




@endsection
@push('script')

@endpush
