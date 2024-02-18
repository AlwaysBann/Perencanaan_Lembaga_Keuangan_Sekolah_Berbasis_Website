@extends('layout.layout')
@section('title', 'Kelola data Master')
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
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">DATA ANGKATAN</h1>

            {{-- STORE FUNCTION --}}
            <h3 style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;"> Jumlah Angkatan =
                {{ $jumlahAngkatan ?? 0 }}</h3>

            <div class="card-body" style="margin-top: 200px">
                <div class="d-flex" style="margin-bottom: 20px">
                    <form action="angkatan/search" method="GET" class="me-4" style="position: relative">
                        <input type="text" name="search"
                            style="background-color: #343434; border: 1px solid #E6B31E; height: 100%; width: 250px; color: white; padding-left: 10px; border-radius: 7px"
                            placeholder="Cari Data Angkatan...">
                        <button type="submit"
                            style="height: 37px; position: absolute; background-color: #343434; border-top: 1px solid #E6B31E; border-left: 1px solid #E6B31E; border-bottom: 1px solid #E6B31E; border-right: none; border-radius: 0 7px 7px 0; right: 1px; color: white; width: 40px"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <a href="angkatan/tambah" class="btn btn-success rounded-pill" style=" min-width: 130px">
                        Tambah Angkatan
                    </a>
                </div>
                <div class="">
                    <table class="table table-bordered border-warning table-dark DataTable"
                        style="background-color: rgba(32, 32, 32, 0.637)">
                        <thead>
                            <tr>
                                <th style="max-width: 40px;">Id angkatan</th>
                                <th style="max-width: 40px;">No angkatan</th>
                                <th>tahun_masuk</th>
                                <th>tahun_keluar</th>
                                <th style="max-width: 40px">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($angkatan as $a)
                                <tr>
                                    <td style="min-width: 15px;">{{ $a->id_angkatan }}</td>
                                    <td style="max-width: 20px;">{{ $a->no_angkatan }}</td>
                                    <td>{{ $a->tahun_masuk }}</td>
                                    <td>{{ $a->tahun_keluar }}</td>
                                    <td style="max-width: 100px">
                                        <a href="angkatan/edit/{{ $a->id_angkatan }}" class="btn mx-4"
                                            style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; min-width: 80px;">
                                            EDIT
                                        </a>
                                        <btn class="btn btnHapus mx-2"
                                            style="background-color: white;font-weight: 600 ; color: red;  border: 1px solid #E6B31E; min-width: 80px;"
                                            idAngkatan="{{ $a->id_angkatan }}">HAPUS</btn>
                                    </td>
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
            let idAngkatan = $(this).closest('.btnHapus').attr('idAngkatan');
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
                        url: 'angkatan/hapus',
                        data: {
                            id_angkatan: idAngkatan,
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
