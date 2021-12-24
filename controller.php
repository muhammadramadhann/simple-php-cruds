<?php

require_once "./connection.php";

function query($query) {
  global $koneksi_db;
  $result = mysqli_query($koneksi_db, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
  }
  return $rows;
}

// create/add
function create($data) {
  global $koneksi_db;

  $data["id"] = rand();

  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $tanggal_lahir = $data["tanggal_lahir"];
  $jenis_kelamin = $data["jenis_kelamin"];
  $asal = htmlspecialchars($data["asal"]);
  $tujuan = htmlspecialchars($data["tujuan"]);
  $maskapai = $data["maskapai"];

  $query = "INSERT INTO tb_penumpang (id_buku, nama, tanggal_lahir, jenis_kelamin, asal, tujuan, maskapai)
  VALUES ('','$nama','$tanggal_lahir','$jenis_kelamin','$asal','$tujuan','$maskapai')";

  mysqli_query($koneksi_db, $query);

  return mysqli_affected_rows($koneksi_db);
}

// update/edit
function update($data) {
  global $koneksi_db;

  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $tanggal_lahir = $data["tanggal_lahir"];
  $jenis_kelamin = $data["jenis_kelamin"];
  $asal = htmlspecialchars($data["asal"]);
  $tujuan = htmlspecialchars($data["tujuan"]);
  $maskapai = $data["maskapai"];

  $query = "UPDATE tb_penumpang 
  SET nama = '$nama', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', asal = '$asal', tujuan = '$tujuan', maskapai = '$maskapai'
  WHERE id = $id";

  mysqli_query($koneksi_db, $query);

  return mysqli_affected_rows($koneksi_db);
}

// delete
function delete($id) {
  global $koneksi_db;
  $delete_query = "DELETE FROM tb_penumpang WHERE id = $id";
  mysqli_query($koneksi_db, $delete_query);

  return mysqli_affected_rows($koneksi_db);
}

// search/read
function search($keyword) {
  $find_query = "SELECT * FROM tb_penumpang 
  WHERE nama LIKE '%$keyword%'
  OR tanggal_lahir LIKE '%$keyword%'
  OR jenis_kelamin LIKE '%$keyword%'
  OR asal LIKE '%$keyword%'
  OR tujuan LIKE '%$keyword%'
  OR maskapai LIKE '%$keyword%'";

  return query($find_query);
}

// register
function register($data) {
  global $koneksi_db;

  $email = htmlspecialchars($data["email"]);
  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($koneksi_db, $data["password"]);
  $konfirmasi_password = mysqli_real_escape_string($koneksi_db, $data["konfirmasi_password"]);

  // mengecek ketersediaan username dan email
  $check_email_query = "SELECT email FROM tb_pengguna WHERE email = '$email'";
  $check_email = mysqli_query($koneksi_db, $check_email_query);
  
  $check_user_query = "SELECT username FROM tb_pengguna WHERE username = '$username'";
  $check_username = mysqli_query($koneksi_db, $check_user_query);

  if (!mysqli_fetch_assoc($check_email)) {
    if (!mysqli_fetch_assoc($check_username)) {
      // cek konfirmasi password
      if ($password == $konfirmasi_password) {
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $konfirmasi_password = password_hash($konfirmasi_password, PASSWORD_DEFAULT);
  
        // tambah user ke database
        $register_query = "INSERT INTO tb_pengguna VALUES ('', '$email','$username','$password','$konfirmasi_password')";
        mysqli_query($koneksi_db, $register_query);
  
        $_SESSION['success_register'] = "Registrasi User Berhasil!";
  
        header("location: login.php");
        exit;
      } else { 
        $_SESSION['failed_conf_password'] = "Konfirmasi Password Salah!";
        
        header("Location: register.php");
        exit;
      } 
    } else {
      $_SESSION['username_unavailable'] = "Username Sudah Digunakan!";
  
      header("Location: register.php");
      exit;
    }
  } else {
    $_SESSION['email_unavailable'] = "Email Sudah Digunakan!";

    header("Location: register.php");
    exit;
  }
}

// login
function login($user) {
  global $koneksi_db;
  
  $username = $user['username'];
  $password = $user['password'];

  $login_query = "SELECT * FROM tb_pengguna WHERE username = '$username'";
  $query = mysqli_query($koneksi_db, $login_query);

  if (mysqli_num_rows($query) === 1) {
    $result = mysqli_fetch_assoc($query);

    if (password_verify($password, $result['password'])) {
      $_SESSION['username'] = $result['username'];
      $_SESSION['login'] = true;

      // set cookie jika remember me di check
      if (isset($_POST['remember_me'])) {
        setcookie('user_login', $username, time() + (86400 * 30));
        setcookie('user_password', $password, time() + (86400 * 30));
      } else {
        if (isset($_COOKIE['user_login'])) {
          setcookie('user_login', '');
        }
        if (isset($_COOKIE['user_password'])) {
          setcookie('user_password', '');
        }
      }
      // redirect
      header('location: home.php');
    }
  } else {
    $_SESSION['failed_login'] = "Username atau Password Salah!";
  }
}

?>