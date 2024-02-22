@extends('layout.layout')
@section('title', 'Peminta')
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
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">Peminta</h1>      
        @include('layout.flash-massage')     
        <div class="card-body" style="margin-top: 200px">
            <div class="d-flex" style="margin-bottom: 20px">
                <a href="peminta/tambah" class="btn btn-success rounded-pill" style=" min-width: 130px">
                    Tambah Peminta 
                </a>
            </div>
            <div class="">
                <table class="table table-bordered border-warning table-dark DataTable" style="background-color: rgba(32, 32, 32, 0.637)">
                    <thead>
                        <tr>
                            <th style="max-width: 60px">No</th>
                            <th>Username</th>
                            <th style="max-width: 90px">Nama Peminta</th>
                            <th>Jabatan</th>
                            <th style="max-width: 50px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminta as $p)
                            <tr>
                                <td>{{$p->id_peminta}}</td>
                                <td>{{$p->username}}</td>
                                <td>{{$p->nama_peminta}}</td>
                                <td>{{$p->nama_jabatan_peminta}}</td>
                            </td>
                                <td style="max-width: 110px">
                                    <a href="peminta/edit/{{$p->id_peminta}}" class="btn mx-4" style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; min-width: 80px;">
                                        EDIT
                                    </a>
                                    <btn class="btn btnHapus mx-2" style="background-color: white;font-weight: 600 ; color: red;  border: 1px solid #E6B31E; min-width: 80px;" idPeminta="{{$p->id_peminta}}">HAPUS</btn>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script type="module">
    $('.DataTable tbody').on('click', '.btnHapus', function(a) {
        a.preventDefault();
        let idPeminta = $(this).closest('.btnHapus').attr('idPeminta');
        swal.fire({
            title: "Apakah anda ingin menghapus data "+idPeminta+" ?",
            showCancelButton: true,
            confirmButtonText: 'Setuju',
            cancelButtonText: `Batal`,
            confirmButtonColor: 'red'

        }).then((result) => {
            if (result.isConfirmed) {
                //Ajax Delete
                $.ajax({
                    type: 'DELETE',
                    url: 'peminta/hapus',
                    data: {
                        id_peminta: idPeminta,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.success) {
                            swal.fire('Data ' + idPeminta + ' Berhasil di hapus!', '', 'success').then(function() {
                                //Refresh Halaman
                                location.reload();
                            });
                        }
                    }
                });
            }
        });
    });
</script>
</html>
@endsection