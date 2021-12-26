<?php

session_start();

require_once "./controller.php";

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

if (isset($_POST["register"])) {
  register($_POST);
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

      label[for="check_pass"] {
        font-size: 14px;
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

    <title>Register</title>
  </head>
  <body>
    <div class="container pt-4 mt-4">
      <!-- alert email sudah tersedia -->
      <?php if (isset($_SESSION['email_unavailable'])): ?>
        <div class='alert alert-danger alert-dismissible fade show mb-4' role='alert'>
          <?= $_SESSION['email_unavailable']; ?>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
      <?php 
          unset($_SESSION['email_unavailable']); 
      endif;
      ?>

      <!-- alert username sudah tersedia -->
      <?php if (isset($_SESSION['username_unavailable'])): ?>
        <div class='alert alert-danger alert-dismissible fade show mb-4' role='alert'>
          <?= $_SESSION['username_unavailable']; ?>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
      <?php 
          unset($_SESSION['username_unavailable']); 
      endif;
      ?>

      <!-- alert konfirmasi password salah -->
      <?php if (isset($_SESSION['failed_conf_password'])): ?>
        <div class='alert alert-danger alert-dismissible fade show mb-4' role='alert'>
          <?= $_SESSION['failed_conf_password']; ?>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
      <?php 
          unset($_SESSION['failed_conf_password']); 
      endif;
      ?>
      <h1 class="text-center fw-bold mb-5">Selamat Datang di Aplikasi CRUD</h1>
      <div class="container mx-auto registerform border rounded mb-5">
        <h3 class="mt-3 text-center fw-bold">Register</h3>
        <p class="text-center text-secondary mb-4">Silahkan register untuk masuk ke aplikasi CRUD</p>
        <form action="" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Email<span class="text-danger fw-bold"> *</span></label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username<span class="text-danger fw-bold"> *</span></label>
            <input type="text" class="form-control" name="username" required autocomplete="off">
          </div>
          <div class="mb-1">
            <label for="password" class="form-label">Password<span class="text-danger fw-bold"> *</span></label>
            <input type="password" class="form-control" name="password" id="password" required>
          </div>
          <div class="mb-4">
            <div class="form-check float-end">
              <input class="form-check-input" type="checkbox" value="" id="show_pass" onclick="showPassword()">
              <label class="form-check-label" for="show_pass">
                Lihat Password
              </label>
            </div>
          </div>
          <div class="mb-1">
            <label for="konfirmasi_password" class="form-label">Konfirmasi Password<span class="text-danger fw-bold"> *</span></label>
            <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" required>
          </div>
          <div class="mb-5">
            <div class="form-check float-end">
              <input class="form-check-input" type="checkbox" value="" id="show_pass2" onclick="showConfirmPassword()">
              <label class="form-check-label" for="show_pass2">
                Lihat Password
              </label>
            </div>
          </div>
          <div class="mb-4">
              <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
          </div>
          <div class="text-center">
            <p>Sudah punya akun? <a href="login.php" class="text-decoration-none fw-bold text-primary">Masuk di sini</a></p>
          </div>
        </form>
      </div>
    </div>
    <?php include('footer.php'); ?>
    
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

      function showConfirmPassword() {
        const konfirmasi = document.getElementById("konfirmasi_password");

        if (konfirmasi.type == "password") {
          konfirmasi.type = "text";
        } else {
          konfirmasi.type = "password";
        }
      }
    </script>
  </body>
</html>