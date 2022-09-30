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
                            Data Kondisi
                        </p>
                        <div class="card-body p-0">
                            <a href="#" data-toggle="modal" data-target="#createData">
                                <button type="button" class="btn btn-info">Create</button>
                            </a>
                            {{-- <a class="btn btn-primary" href="#" data-toggle="modal"
                                data-target="#modalAddData">Tambah Jurusan</a></br></br> --}}
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                ID Kondisi
                                            </th>
                                            <th>Nama Kondisi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($conditions as $b)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $b->id }}
                                                </td>
                                                <td>
                                                    {{ $b->name }}
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#updateData{{ $b->id }}">
                                                            <button type="button" class="btn btn-warning">Edit</button>
                                                        </a>
                                                        {{-- <a href="{{ url('barang/' . $b->id . '/update') }}"
                                                            class="btn
                                                            btn-warning">Edit</a> --}}
                                                        <a href="{{ url('conditions/' . $b->id . '/delete') }}"
                                                            onClick="return confirm('Hapus data ini?')"
                                                            class="btn
                                                            btn-danger">Delete</a>
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
    @include('conditions.modal.create')
    @include('conditions.modal.update')
    @include('stisla.script')
</body>

</html>
