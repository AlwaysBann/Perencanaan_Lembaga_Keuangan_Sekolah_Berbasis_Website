@extends('layout.layout')
@section('title', 'Pengajuan')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Detail pengajuan</title>
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
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">DETAIL DATA
                PEMBAYARAN
            </h1>
            <div class="container my-5 d-flex justify-content-center">
                <div class="row justify-content-center align-items-center rounded-3 p-4"
                    style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
                    <div class="container">
                        <form>
                            <div class="row">

                                <div class="col-md-4 fs-5" style="color: #E6B31E;">
                                    <div class="form-group mb-3">
                                        <label for="">Nama Siswa</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Id pembayaran</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Jenis tagihan</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">NIS</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Jumlah Pembayaran</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Waktu Pembayaran</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Bukti Pembayaran</label>
                                    </div>
                                </div>

                                <div class="col-md-4 fs-5" style="color: #FFFF;">
                                    <div class="form-group mb-3">
                                        <label for="">{{ $pembayaran->nama_siswa }}</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">{{ $pembayaran->id_pembayaran }}</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">{{ $pembayaran->nama_sumber_dana }}</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">{{ $pembayaran->nis_siswa }}</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">{{ $pembayaran->jumlah_dana_pembayaran }}</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="">{{ \Carbon\Carbon::parse($pembayaran->waktu_pembayaran)->format('Y-m-d') }}</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <img src="{{ url('bukti_pembayaran') . '/' . $pembayaran->bukti_pembayaran }} "
                                            style="width: 200px; height: 250px;" alt="Profile" />
                                    </div>
                                </div>

                                <div class="col-md-4 mt-auto">
                                    <div class="form-group mb-3 mx-5">
                                        <a href="#" onclick="window.history.back();" class="btn "
                                            style="background-color: white;font-weight: 500 ; color: red;  border: 1px solid #E6B31E;  min-width: 100px">KEMBALI</a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </body>

    </html>
@endsection
;
