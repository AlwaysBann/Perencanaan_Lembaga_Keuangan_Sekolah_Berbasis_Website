@extends('layout.layout')
@section('title', 'Edit Realisasi')
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

            /* Added styles for image */
            #left-image {
                max-width: 200px;
                height: auto;
                margin-right: 20px;
            }
        </style>
    </head>

    <body>

        <div class="px-5 py-3">
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">EDIT DATA REALISASI
            </h1>
            <div class="container my-5">
                <div class="row justify-content-center align-items-center rounded-3 p-4"
                    style="background-color: rgba(32, 32, 32, 0.637); min-width: 800px">

                    <!-- gambar berada di sebelah kiri form -->
                    <div class="col-md-4">
                        <img id="left-image" src="{{ url('foto') . '/' . $realisasi->bukti_realisasi }} "
                            alt="Bukti Realisasi">
                    </div>

                    <!-- form yang ada di dalam row -->
                    <div class="col-md-8">
                        <form action="simpan" method="POST" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="nama_realisasi" name="id_realisasi"
                                value="{{ $realisasi->id_realisasi }}">

                            <!-- First Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="nama_realisasi" style="color: #E6B31E;">Nama Realisasi</label>
                                        <input type="text" class="form-control" id="nama_realisasi" name="nama_realisasi"
                                            placeholder="Nama Realisasi" value="{{ $realisasi->nama_realisasi }}">
                                        @csrf
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="jumlah_dana_realisasi" style="color: #E6B31E;">Jumlah dana
                                            realisasi</label>
                                        <input type="text" class="form-control" id="jumlah_dana_realisasi"
                                            name="jumlah_dana_realisasi" placeholder="Jumlah Dana Realisasi"
                                            value="{{ $realisasi->jumlah_dana_realisasi }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Second Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="ruangan" style="color: #E6B31E;">Ruangan</label>
                                        <select name="id_ruangan" id="ruangan" class="form-select form-control">
                                            @foreach ($ruangan as $r)
                                                <option value="{{ $r->id_ruangan }}"
                                                    {{ $r->id_ruangan == $r->id_ruangan ? 'selected' : '' }}>
                                                    {{ $r->nama_ruangan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="bukti_realisasi" style="color: #E6B31E;">Bukti Realisasi</label>
                                        <div class="d-flex align-items-start">
                                            <input type="file" class="form-control" id="bukti_realisasi"
                                                name="bukti_realisasi" value="{{ $realisasi->bukti_realisasi }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3 mb-3">
                                <button type="submit" class="btn me-4"
                                    style="background-color: white;font-weight: 500 ; color: green; border: 1px solid #E6B31E; min-width: 100px">SIMPAN</button>
                                <a href="#" onclick="window.history.back();" class="btn "
                                    style="background-color: white;font-weight: 500 ; color: red;  border: 1px solid #E6B31E;  min-width: 100px">KEMBALI</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
