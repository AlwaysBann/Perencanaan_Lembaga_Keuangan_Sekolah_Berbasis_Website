@extends('layout.layout')
@section('title', 'Tambah User')
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
        <h1 class="" style="color: #E6B31E; text-shadow: 0px 0px 2px white; font-weight: 900;">TAMBAH DATA USER</h1>
        @include('layout.flash-massage')
        <div class="container my-5 d-flex justify-content-center">
            <div class="row justify-content-center align-items-center rounded-3 p-4" style="background-color: rgba(32, 32, 32, 0.637); min-width: 1000px">
            <form action="tambah/simpan" method="POST" class="needs-validation" novalidate>
                <div class="form">
                    <div class="form-group mb-3">
                        <label for="username" style="color: #E6B31E;">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        <div class="valid-feedback" style="font-size: 15px; color: green; font-weight: 700; text-shadow: 0px 0px 5px white">
                            Username Dapat disimpan
                        </div>
                        <div class="invalid-feedback" style="font-size: 15px; color: red; font-weight: 700; text-shadow: 0px 0px 4px black"">
                            Data ini wajib diisi!
                        </div>
                        @csrf
                      </div>
                      <div class="form-group  mb-3">
                        <label for="password" style="color: #E6B31E;">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <div class="valid-feedback" style="font-size: 15px; color: green; font-weight: 700; text-shadow: 0px 0px 5px white">
                            Password Dapat disimpan
                          </div>
                          <div class="invalid-feedback" style="font-size: 15px; color: red; font-weight: 700; text-shadow: 0px 0px 4px black"">
                            Data ini wajib diisi!
                          </div>
                      </div>
                      <div class="form-group" style="margin-bottom: 180px">
                        <label for="role" style="color: #E6B31E;">Role</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="" disabled hidden selected>Pilih Role</option>
                            <option value="super_admin">Super Admin</option>
                            <option value="pengelola">pengelola</option>
                            <option value="peminta">Peminta</option>
                        </select>
                        <div class="valid-feedback" style="font-size: 15px; color: green; font-weight: 700; text-shadow: 0px 0px 5px white">
                            Role Dapat disimpan
                          </div>
                          <div class="invalid-feedback" style="font-size: 15px; color: red; font-weight: 700; text-shadow: 0px 0px 4px black"">
                            Data ini wajib diisi!
                          </div>
                      </div>
                      <div class="col-md-4 mt-3 mb-3">
                        <button type="submit" class="btn me-4" style="background-color: white;font-weight: 500 ; color: green; border: 1px solid #E6B31E; min-width: 100px">SIMPAN</button>
                        <a href="/akun" class="btn " style="background-color: white;font-weight: 500 ; color: red;  border: 1px solid #E6B31E;  min-width: 100px">KEMBALI</a>
                    </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict'
    
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')
    
      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }
    
            form.classList.add('was-validated')
          }, false)
        })
    })()
</script>
@endsection