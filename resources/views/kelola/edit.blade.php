@extends('layout.layout')
@section('title', 'Edit Kelola Keuangan')
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
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">EDIT DATA KELOLA
                KEUANGAN
            </h1>
            <div class="container my-5 d-flex justify-content-center">
                <div class="row justify-content-center align-items-center rounded-3 p-4"
                    style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
                    <form action="simpan" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form">
                            <div class="form-group mb-3">
                                <label for="id_sumber_dana" style="color: #E6B31E;">Pilih Sumber Dana</label>
                                <select name="id_sumber_dana" id="id_sumber_dana" class="form-select form-control">
                                    @foreach ($sumber_dana as $item)
                                        <option value="{{ $item->id_sumber_dana }}"
                                            {{ $kelola->id_sumber_dana === $item->id_pembayaran ? 'selected' : '' }}>
                                            {{ $item->nama_sumber_dana }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" name="id_kelola_keuangan" id="id_kelola_keuangan"
                                value="{{ $kelola->id_kelola_keuangan }}" hidden>
                            <div class="form-group mb-3">
                                <label for="tipe" style="color: #E6B31E;">Pilih Tipe</label>
                                <select name="tipe" id="tipe" class="form-select form-control">
                                    <option value="Pemasukan" {{ $kelola->tipe === 'Pemasukan' ? 'selected' : '' }}>
                                        Pemasukan</option>
                                    <option value="Pengeluaran" {{ $kelola->tipe === 'Pengeluaran' ? 'selected' : '' }}>
                                        Pengeluaran</option>
                                </select>
                            </div>
                            @if ($kelola->id_pembayaran)
                                <div class="form-group mb-3">
                                    <label for="id_pembayaran" style="color: #E6B31E;">Id_pembayaran</label>
                                    <select name="id_pembayaran" id="" class="form-select form-control">
                                        @foreach ($pembayaran as $item)
                                            <option value="{{ $item->id_pembayaran }}"
                                                {{ $kelola->id_pembayaran === $item->id_pembayaran ? 'selected' : '' }}>
                                                {{ $item->id_pembayaran }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            @if ($kelola->id_realisasi)
                                <div class="form-group mb-3">
                                    <label for="id_realisasi" style="color: #E6B31E;">Id_realisasi</label>
                                    <select name="id_realisasi" id="" class="form-select form-control">
                                        <option value="" disabled hidden selected>Id_realisasi</option>
                                        @foreach ($realisasi as $item)
                                            <option value="{{ $item->id_realisasi }}"
                                                {{ $kelola->id_realisasi === $item->id_realisasi ? 'selected' : '' }}>
                                                {{ $item->id_realisasi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="form-group mb-3">
                                <label for="jumlah_dana" style="color: #E6B31E;">Jumlah Dana</label>
                                <input type="number" name="jumlah_dana" id="jumlah_dana" class="form-control"
                                    value="{{ $kelola->jumlah_dana }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="waktu" style="color: #E6B31E;">Waktu</label>
                                <input type="date" name="waktu" id="waktu" class="form-control"
                                    value="{{ $kelola->waktu }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="bukti" style="color: #E6B31E;" class="mb-1">Bukti</label>
                                <input type="file" name="bukti" id="bukti" class="form-control"
                                    value="{{ $kelola->bukti }}">
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
    </body>

    </html>
@endsection
