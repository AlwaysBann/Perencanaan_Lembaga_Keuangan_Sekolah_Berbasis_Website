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
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">DETAIL DATA PENGAJUAN</h1>
        <div class="container my-5 d-flex justify-content-center">
            <div class="row justify-content-center align-items-center rounded-3 p-4" style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            {{-- @if ($pengajuan->gambar_item)
                            <img src="{{ url('item') . '/' . $pengajuan->gambar_item }} "
                                style="width: 200px; height: 250px;" alt="Profile" />
                        @endif --}}
                        </div>
            
                        <!-- Column 2 with 5 rows -->
                        <div class="col-4">
                            <div class="row">
                                <div class="col fs-5" style="color: #E6B31E">
                                    Nama Pengaju
                                </div>
                                <div>
                                   {{$pengajuan->nama_pengaju}}
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col fs-5" style="color: #E6B31E">
                                    Tujuan Pengajuan
                                </div>
                                <div>
                                    {{$pengajuan->tujuan_pengajuan}}
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col fs-5" style="color: #E6B31E">
                                    Nama Item
                                </div>
                                <div>
                                    {{$pengajuan->nama_item}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col fs-5" style="color: #E6B31E">
                                    Spesifikasi Item
                                </div>
                                <div>
                                    {{$pengajuan->spesifikasi_item}}
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col fs-5" style="color: #E6B31E">
                                    Jenis Item
                                </div>
                                <div>
                                    {{$pengajuan->jenis_item}}
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
                                    {{$pengajuan->nama_pengajuan}}
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col fs-5" style="color: #E6B31E">
                                    Ruangan
                                </div>
                                <div name='id_ruangan'>
                                    @foreach ($ruangan as $i)
                                     @if($pengajuan->id_ruangan == $i->id_ruangan)
                                        {{ $i->nama_ruangan }}
                                         @break
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col fs-5" style="color: #E6B31E">
                                    Jumlah Item
                                </div>
                                <div>
                                    {{$pengajuan->jumlah_item}}
                                </div>
                            </div>  
                            
                            <div class="row">
                                <div class="col fs-5" style="color: #E6B31E">
                                    Harga Satuan
                                </div>
                                <div>
                                    {{$pengajuan->harga_satuan}}
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
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
  </html>