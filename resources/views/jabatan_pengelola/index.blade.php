@extends('layout.layout')
@section('title', 'Kelola data Jabatan Pengelola')
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
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">DATA JABATAN
                PENGELOLA</h1>
            @include('layout.flash-massage')
            <div class="card-body" style="margin-top: 200px">
                <div class="d-flex" style="margin-bottom: 20px">
                    <a href="/jabatan_pengelola/tambah" class="btn btn-success rounded-pill" style=" min-width: 130px">
                        Tambah Jabatan
                    </a>
                </div>
                <div class="">
                    <table class="table table-bordered border-warning table-dark DataTable"
                        style="background-color: rgba(32, 32, 32, 0.637)">
                        <thead>
                            <tr>
                                <th style="max-width: 35px;">No</th>
                                <th>Nama Jabatan</th>
                                <th style="min-width: 60px">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jabatan as $j)
                                <tr>
                                    <td>{{ $j->id_jabatan_pengelola }}</td>
                                    <td>{{ $j->nama_jabatan_pengelola }}</td>
                                    <td style="max-width: 40px">
                                        <a href="jabatan_pengelola/edit/{{ $j->id_jabatan_pengelola }}" class="btn mx-4"
                                            style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; min-width: 80px;">
                                            EDIT
                                        </a>
                                        <btn class="btn btnHapus mx-2"
                                            style="background-color: white;font-weight: 600 ; color: red;  border: 1px solid #E6B31E; min-width: 80px;"
                                            idJabatan="{{ $j->id_jabatan_pengelola }}">HAPUS</btn>
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
            let idJabatan = $(this).closest('.btnHapus').attr('idJabatan');
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
                        url: 'jabatan_pengelola/hapus',
                        data: {
                            id_jabatan_pengelola: idJabatan,
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
