@extends('layout.layout')
@section('title', 'Dashboard M-ONE')
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
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">DASHBOARD M-ONE</h1>
        @include('layout.flash-massage')   
        <div class="container" style="margin-top: 150px">
            <h3 style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">TOTAL KEUANGAN</h3>
            <h1 class="" style="color: white; text-shadow: 0px 0px 4px #E6B31E; font-weight: 700; font-size:60px">Rp. 2.200.000.000</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body p-5">
                            <h3 class="card-title">Dana BOS</h3>
                            <p class="card-text">Some information about Box 1.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Box 2</h5>
                            <p class="card-text">Some information about Box 2.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Box 3</h5>
                            <p class="card-text">Some information about Box 3.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection