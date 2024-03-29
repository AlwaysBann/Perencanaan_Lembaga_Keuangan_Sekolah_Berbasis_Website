@extends('layout.layout')
@section('title', 'Perencanaan')
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
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">Perencanaan</h1>
            <h3 style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;"> Jumlah Data Perencanaan =
                {{ $jumlahPerencanaan ?? 0 }}</h3>
            @include('layout.flash-massage')
            <div class="card-body" style="margin-top: 200px">
                <div class="d-flex" style="margin-bottom: 20px">
                    <form action="perencanaan/search" method="GET" class="me-4" style="position: relative">
                        <input type="text" name="search"
                            style="background-color: #343434; border: 1px solid #E6B31E; height: 100%; width: 250px; color: white; padding-left: 10px; border-radius: 7px"
                            placeholder="Cari Data Perencanaan...">
                        <button type="submit"
                            style="height: 37px; position: absolute; background-color: #343434; border-top: 1px solid #E6B31E; border-left: 1px solid #E6B31E; border-bottom: 1px solid #E6B31E; border-right: none; border-radius: 0 7px 7px 0; right: 1px; color: white; width: 40px"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <a href="perencanaan/cetak/" class="btn btn-info rounded-pill ms-auto"
                        style="color: white; min-width: 130px">
                        Cetak List Data
                    </a>
                    <a href="perencanaan/logs" class="btn btn-warning rounded-pill ms-4"
                        style="color: white; min-width: 130px">
                        Log Activity
                    </a>
                </div>
                <div class="">
                    <table class="table table-bordered border-warning table-dark DataTable"
                        style="background-color: rgba(32, 32, 32, 0.637)">
                        <thead>
                            <tr>
                                <th style="max-width: 40px">No</th>
                                <th>Nama Pengajuan</th>
                                <th style="max-width: 90px"> Nama Perencanaan </th>
                                <th>Nama Penanggung Jawab</th>
                                <th>Waktu Realisasi</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perencanaan as $o)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $o->nama_pengajuan }}</td>
                                    <td>{{ $o->nama_perencanaan }}</td>
                                    <td>{{ $o->nama_penanggung_jawab }}</td>
                                    <td>{{ $o->waktu_realisasi }}</td>
                                    @if (Auth::check() && Auth::User()->role == 'peminta')
                                        <td style="max-width:">
                                            <a href="perencanaan/detail/{{ $o->id_perencanaan }}" class="btn "
                                                style="background-color: white;font-weight: 600 ; color: #E6B31E; border: 1px solid #E6B31E;">
                                                DETAIL
                                            </a>
                                            <a href="perencanaan/edit/{{ $o->id_perencanaan }}" class="btn mx-4"
                                                style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; ">
                                                EDIT
                                            </a>
                                            <btn class="btn btnHapus mx-2"
                                                style="background-color: white;font-weight: 600 ; color: red;  border: 1px solid #E6B31E; "
                                                idPengajuan="{{ $o->id_perencanaan }}">HAPUS</btn>
                                        </td>
                                    @endif
                                    @if (Auth::check() && Auth::User()->role == 'pengelola')
                                        <td style="max-width: ">
                                            <a href="perencanaan/detail/{{ $o->id_perencanaan }}" class="btn "
                                                style="background-color: white;font-weight: 600 ; color: #E6B31E; border: 1px solid #E6B31E;">
                                                DETAIL
                                            </a>
                                            <a href="realisasi/tambah/{{ $o->id_perencanaan }}" class="btn mx-4"
                                                style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; ">
                                                REALISASI
                                            </a>
                                            <button class="btn btnHapus mx-2"
                                                style="background-color: white;font-weight: 600 ; color: red;  border: 1px solid #E6B31E; "
                                                idPerencanaan="{{ $o->id_perencanaan }}">HAPUS</button>
                                        </td>
                                    @endif
                                    @if (Auth::check() && Auth::User()->role == 'siswa')
                                        <td style="max-width: 175px">
                                            <button class="btn mx-4"
                                                style="background-color: white;font-weight: 600 ; border: 1px solid #E6B31E; min-width: 80px;"
                                                disabled>
                                                <a href="perencanaan/detail/{{ $o->id_pengajuan }}"
                                                    style="color: #E6B31E; text-decoration: none">DETAIL</a>
                                            </button>
                                            <button class="btn mx-4"
                                                style="background-color: white;font-weight: 600 ; border: 1px solid #E6B31E; min-width: 80px;"
                                                disabled>
                                                <a href="perencanaan/edit/{{ $o->id_perencanaan }}"
                                                    style="color: green; text-decoration: none">EDIT</a>
                                            </button>
                                            <button class="btn btnHapus mx-2"
                                                style="background-color: white;font-weight: 600 ; color: red;  border: 1px solid #E6B31E; min-width: 80px;"
                                                idRealisasi="{{ $r->id_realisasi }}" disabled>HAPUS</button>
                                        </td>
                                    @endif
                                </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </body>
    <script type="module">
        $('.DataTable tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idPerencanaan = $(this).closest('.btnHapus').attr('idPerencanaan');
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
                        url: 'perencanaan/hapus',
                        data: {
                            id_perencanaan: idPerencanaan,
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
