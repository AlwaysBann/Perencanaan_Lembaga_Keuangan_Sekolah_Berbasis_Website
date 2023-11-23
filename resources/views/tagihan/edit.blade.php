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
        body{
            background-image: url('/img/background.png');
            background-size: 100%;
            background-repeat: repeat-y;
        }
    </style>
</head>
<div class="px-5 py-3">
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">EDIT DATA TAGIHAN</h1>
        <div class="container my-5 d-flex justify-content-center">
            <div class="row justify-content-center align-items-center rounded-3 p-4" style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
                <form action="simpan" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="{{$tagihan->id_tagihan}}" class="form-control" id="id_tagihan" name="id_tagihan" placeholder="Jumlah Tagihan">
                <div class="form">
                    <div class="form-group mb-3">
                        <label for="id_jenis_tagihan" style="color: #E6B31E;">Nama Jenis Tagihan</label>
                        <select name="id_jenis_tagihan" id="id jenis tagihan" class="form-select form-control">
                        @foreach ($JenisTagihan as $j)
                        <option value="{{ $j->id_jenis_tagihan }}"
                            {{ $j->id_jenis_tagihan == $j->id_jenis_tagihan ? 'selected' : '' }}>
                            {{ $j->nama_jenis_tagihan }}
                        </option>
                        @endforeach
                        </select>
                        @csrf
                      </div>
                      <div class="form-group mb-3">
                        <label for="jumlah_tagihan" style="color: #E6B31E;">Jumlah Tagihan</label>
                        <input type="number" value="{{$tagihan->jumlah_tagihan}}" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" placeholder="Jumlah Tagihan">
                    </div>
                      <div class="form-group mb-3">
                        <label for="tanggal_tagihan" style="color: #E6B31E;">Tanggal Tagihan</label>
                        <input type="date" class="form-control" value="{{$tagihan->tanggal_tagihan}} id="tanggal_tagihan" name="tanggal_tagihan">
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