@extends('template.master')
@push('link')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
    .header{
    text-align:center;
    }
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
    .file{
    margin-top: 15px;
    }
    .buttons{
    /* x */
    margin-right: 100px;
    float: right;
    }
    .hover{
    transition: all .2s ease-in-out;
    }
    .hover:hover{
    transform: scale(1.1);
    }
    .buttons a{
    transition: all .2s ease-in-out;
    }
    .buttons a:hover{
    transform: scale(1.1);
    }div.swal2-container{
        margin: 0 auto
    }

    @media screen and (max-width:413px){
    .card{
    width: auto;
    float: none;
    }
    }
    a[href$=".pdf"]:before
    {
        content: "\f1c1";
        font-family: fontawesome;
        padding-right: 10px;
    }
</style>
@endpush
@section('title', 'Prakerin | Pembekalan')
@section('judul', 'PEMBEKALAN MAGANG')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-newspaper"></i> PEMBEKALAN MAGANG</div>
@endsection
@section('main')
<div class="card mt-5">
<div class="container text-center H-100 mb-3 teks" >
    <h3>Pembekalan Magang</h3>
</div>
    <div class="container-fluid mt-4 mb-4">
    <div class="mw-100 mx-auto ">
        <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-white text-center" style="width: 300px;background-color:#6777ef;" class="text-center">TEST</th>
                <th scope="col" class="text-center text-white"  style="background-color:#6777ef;">STATUS</th>
            </tr>
        </thead>
        <tbody>
            {{-- sweet alert page --}}
            {{-- @if (session('alert'))
                    <div class="flash" data-id="{{ session('alert') }}"></div>
            @endif --}}
            <tr>
                <th scope="row" class="text-dark" >Tahap Psikotes</th>
                <td style="{{ warna('psikotes') }}">{{ PembekalanText('psikotes') }}</td>
            </tr>
            <tr>
                <th scope="row" class="text-dark"  style="background-color:#f2f2f2">Tahap soft skill</th>
                <td style="{{ warna('soft_skill') }}">{{ PembekalanText('soft_skill') }}</td>
            </tr>
            <tr>
                <th scope="row" class="text-dark"  >Portofolio</th>
                <td style="{{ warna('file_portofolio') }}">
                @if (empty(siswa('main')))
                    Anda tidak di izinkan untuk mengisi halaman ini
                @else

                @if (siswa('pembekalan_magang') == '' || empty(siswa('pembekalan_magang')))
                  <form action="{{ route('user.pembekalan.post') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="file" class="file hover @error('file') is-invalid @enderror"  accept="application/pdf" name="file" value="{{ old('file') }}">
                      @error('file')
                          <div class="invalid-feedback mt-2">{{ $message }}</li>
                      @enderror
                      <div class="buttons mt-2 mr-5">
                          <a href="#" class="btn btn-icon icon-left btn-a btn-danger batal"><i class="fas fa-times"></i> Batal</a>
                          <button type="submit" class="btn btn-icon icon-left btn-a btn-success"><i class="fas fa-check"></i> Simpan</button>
                      </div>
                      </form>
                @else 
                        @if (siswa('pembekalan_magang')->file_portofolio !== 'belum')

                            <form action="{{ route('user.pembekalan.delete') }}" id="form" method="POST">
                                <a href="{{ route('user.pembekalan.download', basename(siswa('pembekalan_magang')->file_portofolio) )  }}" class="text-white">{{ links(basename(siswa('pembekalan_magang')->file_portofolio)) }}</a>
                                @method('put')
                                @csrf
                                <button type="submit" id="hapus" class="btn btn-icon icon-left  btn-danger ml-5"><i class="fas fa-times"></i>Hapus</button>
                            </form>
                            
                        @else
                            <form action="{{ route('user.pembekalan.post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" class="file hover @error('file') is-invalid @enderror"  accept="application/pdf" name="file" value="{{ old('file') }}">
                            @error('file')
                                <div class="invalid-feedback mt-2">{{ $message }}</li>
                            @enderror
                            <div class="buttons mt-2 mr-5">
                                <a href="#" class="btn btn-icon icon-left btn-a btn-danger batal"><i class="fas fa-times"></i> Batal</a>
                                <button type="submit" class="btn btn-icon icon-left btn-a btn-success"><i class="fas fa-check"></i> Simpan</button>
                            </div>
                            </form>
                        @endif

                @endif

            @endif
                </td>
            </tr>
        </tbody>
        </table>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                        <span>×</span>
                        </button>
                    {{ session('success') }}
                    </div>
                    </div>
            @endif
            @if (session('erorr'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                        <span>×</span>
                        </button>
                    {{ session('erorr') }}
                    </div>
                    </div>
                @endif
    </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
@push('script')
<script>
    $(document).ready(function () {
        // $('#hapus').click(function (event) {
        // event.preventDefault() == true;
        // swal.fire({
        //     title: "Apakah anda yakin ?",
        //     showCancelButton: true,
        //     confirmButtonClass: 'btn-danger',
        //     confirmButtonText: "ya",
        //     cancelButtonText: "tidak",
        //     closeOnConfirm: true,
        //     closeOnCancel: true
        // }).then((result) => {
        //         if (result.isConfirmed) {
        //         $(this).unbind('click').click();
        //         }
        //     })

        // });

        $('.btn-a').hide();
        $('.file').change(function () {
            $('.btn-a').show();
        })
        $('.batal').click(function () {
            $('.file').val('');
            $('.btn-a').hide();
        })
    })
</script>
@endpush

