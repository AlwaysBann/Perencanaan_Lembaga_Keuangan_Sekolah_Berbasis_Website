<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
    <style>
     body{
      background-color: #343434;
     }
    </style>
</head>
<body>
  <div class="container my-5 d-flex justify-content-center"> 
    <div class="row justify-content-center align-items-center rounded-3 p-4" style="border: 3px solid #E6B31E; background-color: #F8F9FA; max-width: 400px;">
      <img src="{{asset('img/logo.png')}}" style="width: 120px; margin-bottom: 50px; margin-top: 20px" alt="">
      <h1 class="align-items-center " style="text-align: center; font-weight: 600">Login</h1>
    <form method="POST" action="">
      @csrf
        <div class="form-group mb-3">
          <label for="username" style="">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn my-3 justify-content-center align-items-center" style="color: #E6B31E; background: #343434; padding-left: 100px; padding-right:100px; margin-left: 40px">login</button>
      </form>
      </div>
    </div>
</body>
</html>