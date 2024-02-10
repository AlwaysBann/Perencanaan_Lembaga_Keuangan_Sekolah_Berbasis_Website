@extends('layout.layout')
@section('title', 'Tagihan')
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
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">BAYAR TAGIHAN
            </h1>
            <div class="container my-5 d-flex justify-content-center">
                <div class="row justify-content-center align-items-center rounded-3 p-4"
                    style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
                    <form action="bayar" method="POST" enctype="multipart/form-data">
                        <div class="form">
                            <div class="form-group mb-3">
                                <label for="nis_siswa" style="color: #E6B31E;">NIS Siswa</label>
                                <input type="number" name="nis_siswa" id="nis_siswa" class="form-control"
                                    placeholder="NIS Siswa">
                                <input type="number" name="id_tagihan" id="id_tagihan" class="form-control"
                                    value="{{ $siswa->id_tagihan }}" hidden>

                                <input type="number" name="id_siswa" id="id_siswa" class="form-control"
                                    value="{{ $siswa->id_siswa }}" hidden>

                                @csrf
                            </div>
                            <div class="form-group mb-3">
                                <label for="jumlah_dana_pembayaran" style="color: #E6B31E;">Nominal</label>
                                <input type="number" class="form-control" id="jumlah_dana_pembayaran"
                                    name="jumlah_dana_pembayaran" placeholder="Nominal">
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama_sumber_dana" style="color: #E6B31E;">Jenis Tagihan</label>
                                <input type="string" class="form-control" id="nama_sumber_dana" name="nama_sumber_dana"
                                    value="Dana-SPP" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="waktu_pembayaran" style="color: #E6B31E;">Waktu Pembayaran</label>
                                <input type="date" class="form-control" id="waktu_pembayaran" name="waktu_pembayaran">
                            </div>
                            <div class="form-group mb-3">
                                <label for="bukti_pembayaran" style="color: #E6B31E;">Bukti Pembayaran</label>
                                <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran">
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
