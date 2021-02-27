    @extends('template.master')
    @push('link')
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
        margin-right: 150px;
        /* margin-top: 8px; */
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
        }

        @media screen and (max-width:413px){
        .card{
        width: auto;
        float: none;
        }
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
                <tr>
                    <th scope="row"  class="text-dark"  style="background-color:#f2f2f2">Test WPT IQ</th>
                    <td class="" style="{{ warna('test_wpt_iq') }}">{{ PembekalanText('test_wpt_iq') }}</td>
                </tr>
                <tr>
                    <th scope="row" class="text-dark" >Test Personality interview</th>
                    <td style="{{ warna('personality_interview') }}">{{ PembekalanText('personality_interview') }}</td>
                </tr>
                <tr>
                    <th scope="row" class="text-dark"  style="background-color:#f2f2f2">Test soft skill</th>
                    <td style="{{ warna('soft_skill') }}">{{ PembekalanText('soft_skill') }}</td>
                </tr>
                <tr>
                    <th scope="row" class="text-dark"  >Portofolio</th>
                    <td style="{{ warna('file_portofolio') }}">
                    @if (!empty(siswa('pembekalan_magang')->file_portofolio) )
                        <a href="/user/pembekalan/{{ siswa('pembekalan_magang')->file_portofolio }}" class="text-white">{{ siswa('pembekalan_magang')->file_portofolio }}</a>
                        <a href="/user/pembekalan/delete" class="btn btn-icon icon-left  btn-danger ml-5"><i class="fas fa-times"></i>Hapus</a>
                    @else
                    <form action="{{ route('user.pembekalan.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="file hover @error('file') is-invalid @enderror"  accept="application/pdf" name="file" value="{{ old('file') }}">
                    @error('file')
                        <div class="invalid-feedback mt-2">{{ $message }}</li>
                    @enderror
                    <div class="buttons">
                        <a href="#" class="btn btn-icon icon-left btn-a btn-danger batal"><i class="fas fa-times"></i> Batal</a>
                        <button type="submit" class="btn btn-icon icon-left btn-a btn-success"><i class="fas fa-check"></i> Simpan</button>
                    </div>
                    </form>
                    @endif

                    </td>
                </tr>
            </tbody>
            </table>
        </div>
        </div>
    </div>
    @endsection
    @push('script')
    <script>
        $(document).ready(function () {
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
