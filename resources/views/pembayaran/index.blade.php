@extends('layout.layout')
@section('title', 'Pembayaran')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
            body {
                background-image: url('/img/background.png');
                background-size: 100%;
                background-repeat: repeat-y;
            }
        </style>
    </head>

    <body>
        <div class="px-5 py-3">
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">DATA PEMBAYARAN</h1>
            @include('layout.flash-massage')
            <div class="card-body" style="margin-top: 200px">
                <div class="">
                    <table class="table table-bordered border-warning table-dark DataTable"
                        style="background-color: rgba(32, 32, 32, 0.637)">
                        <thead>
                            <tr>
                                <th>Id_tagihan</th>
                                <th>Nis siswa</th>
                                <th>Nama siswa</th>
                                <th>Waktu Pembayaran</th>
                                <th style="max-width: 40px">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $bayar)
                                <tr>
                                    <td>{{ $bayar->id_tagihan }}</td>
                                    <td>{{ $bayar->nis_siswa }}</td>
                                    <td>{{ $bayar->nama_siswa }}</td>
                                    <td>{{ \Carbon\Carbon::parse($bayar->waktu_pembayaran)->format('Y-m-d') }}</td>
                                    <td style="max-width: 175px">
                                        <a href="pembayaran/detail/{{ $bayar->id_pembayaran }}" class="btn mx-4"
                                            style="background-color: white;font-weight: 600 ; color: #E6B31E; border: 1px solid #E6B31E;">
                                            DETAIL
                                        </a>

                                        <a href="/pemasukan/confirm/{{ $bayar->id_pembayaran }}" class="btn mx-4"
                                            style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; ">
                                            CONFIRM
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <script type="module">
        $('.DataTable tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idRuangan = $(this).closest('.btnHapus').attr('idRuangan');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'

            }).then((result) => {
                if (result.isConfirmed) {
                    //Ajax Delete
                    $.ajax({
                        type: 'DELETE',
                        url: 'ruangan/hapus',
                        data: {
                            id_ruangan: idRuangan,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data.success) {
                                swal.fire('Berhasil di hapus!', '', 'success').then(function() {
                                    //Refresh Halaman
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>

    </html>
@endsection
