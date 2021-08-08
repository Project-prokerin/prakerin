@extends('template.master')
@push('link')

@endpush
@section('title', 'Prakerin | Data Pembekalan Magang')
@section('judul', 'DATA PEMBEKALAN MAGANG')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item">  <i class="fas fa-newspaper"></i> DATA PEMBEKALAN MAGANG</div>
@endsection
@section('main')

<div class="card" style="height: 300px;" >
        <div class="card-header mb-5">
            <h4 class="pt-2"><i class="fas fa-eye mr-2"></i>Detail Pembekalan Magang Siswa : <b>{{$pembekalan_magang->siswa->nama_siswa}}</b></h4>
        </div>
        <div class="card-stats">
              
                <div class="card-stats-items">
                    <div class="card-stats-item" style="margin-right: 0px;">
                        <div class="card-stats-item-count">
                            <i class="{{$pembekalan_magang->psikotes == 'sudah' ? 'far fa-check-square' : 'fa-times-circle'}}" style="font-size: 30px;  {{ $pembekalan_magang->psikotes == 'sudah' ? 'color: greenyellow;' : 'color: red;'}} "></i>
                            {{-- kalo bisa diubah --}}
                            {{-- 1.jika test udah dikumpulin maka yang ditampilin = ceklis --}}
                            {{-- 2.jika blum maka yang ditampilin = silang --}}

                            {{-- kalo gk bisa diubah --}}
                            {{-- bilang ke walada aja/mungkin dashboard yang sebelumnya --}}

                            {{-- kalo pesan ini udah dibaca jangan lupa diapus biar gk ganggu pemandangan wkwk --}}
                            {{-- terimakasih --}}

                            {{-- pesan telah tersampaikan dan di baca oleh NurFirdausR selaku backend Dev, akan melakukan perubahan seperti permintaan tersebut  --}}
                        </div>
                        <a href="pembekalan" class="text-decoration-none">
                            <div class="" style="width: 120px;">Test Psikotes</div>
                        </a>
                    </div>
                 
                    <div class="card-stats-item" style="margin-right: 0px;">
                        <div class="card-stats-item-count">
                            <i class="{{$pembekalan_magang->soft_skill == 'sudah' ? 'far fa-check-square' : 'fa-times-circle'}}" style="font-size: 30px;  {{ $pembekalan_magang->soft_skill == 'sudah' ? 'color: greenyellow;' : 'color: red;'}} "></i>
                        </div>
                        <a href="pembekalan" class="text-decoration-none">
                            <div class="" style="width: 120px;">Test Soft Skill</div>
                        </a>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">
                            <i class="{{$pembekalan_magang->file_portofolio != null ? 'far fa-check-square' : 'fa-times-circle'}}" style="font-size: 30px;  {{ $pembekalan_magang->file_portofolio != null ? 'color: greenyellow;' : 'color: red;'}} "></i>
                        </div>
                        <a href="pembekalan" class="text-decoration-none">
                            <div class="" style="width: 120px;">Portfolio</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="justify-content-end ml-4 mt-5">
                <a href="{{route('pembekalan.index')}}" class="btn btn-danger mt-3">kembali</a>
            </div>
        </div>

          

@endsection
@push('script')

@endpush
