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
                                            <th class="text-center">
                                                Kode Barang
                                            </th>
                                            <th>Nama Barang</th>
                                            <th>Tahun Perolehan</th>
                                            <th>NUP</th>
                                            <th>Kategori</th>
                                            <th>Merk</th>
                                            <th>Kuantitas</th>
                                            <th>Harga Satuan Barang</th>
                                            <th>Harga</th>
                                            <th>Kondisi</th>
                                            <th>Penggunaan</th>
                                            <th>Ruangan</th>
                                            <th>Keterangan</th>
                                            <th>Dokumentasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $b)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $b->kode_barang }}
                                                </td>
                                                <td>
                                                    {{ $b->nama_barang }}
                                                </td>
                                                <td>
                                                    {{ $b->tahun_perolehan }}
                                                </td>
                                                <td>
                                                    {{ $b->nup }}
                                                </td>
                                                <td>
                                                    {{ $b->categories->name }}
                                                </td>
                                                <td>
                                                    {{ $b->merk }}
                                                </td>
                                                <td>
                                                    {{ $b->kuantitas }}
                                                </td>
                                                <td>
                                                    Rp. {{ number_format($b->harga_satuan_barang) }}
                                                </td>
                                                <td>
                                                    Rp. {{ number_format($b->harga) }}
                                                </td>
                                                <td>
                                                    {{ $b->conditions->name }}
                                                </td>
                                                <td>
                                                    {{ $b->penggunaan }}
                                                </td>
                                                <td>
                                                    {{ $b->rooms->name }}
                                                </td>
                                                <td>
                                                    {{ $b->keterangan->name }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset($b->dokumentasi) }}" alt=""
                                                        width="300" height="200">
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{ url('barang/' . $b->id . '/restore') }}"
                                                            onClick="return confirm('Restore barang ini?')"
                                                            class="btn
                                                            btn-info">Restore</a>
                                                        <a href="{{ url('barang/' . $b->id . '/force-delete') }}"
                                                            onClick="return confirm('Hapus barang ini untuk selamanya?')"
                                                            class="btn
                                                            btn-danger">Delete
                                                            Forever</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
    {{-- @include('barang.modal.update-barang') --}}
    {{-- @include('barang.modal.delete-barang'); --}}
    @include('stisla.script')
    <script>
        var formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',

            // These options are needed to round to whole numbers if that's what you want.
            //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
            //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
        });
        $("#kuantitas, #satuan").keyup(function() {
            update();
        });

        function update() {
            let a = parseFloat($('#kuantitas').val());
            let b = parseFloat($('#satuan').val());
            let x = a * b;
            $("#harga").val(x);
        }
    </script>
</body>

</html>
