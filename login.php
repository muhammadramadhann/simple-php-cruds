<?php

session_start();

require_once "./controller.php";

if (isset($_SESSION['login'])) {
  header("location: home.php");
  exit;
}

if (isset($_POST['login'])) {
  login($_POST);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- style -->
    <style>
      body {
        background-color: #fafafa;
      }

      .container.registerform {
        max-width: 500px;
        background-color: white;
        padding: 16px 48px;
      }

      @media screen and (max-width: 576px) {
        .container .registerform {
          width: 100%;
          padding: 16px 24px;
        }
      }
    </style>

    <title>Login</title>
  </head>
  <body>
    <div class="container pt-4 mt-4">
      <!-- alert registrasi berhasil -->
      <?php if (isset($_SESSION['success_register'])): ?>
        <div class='alert alert-success alert-dismissible fade show mb-4' role='alert'>
          <?= $_SESSION['success_register']; ?>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
      <?php 
          unset($_SESSION['success_register']); 
      endif;
      ?>

      <!-- alert login gagal -->
      <?php if (isset($_SESSION['failed_login'])): ?>
        <div class='alert alert-danger alert-dismissible fade show mb-4' role='alert'>
          <?= $_SESSION['failed_login']; ?>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
      <?php 
          unset($_SESSION['failed_login']); 
      endif;
      ?>
      <h1 class="text-center fw-bold mb-5">Selamat Datang di Aplikasi CRUD</h1>
      <div class="container mx-auto registerform border rounded mb-5">
        <h3 class="mt-3 text-center fw-bold">Login</h3>
        <p class="text-center text-secondary mb-4">Silahkan masuk untuk menggunakan aplikasi CRUD</p>
        <form action="" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Username<span class="text-danger fw-bold"> *</span></label>
            <input type="text" class="form-control" name="username" required autocomplete="off" value="<?php if (isset($_COOKIE['user_login'])) { echo $_COOKIE['user_login']; } ?>">
          </div>
          <div class="mb-1">
            <label for="password" class="form-label">Password<span class="text-danger fw-bold"> *</span></label>
            <input type="password" class="form-control" name="password" id="password" required value="<?php if (isset($_COOKIE['user_password'])) { echo $_COOKIE['user_password']; } ?>">
          </div>
          <div class="mb-4">
            <div class="form-check float-end">
              <input class="form-check-input" type="checkbox" value="" id="show_pass" name="show_pass" onclick="showPassword()">
              <label class="form-check-label" for="show_pass">
                Lihat Password
              </label>
            </div>
          </div>
          <div class="mb-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="remember_me" name="remember_me" <?php if (isset($_COOKIE["user_login"])) { echo "checked"; } ?>>
              <label class="form-check-label" for="remember_me">
                Ingat saya 
              </label>
            </div>
          </div>
          <div class="mb-4">
              <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
          </div>
          <div class="text-center">
            <p>Belum punya akun? <a href="register.php" class="text-decoration-none fw-bold text-primary">Daftar di sini</a></p>
          </div>
        </form>
      </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- show/hide password -->
    <script>
      function showPassword() {
        const password = document.getElementById("password")
        
        if (password.type == "password") {
          password.type = "text";
        } else {
          password.type = "password";
        }
      }
    </script>
  </body>
</html>