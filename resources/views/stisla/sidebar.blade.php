<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Sistem Asset</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">SA</a>
        </div>
        <ul class="sidebar-menu">
            <li><a class="nav-link @if (Request::is('/home')) active @endif" href="{{ url('home') }}"><i
                        class="fas fa-columns"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link @if (Request::is('/barang/create')) active @endif" href="{{ url('barang/create') }}"><i
                        class="fas fa-columns"></i> <span>Input Barang</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i> <span>Database</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ url('barang/') }}"> <span>Seluruh</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('barang/search-tahun') }}"> <span>Berdasarkan Tahun</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('barang/search-ruang') }}"> <span>Berdasarkan
                                Ruangan</span></a>
                    </li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ url('barang/export') }}"><i class="fas fa-columns"></i>
                    <span>Laporan</span></a></li>
            <li><a class="nav-link" href="{{ url('barang/references') }}"><i class="fas fa-columns"></i>
                    <span>Referensi</span></a></li>
        </ul>
    </aside>
</div>
