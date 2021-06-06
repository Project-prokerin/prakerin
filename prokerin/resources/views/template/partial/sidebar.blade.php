@if(Auth::check())
@php $role = Auth::user()->role; @endphp
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
                    <i class="fas fa-user"></i>
                    <span>Data Siswa</span>
                </a>
            </li>
            <li class="@if (Request::is('admin/guru','admin/guru/*')) active @endif">
                <a href="{{ route('guru.index') }}" class="nav-link">
                    <i class="fas fa-user"></i>
                    <span>Data Guru</span>
                </a>
            </li>
            <li class="@if (Request::is('admin/kelas','admin/kelas/*')) active @endif">
                <a href="{{ route('kelas.index') }}" class="nav-link">
                    <i class="fas fa-user"></i>
                    <span>Data Kelas</span>
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 'kaprog' or Auth::user()->role == 'hubin' or Auth::user()->role == 'bkk')
            <li class="menu-header">PRAKERIN</li>
            @endif
            @if (Auth::user()->role == 'kaprog' or Auth::user()->role == 'hubin')
            <li class="@if (Request::is('admin/perusahaan','admin/perusahaan/*')) active @endif">
                <a href="{{ route('perusahaan.index') }}" class="nav-link">
                    <i class="far fa-building"></i>
                    <span>Data Perusahaan</span>
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 'bkk' or Auth::user()->role == 'hubin' )
            <li class="@if (Request::is('admin/pembekalan','admin/pembekalan/*')) active @endif">
                <a href="{{ route('pembekalan.index') }}" class="nav-link">
                    <i class="fas fa-newspaper"></i>
                    <span>Pembekalan Magang</span>
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 'kaprog' or Auth::user()->role == 'hubin')
            <li class="@if (Request::is('admin/data_prakerin','admin/data_prakerin/*')) active @endif">
                <a href="{{ route('data_prakerin.index') }}" class="nav-link">
                    <i class="fas fa-th"></i>
                    <span>Data Prakerin</span>
                </a>
            </li>
            <li class="dropdown
            @if (Request::is('admin/jurnalH','admin/jurnalH/*'))
            active
            @elseif(Request::is('admin/jurnal','admin/jurnal/*'))
            active
            @endif

            ">
                <a href="" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>Jurnal</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="@if (Request::is('admin/jurnal','admin/jurnal/*')) active @endif"><a class="nav-link "
                            href="{{ route('jurnal.index') }}">Jurnal Prakerin</a></li>
                    <li class="@if (Request::is('admin/jurnalH','admin/jurnalH/*')) active @endif"><a class="nav-link "
                            href="{{ route('jurnalH.index') }}">Jurnal Harian</a></li>
                </ul>
            </li>
            <li class="@if (Request::is('admin/kelompok','admin/kelompok/*')) active @endif">
                <a href="{{ route('kelompok.index') }}" class="nav-link"><i class="fas fa-users"></i>
                    <span>Kelompok Prakerin</span>
                </a>
            </li>
            <li class="@if (Request::is('admin/laporan','admin/laporan/*')) active @endif">
                <a href="{{ route('laporan.index') }}" class="nav-link"><i class="fas fa-file-alt"></i>
                    <span>Laporan Prakerin</span>
                </a>
            </li>
            @endif
            @if($role == "hubin" or $role == "kepsek")
            @if ($role == 'kepsek')
                <li class="menu-header">Prakerin</li>
            @endif
            <li class='@if (Request::is("admin/$role/surat_keluar","admin/$role/surat_keluar/*")) active @endif'>
                <a href='{{ route("$role.surat_keluar.index") }}' class="nav-link"><i class="fas fa-file-alt"></i>
                    <span>Surat Penugasan </span>
                </a>
            </li>
            @elseif($role == "admin")

            <li class='@if (Request::is("admin/surat_keluar","admin/surat_keluar/*")) active @endif'>
                <a href='{{ route("$role.surat_keluar.index") }}' class="nav-link"><i class="fas fa-file-alt"></i>
                    <span>Surat Penugasan </span>
                </a>
            </li>
            @endif
            @if($role == 'tu' || $role == 'kepsek' || $role == 'hubin' || $role == 'sarpras' || $role == 'kurikulum' || $role == 'kesiswaan')
                <li class="menu-header">Takola</li>
            <li class='@if (Request::is("admin/$role/surat_masuk","admin/$role/surat_masuk/*")) active @endif'>
            <a href='{{ route("surat_masuk.$role.index") }}' class="nav-link">
                <i class="far fa-envelope"></i>
                <span>Surat Masuk</span>
            </a>
            </li>
            @if (Auth::user()->role == 'kepsek')
            <li class='@if (Request::is("admin/$role/disposisi","admin/$role/disposisi/*")) active @endif'>
            <a href='{{ route("disposisi.$role.index") }}' class="nav-link">
                <i class="fas fa-envelope-open-text"></i>
                <span>Disposisi</span>
            </a>
            </li>
            @endif
            {{-- <li class="@if (Request::is('#','#/*')) active @endif">
            <a href="#" class="nav-link">
                <i class="far fa-envelope"></i>
                <span>Surat Keluar</span>
            </a>
            </li> --}}

            @elseif($role == 'admin')
                <li class="menu-header">Takola</li>
            <li class='@if (Request::is("admin/surat_masuk","admin/surat_masuk/*")) active @endif'>
                <a href='{{ route('admin.surat_masuk.index') }}' class="nav-link">
                    <i class="fas fa-th"></i>
                    <span>Surat Masuk</span>
                </a>
            </li>
            <li class='@if (Request::is("admin/disposisi","admin/disposisi/*")) active @endif'>
                <a href='{{ route('disposisi.admin.index') }}' class="nav-link">
                    <i class="fas fa-th"></i>
                    <span>Disposisi</span>
                </a>
            </li>
            {{-- <li class="@if (Request::is('#','#/*')) active @endif">
                <a href="#" class="nav-link">
                    <i class="fas fa-th"></i>
                    <span>Surat Keluar</span>
                </a>
            </li> --}}
@endif

    </aside>
</div>
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


            @if(empty(Auth::user()->siswa->data_prakerin))

            @else
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
            <li class="@if (Request::is('user/kelompok_laporan','user/kelompok_laporan/*')) active @endif">
                <a href="{{ route('user.kelompok_laporan') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Kelompok Laporan</span>
                </a>
            </li>
            @endif
    </aside>
</div>
@endif
@endif
