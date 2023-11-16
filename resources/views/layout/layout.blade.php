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
    <nav class="navbar fixed-top navbar-expand-md px-5" style="background-color: #343434; z-index: 100;">
        @if (Auth::check() && Auth::User()->role == 'super_admin')
        <a href="/akun" class="navbar-brand" style="color: #E6B31E">MANAGE ACCOUNT</a>
        @endif
        @if (Auth::check() && Auth::User()->role == 'pengelola')
        <a href="/dashboard" class="navbar-brand" style="color: #E6B31E">DASHBOARD</a>
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle navbar-brand" style="color: #E6B31E" href="#" id="listDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                DATA MASTER
            </a>
            <div class="dropdown-menu mt-1 p-1" aria-labelledby="listDropdown" style="background-color: #343434;z-index: 0">
                <a href="/ruangan" class="navbar-brand" style="color: #E6B31E; padding-right:50%">RUANGAN</a>
                <a href="/jabatan_pengelola" class="navbar-brand" style="color: #E6B31E; padding-right:50%">JABATAN PENGELOLA</a>
                <a href="/jurusan" class="navbar-brand" style="color: #E6B31E; padding-right:50%">JURUSAN</a>
                <a href="/angkatan" class="navbar-brand" style="color: #E6B31E; padding-right:50%">ANGKATAN</a>
            </div>
        </div>
        <a href="#" class="navbar-brand" style="color: #E6B31E">PENGAJUAN</a>
        <a href="#" class="navbar-brand" style="color: #E6B31E">PERENCANAAN</a>
        <a href="/realisasi" class="navbar-brand" style="color: #E6B31E">REALISASI</a>
        @endif
        <a href="/logout" class="navbar-brand me-auto" style="color: #E6B31E">LOGOUT</a>


    <span class="" style="color: #E6B31E"> Nama Akun</span>
    </nav>
    <div class="mt-5">
        @yield('content')
    </div>
</body>
</html>