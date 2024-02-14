@extends('layout.layout')
@section('title', 'Dashboard M-ONE')
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
        @if (Auth::check())
        <div class="px-5 py-3">
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">DASHBOARD M-ONE</h1>
            @include('layout.flash-massage')
            <h3 style="color: hsl(45, 80%, 51%); text-shadow: 0px 0px 2px white; font-weight: 900; margin: 20px">TOTAL
                KEUANGAN</h3>
            <p
                style="color: white; text-shadow: 0px 0px 2px white; font-weight: 900; margin: 20px; font-size: 100px; text-shadow: 0px 0px 5px #E6B31E;">
                Rp.{{ $totalDana }}</p>
            <div class="card-body" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card" style="overflow: hidden; border-radius: 34px; border: 1px solid white;">
                            <div class="card-body text-white" style="background-color: #E6B31E; padding: 30px;">
                                <h2 class="card-title text-center"
                                    style="text-shadow: 0px 0px 2px black; font-weight: 900;">DANA BOS</h2>
                                <p class="card-text text-center fs-2"
                                    style="text-shadow: 0px 0px 2px black; font-weight: 900;">
                                    Rp. {{ $totalBOS }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card" style="overflow: hidden; border-radius: 34px; border: 1px solid white;">
                            <div class="card-body text-white" style="background-color: #E6B31E; padding: 30px;">
                                <h2 class="card-title text-center"
                                    style="text-shadow: 0px 0px 2px black; font-weight: 900;">DANA BOPD</h2>
                                <p class="card-text text-center fs-2"
                                    style="text-shadow: 0px 0px 2px black; font-weight: 900;">
                                    Rp. {{ $totalBOPD }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card" style="overflow: hidden; border-radius: 34px; border: 1px solid white;">
                            <div class="card-body text-white" style="background-color: #E6B31E; padding: 30px;">
                                <h2 class="card-title text-center"
                                    style="text-shadow: 0px 0px 2px black; font-weight: 900;">DANA KOMITE</h2>
                                <p class="card-text text-center fs-2"
                                    style="text-shadow: 0px 0px 2px black; font-weight: 900;">
                                    Rp. {{ $totalKomite }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card" style="overflow: hidden; border-radius: 34px; border: 1px solid white;">
                            <div class="card-body text-white" style="background-color: #E6B31E; padding: 30px;">
                                <h2 class="card-title text-center"
                                    style="text-shadow: 0px 0px 2px black; font-weight: 900;">DANA SPP</h2>
                                <p class="card-text text-center fs-2"
                                    style="text-shadow: 0px 0px 2px black; font-weight: 900;">
                                    Rp. {{ $totalSPP }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body" style="margin-top: 50px">
                <div class="d-flex" style="margin-bottom: 20px">
                    <a href="kelola/tambah" class="btn btn-success rounded-pill" style=" min-width: 130px">
                        Tambah Kelola Keuangan
                    </a>
                    <a href="kelola/cetak" class="btn btn-success rounded-pill mx-2" style=" min-width: 130px">
                        Cetak PDF
                    </a>
                </div>
                <div class="">
                    <table class="table table-bordered border-warning table-dark DataTable"
                        style="background-color: rgba(32, 32, 32, 0.637)">
                        <thead>
                            <tr>
                                <th style="max-width: 50px;">Id_kelola_keuangan</th>
                                <th>Tipe</th>
                                <th>Sumber dana</th>
                                <th>Waktu</th>
                                <th style="min-width: 90px">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelola as $k)
                                <tr>
                                    <td style="max-width: 20px;">{{ $k->id_kelola_keuangan }}</td>
                                    <td>{{ $k->tipe }}</td>
                                    <td>{{ $k->nama_sumber_dana }}</td>
                                    <td>{{ $k->waktu }}</td>
                                    <td style="max-width: 150px">
                                        <a href="kelola/edit/{{ $k->id_kelola_keuangan }}" class="btn mx-2"
                                            style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; min-width: 80px;">
                                            EDIT
                                        </a>
                                        <a href="kelola/detail/{{ $k->id_kelola_keuangan }}" class="btn"
                                            style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; min-width: 80px;">
                                            DETAIL
                                        </a>
                                        <button class="btn btnHapus mx-2"
                                            style="background-color: white;font-weight: 600 ; color: red;  border: 1px solid #E6B31E; min-width: 80px;"
                                            idKelola="{{ $k->id_kelola_keuangan }}">HAPUS</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
    </body>
    <script type="module">
        $('.DataTable tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idKelola = $(this).closest('.btnHapus').attr('idKelola');
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
                        url: 'kelola/hapus',
                        data: {
                            id_kelola_keuangan: idKelola,
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
