<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cetak Data Pengajuan</title>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center">Data Pengajuan</h1>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengajuan</th>
                        <th>Nama Pengaju</th>
                        <th>Tujuan Pengajuan</th>
                        <th>Nama Item</th>
                        <th>Harga Satuan</th>
                        <th>Gambar Item</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengajuan as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama_pengajuan }}</td>
                            <td>{{ $p->nama_pengaju }}</td>
                            <td>{{ $p->tujuan_pengajuan }}</td>
                            <td>{{ $p->nama_item }}</td>
                            <td>{{ $p->harga_satuan }}</td>
                            <td>
                                @if (!empty($imageDataArray[$loop->index]))
                                    <img src="{{ $imageDataArray[$loop->index]['src'] }}"
                                        alt="{{ $imageDataArray[$loop->index]['alt'] }}"
                                        style="max-width: 100px; height: auto;" />
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>
