@extends('layout.layout')
@section('title', 'Siswa')
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
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">TAMBAH DATA SISWA</h1>
        <div class="container my-5 d-flex justify-content-center">
            <div class="row justify-content-center align-items-center rounded-3 p-4" style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
            <form action="{{url('/siswa/edit/simpan/' . $nama_siswa->id_siswa)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form">
                    <div class="form-group mb-3">
                        <label for="username" style="color: #E6B31E;">Nis Siswa</label>
                        <input type="number" name="nis_siswa" class="form-control" value="{{$nama_siswa->nis_siswa}}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="username" style="color: #E6B31E;">Username</label>
                        <select name="id_user" id="username" class="form-select form-control">
                            @foreach ($nama_user as $u)
                            <option value="" disabled hidden selected>Pilih username</option>
                            <option value="{{$u->id_user}}">{{$u->username}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_siswa" style="color: #E6B31E;">Nama siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukan Nama Siswa" value="{{$nama_siswa->nama_siswa}}">
                        
                    </div>
                        <div class="form-group mb-3">
                            <label for="jenis_kelamin" style="color: #E6B31E;">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select form-control">
                                <option value="" disabled hidden selected>Pilih jenis kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jenis_kelamin" style="color: #E6B31E;">No Telpon</label>
                            <input type="number" name="no_telp" id="" class="form-control" value="{{$nama_siswa->no_telp}}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_kelas" style="color: #E6B31E;">Kelas</label>
                            <select name="id_kelas" id="id_kelas" class="form-select form-control">
                                @foreach ($nama_kelas as $k)
                                <option value="" disabled hidden selected>Pilih Kelas</option>
                                <option value="{{$k->id_kelas}}">{{$k->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mt-3 mb-3">
                            <button type="submit" class="btn me-4" style="background-color: white;font-weight: 500 ; color: green; border: 1px solid #E6B31E; min-width: 100px">SIMPAN</button>
                            <a href="#" onclick="window.history.back();" class="btn" style="background-color: white;font-weight: 500 ; color: red;  border: 1px solid #E6B31E;  min-width: 100px">KEMBALI</a>
                        </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
@endsection