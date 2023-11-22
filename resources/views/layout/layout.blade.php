<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/fontawesome.min.js"></script>
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
                <a href="/pengelola" class="navbar-brand" style="color: #E6B31E; padding-right:50%">PENGELOLA</a>
                <a href="/jurusan" class="navbar-brand" style="color: #E6B31E; padding-right:50%">JURUSAN</a>
                <a href="/angkatan" class="navbar-brand" style="color: #E6B31E; padding-right:50%">ANGKATAN</a>
                <a href="/kelas" class="navbar-brand" style="color: #E6B31E; padding-right:50%">KELAS</a>
                <a href="/siswa" class="navbar-brand" style="color: #E6B31E; padding-right:50%">SISWA</a>
                <a href="/JenisTagihan" class="navbar-brand" style="color: #E6B31E; padding-right:50%">JENIS TAGIHAN</a>
                <a href="/tagihan" class="navbar-brand" style="color: #E6B31E; padding-right:50%">TAGIHAN</a>
            </div>
        </div>
        <a href="/pengajuan" class="navbar-brand" style="color: #E6B31E">PENGAJUAN</a>
        <a href="/perencanaan" class="navbar-brand" style="color: #E6B31E">PERENCANAAN</a>
        <a href="/realisasi" class="navbar-brand" style="color: #E6B31E">REALISASI</a>
        @endif
        @if (Auth::check() && Auth::User()->role == 'peminta')
        <a href="/dashboard" class="navbar-brand" style="color: #E6B31E">DASHBOARD</a>
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle navbar-brand" style="color: #E6B31E" href="#" id="listDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                DATA MASTER
            </a>
            <div class="dropdown-menu mt-1 p-1" aria-labelledby="listDropdown" style="background-color: #343434;z-index: 0">
                <a href="/ruangan" class="navbar-brand" style="color: #E6B31E; padding-right:50%">RUANGAN</a>
                <a href="/jabatan_pengelola" class="navbar-brand" style="color: #E6B31E; padding-right:50%">JABATAN PENGELOLA</a>
                <a href="/pengelola" class="navbar-brand" style="color: #E6B31E; padding-right:50%">PENGELOLA</a>
                <a href="/jurusan" class="navbar-brand" style="color: #E6B31E; padding-right:50%">JURUSAN</a>
                <a href="/angkatan" class="navbar-brand" style="color: #E6B31E; padding-right:50%">ANGKATAN</a>
            </div>
        </div>
        <a href="#" class="navbar-brand" style="color: #E6B31E">PENGAJUAN</a>
        <a href="#" class="navbar-brand" style="color: #E6B31E">PERENCANAAN</a>
        <a href="/realisasi" class="navbar-brand" style="color: #E6B31E">REALISASI</a>
        @endif
        <a href="/logout" class="navbar-brand me-auto" style="color: #E6B31E">LOGOUT</a>

    @auth
    <span class="me-3" style="color: #E6B31E; font-size: 20px"> {{auth()->user()->username}}</span>
    <div style="position: relative; overflow: hidden; width: 35px; height: 35px;">
        <img src="{{auth()->user()->foto_profil == null ?  asset('img/Profile.png') : asset('foto/' . auth()->user()->foto_profil)}}" alt="Foto Profile Kosong" class="" style="width: 100%; height: 100%; object-fit: cover; border-radius: 100%">
    </div>
    @endauth
    </nav>
    <div class="mt-5">
        @yield('content')
    </div>
</body>
</html>