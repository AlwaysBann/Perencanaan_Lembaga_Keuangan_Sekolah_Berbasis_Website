@extends('layout.layout')
@section('title', 'Tambah Data Jabatan Pengelola')
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
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">Profile Akun</h1>
        <div class="container my-5 d-flex justify-content-center rounded-3 p-4" style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
            <div class="col-md-12">
                    <div class="col-md-7 m-5">
                        <img src="{{auth()->user()->foto_profil == null ?  asset('img/Profile.png') : asset('foto/' . auth()->user()->foto_profil)}}" alt="" width="200px">
                        <p class="px-5" style="font-family: Nunito; font-size: 20px; font-style: normal; font-weight: 400; color: #E6B31E;">Nama akun</p>
                        <p class="px-5" style="color: #fff;">Raihanda</p>

                        <button class="mx-5" style="padding: 10px 16px; width: 100px; height: 52px; border-radius: 6px; border: 1px solid #E6B31E; color: red">kembali</button>
                    </div>
                    <div class="col-md-4">
                        <table class="table-responsive DataTable">
                            <thead>
                                <th>
                                    <tr>Nama Siswa</tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                </th>
                            </thead>

                            <tbody>
                                <th>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                </th>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection