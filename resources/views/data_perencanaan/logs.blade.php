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
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">ACTIVITY IN TABLE
                PERENCANAAN</h1>
            <div class="card-body" style="margin-top: 200px">
                <div class="d-flex" style="margin-bottom: 20px">
                    <a href="/pengajuan" class="btn btn-warning rounded-pill" style="color: white; min-width: 130px">
                        Kembali
                    </a>
                </div>
                <div class="">
                    <table class="table table-bordered border-warning table-dark DataTable"
                        style="background-color: rgba(32, 32, 32, 0.637)">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($logs as $l)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $l->logs }}</td>
                                    <td>{{ $waktuSekarang = date('Y-m-d H:i:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
