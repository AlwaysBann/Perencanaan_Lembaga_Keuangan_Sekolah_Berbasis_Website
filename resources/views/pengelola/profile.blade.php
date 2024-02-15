@extends('layout.layout')
@section('title', 'Profile Pengelola')
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
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">Profile Pengelola
            </h1>
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
                                <p class="fs-5 text-white">{{ $pengelola->username }}</p>
                            </div>
                            <div class="row">
                                <a href="#" onclick="window.history.back();" class="btn "
                                    style="background-color: white;font-weight: 500 ; color: red;  border: 1px solid #E6B31E;  width: 90px; margin: auto">KEMBALI</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col"
                                    style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                    Nama Pengelola</div>
                                <p class="fs-5 text-white">{{ $pengelola->nama_pengelola }}</p>

                            </div>
                            <div class="row">
                                <div class="col"
                                    style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                    Mulai Jabatan</div>
                                <p class="fs-5 text-white">{{ $pengelola->mulai_jabat }}</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col"
                                    style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                    Jabatan Pengelola</div>
                                <p class="fs-5 text-white">{{ $pengelola->nama_jabatan_pengelola }}</p>
                            </div>
                            <div class="row">
                                <div class="col"
                                    style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">
                                    Akhir Jabatan</div>
                                <p class="fs-5 text-white">{{ $pengelola->akhir_jabat }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
