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
                        <div class="container">
                            <form action="{{ url('barang/search-ruang') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="form-label">Search by Ruangan</label>
                                    <select name="ruangan" id="" class="select2">
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info">Search Barang</button>
                            </form>
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

    @include('stisla.script')
</body>

</html>
