<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cetak Data Detail Pengajuan</title>
</head>

<body>
    <div class="container">
        <h3 style="text-align: center">Data Detail Pengajuan</h3>
        <div class="row">
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengajuan</th>
                        <th>Nama Pengaju</th>
                        <th>Tujuan Pengajuan</th>
                        <th>Ruangan</th>
                        <th>Nama Item</th>
                        <th>Jumlah Item</th>
                        <th>Gambar Item</th>
                        <th>spesifikasi Item</th>
                        <th>Harga Satuan</th>
                        <th>Jenis Item</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @php
                            $counter = 1;
                        @endphp
                        <td>{{ $counter++ }}</td>
                        <td>{{ $pengajuan->nama_pasien }}</td>
                        <td> {{ $pengajuan->nama_pengaju }}</td>
                        <td>{{ $pengajuan->tujuan_pengajuan }}</td>
                        <td>
                            @foreach ($ruangan as $i)
                                @if ($pengajuan->id_ruangan == $i->id_ruangan)
                                    {{ $i->nama_ruangan }}
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $pengajuan->nama_item }}</td>
                    <td>{{ $pengajuan->jumlah_item }}</td>
                    <td>
                        @if (!empty($imageDataArray))
                            <img src="{{ $imageDataArray[0]['src'] }}" alt="{{ $imageDataArray[0]['alt'] }}"
                                style="max-width: 80px; height: auto;" />
                        @endif
                    </td>
                    <td>{{ $pengajuan->spesifikasi_item }}</td>
                    <td>{{ $pengajuan->harga_satuan }}</td>
                    <td>{{ $pengajuan->jenis_item }}</td>
                </tr>
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
