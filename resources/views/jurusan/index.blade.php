@extends('layout.layout')
@section('title', 'Kelola data Master')
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
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">DATA JURUSAN</h1>
        <div class="card-body" style="margin-top: 200px">
            <div class="d-flex" style="margin-bottom: 20px">
                <a href="jurusan/tambah" class="btn btn-success rounded-pill" style=" min-width: 130px">
                    Tambah Jurusan 
                </a>
            </div>
            <div class="">
                <table class="table table-bordered border-warning table-dark DataTable" style="background-color: rgba(32, 32, 32, 0.637)">
                    <thead>
                        <tr>
                            <th style="max-width: 10px;">id_jurusan</th>
                            <th>nama_jurusan</th>
                            <th style="max-width: 40px">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jurusan as $j)
                        <tr>
                            <td style="max-width: 20px;">{{$j->id_jurusan}}</td>
                            <td>{{$j->nama_jurusan}}</td>
                            <td style="max-width: 60px">
                                <a href="jurusan/edit/{{ $j->id_jurusan }}" class="btn mx-4" style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; min-width: 80px;">
                                    EDIT
                                </a>
                                <btn class="btn btnHapus mx-2" style="background-color: white;font-weight: 600 ; color: red;  border: 1px solid #E6B31E; min-width: 80px;" idJurusan="{{ $j->id_jurusan }}">HAPUS</btn>
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
        let idJurusan = $(this).closest('.btnHapus').attr('idJurusan');
        swal.fire({
            title: "Apakah anda ingin menghapus data ini?",
            showCancelButton: true,
            confirmButtonText: 'Setuju',
            cancelButtonText: `Batal`,
            confirmButtonColor: 'red'

        }).then((result) => {
            if (result.isConfirmed) {
                //Ajax Delete
                $.ajax({
                    type: 'DELETE',
                    url: 'jurusan/hapus',
                    data: {
                        id_jurusan: idJurusan,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.success) {
                            swal.fire('Berhasil di hapus!', '', 'success').then(function() {
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