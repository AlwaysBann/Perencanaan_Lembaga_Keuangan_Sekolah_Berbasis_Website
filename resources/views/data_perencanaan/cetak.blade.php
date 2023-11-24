<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cetak Data</title>
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
                        {{-- <div class="col-sm-4">
                            @if ($pengajuan->gambar_item)
                                <img src="{{ url('item') . '/' . $pengajuan->gambar_item }} "
                                    style="width: 200px; height: 250px;" alt="Profile" />
                            @endif
                        </div> --}}

                        <!-- Column 2 with 5 rows -->
                        <div class="col-4">
                            <div class="row">
                                <div class="col fs-5" style="color: #E6B31E">
                                    Nama Pengajuu
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
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
  </html>