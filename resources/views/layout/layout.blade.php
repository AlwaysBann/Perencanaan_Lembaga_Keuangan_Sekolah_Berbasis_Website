<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('header')
    <style>
    </style>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-md px-5" style="background-color: #343434;">
        @if (Auth::check() && Auth::User()->role == 'super_admin')
        <a href="/akun" class="navbar-brand" style="color: #E6B31E">MANAGE ACCOUNT</a>
        @endif
        @if (Auth::check() && Auth::User()->role == 'pengelola')
        <a href="#" class="navbar-brand" style="color: #E6B31E">DASHBOARD</a>
        <a href="/ruangan" class="navbar-brand" style="color: #E6B31E">DATA MASTER</a>
        <a href="#" class="navbar-brand" style="color: #E6B31E">PENGAJUAN</a>
        <a href="#" class="navbar-brand" style="color: #E6B31E">PERENCANAAN</a>
        <a href="/realisasi" class="navbar-brand" style="color: #E6B31E">REALISASI</a>
        @endif
        <a href="/logout" class="navbar-brand me-auto" style="color: #E6B31E">LOGOUT</a>


    <span class="" style="color: #E6B31E"> Nama Akun</span>
    </nav>
    <div class="mt-5">
        @include('layout.flash-massage')
        @yield('content')
    </div>
</body>
</html>