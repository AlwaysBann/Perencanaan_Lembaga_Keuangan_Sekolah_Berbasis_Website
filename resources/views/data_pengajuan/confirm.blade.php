@extends('layout.layout')
@section('title', 'Realisasi')
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
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">CONFIRM DATA PENGAJUAN</h1>
        <div class="container my-5 d-flex justify-content-center">
            <div class="row justify-content-center align-items-center rounded-3 p-4" style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
                <div class="form-group mb-3">
                    <label for="id_pengajuan" style="color: #E6B31E;">ID Pengajuan</label>
                    <input type="text" class="form-control" id="id_pengajuan" name="" value="{{$pengajuan->id_pengajuan}}" disabled>
                  </div>
                <div class="form-group  mb-3">
                  <label for="nama_pengajuan" style="color: #E6B31E;">Nama Pengajuan</label>
                  <input type="text" class="form-control" id="nama_pengajuan" name="" value="{{$pengajuan->nama_pengajuan}}" disabled>
                </div>
            <form action="simpan" method="POST">
            @csrf
                <div class="form">
                    <input type="hidden" class="form-control" id="id_pengajuan" name="id_pengajuan" value="{{$pengajuan->id_pengajuan}}">
                    {{-- <input type="hidden" class="form-control" id="id_pengajuan" name="id_pengajuan" placeholder="Nama Pengaju" value="{{$pengajuan->id_pengajuan}}"> --}}
                    <h3 style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">CONFIRM DATA PENGAJUAN</h3>  
                    <div class="form-group mb-3">
                        <label for="nama_perencanaan" style="color: #E6B31E;">Nama Perencanaan</label>
                        <input type="text" class="form-control" id="nama_perencanaan" name="nama_perencanaan" placeholder="Nama Perencanaan">
                       </div>
                       <div class="form-group mb-3">
                        <label for="nama_penganggung_jawab" style="color: #E6B31E;">Nama Penanggung Jawab</label>
                        <input type="text" class="form-control" id="nama_penanggung_jawab" name="nama_penanggung_jawab" placeholder="Nama Penanggung Jawab">
                       </div>
                      <div class="form-group mb-3">
                        <label for="waktu_realisasi" style="color: #E6B31E;">Waktu Realisasi</label>
                        <input type="date" class="form-control" id="waktu_realisasi" name="waktu_realisasi" placeholder="Nama Item">
                       </div>
                       <div class="col-md-4 mt-3 mb-3">
                        <button type="submit" class="btn me-4" style="background-color: white;font-weight: 500 ; color: green; border: 1px solid #E6B31E; min-width: 100px">CONFIRM</button>
                        <a href="#" onclick="window.history.back();" class="btn " style="background-color: white;font-weight: 500 ; color: red;  border: 1px solid #E6B31E;  min-width: 100px">KEMBALI</a>
                    </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
@endsection