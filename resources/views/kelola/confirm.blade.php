@extends('layout.layout')
@section('title', 'Confirm')
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
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">CONFIRM PEMBAYARAN
            </h1>
            <div class="container my-5 d-flex justify-content-center">
                <div class="row justify-content-center align-items-center rounded-3 p-4"
                    style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
                    <form action="simpan" method="POST" enctype="multipart/form-data">
                        <div class="form">
                            <div class="form-group mb-3">
                                <label for="sumber_dana" style="color: #E6B31E;">Jenis Tagihan</label>
                                <input type="text" name="sumber_dana" id="sumber_dana"
                                    value="{{ $pembayaran->nama_sumber_dana }}" class="form-control">

                                <input type="number" name="id_pembayaran" id="id_pembayaran"
                                    value="{{ $pembayaran->id_pembayaran }}" class="form-control" hidden>
                                @csrf
                            </div>
                            <div class="form-group mb-3">
                                <label for="jumlah_dana" style="color: #E6B31E;">Jumlah Dana Pemasukan</label>
                                <input type="number" class="form-control" id="jumlah_dana" name="jumlah_dana"
                                    value="{{ $pembayaran->jumlah_dana_pembayaran }}">
                            </div>
                            <div class="form-group mb-3">
                                <input type="string" class="form-control" id="tipe" name="tipe" value="Pemasukan"
                                    hidden>
                            </div>
                            <div class="form-group mb-3">
                                <label for="waktu" style="color: #E6B31E;">Waktu Pemasukan</label>
                                <input type="date" class="form-control" id="waktu" name="waktu">
                            </div>
                            <div class="form-group mb-3">
                                <label for="bukti" style="color: #E6B31E;">Bukti Pemasukan</label>
                                <input type="text" name="bukti" id="bukti"
                                    value="{{ $pembayaran->bukti_pembayaran }}" class="form-control" hidden>
                                <br>
                                <img src="{{ url('bukti_pembayaran') . '/' . $pembayaran->bukti_pembayaran }} "
                                    style="width: 200px; height: 250px;" alt="Bukti Pembayaran" />
                            </div>
                            <div class="col-md-4 mt-3 mb-3">
                                <button type="submit" class="btn me-4"
                                    style="background-color: white;font-weight: 500 ; color: green; border: 1px solid #E6B31E; min-width: 100px">SIMPAN</button>
                                <a href="#" onclick="window.history.back();" class="btn"
                                    style="background-color: white;font-weight: 500 ; color: red;  border: 1px solid #E6B31E;  min-width: 100px">KEMBALI</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
