<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Data Satpam</title>
</head>

<body>
    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">
                        Kode Barang
                    </th>
                    <th>Nama Barang</th>
                    <th>Tahun Perolehan</th>
                    <th>NUP</th>
                    <th>Merk</th>
                    <th>Kuantitas</th>
                    <th>Harga Satuan Barang</th>
                    <th>Harga</th>
                    <th>Kondisi</th>
                    <th>Penggunaan</th>
                    <th>Ruangan</th>
                    <th>Keterangan</th>
                    <th>Dokumentasi</th>
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
                            {{ $b->merk }}
                        </td>
                        <td>
                            {{ $b->kuantitas }}
                        </td>
                        <td>
                            {{ $b->harga_satuan_barang }}
                        </td>
                        <td>
                            {{ $b->harga }}
                        </td>
                        <td>
                            {{ $b->kondisi }}
                        </td>
                        <td>
                            {{ $b->penggunaan }}
                        </td>
                        <td>
                            {{ $b->ruangan }}
                        </td>
                        <td>
                            {{ $b->keterangan }}
                        </td>
                        <td>
                            {{ asset($b->dokumentasi) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    -->
</body>

</html>