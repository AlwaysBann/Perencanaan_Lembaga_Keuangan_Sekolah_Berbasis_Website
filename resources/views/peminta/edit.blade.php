@extends('layout.layout')
@section('title', 'Peminta')
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
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">EDIT DATA PEMINTA</h1>
        <div class="container my-5 d-flex justify-content-center">
            <div class="row justify-content-center align-items-center rounded-3 p-4" style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
            <form action="/peminta/edit/simpan" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="id_peminta" name="id_peminta" placeholder="Nama Lengkap Peminta" value="{{$peminta->id_peminta}}">
                <div class="form">
                    <div class="form-group mb-3">
                        <label for="nama_peminta" style="color: #E6B31E;">Username</label>
                        <select name="id_user" id="username" class="form-select form-control">
                            @foreach ($user as $u)
                            <option value="{{ $u->id_user }}"
                                {{ $u->id_user == $u->id_user ? 'selected' : '' }}>
                                {{ $u->username }}
                            </option>
                            @endforeach
                        </select>
                        @csrf
                      </div>
                      <div class="form-group mb-3">
                        <label for="nama_peminta" style="color: #E6B31E;">Nama Peminta</label>
                        <input type="text" class="form-control" id="nama_peminta" name="nama_peminta" placeholder="Nama Lengkap Peminta" value="{{$peminta->nama_peminta}}">
                    </div>
                    <div class="form-group mb-3">
                      <label for="jabatan_peminta" style="color: #E6B31E;">Jabatan peminta</label>
                      <select name="id_jabatan_peminta" id="jabatan_peminta" class="form-select form-control">
                        @foreach ($jabatan as $j)
                        <option value="{{ $j->id_jabatan_peminta }}"
                            {{ $j->id_jabatan_peminta == $j->id_jabatan_peminta ? 'selected' : '' }}>
                            {{ $j->nama_jabatan_peminta }}
                        </option>
                        @endforeach
                      </select>
                     </div>
                      <div class="form-group mb-3">
                        <label for="mulai_jabat" style="color: #E6B31E;">Tanggal Mulai jabatan</label>
                        <input type="date" class="form-control" id="mulai_jabat" name="mulai_jabat" value="{{$peminta->mulai_jabat}}">
                      </div>
                      <div class="form-group mb-5">
                        <label for="akhir_jabat" style="color: #E6B31E;">Tangggal Habis jabatan</label>
                        <input type="date" class="form-control" id="akhir_jabat" name="akhir_jabat" value="{{$peminta->akhir_jabat}}">
                      </div>
                      <div class="col-md-4 mt-3 mb-3">
                        <button type="submit" class="btn me-4" style="background-color: white;font-weight: 500 ; color: green; border: 1px solid #E6B31E; min-width: 100px">SIMPAN</button>
                        <a href="#" onclick="window.history.back();" class="btn" style="background-color: white;font-weight: 500 ; color: red;  border: 1px solid #E6B31E;  min-width: 100px">KEMBALI</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
@endsection