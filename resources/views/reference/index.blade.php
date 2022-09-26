<!DOCTYPE html>
<html lang="en">

<head>
    @include('stisla.head')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('stisla.navbar')
            @include('stisla.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-warning alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    {{ $error }}
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if (session('status'))
                        <div class="alert alert-warning alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
                    <div class="section-header">
                        <h1>Admin Page</h1>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Hi, {{ auth()->user()->name }}</h2>
                        <p class="section-lead">
                            Welcome to admin page
                        </p>
                        <div class="card-body p-0">
                            {{-- <a class="btn btn-primary" href="#" data-toggle="modal"
                                data-target="#modalAddData">Tambah Jurusan</a></br></br> --}}
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Keterangan</th>
                                            <th>Jenis</th>
                                            <th>Kode</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Meja
                                            </td>
                                            <td>
                                                Meja Kerja
                                            </td>
                                            <td>
                                                MCK
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                Meja Pelayanan
                                            </td>
                                            <td>
                                                MJP
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                Meja Dapur
                                            </td>
                                            <td>
                                                MJD
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Kursi
                                            </td>
                                            <td>
                                                Kursi Sofa
                                            </td>
                                            <td>
                                                KS
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                Kursi Lipat
                                            </td>
                                            <td>
                                                KL
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                Kursi Roda
                                            </td>
                                            <td>
                                                KR
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                Kursi Biru
                                            </td>
                                            <td>
                                                KB
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Almari
                                            </td>
                                            <td>
                                                Almari Partisi
                                            </td>
                                            <td>
                                                AP
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Kabinet
                                            </td>
                                            <td>
                                                Kabinet Besar
                                            </td>
                                            <td>
                                                KBNB
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                Kabinet Biasa
                                            </td>
                                            <td>
                                                KBN
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                AC
                                            </td>
                                            <td>
                                                AC
                                            </td>
                                            <td>
                                                AC
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Dispenser
                                            </td>
                                            <td>
                                                Dispenser
                                            </td>
                                            <td>
                                                DPN
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Komputer
                                            </td>
                                            <td>
                                                AIO
                                            </td>
                                            <td>
                                                AIOPC
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                PC
                                            </td>
                                            <td>
                                                PC
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Printer
                                            </td>
                                            <td>
                                                Printer
                                            </td>
                                            <td>
                                                PRT
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Scanner
                                            </td>
                                            <td>
                                                Scanner
                                            </td>
                                            <td>
                                                SCN
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                CCTV
                                            </td>
                                            <td>
                                                CCTV
                                            </td>
                                            <td>
                                                CTV
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Telepon
                                            </td>
                                            <td>
                                                Telepon
                                            </td>
                                            <td>
                                                TLP
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- This is where your code ends -->
                        </div>

                        <!-- This is where your code ends -->
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                @include('stisla.footer')
            </footer>
        </div>
    </div>
    {{-- @include('barang.modal.update-barang'); --}}
    {{-- @include('barang.modal.delete-barang'); --}}
    @include('stisla.script')
</body>

</html>
