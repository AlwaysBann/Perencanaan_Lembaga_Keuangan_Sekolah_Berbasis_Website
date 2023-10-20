@extends('layout.layout')
@section('title', 'Manage User')
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
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">MANAGE ACCOUNT</h1>        
        <div class="card-body" style="margin-top: 200px">
            <div class="d-flex" style="margin-bottom: 20px">
                <a href="akun/tambah" class="btn btn-success rounded-pill" style=" min-width: 130px">
                    Tambah User 
                </a>
                <a href="#" class="btn btn-warning rounded-pill ms-auto" style="color: white; min-width: 130px">
                    Log Activity
                </a>
            </div>
            <div class="">
                <table class="table table-bordered border-warning table-dark DataTable" style="background-color: rgba(32, 32, 32, 0.637)">
                    <thead>
                        <tr>
                            <th>id_user</th>
                            <th>username</th>
                            <th>password</th>
                            <th>role</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $u)
                        <tr>
                            <td>{{$u->id_user}}</td>
                            <td>{{$u->username}}</td>
                            <td>{{$u->password}}</td>
                            <td>{{$u->role}}</td>
                            <td>
                                <a href="akun/edit/{{ $u->id_user }}" class="btn mx-4" style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; min-width: 80px;">
                                    EDIT
                                </a>
                                <btn class="btn btnHapus mx-2" style="background-color: white;font-weight: 600 ; color: red;  border: 1px solid #E6B31E; min-width: 80px;" idUser="{{ $u->id_user }}">HAPUS</btn>
                            </td>
                        </tr>
                    </tbody>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
<script type="module">
    $('.DataTable tbody').on('click', '.btnHapus', function(a) {
        a.preventDefault();
        let idUser = $(this).closest('.btnHapus').attr('idUser');
        swal.fire({
            title: "Apakah anda ingin menghapus data "+idUser+" ?",
            showCancelButton: true,
            confirmButtonText: 'Setuju',
            cancelButtonText: `Batal`,
            confirmButtonColor: 'red'

        }).then((result) => {
            if (result.isConfirmed) {
                //Ajax Delete
                $.ajax({
                    type: 'DELETE',
                    url: 'akun/hapus',
                    data: {
                        id_user: idUser,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.success) {
                            swal.fire('Data ' + idUser + ' Berhasil di hapus!', '', 'success').then(function() {
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