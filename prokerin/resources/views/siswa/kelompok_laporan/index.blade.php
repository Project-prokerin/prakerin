    @extends('template.master')
    @push('link')
    <style>
    .teks{
        text-align: center;
        margin-top: -20px;
        height: 65px;
        width: 350px;
        color: white;
        background: #475bf0;
    }
    .teks h3{
        margin-top: 15px;
    }
    .header{
        text-align:center;
        margin-top:20px;
        margin-bottom:20px;
    }

    </style>
    @endpush
    @section('title', 'Prakerin | kelompok')
    @section('judul', 'KELOMPOK LAPORAN')
    @section('breadcrump')
            <div class="breadcrumb-item "> <a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
            <div class="breadcrumb-item"><i class="fas fa-user"></i> KELOMPOK LAPORAN</div>
    @endsection
    @section('main')
    <div class="card mt-5">
    <div class="container text-center H-100 mb-3 teks" >
        <h3>Kelompok Laporan</h3>
    </div>
        <div class="container-fluid mt-4 mb-4">
        <div class="mw-100 mx-auto ">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table table-bordered table-hover ">
            <thead>
                <tr>
                    <th scope="" colspan="2" class="text-center bg-primary text-white text-center">
                    @if (count($kelompok)<1)
                        Anda belum masuk kelompok
                    @else
                          {{ $no_kelompok }}
                    @endif
                    </th>
                </tr>
            </thead>
            <tbody>

                @if (count($kelompok) < 1)
                    <a href="{{url('admin/kelompok/tambah')}}" class="btn btn-primary  mb-5">Ajukan Kelompok</a>
                @else 

                @endif
                {{--  --}}
                {{-- {{ dd($kelompok) }} --}}
                @if(count($kelompok) < 1)
                <tr>
                    <th scope="row" style="width: 400px;" class="text-left">Pembimbing</th>
                    <td class="" style="">Anda belum mendapat kelompok</td>
                </tr>
                <tr>
                    <th scope="row" class="text-left">Judul Laporan</th>
                    <td style="">Anda belum mendapat kelompok</td>
                </tr>

                    <th scope="row" class="text-left" style="">Anggota 1</th>
                    <td style="">Anda belum mendapat kelompok</td>
                </tr>
                <tr>
                    <th scope="row" class="text-left">Anggota 2</th>
                    <td style="">Anda belum mendapat kelompok</td>
                </tr>
                <tr>
                    <th scope="row" class="text-left" style="">Anggota 3</th>
                    <td style="">Anda belum mendapat kelompok</td>
                </tr>
                <tr>
                    <th scope="row" class="text-left" >Anggota 4</th>
                    <td style="">Anda belum mendapat kelompok</td>
                </tr>

                @else
                 <tr>
                    <th scope="row" style="width: 400px;;" class="text-left">Pembimbing</th>
                    <td class="" style="">{{ $guru_nama }}</td>
                </tr>
                <tr>
                    <th scope="row" class="text-left">Judul Laporan</th>
                    <td style="">{{ (empty($laporan->judul_laporan)) ? 'Judul laporan kosong' : '' }}</td>
                </tr>
                @foreach ($kelompok as $index => $item)
                {{-- </tr> --}}
                <tr>
                    <th scope="col">Anggota {{ $index + 1 }}</th>
                    <td>
                        <div class="row">
                            <div class="col-8">
                                {{ $item->siswa->nama_siswa }}
                            </div>
                            {{-- validasi jika akun ini sudah di buat pengajuan maka sudah tidak bisa keluar dari kelompok / sudah fix --}}
                            @if (Auth::user()->siswa->data_prakerin === null)
                                    {{-- cek jika nama nya sesuai tampilkan button keluar --}}
                                    @if (Auth::user()->siswa->nama_siswa === $item->siswa->nama_siswa )
                                    <div class="col-4">
                                        <form action="{{route('user.kelompok_laporanUpdate',Auth::user()->siswa->id)}}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button  class="btn btn-danger">Keluar</button>

                                        </form>
                                    </div>

                                    @endif
                            
                            @else 
                                 <button  class="badge badge-success" disabled>Sudah fix</button>
                            @endif

                        </div>
                    </td>
                </tr>
                @endforeach
                @endif

            </tbody>
            </table>
        </div>
        
        </div>
    </div>
    @endsection
    @push('script')

    @endpush

	