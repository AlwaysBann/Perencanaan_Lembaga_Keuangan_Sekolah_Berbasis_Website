@extends('layout.layout')
@section('title', 'Pengajuan')
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
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">Pengajuan</h1>        
        <div class="card-body" style="margin-top: 200px">
            <div class="d-flex" style="margin-bottom: 20px">
                <a href="pengajuan/tambah" class="btn btn-success rounded-pill" style=" min-width: 130px">
                    Tambah Pengajuan 
                </a>
                <a href="#" class="btn btn-warning rounded-pill ms-auto" style="color: white; min-width: 130px">
                    Log Activity
                </a>
            </div>
            <div class="">
                <table class="table table-bordered border-warning table-dark DataTable" style="background-color: rgba(32, 32, 32, 0.637)">
                    <thead>
                        <tr>
                            <th style="max-width: 40px">No</th>
                            <th>Nama Pengajuan</th>
                            <th style="max-width: 90px">Tujuan Pengajuan</th>
                            <th>Nama Pengaju</th>
                            <th>Waktu Pengajuan</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuan as $p)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{$p->nama_pengajuan}}</td>
                            <td>{{$p->tujuan_pengajuan}}</td>
                            <td>{{$p->nama_pengaju}}</td>
                            <td>{{$p->waktu_pengajuan }}</td>
                            <td style="max-width: 150px">
                                <a href="pengajuan/detail/{{$p->id_pengajuan}}" class="btn " style="background-color: white;font-weight: 600 ; color: #E6B31E; border: 1px solid #E6B31E;">
                                    DETAIL
                                </a>
                                <a href="pengajuan/edit/{{$p->id_pengajuan}}" class="btn mx-4" style="background-color: white;font-weight: 600 ; color: green; border: 1px solid #E6B31E; ">
                                    EDIT
                                </a>
                                <btn class="btn btnHapus mx-2" style="background-color: white;font-weight: 600 ; color: red;  border: 1px solid #E6B31E; " idPengajuan="{{ $p->id_pengajuan }}">HAPUS</btn>
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
        let idPengajuan = $(this).closest('.btnHapus').attr('idPengajuan');
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
                    url: 'pengajuan/hapus',
                    data: {
                        id_pengajuan: idPengajuan,
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