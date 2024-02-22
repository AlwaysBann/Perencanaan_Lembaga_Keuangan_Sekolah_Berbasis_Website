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
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">DATA KELAS</h1>

            {{-- STORE FUNCTION --}}
            <h3 style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;"> Jumlah Kelas =
                {{ $jumlahKelas ?? 0 }}</h3>

            <div class="card-body" style="margin-top: 200px">
                <div class="d-flex" style="margin-bottom: 20px">
                    <form action="kelas/search" method="GET" class="me-4" style="position: relative">
                        <input type="text" name="search"
                            style="background-color: #343434; border: 1px solid #E6B31E; height: 100%; width: 250px; color: white; padding-left: 10px; border-radius: 7px"
                            placeholder="Cari Data Kelas...">
                        <button type="submit"
                            style="height: 37px; position: absolute; background-color: #343434; border-top: 1px solid #E6B31E; border-left: 1px solid #E6B31E; border-bottom: 1px solid #E6B31E; border-right: none; border-radius: 0 7px 7px 0; right: 1px; color: white; width: 40px"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <a href="kelas/tambah" class="btn btn-success rounded-pill" style=" min-width: 130px">
                        Tambah Kelas
                    </a>
                </div>
                <div class="">
                    <table class="table table-bordered border-warning table-dark DataTable"
                        style="background-color: rgba(32, 32, 32, 0.637)">
                        <thead>
                            <tr>
                                <th style="max-width: 40px;">No</th>
                                <th>Nama Kelas</th>
                                <th>Angkatan</th>
                                <th>Jurusan</th>
                                <th style="min-width: 90px">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $k)
                                <tr>
                                    <td style="max-width: 20px;">{{ $k->id_kelas }}</td>
                                    <td>{{ $k->nama_kelas }}</td>
                                    <td>{{ $k->no_angkatan }}</td>
                                    <td>{{ $k->nama_jurusan }}</td>
                                    <td style="max-width: 60px">
                                        <a href="kelas/edit/{{ $k->id_kelas }}" class="btn mx-4"
                                            style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; min-width: 80px;">
                                            EDIT
                                        </a>
                                        <button class="btn btnHapus mx-2"
                                            style="background-color: white;font-weight: 600 ; color: red;  border: 1px solid #E6B31E; min-width: 80px;"
                                            idKelas="{{ $k->id_kelas }}">HAPUS</button>
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
            let idKelas = $(this).closest('.btnHapus').attr('idKelas');
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
                        url: 'kelas/hapus',
                        data: {
                            id_kelas: idKelas,
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
