@extends('layout.layout')
@section('title', 'Realisasi')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background-image: url('/img/background.png');
            background-size: 100%;
            background-repeat: repeat-y;
        }
    </style>
</head>
<body>
    <div class="px-5 py-3">
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">Realisasi</h1>      
        @include('layout.flash-massage')     
        <div class="card-body" style="margin-top: 200px">
            <div class="d-flex" style="margin-bottom: 20px">
                <form action="realisasi/search" method="GET" class="me-4" style="position: relative">
                    <input type="text" name="search" style="background-color: #343434; border: 1px solid #E6B31E; height: 100%; width: 250px; color: white; padding-left: 10px; border-radius: 7px" placeholder="Cari Data Realisasi...">
                    <button type="submit" style="height: 37px; position: absolute; background-color: #343434; border-top: 1px solid #E6B31E; border-left: 1px solid #E6B31E; border-bottom: 1px solid #E6B31E; border-right: none; border-radius: 0 7px 7px 0; right: 1px; color: white; width: 40px"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                @if (Auth::check() && Auth::User()->role == 'pengelola')
                    <a href="realisasi/cetak" class="btn btn-info rounded-pill" style="color: white; min-width: 130px">
                        Cetak List Data
                    </a>
                <a href="/realisasi/logs" class="btn btn-warning rounded-pill ms-auto" style="color: white; min-width: 130px">
                    Log Activity
                </a>
                @endif
                @if (Auth::check() && Auth::User()->role == 'peminta')
                <a href="realisasi/cetak" class="btn btn-info rounded-pill" style="color: white; min-width: 130px">
                    Cetak List Data
                </a>
                <a href="/realisasi/logs" class="btn btn-warning rounded-pill ms-auto" style="color: white; min-width: 130px">
                    Log Activity
                </a>
                @endif
                @if (Auth::check() && Auth::User()->role == 'siswa')
                <button class="btn btn-warning rounded-pill ms-auto" style=" min-width: 130px;" disabled>
                    <a href="/realisasi/logs" style="color: white; text-decoration: none">Log Activity</a>
                </button>
                @endif
            </div>
            <div class="">
                <table class="table table-bordered border-warning table-dark DataTable" style="background-color: rgba(32, 32, 32, 0.637)">
                    <thead>
                        <tr>
                            <th style="max-width: 60px">id realisasi</th>
                            <th>nama perencanaan</th>
                            <th>nama realisasi</th>
                            <th style="max-width: 90px">jumlah dana realisasi</th>
                            <th>bukti realisai</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($realisasi as $r)
                            <tr>
                                <td>{{$r->id_realisasi}}</td>
                                <td>{{$r->nama_perencanaan}}</td>
                                <td>{{$r->nama_realisasi}}</td>
                                <td>{{$r->jumlah_dana_realisasi}}</td>
                                <td style="margin-right: 0px">
                                @if ($r->bukti_realisasi)
                                    <img src="{{ url('foto') . '/' . $r->bukti_realisasi }} "
                                    style="max-width: 150px; height: auto;" />
                                @endif
                                </td>
                            </td>
                            @if (Auth::check() && Auth::User()->role == 'siswa' || Auth::User()->role == 'peminta')
                            <td style="max-width: 200px">
                                <button class="btn mx-2" style="background-color: white;font-weight: 600 ; border: 1px solid #E6B31E; min-width: 80px;" disabled>
                                    <a href="realisasi/edit/{{$r->id_realisasi}}" style="color: green; text-decoration: none">EDIT</a>
                                </button>
                                <button class="btn mx-2" style="background-color: white;font-weight: 600 ; border: 1px solid #E6B31E; min-width: 80px;" disabled>
                                    <a href="realisasi/detail/{{$r->id_realisasi}}" style="color: #E6B31E; text-decoration: none">DETAIL</a>
                                </button>
                                <button class="btn btnHapus mx-2" style="background-color: white;font-weight: 600 ; color: red;  border: 1px solid #E6B31E; min-width: 80px;" idRealisasi="{{$r->id_realisasi}}" disabled>HAPUS</button>
                            </td>
                            @endif
                            @if (Auth::check() && Auth::User()->role == 'pengelola')
                            <td style="max-width: 200px">
                                <a href="realisasi/edit/{{$r->id_realisasi}}" class="btn mx-2" style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; min-width: 80px;">
                                    EDIT
                                </a>
                                <a href="realisasi/detail/{{$r->id_realisasi}}" class="btn mx-2" style="background-color: white;font-weight: 600 ; color: #E6B31E; border: 1px solid #E6B31E; min-width: 80px;">
                                    DETAIL
                                </a>
                                <btn class="btn btnHapus mx-2" style="background-color: white;font-weight: 600 ; color: red;  border: 1px solid #E6B31E; min-width: 80px;" idRealisasi="{{$r->id_realisasi}}">HAPUS</btn>
                            </td>
                            @endif
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
        let idRealisasi = $(this).closest('.btnHapus').attr('idRealisasi');
        swal.fire({
            title: "Apakah anda ingin menghapus data "+idRealisasi+" ?",
            showCancelButton: true,
            confirmButtonText: 'Setuju',
            cancelButtonText: `Batal`,
            confirmButtonColor: 'red'

        }).then((result) => {
            if (result.isConfirmed) {
                //Ajax Delete
                $.ajax({
                    type: 'DELETE',
                    url: 'realisasi/hapus',
                    data: {
                        id_realisasi: idRealisasi,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.success) {
                            swal.fire('Data ' + idRealisasi + ' Berhasil di hapus!', '', 'success').then(function() {
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