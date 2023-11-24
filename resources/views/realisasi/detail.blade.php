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
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">DETAIL DATA REALISASI</h1>
        <div class="container my-5 d-flex justify-content-center">
            <div class="row justify-content-center align-items-center rounded-3 p-4" style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3 style="color: #E6B31E;">Foto bukti Realisasi</h3>
                            @if ($realisasi->bukti_realisasi)
                            <img src="{{ url('foto') . '/' . $realisasi->bukti_realisasi }} "
                                style="width: 200px; height: 250px;" alt="Bukti Realisasi" />
                        @endif
                        </div>
            
                        <!-- Column 2 with 5 rows -->
                        <div class="col-4">
                            <div class="row" >
                                <div class="col fs-5" style="color: #E6B31E">
                                    Nama Realisasi
                                </div>
                                <div style="color: white">
                                   {{$realisasi->nama_realisasi}}
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col fs-5" style="color: #E6B31E">
                                    Jumlah Dana Realisasi
                                </div>
                                <div style="color: white">
                                    {{$realisasi->jumlah_dana_realisasi}}
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col fs-5" style="color: #E6B31E">
                                    Ruangan
                                </div>
                                <div style="color: white">
                                    @foreach ($ruangan as $i)
                                     @if($realisasi->id_ruangan == $i->id_ruangan)
                                        {{ $i->nama_ruangan }}
                                         @break
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            
                            
                            
                        </div>
            
                        
                        </div>
                        <div class="col-md-4 mt-3 mb-3">
                            <a href="#" onclick="window.history.back();" class="btn " style="background-color: white;font-weight: 500 ; color: red;  border: 1px solid #E6B31E;  min-width: 100px">KEMBALI</a>
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