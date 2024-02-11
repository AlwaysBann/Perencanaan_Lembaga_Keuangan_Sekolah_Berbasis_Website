@extends('layout.layout')
@section('title', 'Sumber Dana')
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
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">EDIT DATA SUMBER DANA
            </h1>
            <div class="container my-5 d-flex justify-content-center">
                <div class="row justify-content-center align-items-center rounded-3 p-4"
                    style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
                    <form action="simpan" method="POST">
                        <div class="form">
                            <input type="hidden" name="id_sumber_dana" value="{{ $sumber_dana->id_sumber_dana }}">
                            <div class="form-group mb-3">
                                <label for="id_kelola_keuangan" style="color: #E6B31E;">Id Kelola Keuangan</label>
                                <select name="id_kelola_keuangan" id="id_kelola_keuangan" class="form-select form-control">
                                    @foreach ($kelola as $item)
                                        <option value="" disabled hidden selected>Pilih Id Kelola Keuangan</option>
                                        <option value="{{ $item->id_kelola_keuangan }}"
                                            {{ $sumber_dana->id_kelola_keuangan === $item->id_kelola_keuangan ? 'selected' : '' }}>
                                            {{ $item->id_kelola_keuangan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama_sumber_dana" style="color: #E6B31E;">Nama Sumber Dana</label>
                                <select name="nama_sumber_dana" id="nama_sumber_dana" class="form-select form-control">
                                    <option value="Dana-BOS">Dana BOS</option>
                                    <option value="Dana-BOPD">Dana BOPD</option>
                                    <option value="Dana-Komite">Dana Komite</option>
                                    <option value="Dana-SPP">Dana SPP</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="dana_sumber_dana" style="color: #E6B31E;">Dana Sumber Dana</label>
                                <input type="text" class="form-control" id="dana_sumber_dana" name="dana_sumber_dana"
                                    placeholder="Dana Sumber Dana" value="{{ $sumber_dana->dana_sumber_dana }}">
                                @csrf
                            </div>
                            <div class="col-md-4 mt-3 mb-3">
                                <button type="submit" class="btn me-4"
                                    style="background-color: white;font-weight: 500 ; color: green; border: 1px solid #E6B31E; min-width: 100px">SIMPAN</button>
                                <a href="#" onclick="window.history.back();" class="btn "
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
