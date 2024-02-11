@extends('layout.layout')
@section('title', 'Profile Akun')
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
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">Profile Akun</h1>
            <div class="container my-5 d-flex justify-content-center rounded-3 p-4"
                style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <img src="{{ auth()->user()->foto_profil == null ? asset('img/Profile.png') : asset('foto/' . auth()->user()->foto_profil) }}"
                                    alt="" style="width: 65%" class="mx-auto">
                            </div>
                            <div class="row text-center">
                                <div class="col my-2"
                                    style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                    Nama Akun</div>
                                <p class="fs-5 text-white">{{ $siswa->username }}</p>
                            </div>
                            <div class="row">
                                <a href="#" onclick="window.history.back();" class="btn "
                                style="background-color: white;font-weight: 500 ; color: red;  border: 1px solid #E6B31E;  width: 90px; margin: auto">KEMBALI</a>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="row">
                                <div class="col"
                                    style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                    Nama Siswa</div>
                                <p class="fs-5 text-white">{{ $siswa->nama_siswa }}</p>

                            </div>
                            <div class="row">
                                <div class="col"
                                    style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                    NIS Siswa</div>
                                <p class="fs-5 text-white">{{ $siswa->nis_siswa }}</p>
                            </div>
                            <div class="row" style="margin-top: 95px">
                                <div class="col mt-3"
                                    style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                    Tagihan</div>
                                <p class="fs-5 text-white">SPP</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="row">
                                <div class="col"
                                    style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                    Kelas</div>
                                <p class="fs-5 text-white">{{ $siswa->nama_kelas }}</p>
                            </div>
                            <div class="row">
                                <div class="col"
                                    style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                    Jenis Kelamin</div>
                                <p class="fs-5 text-white">{{ $siswa->jenis_kelamin }}</p>
                            </div>
                            <div class="row" style="margin-top: 110px">
                                <div class="col"
                                    style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                    Jumlah Tagihan</div>
                                @if (!empty($siswa->jumlah_tagihan))
                                    <p class="fs-5 text-white">Rp. {{ $siswa->jumlah_tagihan }}</p>
                                @else
                                    <p class="fs-5 text-white">Rp. 0</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="row">
                                <div class="col"
                                    style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                    No Telp</div>
                                <p class="fs-5 text-white">{{ $siswa->no_telp }}</p>
                            </div>
                            <div class="row">
                                <div class="col"
                                    style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                    Angkatan</div>
                                <p class="fs-5 text-white">{{ $siswa->no_angkatan }}</p>
                            </div>
                            <div class="row" style="margin-top: 109px">
                                <div class="col"
                                    style="font-family: Nunito; font-size: 19px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                    Tanggal Tagihan
                                </div>
                                @if (!empty($siswa->tanggal_tagihan))
                                    <p class="fs-5 text-white">{{ $siswa->tanggal_tagihan }}</p>
                                @else
                                    <p class="fs-5 text-white">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-2 mt-auto">
                            <div class="row" style="margin-bottom: 70px">
                                @if (!empty($siswa->tanggal_tagihan) && !empty($siswa->jumlah_tagihan))
                                    <div class="col"
                                        style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                        Aksi</div>
                                    <a href="pembayaran/{{ $siswa->id_siswa }}" class="btn mb-1"
                                        style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; width: 90px; margin-right: 100px; margin-left: 12px">
                                        BAYAR
                                    </a>
                                @else
                                    <div class="col"
                                        style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E; margin-bottom: 82px">
                                        Aksi</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
