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
                        class="fas fa-folder-plus"></i> <span>Input Barang</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-server"></i> <span>Database</span></a>
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
            <li><a class="nav-link" href="{{ url('barang/export') }}"><i class="fas fa-print"></i>
                    <span>Laporan</span></a></li>
            <li><a class="nav-link" href="{{ url('barang/references') }}"><i class="fas fa-globe"></i>
                    <span>Referensi</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-server"></i> <span>Referensi
                        V2</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ url('categories/') }}"> <span>Kategori</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('conditions/') }}"> <span>Kondisi</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('rooms/') }}"> <span>Ruangan</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('keterangan/') }}"> <span>Keterangan</span></a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-recycle"></i> <span>Recycle
                        Bin</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ url('barang/recycle-bin') }}"> <span>Barang</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('categories/recycle-bin') }}"> <span>Kategori</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('conditions/recycle-bin') }}"> <span>Kondisi</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('rooms/recycle-bin') }}"> <span>Ruangan</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('keterangan/recycle-bin') }}"> <span>Keterangan</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
