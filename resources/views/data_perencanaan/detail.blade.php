@extends('layout.layout')
@section('title', 'Perencanaan')
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
            <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">DETAIL DATA PERENCANAAN
            </h1>
            <div class="container my-5 d-flex justify-content-center">
                <div class="row justify-content-center align-items-center rounded-3 p-4"
                    style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                @if ($pengajuan->gambar_item)
                                    <img src="{{ url('item') . '/' . $pengajuan->gambar_item }} "
                                        style="width: 200px; height: 250px;" alt="Profile" />
                                @endif
                            </div>

                            <!-- Column 2 with 5 rows -->
                            <div class="col-4">
                                <div class="row">
                                    <div class="col fs-5" style="color: #E6B31E">
                                        Nama Pengaju
                                    </div>
                                    <div>
                                        {{ $pengajuan->nama_pengaju }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col fs-5" style="color: #E6B31E">
                                        Nama Penanggung Jawab
                                    </div>
                                    <div>
                                        {{ $pengajuan->nama_penanggung_jawab }}
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col fs-5" style="color: #E6B31E">
                                        Tujuan Pengajuan
                                    </div>
                                    <div>
                                        {{ $pengajuan->tujuan_pengajuan }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col fs-5" style="color: #E6B31E">
                                        Nama Item
                                    </div>
                                    <div>
                                        {{ $pengajuan->nama_item }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col fs-5" style="color: #E6B31E">
                                        Spesifikasi Item
                                    </div>
                                    <div>
                                        {{ $pengajuan->spesifikasi_item }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col fs-5" style="color: #E6B31E">
                                        Jenis Item
                                    </div>
                                    <div>
                                        {{ $pengajuan->jenis_item }}
                                    </div>
                                </div>


                            </div>

                            <!-- Column 3 with 5 rows -->
                            <div class="col-4">
                                <div class="row">
                                    <div class="col fs-5" style="color: #E6B31E">
                                        Nama Pengajuan
                                    </div>
                                    <div>
                                        {{ $pengajuan->nama_pengajuan }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col fs-5" style="color: #E6B31E">
                                        Nama Perencanaan
                                    </div>
                                    <div>
                                        {{ $pengajuan->nama_perencanaan }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col fs-5" style="color: #E6B31E">
                                        Ruangan
                                    </div>
                                    <div name='id_ruangan'>
                                                {{ $pengajuan->nama_ruangan }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col fs-5" style="color: #E6B31E">
                                    Jumlah Item
                                </div>
                                <div>
                                    {{ $pengajuan->jumlah_item }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col fs-5" style="color: #E6B31E">
                                    Harga Satuan
                                </div>
                                <div>
                                    {{ $pengajuan->harga_satuan }}
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-4 mt-3 mb-3">
                            <a href="#" onclick="window.history.back();" class="btn "
                                style="background-color: white;font-weight: 500 ; color: red;  border: 1px solid #E6B31E;  min-width: 100px">KEMBALI</a>
                                <a href="/perencanaan/cetak/{{$pengajuan->id_perencanaan}}" class="btn btn-info rounded-pill mx-3" style="color: white; min-width: 130px">
                                    Cetak List Data
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
@endsection
