@if(Auth::check())

@php $role = Auth::user()->role; @endphp

@if (Auth::user()->role == 'admin' or Auth::user()->role == 'tu' or Auth::user()->role == 'kepsek' or Auth::user()->role
== 'kaprog' or Auth::user()->role == 'kesiswaan' or Auth::user()->role == 'kurikulum' or Auth::user()->role == 'hubin'
or Auth::user()->role == 'sarpras' or Auth::user()->role == 'bkk' or Auth::user()->role == 'pembimbing' )

<div class="main-sidebar position-fixed">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{'/'}}" style="color:#6777ef;">DATA PRAKERIN</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a style="color:#6777ef;" href="{{'/'}}">DP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">DASHBOARD</li>
            <li class="@if (Request::is('admin/dashboard')) active @endif">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </a>
                @if (Auth::user()->role == 'admin' )
            <li class="menu-header">MASTER</li>
            <li class="@if (Request::is('admin/siswa','admin/siswa/*')) active @endif">
                <a href="{{ route('siswa.index') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Data Siswa</span>
                </a>
            </li>
            <li class="@if (Request::is('admin/guru','admin/guru/*')) active @endif">
                <a href="{{ route('guru.index') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Data Guru</span>
                </a>
            </li>
            <li class="@if (Request::is('admin/kelas','admin/kelas/*')) active @endif">
                <a href="{{ route('kelas.index') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Data Kelas</span>
                </a>
            </li>
            <li class="@if (Request::is('admin/jurusan','admin/jurusan/*')) active @endif">
                <a href="{{ route('jurusan.index') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Data Jurusan</span>
                </a>
            </li>
            <li class="@if (Request::is('admin/tanda-tangan','admin/tanda-tangan/*')) active @endif">
                <a href="{{ route('tanda-tangan.index') }}" class="nav-link">
                    <i class="fas fa-user"></i>
                    <span>Data TTD</span>
                </a>
            </li>
            @endif
            {{-- @if (Auth::user()->role == 'kaprog' or Auth::user()->role == 'hubin' or Auth::user()->role == 'bkk' or Auth::user()->role == "kepsek" or $role == "admin")
            <li class="menu-header">PRAKERIN</li>
            @endif --}}
            <li class="menu-header">PRAKERIN</li>
            @if (Auth::user()->role == 'tu' or Auth::user()->role == 'kaprog' or Auth::user()->role == 'hubin' or $role == 'admin' or $role == 'kepsek' or $role == 'pembimbing' or $role == 'bkk' )
            <li class="@if (Request::is('admin/perusahaan','admin/perusahaan/*')) active @endif">
                <a href="{{ route('perusahaan.index') }}" class="nav-link">
                    <i class="far fa-building"></i>
                    <span>Data Perusahaan</span>
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 'tu' or Auth::user()->role == 'bkk' or Auth::user()->role == 'hubin' or $role == 'admin' or $role == 'kepsek'  or $role == 'pembimbing' or $role == 'bkk'  )
            <li class="@if (Request::is('admin/pembekalan','admin/pembekalan/*')) active @endif">
                <a href="{{ route('pembekalan.index') }}" class="nav-link">
                    <i class="fas fa-newspaper"></i>
                    <span>Pembekalan Magang</span>
                </a>
            </li>
            @endif
            <li class="@if (Request::is('admin/kelompok','admin/kelompok/*')) active @endif">

                <a href="{{ route('kelompok.index') }}" class="nav-link"><i class="fas fa-users"></i>

                    <span>Kelompok Pembuatan Laporan</span>

                </a>

            </li>
            @if (Auth::user()->role == 'tu' or Auth::user()->role == 'kaprog' or Auth::user()->role == 'hubin' or $role == 'admin' or $role == 'kepsek' or $role == 'pembimbing' or $role == 'bkk')
            <li class="@if (Request::is('admin/data_prakerin','admin/data_prakerin/*')) active @endif">
                <a href="{{ route('data_prakerin.index') }}" class="nav-link">
                    <i class="fas fa-th"></i>
                    <span>Data Prakerin</span>
                </a>
            </li>
            @endif
            @if(Auth::user()->role == 'kaprog' or Auth::user()->role == 'hubin' or Auth::user()->role == 'admin' or Auth::user()->role == 'kepsek' or
            Auth::user()->role == 'tu' or Auth::user()->role == 'siswa' or Auth::user()->role == 'kurikulum' or $role == 'bkk')
            <li class="dropdown
            @if (Request::is('admin/kategori','admin/kategori/*'))
            active
            @elseif(Request::is('admin/nilai_prakerin','admin/nilai_prakerin/*'))
            active
            @endif
            ">
                <a href="" class="nav-link has-dropdown"><i class="fas fa-th"></i><span> Nilai Prakerin</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="@if (Request::is('admin/kategori','admin/kategori/*')) active @endif"><a
                            class="nav-link " href="{{ route('kategori.index') }}">Kategori</a></li>
                    <li class="@if (Request::is('admin/nilai_prakerin','admin/nilai_prakerin/*')) active @endif"><a
                            class="nav-link " href="{{ route('nilai_prakerin.index') }}">Nilai Data Prakerin</a></li>

                </ul>

            </li>

            @endif
            @if(Auth::user()->role == 'tu' or $role == "hubin" or Auth::user()->role == "kepsek" or $role == "admin" or $role == "kaprog" or $role == "bkk")
            <li class="dropdown
            @if (Request::is('admin/surat_keluar','admin/surat_keluar/*'))
            active
            @elseif(Request::is('admin/pengajuan_prakerin','admin/pengajuan_prakerin/*'))
            active
            @endif
            ">
                <a href="" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Surat Prakerin</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="@if (Request::is('admin/surat_keluar','admin/surat_keluar/*')) active @endif"><a
                            class="nav-link " href="{{ route('admin.surat_keluar.index') }}">Surat Penugasan</a></li>
                    <li
                        class="@if (Request::is('admin/pengajuan_prakerin','admin/pengajuan_prakerin/*')) active @endif">
                        <a class="nav-link " href="{{ route('pengajuan_prakerin.index') }}">Pengajuan Prakerin</a></li>

                </ul>

            </li>

            @endif

            @if($role == "tu" or $role == "hubin" or $role == "admin" or $role == "kaprog" or $role == "kepsek" or $role == "bkk")

            <li class="dropdown

            @if (Request::is('admin/jurnalH','admin/jurnalH/*'))

            active

            @elseif(Request::is('admin/jurnal','admin/jurnal/*'))

            active

            @endif">

                <a href="" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>Jurnal</span></a>

                <ul class="dropdown-menu" style="display: none;">

                    <li class="@if (Request::is('admin/jurnal','admin/jurnal/*')) active @endif"><a class="nav-link "
                            href="{{ route('jurnal.index') }}">Data Awal Jurnal Prakerin</a></li>

                    <li class="@if (Request::is('admin/jurnalH','admin/jurnalH/*')) active @endif"><a class="nav-link "
                            href="{{ route('jurnalH.index') }}">Jurnal Harian</a></li>

                </ul>

            </li>




            <li class="@if (Request::is('admin/laporan','admin/laporan/*')) active @endif">

                <a href="{{ route('laporan.index') }}" class="nav-link"><i class="fas fa-file-alt"></i>

                    <span>Laporan Prakerin</span>

                </a>

            </li>

            @endif


            @if ($role == "pembimbing")
            <li class="@if (Request::is('admin/laporan','admin/laporan/*')) active @endif">

                <a href="{{ route('laporan.index') }}" class="nav-link"><i class="fas fa-file-alt"></i>

                    <span>Laporan Prakerin</span>

                </a>

            </li>
            @endif


            @if (Auth::user()->role == 'admin' or Auth::user()->role == 'tu' or Auth::user()->role == 'kepsek' or
            Auth::user()->role == 'kaprog' or Auth::user()->role == 'kesiswaan' or Auth::user()->role == 'kurikulum' or
            Auth::user()->role == 'hubin' or Auth::user()->role == 'sarpras')

            {{-- <li class="menu-header">Takola</li> --}}

            <li class="menu-header">Takola</li>

            <li class='@if (Request::is("admin/surat_masuk","admin/surat_masuk/*")) active @endif'>

                <a href='{{ route('admin.surat_masuk.index') }}' class="nav-link">

                    <i class="fas fa-th"></i>

                    <span>Surat Masuk</span>

                </a>

            </li>

            @endif

            @if (Auth::user()->role == 'admin' or Auth::user()->role == 'tu' or Auth::user()->role == 'kepsek' or
            Auth::user()->role == 'kaprog')

            <li class='@if (Request::is("admin/disposisi","admin/disposisi/*")) active @endif'>

                <a href='{{ route('admin.disposisi.index') }}' class="nav-link">

                    <i class="fas fa-th"></i>

                    <span>Disposisi</span>

                </a>

            </li>

            @endif

            {{-- @if (Auth::user()->role == 'bkk' or Auth::user()->role == 'hubin' or Auth::user()->role == 'admin' or Auth::user()->role == 'kurikulum' or Auth::user()->role == 'tu') --}}
            @if ($role != 'pembimbing')
            <li class="menu-header">Alumni</li>

            <li class='@if (Request::is("admin/alumni_siswa","admin/alumni_siswa/*")) active @endif'>

                <a href="{{ route('alumni_siswa.index') }}" class="nav-link">

                    <i class="fas fa-th"></i>

                    <span>Alumni siswa</span>

                </a>

            </li>

            <li class='@if (Request::is("admin/penelusuran_tamantan","admin/penelusuran_tamantan/*")) active @endif'>

                <a href="{{ route('penelusuran_tamantan.index') }}" class="nav-link">

                    <i class="fas fa-th"></i>

                    <span>Tamatan Penulusuran</span>

                </a>

            </li>
                
            @endif


            {{-- @endif --}}



    </aside>

</div>

@endif

@endif







{{-- user sidebar --}}

@if(Auth::check())

@if (Auth::user()->role == 'siswa' )

<div class="main-sidebar">

    <aside id="sidebar-wrapper">

        <div class="sidebar-brand ">

            <a href="{{'/'}}" style="color:#6777ef;">DATA PRAKERIN</a>

        </div>

        <div class="sidebar-brand sidebar-brand-sm">

            <a style="color:#6777ef;" href="{{'/'}}">DP</a>

        </div>

        <ul class="sidebar-menu mt-2">

            <li class="@if (Request::is('user/dashboard','user/dashboard/*')) active @endif">

                <a href="{{ route('index.user') }}" class="nav-link">

                    <i class="fas fa-tachometer-alt"></i>

                    <span>Dashboard</span>

                </a>

            </li>

            <li class="@if (Request::is('user/perusahaan','user/perusahaan/*')) active @endif">

                <a href="{{ route('user.perusahaan') }}" class="nav-link">

                    <i class="far fa-building"></i>

                    <span>List Perusahaan</span>

                </a>

            </li>

            <li class="@if (Request::is('user/pembekalan','user/pembekalan/*')) active @endif">

                <a href="{{ route('user.pembekalan') }}" class="nav-link">

                    <i class="fas fa-newspaper"></i>

                    <span>Pembekalan Magang</span>
                </a>
            </li>

            {{-- {{dd(siswa('pembekalan_magang'))}} --}}
            {{-- cel jika auth nya siswa make true --}}
            @if (Auth::user()->role === 'siswa')
                {{-- dan jika siswa ini telah menyudahi Pembekalan magang / sudah semua  maka tampilkan  --}}
                {{-- {{dd( siswa('pembekalan_magang') )}}     --}}
                 @if (siswa('pembekalan_magang') == '')
                  {{-- kalo pembekalan nya belum ada atau belum ikut pembekalan maka tidak tampil kelompok sidebar --}}

                 @else 

                             @if (siswa('pembekalan_magang')->psikotes === 'sudah' && siswa('pembekalan_magang')->soft_skill === 'sudah' && siswa('pembekalan_magang')->file_portofolio !== null )
                                 <li class="@if (Request::is('user/kelompok_laporan','user/kelompok_laporan/*')) active @endif">
                                     <a href="{{ route('user.kelompok_laporan') }}" class="nav-link">
                                         <i class="fas fa-users"></i>
                                         <span>Kelompok Laporan</span>
                                     </a>
                                 </li>        
                             @endif
                             
                 @endif
            
            @else 

            <li class="@if (Request::is('user/kelompok_laporan','user/kelompok_laporan/*')) active @endif">
                <a href="{{ route('user.kelompok_laporan') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Kelompok Laporan</span>
                </a>
            </li>    

            @endif
            
            @if(empty(siswa('data_prakerin')->status)  || siswa('data_prakerin')->status == 'Batal' || siswa('data_prakerin')->status == 'Pengajuan' ||  empty(siswa('data_prakerin')))
            
            <li class="@if (Request::is('user/status','user/status/*')) active @endif">
                <a href="{{ route('user.status') }}" class="nav-link">
                    <i class="fas fa-user"></i>
                    <span>Status Magang</span>
                </a>
            </li>
            
            @else
            <li class="dropdown

                 @if(Request::is('siswa/nilai_prakerin','siswa/nilai_prakerin/*'))
                 active
                 @endif
                 ">
                <a href="" class="nav-link has-dropdown"><i class="fas fa-th"></i><span> Nilai Prakerin</span></a>
                <ul class="dropdown-menu" style="display: none;">

                    <li class="@if (Request::is('siswa/nilai_prakerin','siswa/nilai_prakerin/*')) active @endif"><a
                            class="nav-link " href="{{ route('Siswanilai_prakerin.index') }}">Nilai Data Prakerin</a>
                    </li>

                </ul>

            </li>
            <li class="@if (Request::is('user/status','user/status/*')) active @endif">
                <a href="{{ route('user.status') }}" class="nav-link">
                    <i class="fas fa-user"></i>
                    <span>Status Magang</span>
                </a>
            </li>
                 <li class="dropdown
                      @if (Request::is('user/jurnalH','user/jurnalH/*'))
                      active
                      @elseif(Request::is('user/jurnal','user/jurnal/*'))
                      active
                      @endif
                 ">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper"></i> <span>Jurnal</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="@if (Request::is('user/jurnal','user/jurnal/*')) active @endif">
                        <a class="nav-link" href="{{ route('user.jurnal') }}">Jurnal Prakerin</a>
                    </li>
                    <li class="@if (Request::is('user/jurnalH','user/jurnalH/*')) active @endif">
                        <a class="nav-link" href="{{ route('user.jurnalH') }}">Jurnal Harian</a>
                    </li>
                </ul>
            </li>

            @endif
    </aside>
</div>
@endif
@endif
