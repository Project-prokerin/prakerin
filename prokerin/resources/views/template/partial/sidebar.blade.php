@if (Auth::user()->role == 'hubin' or Auth::user()->role == 'kaprog' or Auth::user()->role == 'bkk')
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
            <li class="{{ $sidebar == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>
            @if (Auth::user()->role == 'hubin' )
            <li class="menu-header">MASTER</li>
            <li class="{{ $sidebar == 'siswa' ? 'active' : '' }}">
            <a href="{{ route('siswa.index') }}" class="nav-link">
                <i class="fas fa-user"></i>
                <span>Data Siswa</span>
            </a>
            </li>
            <li class="{{ $sidebar == 'guru' ? 'active' : '' }}">
            <a href="{{ route('guru.index') }}" class="nav-link">
                <i class="fas fa-user"></i>
                <span>Data Guru</span>
            </a>
            </li>
            @endif
            @if (Auth::user()->role == 'kaprog' or Auth::user()->role == 'hubin')
            <li class="menu-header">PERUSAHAAN</li>
            <li class="{{ $sidebar == 'perusahaan' ? 'active' : '' }}">
            <a href="{{ url('perusahaan') }}" class="nav-link">
                <i class="far fa-building"></i>
                <span>Data Perusahaan</span>
            </a>
            </li>
            @endif
            @if (Auth::user()->role == 'bkk'  or Auth::user()->role == 'hubin' )
            <li class="menu-header">BKK</li>
            <li class="{{ $sidebar == 'pembekalan' ? 'active' : '' }}">
            <a href="{{ route('pembekalan.index') }}" class="nav-link">
                <i class="fas fa-newspaper"></i>
                <span>Pembekalan Magang</span>
            </a>
            </li>
            @endif
            @if (Auth::user()->role == 'kaprog' or Auth::user()->role == 'hubin')
            <li class="menu-header">PRAKERIN</li>
            <li class="{{ $sidebar == 'data_prakerin' ? 'active' : '' }}">
            <a href="{{ route('data_prakerin.index') }}" class="nav-link">
                <i class="fas fa-th"></i>
                <span>Data Prakerin</span>
            </a>
            </li>
            <li class="dropdown {{ ( $sidebar == 'jurnal' or  $sidebar == 'jurnalH' ) ? 'active' : '' }}">
                <a href="" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>Jurnal</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ $sidebar == 'jurnal' ? 'active' : '' }}"><a class="nav-link " href="{{ route('jurnal.index') }}">Jurnal Prakerin</a></li>
                    <li class="{{ $sidebar == 'jurnalH' ? 'active' : ''}}"><a class="nav-link " href="{{ route('jurnalH.index') }}">Jurnal Harian</a></li>
                </ul>
            </li>
            <li class="{{ $sidebar == 'kelompok' ? 'active' : '' }}">
            <a href="{{ route('kelompok.index') }}" class="nav-link"><i class="fas fa-users"></i>
                <span>Kelompok Prakerin</span>
            </a>
            </li>
            <li class="{{ $sidebar == 'laporan' ? 'active' : '' }}">
            <a href="{{ route('laporan.index') }}" class="nav-link"><i class="fas fa-file-alt"></i>
                <span>Laporan Prakerin</span>
            </a>
            </li>
            @endif
        </aside>
    </div>
@endif

{{-- user sidebar --}}
@if (Auth::user()->role == 'siswa' )
<div class="main-sidebar">
        <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{'/'}}" style="color:#6777ef;">DATA PRAKERIN</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a style="color:#6777ef;" href="{{'/'}}">DP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">MAIN</li>
            <li class="{{ $sidebar == 'dashboard' ? 'active' : ''  }}">
            <a href="{{ route('index.user') }}" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            </li>
                <li class="{{ $sidebar == 'perusahaan' ? 'active' : '' }}">
            <a href="{{ route('user.perusahaan') }}" class="nav-link">
                <i class="far fa-building"></i>
                <span>List Perusahaan</span>
            </a>
            </li>
            <li class="{{ $sidebar == 'pembekalan' ? 'active' : '' }}">
            <a href="{{ route('user.pembekalan') }}" class="nav-link">
                <i class="fas fa-newspaper"></i>
                <span>Pembekalan Magang</span>
            </a>
            </li>


            {{-- @if(empty(Auth::user()->siswa->data_prakerin))
            ''
            @else --}}
            <li class="menu-header">MAGANG</li>
            <li class="{{ $sidebar == 'status' ? 'active' : '' }}">
            <a href="{{ route('user.status') }}" class="nav-link">
                <i class="fas fa-user"></i>
                <span>Status Magang</span>
            </a>
            </li>
            <li class="dropdown {{ ($sidebar == 'jurnal' || $sidebar == 'jurnalH')  ? 'active' : ''}}  ">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper"></i> <span>Jurnal</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ $sidebar == 'jurnal' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.jurnal') }}">Jurnal Prakerin</a>
                    </li>
                    <li class="{{ $sidebar == 'jurnalH' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.jurnalH') }}">Jurnal Harian</a>
                    </li>
                </ul>
            </li>
            <li class="{{ $sidebar == 'kelompok_laporan' ? 'active' : '' }}">
            <a href="{{ route('user.kelompok_laporan') }}" class="nav-link">
                <i class="fas fa-users"></i>
                <span>Kelompok Laporan</span>
            </a>
            </li>
            {{-- @endif --}}
        </aside>
    </div>

@endif




