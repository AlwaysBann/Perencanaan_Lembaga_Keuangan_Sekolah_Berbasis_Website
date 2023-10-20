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
        <div class="card-body" style="margin-top: 200px">
            <div class="d-flex" style="margin-bottom: 20px">
                <a href="realisasi/tambah" class="btn btn-success rounded-pill" style=" min-width: 130px">
                    Tambah Realisasi 
                </a>
                <a href="#" class="btn btn-warning rounded-pill ms-auto" style="color: white; min-width: 130px">
                    Log Activity
                </a>
            </div>
            <div class="">
                <table class="table table-bordered border-warning table-dark DataTable" style="background-color: rgba(32, 32, 32, 0.637)">
                    <thead>
                        <tr>
                            <th style="max-width: 40px">id realisasi</th>
                            <th>nama realisasi</th>
                            <th style="max-width: 90px">jumlah dana realisasi</th>
                            <th>Ruangan</th>
                            <th>bukti realisai</th>
                            <th style="max-width: 110px">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($realisasi as $r)
                        <tr>
                            <td>{{$r->id_realisasi}}</td>
                            <td>{{$r->nama_realisasi}}</td>
                            <td>{{$r->jumlah_dana_realisasi}}</td>
                            <td>{{$r->nama_ruangan}}</td>
                            <td>
                                @if ($r->bukti_realisasi)
                                <img src="{{ url('foto') . '/' . $r->bukti_realisasi }} "
                                    style="max-width: 250px; height: auto;" />
                            @endif
                            </td>
                            <td style="min-width: 110px">
                                <a href="akun/edit/" class="btn mx-4" style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; min-width: 80px;">
                                    EDIT
                                </a>
                                <btn class="btn btnHapus mx-2" style="background-color: white;font-weight: 600 ; color: red;  border: 1px solid #E6B31E; min-width: 80px;" idUser="">HAPUS</btn>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>
@endsection