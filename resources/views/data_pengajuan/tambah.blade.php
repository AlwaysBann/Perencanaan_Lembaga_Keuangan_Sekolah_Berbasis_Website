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
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">TAMBAH DATA PENGAJUAN</h1>
        <div class="container my-5 d-flex justify-content-center">
            <div class="row justify-content-center align-items-center rounded-3 p-4" style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
            <form action="tambah/simpan" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form">
                    <div class="form-group mb-3">
                        <label for="nama_pengaju" style="color: #E6B31E;">Nama Pengaju</label>
                        <input type="text" class="form-control" id="nama_pengaju" name="nama_pengaju" placeholder="Nama Pengaju">
                        
                      </div>
                      <div class="form-group  mb-3">
                        <label for="nama_pengajuan" style="color: #E6B31E;">Nama Pengajuan</label>
                        <input type="text" class="form-control" id="nama_pengajuan" name="nama_pengajuan" placeholder="Nama Pengajuan">
                      </div>
                      <div class="form-group mb-3">
                        <label for="tujuan_pengajuan" style="color: #E6B31E;">Tujuan Pengajuan</label>
                        <input type="text" class="form-control" id="tujuan_pengajuan" name="tujuan_pengajuan" placeholder="Tujuan Ajuan">
                       </div>
                       <div class="form-group mb-3">
                        <label for="ruangan" style="color: #E6B31E;">Ruangan</label>
                        <select name="id_ruangan" id="ruangan" class="form-select form-control">
                            @foreach ($ruangan as $r)
                            <option value="" disabled hidden selected>Pilih Ruangan</option>
                            <option value="{{$r->id_ruangan}}">{{$r->nama_ruangan}}</option>
                            @endforeach
                        </select>
                       </div>
                      <div class="form-group mb-3">
                        <label for="nama_item" style="color: #E6B31E;">Nama Item</label>
                        <input type="text" class="form-control" id="nama_item" name="nama_item" placeholder="Nama Item">
                       </div>
                      <div class="form-group mb-3">
                        <label for="jumlah_item" style="color: #E6B31E;">Jumlah Item</label>
                        <input type="text" class="form-control" id="jumlah_item" name="jumlah_item" placeholder="Jumlah Item">
                       </div>
                      <div class="form-group mb-3">
                        <label for="spesifikasi_item" style="color: #E6B31E;">Spesifikasi Item</label>
                        <input type="text" class="form-control" id="spesifikasi_item" name="spesifikasi_item" placeholder="Spesifikasi Item">
                       </div>
                      <div class="form-group mb-3">
                        <label for="harga_satuan" style="color: #E6B31E;">Harga Satuan</label>
                        <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="Harga Satuan">
                       </div>
                      <div class="form-group mb-3">
                        <label for="jenis_item" style="color: #E6B31E;">Jenis Item</label>
                        <select name="jenis_item" id="jenis_item" class="form-control">
                          <option value="" selected disabled hidden>Pilih Jenis Item</option>
                          <option value="Jasa">Jasa</option>
                          <option value="Benda">Benda</option>
                        </select>
                       </div>
                        <div class="form-group" style="margin-bottom: 180px">
                            <label for="bukti_realisasi" style="color: #E6B31E;">Gambar Item</label>
                            <input type="file" class="form-control" id="bukti_realisasi" name="gambar_item" >
                        </div>
                      <div class="col-md-4 mt-3 mb-3">
                        <button type="submit" class="btn me-4" style="background-color: white;font-weight: 500 ; color: green; border: 1px solid #E6B31E; min-width: 100px">SIMPAN</button>
                        <a href="#" onclick="window.history.back();" class="btn " style="background-color: white;font-weight: 500 ; color: red;  border: 1px solid #E6B31E;  min-width: 100px">KEMBALI</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
@endsection